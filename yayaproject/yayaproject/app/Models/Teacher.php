<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role'
    ];

    public function reports()
    {
        return $this->hasMany(Report::class, 'teacher_id');
    }

    public function student()
{
    return $this->hasMany(Student::class, 'student_id');
}

public function notification()
{
    return $this->hasMany(Notification::class, 'expediteur_id');
}


}

