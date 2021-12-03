<?php

use App\Models\Environnement;

function environnement($id){
    // dd(DB::table('environnements')->find($id));
    return Environnement::find($id);
}
