<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instance extends Model
{
    use HasFactory;

    public function serveurs(){
        return $this->hasMany(Serveur::class);
    }

    public function sites(){
        return $this->hasMany(Site::class);
    }

    public function base_de_donnee(){
        return $this->belongsTo(Base_de_donnee::class);
    }
    public function typo3(){
        return $this->belongsTo(Typo3::class);
    }
}
