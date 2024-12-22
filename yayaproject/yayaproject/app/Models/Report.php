<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'title',
        'status',
        'correction_date',
        'submission_date',
        'comments',
        'student_id',
        'teacher_id'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function jury()
{
    return $this->hasOne(Jury::class, 'report_id');
}

}

