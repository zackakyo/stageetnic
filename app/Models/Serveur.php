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
    public function solr(){
        return $this->belongsTo(Solr::class);
    }
    public function mysql(){
        return $this->belongsTo(Mysql::class);
    }
    public function php(){
        return $this->belongsTo(Php::class);
    }
    public function instances(){
        return $this->hasMany(Instance::class);
    }
    public function base_de_donnees(){
        return $this->hasMany(Base_de_donnee::class);
    }


}
