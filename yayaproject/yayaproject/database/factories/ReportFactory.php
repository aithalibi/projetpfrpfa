<?php
namespace Database\Factories;

use App\Models\Report;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Student;

class ReportFactory extends Factory
{
    protected $model = Report::class;

    public function definition()
    {
        return [
            'teacher_id' => User::factory(),
            'student_id' => Student::factory(),
            'comments' => $this->faker->sentence,
            'status' => 'Pending',
            'correction_date' => null,
        ];
    }
}
