<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typo3 extends Model
{
    use HasFactory;

    public function instances(){
        return $this->hasMany(Instance::class);
    }

    public function extensions() {
        return $this->belongsToMany(Extension::class);
        }




}
