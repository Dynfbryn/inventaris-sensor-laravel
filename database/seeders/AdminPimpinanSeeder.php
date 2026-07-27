<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminPimpinanSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@stmkg.ac.id'],
            [
                'name' => 'Admin Inventaris',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );

        User::firstOrCreate(
            ['email' => 'pimpinan@stmkg.ac.id'],
            [
                'name' => 'Pimpinan Stasiun',
                'password' => Hash::make('password123'),
                'role' => 'pimpinan',
            ]
        );

        User::firstOrCreate(
            ['email' => 'teknisi@stmkg.ac.id'],
            [
                'name' => 'Teknisi Stasiun',
                'password' => Hash::make('password123'),
                'role' => 'teknisi',
            ]
        );
    }
}
