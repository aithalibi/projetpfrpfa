<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PfeSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'start_date',
        'end_date',
        'projects'
    ];

    public function intership()
    {
        return $this->hasMany(Internship::class, 'session_pfe_id');
    }
    
}

