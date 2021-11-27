<?php

namespace App\Http\Controllers;

use App\Models\Base_de_donnee;
use Illuminate\Http\Request;
use App\Models\Environnement;
use App\Models\Instance;
use App\Models\Serveur;
use App\Models\Extension;

use League\CommonMark\Environment\Environment;

class LoadDataController extends Controller
{
    public function index()
    {
        $repertoire = "C:/Users/onant/Desktop/STAGE_ETNIC/ressources/structure_repertoires"; 

        $le_repertoire = opendir($repertoire) or die("Erreur le repertoire $repertoire n'existe pas");
        while($fichier = @readdir($le_repertoire))
        {
            if ($fichier == "." || $fichier == "..") continue;
            if(is_dir($repertoire.'/'.$fichier))
            {
                if(!($env = Environnement::all()->where('abreviation', $fichier)->first()))
                {
                    $env = new Environnement;
                    $env->abreviation=$fichier; 
                    $env->nom=""; 
                    $env->save(); 
                }
                $env = Environnement::all()->where('abreviation', $fichier)->first(); 
                $this->FillServers($repertoire.'/'.$fichier, $env); 
            }           
        }
        return redirect(to:'/'); 
    }

    public function FillServers($repertoire, $env)
    {
        $le_repertoire = opendir($repertoire) or die("Erreur le repertoire $repertoire n'existe pas");
        while($fichier = @readdir($le_repertoire))
        {
            if ($fichier == "." || $fichier == "..") continue;
            if(is_dir($repertoire.'/'.$fichier))
            {
                if(!($serv = Serveur::all()->where('nom', $fichier)->first()))
                {
                    $serv = new Serveur;
                    $serv->nom=$fichier; 
                    $serv->environnement_id= $env->id; 
                    $serv->save(); 
                }
                $serv = Serveur::all()->where('nom', $fichier)->first(); 
                $this->FillInstances($repertoire.'/'.$fichier, $serv); 
            }
        }        
    }
    
    public function FillInstances($repertoire, $serv)
    {
        // remplissage de la table serveurs
        $le_repertoire = opendir($repertoire) or die("Erreur le repertoire $repertoire n'existe pas");
        while($fichier = @readdir($le_repertoire))
        {
            if ($fichier == "." || $fichier == "..") continue;
            if(is_dir($repertoire.'/'.$fichier))
            {
                if(!($inst = Instance::all()->where('nom', $fichier)->first()))
                {
                    $inst = new Instance;
                    $inst->nom=$fichier; 
                    $inst->serveur_id = $serv->id; 
                    $inst->save(); 
                }
                $inst = Instance::all()->where('nom', $fichier)->first(); 
                $this->FillExtensions($repertoire.'/'.$fichier, $inst); 
            }
        }        
    }

    public function FillExtensions($repertoire, $inst)
    {
        $le_repertoire = opendir($repertoire) or die("Erreur le repertoire $repertoire n'existe pas");
        while($fichier = @readdir($le_repertoire))
        {
            if ($fichier == "." || $fichier == "..") continue;
            if(is_dir($repertoire.'/'.$fichier))
            {
                $Ntyp3=[]; 
                if(!($ext = Extension::all()->where('nom', $fichier)->first()))
                {
                    array_push($Ntyp3, $fichier); 
                    $ext = new Extension;
                    $ext->nom=$fichier; 
                    $ext->save(); 
                }
                $ext = Extension::all()->where('nom', $fichier)->first(); 
                $this->ExploreEmConf($repertoire.'/'.$fichier, $ext, $Ntyp3);  
            }elseif($fichier == "LocalConfiguration.php"){
                $localConf = include($repertoire.'/'.$fichier);
                if(isset($localConf['EXTENSIONS'])){
                    foreach($localConf['EXTENSIONS'] as $key=>$value)
                    {
                        if(!($ext = Extension::all()->where('nom', $key)->first()))
                        {
                            $ext = new Extension;
                            $ext->nom=$key; 
                            if(!in_array($key, $Ntyp3)){   // vérifie si l'extension est de type typo3
                                $ext->ter= true;
                            }
                            $ext->save(); 
                        }    
                    } 
                }
                if(!($db = Base_de_donnee::all()->where('nom', $localConf['DB']['Connections']['Default']['dbname'])->first()) && isset( $localConf['DB']['Connections']['Default']['dbname']) )
                {
                    $db = new Base_de_donnee; 
                    $db->serveur_id = $inst->serveur_id;  
                    $db->nom = $localConf['DB']['Connections']['Default']['dbname']; 
                    $db->save(); 
                }
            }
        }        
    }


    public function ExploreEmConf($repertoire, $ext)
    {
        $le_repertoire = opendir($repertoire) or die("Erreur le repertoire $repertoire n'existe pas");
        while($fichier = @readdir($le_repertoire))
        {
            if ($fichier == "." || $fichier == "..") continue;
            if(!is_dir($repertoire.'/'.$fichier))
            {
                if ($fichier=="ext_emconf.php"){
                    $_EXTKEY = 'key'; 
                    $EM_CONF = [$_EXTKEY =>[] ]; 
                    include($repertoire.'/'.$fichier); 
                    if(($ext = Extension::all()->where('nom', $ext->nom )->first()) && isset( $EM_CONF[$_EXTKEY]['version']))
                    {
                        $ext->version_ext= $EM_CONF[$_EXTKEY]['version'];
                        $ext->actif= true;
                        $ext->save(); 
                    }
                }
            }
        }        
    }




}