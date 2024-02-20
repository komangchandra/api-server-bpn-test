<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $student1 = Student::create([
            'student_number' => '19311092',
            'student_name' => 'Komang Chandra Winata',
            'major_id' => 2,
            'address' => 'Lampung',
            'email' => 'komangchandra@localhost',
            'phone_number' => '0822-xxxx-xxxx'
        ]);
    }
}
