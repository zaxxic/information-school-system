<?php

namespace Database\Seeders;

use App\Models\ClassCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class class_categories extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 7; $i++) {
            ClassCategory::create([
                'category' => 'kelas' . $i
            ]);
        }
    }
}
