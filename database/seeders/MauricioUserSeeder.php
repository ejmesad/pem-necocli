<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MauricioUserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'maurohenaogaleano@gmail.com'],
            [
                'name'              => 'Mauricio Henao Galeano',
                'password'          => Hash::make('pepita2$'),
                'email_verified_at' => now(),
            ]
        );

        $user->assignRole('admin_mesa');

        $this->command->info('Usuario Mauricio Henao creado con rol admin_mesa.');
    }
}
