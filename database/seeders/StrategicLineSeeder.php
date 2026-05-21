<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StrategicLineSeeder extends Seeder
{
    public function run(): void
    {
        $lines = [
            [
                'slug'        => 'equidad-trayectorias',
                'nombre'      => 'Educación para la Equidad y las Trayectorias Completas',
                'color_token' => '--caribe',
            ],
            [
                'slug'        => 'calidad-innovacion',
                'nombre'      => 'Calidad Educativa con Innovación y Sostenibilidad',
                'color_token' => '--sol',
            ],
            [
                'slug'        => 'identidad-territorial',
                'nombre'      => 'Educación con Identidad y Pertinencia Territorial',
                'color_token' => '--palma',
            ],
            [
                'slug'        => 'gestion-gobernanza',
                'nombre'      => 'Gestión Educativa Participativa y con Gobernanza',
                'color_token' => '--lila',
            ],
        ];

        foreach ($lines as $line) {
            DB::table('strategic_lines')->updateOrInsert(
                ['slug' => $line['slug']],
                array_merge($line, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }
    }
}
