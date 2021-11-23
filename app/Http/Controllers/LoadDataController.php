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
    public function FillDB(Request $request)
    {
        $repertoire = "C:/Users/onant/Desktop/STAGE_ETNIC/ressources/structure_repertoires"; 

        $le_repertoire = opendir($repertoire) or die("Erreur le repertoire $repertoire n'existe pas");
        // remplissage de la table environnement
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
                    // $serv->adresse_ip=""; 
                    // $serv->version_redhat=""; 
                    // $serv->version_apache=""; 
                    // $serv->php_id=2; 
                    // $serv->mysql_id=1; 
                    // $serv->solr_id=1; 
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
                    // $inst->nom= ; 
                    // $inst->nom= ; 
                    // $inst->nom= ; 
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
                if(!($ext = Extension::all()->where('nom', $fichier)->first()))
                {
                    $ext = new Extension;
                    $ext->nom=$fichier; 
                    // $ext->nom= ; 
                    // $ext->nom= ; 
                    // $ext->nom= ; 
                    $ext->save(); 
                }
                $ext = Extension::all()->where('nom', $fichier)->first(); 
            }else{
                // $file = $repertoire.'/'.$fichier; 
                // $localConf = include($file); 
                $localConf = include("C:/Users/onant/Desktop/STAGE_ETNIC/ressources/structure_repertoires/dev/typo3web01dev/T3_ETNIC10/LocalConfiguration.php"); 
                // $localConf = shell_exec('php ' .$fichier );

                // dd($file); 


                foreach($localConf['EXTENSIONS'] as $key=>$value)
                {
                    if(!($ext = Extension::all()->where('nom', $key)->first()))
                    {
                        $ext = new Extension;
                        $ext->nom=$key; 
                        // $ext->nom= ; 
                        // $ext->nom= ; 
                        // $ext->nom= ; 
                        $ext->save(); 
                    }    
                } 
                if(!($db = Base_de_donnee::all()->where('nom', $localConf['DB']['Connections']['Default']['dbname'])->first()))
                {
                    $db = new Base_de_donnee; 
                    $db->serveur_id = $inst->serveur_id;  
                    $db->nom = $localConf['DB']['Connections']['Default']['dbname']; 
                    $db->save(); 
                }
            }
        }        


    }
}