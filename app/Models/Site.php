<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    public function instance(){
        return $this->belongsTo(Instance::class);
    }

    public function extensions() {
        return $this->belongsToMany(extension::class, "extension_site");
        }
}
