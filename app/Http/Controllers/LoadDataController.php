<?php

namespace App\Http\Controllers;

use App\Models\Base_de_donnee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Environnement;
use App\Models\Instance;
use App\Models\Serveur;
use App\Models\Extension;
use App\Models\Site;

use League\CommonMark\Environment\Environment;

class LoadDataController extends Controller
{
    public $REPERTOIRE =  "C:/Users/onant/Desktop/STAGE_ETNIC/ressources/structure_repertoires";


    public function index()
    {
        $repertoire = $this->REPERTOIRE;
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
            if($fichier == "sites"){
                $repSites = $repertoire.'/'.$fichier;
                continue;
            }
            if(is_dir($repertoire.'/'.$fichier))
            {
                $Ntyp3=[];
                if(!($ext = Extension::all()->where('nom', $fichier)->first()))
                {
                    array_push($Ntyp3, $fichier);
                    $ext = new Extension;
                    $ext->nom=$fichier;
                    $ext->actif=true;
                    $ext->save();
                }
                $ext = Extension::all()->where('nom', $fichier)->first();
                DB::table('extension_instance')->insertOrIgnore(['extension_id'=>$ext->id , 'instance_id'=>$inst->id]);
                if(isset($inst->typo3_id) && $inst->typo3_id) DB::table('extension_typo3')->insertOrIgnore(['extension_id'=>$ext->id , 'typo3_id'=>$inst->typo3_id]);
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
                            DB::table('extension_instance')->insertOrIgnore(['extension_id'=>$ext->id , 'instance_id'=>$inst->id]);
                            if(isset($inst->typo3_id) && $inst->typo3_id) DB::table('extension_typo3')->insertOrIgnore(['extension_id'=>$ext->id , 'typo3_id'=>$inst->typo3_id]);
                        }
                    }
                }
                if(!($db = Base_de_donnee::all()->where('nom', $localConf['DB']['Connections']['Default']['dbname'])->first()) && isset( $localConf['DB']['Connections']['Default']['dbname']) )
                {
                    $db = new Base_de_donnee;
                    $db->serveur_id = $inst->serveur_id;
                    $db->nom = $localConf['DB']['Connections']['Default']['dbname'];
                     $db->save();
                     $inst->base_de_donnee_id = $db->id;
                    //  $inst->base_de_donnee_id = $db->id;
                     $inst->save();
                }
                $info = $localConf['DB']['Connections']['Default'];
                $connection = [$info['host'], $info['dbname'], $info['user'], $info['password'] ];
            }
        }
        if(isset($connection)) $connect = $this->ConnectDB($connection[0], $connection[1], $connection[2], $connection[3] );
        if( isset($connect) && $connect){
            $this->FillSitesInf9($connect, $inst );
        }
        if(isset($repSites) ) $this->FillSites9plus($repSites, $connect, $inst );
    }

    public function FillSites9plus($repertoire, $bdd, $inst)
    {
        $le_repertoire = opendir( $repertoire ) or die("Erreur le repertoire hello $repertoire n'existe pas");
        while($fichier = @readdir($le_repertoire))
        {
            if ($fichier == "." || $fichier == "..") continue;
            if(is_dir($repertoire.'/'.$fichier))
            {
                $this->FillSites9plus($repertoire.'/'.$fichier, $bdd, $inst);
            }elseif($fichier == "config.yaml"){
                $data = $this->FindInConfigYan($repertoire.'/'.$fichier, 'base:');
                if(!($site = Site::all()->where('domaine', $data)->first()))
                {
                    $site = new Site;
                    $site->domaine = $this->FindInConfigYan($repertoire.'/'.$fichier, 'base:');
                    $site->nom = $this->FindInConfigYan($repertoire.'/'.$fichier, 'websiteTitle:');
                    $rootPid = $this->FindInConfigYan($repertoire.'/'.$fichier, 'rootPageId:');
                    $site->root_id = $rootPid;
                    $site->instance_id = $inst->id;
                    if(isset($bdd) && $bdd ){
                        $rec = $bdd->prepare("select * from pages where uid=?");
                        $rec->execute(array($rootPid));
                        $page = $rec->fetch();
                        if(isset($page['title'])) $site->nom = $page['title'];
                        if(isset($page['crdate'])) $site->root_crdate = new \DateTime('@' .$page['crdate']);
                    }
                    $site->save();
                    // DB::table('extension_site')->insertOrIgnore(['extension_id'=>$ext->id , 'site_id'=>$inst->typo3_id]);
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

    public function FillSitesInf9($bdd, $inst)
    {
        $dbs = $bdd->query("select * from sys_domain");
        while($db = $dbs->fetch())
        {
            $rec = $bdd->prepare("select * from pages where uid=?");
            $rec->execute(array($db['pid']));
            $page = $rec->fetch();
            if(!($site = Site::all()->where('root_id', $db['pid'])->first()))
            {
                $site = new Site;
                $site->root_id = $db['pid'];
                $site->domaine = $db['domainName'];
                if(isset($page['title'])) $site->nom = $page['title'];
                if(isset($page['crdate'])) $site->root_crdate = new \DateTime('@' .$page['crdate']);
                $site->instance_id = $inst->id;
                $site->save();
            }else{
                if(!stristr($site->domaine, $db['domainName'])) $site->domaine .= ", ".$db['domainName'];
                if(isset($page['title'])){
                    if($site->nom != $page['title']) $site->nom = $page['title'];
                }
                if(isset($page['crdate'])){
                    if($site->root_crdate != $page['crdate']) $site->root_crdate = new \DateTime('@' .$page['crdate']);
                }
                if(! $site->instance_id) $site->instance_id = $inst->id;
                $site->save();
            }
        }
    }

    public function ConnectDB($host, $dbName, $user, $password)
    {
        try
        {
            $db = new \PDO("mysql:host=".$host.";dbname=".$dbName, $user, $password);
            return $db;
        }catch (\Exception $e){
            // die($e->getMessage());
            return false;
        }
    }

    public function FindInConfigYan($fichier, $param)
    {
        $monfichier = fopen($fichier, 'r');
        if ($monfichier)
        {
        while (!feof($monfichier))
        {
        $ligne = fgets($monfichier);
        if($bonne_ligne = stristr($ligne, $param) )
        {
            return str_replace($param, "", $bonne_ligne);
        }
        }
        fclose ($monfichier);
        }
    }






}
