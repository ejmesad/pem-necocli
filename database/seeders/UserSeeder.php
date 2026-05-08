<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name'     => 'Administrador PEM',
                'email'    => 'admin@pem-necocli.co',
                'password' => bcrypt('Admin2026*'),
                'role'     => 'superadmin',
            ],
            [
                'name'     => 'Coordinador Mesa',
                'email'    => 'coordinador@pem-necocli.co',
                'password' => bcrypt('Mesa2026*'),
                'role'     => 'admin_mesa',
            ],
            [
                'name'     => 'Editor PEM',
                'email'    => 'editor@pem-necocli.co',
                'password' => bcrypt('Editor2026*'),
                'role'     => 'editor',
            ],
        ];

        foreach ($users as $data) {
            $user = User::updateOrCreate(
                ['email' => $data['email']],
                [
                    'name'              => $data['name'],
                    'password'          => $data['password'],
                    'email_verified_at' => now(),
                ]
            );
            $user->assignRole($data['role']);
        }
    }
}