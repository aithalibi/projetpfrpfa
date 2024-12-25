<?php

namespace Database\Seeders;
use App\Models\Report;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Report::create([
            'title' => 'Rapport 1',
            'status' => 'Non corrigé',
            'submission_date' => '2024-12-22',
            'student_id' => 1,
            'teacher_id' => 1,
        ]);
    
        Report::create([
            'title' => 'Rapport 2',
            'status' => 'Non corrigé',
            'submission_date' => '2024-12-22',
            'student_id' => 1,
            'teacher_id' => 1,
        ]);
    }
}
