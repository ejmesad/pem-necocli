<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\School;
use App\Models\Sede;

class ImportColegiosExcel extends Command
{
    protected $signature = 'import:colegios-excel {file : Ruta del archivo Excel}';
    protected $description = 'Actualiza estudiantes, docentes y estado de sedes desde Excel';

    public function handle()
    {
        $file = $this->argument('file');
        $file = realpath($file);

        if (!file_exists($file)) {
            $this->error("❌ Archivo no encontrado: $file");
            return 1;
        }

        $this->info("📥 Leyendo Excel...");

        $sedes_data = $this->readWithPython($file, 'sedes', true);
        $schools_data = $this->readWithPython($file, 'master de colegios', false);

        if (empty($sedes_data) || empty($schools_data)) {
            $this->error("❌ No se pudo leer el Excel");
            return 1;
        }

        // Acumuladores por school_id
        $studentsPerSchool = [];
        $teachersPerSchool = [];

        $this->info("📍 Actualizando sedes...");
        $bar = $this->output->createProgressBar(count($sedes_data));

        foreach ($sedes_data as $row) {
            $sede_id  = intval($row['ID de la sede'] ?? 0);
            $school_id = intval($row['ID Institucion educativa'] ?? 0);
            $students  = intval($row['estudiantes matriculados'] ?? 0);
            $teachers  = intval($row['docentes de la sede'] ?? 0);
            $activa    = intval($row['activa'] ?? 1);
            $cerrada_temp = intval($row['cerrada temporalmete'] ?? 0);
            $cerrada_perm = intval($row['cerrada permantenmente'] ?? 0);

            if ($sede_id === 0) {
                $bar->advance();
                continue;
            }

            // Determinar estado
            $is_active = 1;
            if ($cerrada_perm === 1) $is_active = 0;
            if ($cerrada_temp === 1) $is_active = 0;
            if ($activa === 0)       $is_active = 0;

            // (columna 'active' no existe aún en sedes, se omite)

            // Acumular conteos
            if ($school_id > 0) {
                $studentsPerSchool[$school_id] = ($studentsPerSchool[$school_id] ?? 0) + $students;
                $teachersPerSchool[$school_id] = ($teachersPerSchool[$school_id] ?? 0) + $teachers;
            }

            $bar->advance();
        }

        $bar->finish();
        $this->line("");

        // Actualizar totales en schools
        $this->info("🏫 Actualizando totales por colegio...");

        foreach ($studentsPerSchool as $school_id => $total) {
            School::where('id', $school_id)->update(['students_count' => $total]);
        }

        foreach ($teachersPerSchool as $school_id => $total) {
            School::where('id', $school_id)->update(['teachers_count' => $total]);
        }

        // Resumen
        $this->info("✅ ¡Listo!");
        $this->table(
            ['Colegio ID', 'Estudiantes', 'Docentes'],
            collect($studentsPerSchool)->map(fn($s, $id) => [
                $id,
                $s,
                $teachersPerSchool[$id] ?? 0,
            ])->values()->toArray()
        );

        return 0;
    }

    private function readWithPython($file, $sheet, $skipFirst = false)
    {
        $script  = storage_path('_read_excel.py');
        $output  = storage_path('_excel_out.json');
        $skip    = $skipFirst ? 'True' : 'False';

        $py = <<<PYTHON
import pandas as pd, json, sys

file   = r"$file"
sheet  = "$sheet"
output = r"$output"
skip   = $skip

df = pd.read_excel(file, sheet_name=sheet)
if skip:
    df = df.iloc[1:].reset_index(drop=True)
df = df.fillna(0)
with open(output, 'w', encoding='utf-8') as f:
    json.dump(df.to_dict(orient='records'), f, ensure_ascii=False)
PYTHON;

        file_put_contents($script, $py);
        shell_exec("python \"$script\" 2>&1");

        if (!file_exists($output)) return [];

        $data = json_decode(file_get_contents($output), true);
        @unlink($output);
        @unlink($script);

        return $data ?? [];
    }
}
