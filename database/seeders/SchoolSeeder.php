<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SchoolSeeder extends Seeder
{
    /**
     * 17 Instituciones Educativas Rurales (IER) de Necoclí.
     * Datos base — completar students_count, teachers_count,
     * founded_year, address y coordenadas GPS en la BD
     * una vez se recopile la información con cada institución.
     */
    public function run(): void
    {
        $schools = [
            [
                'name'     => 'IER Antonio Roldán Betancur',
                'type'     => 'Rural',
                'address'  => 'Vereda El Totumo, Necoclí, Antioquia',
            ],
            [
                'name'     => 'IER Bobal',
                'type'     => 'Rural',
                'address'  => 'Vereda Bobal, Necoclí, Antioquia',
            ],
            [
                'name'     => 'IER Caribia',
                'type'     => 'Rural',
                'address'  => 'Vereda Caribia, Necoclí, Antioquia',
            ],
            [
                'name'     => 'IER Eduardo Espitia Romero',
                'type'     => 'Rural',
                'address'  => 'Vereda Mulatos, Necoclí, Antioquia',
            ],
            [
                'name'     => 'IER La Comarca',
                'type'     => 'Rural',
                'address'  => 'Vereda La Comarca, Necoclí, Antioquia',
            ],
            [
                'name'     => 'IER Las Changas',
                'type'     => 'Rural',
                'address'  => 'Vereda Las Changas, Necoclí, Antioquia',
            ],
            [
                'name'     => 'IER Mellito',
                'type'     => 'Rural',
                'address'  => 'Vereda Mellito, Necoclí, Antioquia',
            ],
            [
                'name'     => 'IER Mello Villavicencio',
                'type'     => 'Rural',
                'address'  => 'Vereda Mello, Necoclí, Antioquia',
            ],
            [
                'name'     => 'IER Mulaticos y Piedrecitas',
                'type'     => 'Rural',
                'address'  => 'Vereda Mulaticos, Necoclí, Antioquia',
            ],
            [
                'name'     => 'IER Mulatos',
                'type'     => 'Rural',
                'address'  => 'Vereda Mulatos, Necoclí, Antioquia',
            ],
            [
                'name'     => 'IER Pueblo Nuevo',
                'type'     => 'Rural',
                'address'  => 'Vereda Pueblo Nuevo, Necoclí, Antioquia',
            ],
            [
                'name'     => 'IER San Sebastián',
                'type'     => 'Rural',
                'address'  => 'Vereda San Sebastián, Necoclí, Antioquia',
            ],
            [
                'name'     => 'IER Totumo',
                'type'     => 'Rural',
                'address'  => 'Vereda El Totumo, Necoclí, Antioquia',
            ],
            [
                'name'     => 'IER Tulapita',
                'type'     => 'Rural',
                'address'  => 'Vereda Tulapita, Necoclí, Antioquia',
            ],
            [
                'name'     => 'IER Necoclí',
                'type'     => 'Urbana',
                'address'  => 'Casco urbano, Necoclí, Antioquia',
            ],
            [
                'name'     => 'IER Nueva Colonia',
                'type'     => 'Rural',
                'address'  => 'Vereda Nueva Colonia, Necoclí, Antioquia',
            ],
            [
                'name'     => 'IER El Mellito',
                'type'     => 'Rural',
                'address'  => 'Vereda El Mellito, Necoclí, Antioquia',
            ],
        ];

        foreach ($schools as $data) {
            School::updateOrCreate(
                ['slug' => Str::slug($data['name'])],
                [
                    'name'           => $data['name'],
                    'slug'           => Str::slug($data['name']),
                    'type'           => $data['type'],
                    'municipality'   => 'Necoclí',
                    'address'        => $data['address'],
                    'description'    => null,   // completar
                    'email'          => null,   // completar
                    'phone'          => null,   // completar
                    'logo_url'       => 'images/colegios/' . $this->folderName($data['name']) . '/logo.jpg',
                    'cover_url'      => 'images/colegios/' . $this->folderName($data['name']) . '/sede.jpg',
                    'students_count' => 0,      // completar
                    'teachers_count' => 0,      // completar
                    'founded_year'   => null,   // completar
                    'location_lat'   => null,   // completar
                    'location_lng'   => null,   // completar
                    'social_links'   => null,
                    'active'         => true,
                ]
            );
        }

        $this->command->info('✅ ' . count($schools) . ' instituciones educativas creadas/actualizadas.');
        $this->command->warn('⚠️  Recuerda completar: students_count, teachers_count, founded_year, coordenadas GPS.');
    }

    /**
     * Convierte el nombre de la IER al formato de carpeta de imágenes.
     * Ej: "IER Las Changas" → "IER_las_changas"
     */
    private function folderName(string $name): string
    {
        // Elimina "IER " del inicio, reemplaza espacios por _ y minúsculas
        $clean = preg_replace('/^IER\s+/i', '', $name);
        return 'IER_' . str_replace(' ', '_', $clean);
    }
}
