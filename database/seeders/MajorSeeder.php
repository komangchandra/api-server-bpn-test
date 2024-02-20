<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $major1 = Major::create([
            'major_name' => 'Informatika'
        ]);

        $major2 = Major::create([
            'major_name' => 'Sistem Informasi'
        ]);

        $major3 = Major::create([
            'major_name' => 'Akuntansi'
        ]);
    }
}
