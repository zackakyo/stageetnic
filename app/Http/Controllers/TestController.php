<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Site;
use Egulias\EmailValidator\Parser\DomainPart;

class TestController extends Controller
{
    public $REPERTOIRE2 =  "C:/Users/onant/Desktop/STAGE_ETNIC/ressources/sites"; 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $domainNames = DB::connection('mysql_second')->select("select description, t3_origuid,t3ver_oid from sys_template");
        // return view('test', ['domainNames' => $domainNames]);
        $var = $this->FillSites($this->REPERTOIRE2);
    }
    
    public function FillSites($repertoire)
    {
        $le_repertoire = opendir($repertoire) or die("Erreur le repertoire $repertoire n'existe pas");
        while($fichier = @readdir($le_repertoire))
        {
            if ($fichier == "." || $fichier == "..") continue;
            if(is_dir($repertoire.'/'.$fichier))
            {
                $this->FillSites($repertoire.'/'.$fichier); 
            }elseif($fichier == "config.yaml"){
                $data = $this->FindInConfigYan($repertoire.'/'.$fichier, 'base:'); 
                if(!($site = Site::all()->where('domaine', $data)->first()))
                {
                    $site = new Site; 
                    $site->domaine = $this->FindInConfigYan($repertoire.'/'.$fichier, 'base:'); 
                    $site->nom = $this->FindInConfigYan($repertoire.'/'.$fichier, 'websiteTitle:'); 
                    $rootPid = $this->FindInConfigYan($repertoire.'/'.$fichier, 'rootPageId:'); 
                    $site->root_id = $rootPid; 
                    $site->root_crdate = DB::connection('mysql_second')->select("select crdate from pages where uid=$rootPid");
                    // $site->prefixe = DB::connection('mysql_second')->select("select  from sys_template where ");
                    //la valeur précédente n'est pas utilisée dans le cadre de t3_etnic10
                    $site->save(); 
                }
            }
        }        
    }

    public function FillSitesInf9()
    {
        $dbs = DB::connection('mysql_second')->select("select * from sys_domain");
        foreach($dbs as $db )
        {
            $page = DB::connection('mysql_second')->select("select * from pages where uid=$db->pid");
            if(!($site = Site::all()->where('root_id', $db->pid)->first()))
            {
                $site = new Site; 
                $site->root_id = $db->pid; 
                $site->domaine = $db->domainName; 
                $site->nom = $page['title']; 
                $site->root_crdate = $page['crdate'];
                $site->save(); 
            }else{
                if(!stristr($site->domaine, $db->domainName)) $site->domaine .= ", ".$db->domainName;
                if($site->nom != $page['title']) $site->nom = $page['title']; 
                if($site->root_crdate != $page['crdate']) $site->root_crdate = $page['crdate'];
                $site->save(); 
            }
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
