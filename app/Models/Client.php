<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';
    protected $fillable = [
        'user_id',
        'solde'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function virements()
    {
        return $this->hasMany(Virement::class);
    }
    public function dons()
    {
        return $this->belongsToMany(Don::class);
    }
}
