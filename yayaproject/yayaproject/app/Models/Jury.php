<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jury extends Model
{
    use HasFactory;

    protected $fillable = [
        'defense_date',
        'role'
    ];

    public function report()
{
    return $this->belongsTo(Report::class, 'report_id');
}

}

