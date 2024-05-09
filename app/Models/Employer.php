<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends User
{
    use HasFactory;

     protected $fillable = [
         'user_id',
         'poste'
     ];

    public function user()
    {
        return  $this->belongsTo(User::class);
    }
}
