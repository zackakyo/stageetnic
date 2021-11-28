<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Solr; 

class SolrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $solrs = Solr::all(); 
        return view('solr/index', ['solrs' => $solrs, 'view' => 0]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $solrs = Solr::all(); 
        return view('solr/index', ['solrs' => $solrs, 'view' => 1]);
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
        $solr = new Solr; 
        $solr->version = $request->input('version'); 
        // $product->stock = $request->get(key:'version');
        $solr->save(); 
        return redirect(to:'/solr'); 
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
        $solr = Solr::find($id); 
        
        $solrs = Solr::all(); 
        return view('solr/index', ['solrs' => $solrs, 'solr'=>$solr, 'view' => 2]);
        // return view('solr.edit', ['solr'=>$solr]); 
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
        $solr = Solr::find($id);  
        $request->validate([
            'version'=>'required', 
        ]); 
        $solr->version = $request->input('version'); 
        $solr->save(); 
        return redirect(to:'/solr'); 
    
    }

    public function confirm($id)
    {
        $solr = Solr::find($id); 
        return view('solr.delete', ['solr'=>$solr]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $solr = Solr::find($id); 
        $solr->delete(); 
        return redirect(to:'/solr'); 
    }
}
