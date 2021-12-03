<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serveur extends Model
{
    use HasFactory;
    public function environnement(){
        return $this->belongsTo(Environnement::class);
    }
    public function solrs(){
        return $this->belongsToMany(Solr::class);
    }
    public function mysqls(){
        return $this->belongsToMany(Mysql::class);
    }
    public function phps(){
        return $this->belongsToMany(Php::class);
    }
    public function instances(){
        return $this->hasMany(Instance::class);
    }
    public function base_de_donnees(){
        return $this->hasMany(Base_de_donnee::class);
    }


}
