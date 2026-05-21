<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolProjectSeeder extends Seeder
{
    /**
     * Asocia proyectos a colegios en la tabla pivote school_project.
     *
     * Criterio:
     *   - Proyectos municipales (gestión, cobertura, PEI, gobiernos escolares)
     *     → todos los colegios.
     *   - Proyectos de innovación / infraestructura / STEAM
     *     → colegios con más capacidad instalada.
     *   - Proyectos de identidad / ruralidad / interculturalidad
     *     → colegios rurales e indígenas.
     */
    public function run(): void
    {
        // ── Mapa school_id → project_ids activos ─────────────────────────
        // IDs de colegios:
        //  1  IER Antonio Roldán Betancur
        //  2  IER Bobal
        //  3  IER Caribia
        //  4  IER Eduardo Espitia Romero
        //  5  IER La Comarca
        //  6  IER Las Changas
        //  7  IER Mellito
        //  8  IER Mello Villavicencio
        //  9  IER Mulaticos y Piedrecitas
        // 10  IER Mulatos
        // 11  IER Pueblo Nuevo
        // 12  IER San Sebastián
        // 13  IER Totumo
        // 14  IER Tulapita
        // 15  IER Necoclí
        // 16  IER Nueva Colonia
        // 17  IER El Mellito
        // 18  IER Zapata
        // 19  IER Indígena José Elías Suárez
        //
        // IDs de proyectos por línea:
        //  Línea 1 – Equidad y Trayectorias (caribe):  1–8
        //  Línea 2 – Calidad e Innovación   (sol):     9–16
        //  Línea 3 – Identidad y Pertinencia (palma): 17–22
        //  Línea 4 – Gestión Participativa  (lila):   23–26

        // Proyectos municipales → todos los colegios
        $todos = range(1, 19);

        $mapa = [
            // ── Línea 1 – Equidad ────────────────────────────────────────
            1  => $todos,                          // Tránsitos Seguros - Primera Infancia
            2  => [3, 7, 9, 13, 15, 16, 19],      // Centros de Recursos para la Inclusión
            3  => $todos,                          // Ruta de Cobertura Rural
            4  => $todos,                          // Habilidades para la Vida
            5  => [3, 7, 8, 11, 15, 16],           // Puentes a la Educación Terciaria
            6  => $todos,                          // Acompañamiento a Familias
            7  => $todos,                          // Educación en Convivencia y Ética
            8  => [2, 3, 5, 6, 7, 10, 12, 13, 14, 15, 19], // Voluntariado y Participación Comunitaria

            // ── Línea 2 – Calidad ────────────────────────────────────────
            9  => $todos,                          // Plan de Mejora Continua
            10 => $todos,                          // Formación y Acompañamiento Docente
            11 => [3, 7, 8, 15, 16],               // Centro de Innovación Educativa
            12 => [3, 7, 8, 13, 15, 16],           // Dotación Científica
            13 => $todos,                          // Plan Maestro de Infraestructura
            14 => $todos,                          // Dotación TIC Integral
            15 => [3, 7, 8, 11, 15, 16],           // Laboratorios STEAM
            16 => [3, 7, 8, 15, 16],               // Alianzas para la Sostenibilidad

            // ── Línea 3 – Identidad ──────────────────────────────────────
            17 => $todos,                          // Cátedra Municipal y Multiculturalidad
            18 => $todos,                          // PEI Actualizados y Currículos Contextualizados
            19 => $todos,                          // Aprendizaje en Aulas Abiertas
            20 => $todos,                          // Gobiernos Escolares y Gestión Pedagógica
            21 => $todos,                          // Clubes de Lectura y Pensamiento Crítico
            22 => [1,2,4,5,6,7,9,10,11,12,13,14,17,18,19], // Proyectos Productivos Escolares y Rurales

            // ── Línea 4 – Gestión ────────────────────────────────────────
            23 => $todos,                          // Mesa de Educación y JUME
            24 => $todos,                          // Sistema de Información y Tableros de Control
            25 => $todos,                          // Participación Ciudadana y Rendición de Cuentas
            26 => $todos,                          // Gestión de Recursos y Sostenibilidad Financiera
        ];

        // ── Construir filas para inserción ───────────────────────────────
        $rows = [];
        $now  = now();

        foreach ($mapa as $projectId => $schoolIds) {
            foreach ($schoolIds as $schoolId) {
                $rows[] = [
                    'school_id'  => $schoolId,
                    'project_id' => $projectId,
                    'active'     => true,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        // Evita duplicados si se corre más de una vez
        DB::table('school_project')->truncate();
        DB::table('school_project')->insert($rows);

        $this->command->info('OK school_project — ' . count($rows) . ' asociaciones insertadas.');
    }
}