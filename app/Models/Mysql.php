<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mysql extends Model
{
    use HasFactory;

    public function serveurs(){
        return $this->belongsToMany(Serveur::class);
    }
}
