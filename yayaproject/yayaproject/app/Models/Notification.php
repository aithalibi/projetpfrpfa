<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender',
        'receiver',
        'content',
        'sent_date'
    ];

    public function expediteur()
{
    return $this->belongsTo(User::class, 'expediteur_id');
}

public function destinataire()
{
    return $this->belongsTo(User::class, 'destinataire_id');
}

}

