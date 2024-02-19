<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'Admin',
            'phone' => '083848101312',
            'password' => '$2y$10$X4MR2ZYJMde/IRUXaVK7.uZiaIDMZKSamCG/8hMtGeFxLu6DZfb.C',
        ]);
    }
}
