<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extension extends Model
{
    use HasFactory;

    public function sites() {
        return $this->belongsToMany(Site::class);
        }
    public function typo3s() {
        return $this->belongsToMany(Typo3::class);
        }
    public function instances() {
        return $this->belongsToMany(Instance::class);
        }
        public function versionExtensions(){
            return $this->hasMany(VersionExtension::class);
        }

}
