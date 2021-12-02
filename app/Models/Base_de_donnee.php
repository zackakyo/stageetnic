<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Base_de_donnee extends Model
{
    use HasFactory;

    public function serveurs(){
        return $this->hasMany(Serveur::class);
    }
    public function instance(){
        return $this->belongsTo(Instance::class);
    }
}
