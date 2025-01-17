<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Virement extends Model
{
    use HasFactory;

    protected $fillable = [
        'montant',
        'client_id',
        'motif',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
