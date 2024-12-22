<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'report_status',
        'report_submission_date',
        'birth_date',
        'notification'
    ];

    public function reports()
    {
        return $this->hasMany(Report::class, 'student_id');
    }

    public function enseignant()
    {
    return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function intership()
    {
    return $this->hasOne(Internship::class, 'student_id');
    }

    public function notifications()
    {
    return $this->hasMany(Notification::class, 'destinataire_id');
    }



}
