<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VersionExtension extends Model
{
    use HasFactory;

    public function extension(){
        return $this->belongsTo(Extension::class);
    }



}
