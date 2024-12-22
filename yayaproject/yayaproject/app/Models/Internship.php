<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    use HasFactory;

    protected $fillable = [
        'internship_type',
        'duration',
        'start_date',
        'end_date',
        'subject'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    
    public function PfeSession()
{
    return $this->belongsTo(PfeSession::class, 'session_pfe_id');
}



}

