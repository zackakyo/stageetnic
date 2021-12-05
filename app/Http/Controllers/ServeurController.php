<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Serveur;

class ServeurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serveurs = Serveur::all();
        return view('serveur/index', ['serveurs' => $serveurs, 'view' => 0]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serveurs = Serveur::all();
        return view('serveur/index', ['serveurs' => $serveurs, 'view' => 1]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'version'=>'required',
        ]);
        $serveur = new Serveur;
        $serveur->version = $request->input('version');
        // $product->stock = $request->get(key:'version');
        $serveur->save();
        return redirect(to:'/serveur');
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
        $serveur = Serveur::find($id);

        $serveurs = Serveur::all();
        return view('serveur/index', ['serveurs' => $serveurs, 'serveur'=>$serveur, 'view' => 2]);
        // return view('serveur.edit', ['serveur'=>$serveur]);
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
        $serveur = Serveur::find($id);
        // $request->validate([
        //     'version'=>'required',
        // ]);
        $serveur->adresse_ip = $request->input('adresse_ip');
        $serveur->version_redhat = $request->input('version_redhat');
        $serveur->version_apache = $request->input('version_apache');
        $serveur->save();
        if($request->input('phps')) {
            foreach($request->input('phps') as $phpid){
                DB::table('php_serveur')->insertOrIgnore(['php_id'=>(int) $phpid , 'serveur_id'=>(int) $id]);
            }
        }
        if($request->input('mysqls')) {
            foreach($request->input('mysqls') as $mysqlid){
                DB::table('mysql_serveur')->insertOrIgnore(['mysql_id'=>(int) $mysqlid , 'serveur_id'=>(int) $id]);
            }
        }
        if($request->input('solrs')) {
            foreach($request->input('solrs') as $solrid){
                DB::table('serveur_solr')->insertOrIgnore(['solr_id'=>(int) $solrid , 'serveur_id'=>(int) $id]);
            }
        }
        return redirect(to:'/serveur');

    }

    public function confirm($id)
    {
        $serveur = Serveur::find($id);
        return view('serveur.delete', ['serveur'=>$serveur]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serveur = Serveur::find($id);
        $serveur->delete();
        return redirect(to:'/serveur');
    }
}
