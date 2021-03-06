<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Php; 

class PhpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $phps = Php::all(); 
        return view('php/index', ['phps' => $phps, 'view' => 0]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $phps = Php::all(); 
        return view('php/index', ['phps' => $phps, 'view' => 1]);
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
        $php = new Php; 
        $php->version = $request->input('version'); 
        // $product->stock = $request->get(key:'version');
        $php->save(); 
        return redirect(to:'/php'); 
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
        $php = Php::find($id); 
        
        $phps = Php::all(); 
        return view('php/index', ['phps' => $phps, 'php'=>$php, 'view' => 2]);
        // return view('php.edit', ['php'=>$php]); 
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
        $php = Php::find($id);  
        $request->validate([
            'version'=>'required', 
        ]); 
        $php->version = $request->input('version'); 
        $php->save(); 
        return redirect(to:'/php'); 
    
    }

    public function confirm($id)
    {
        $php = Php::find($id); 
        return view('php.delete', ['php'=>$php]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $php = Php::find($id); 
        $php->delete(); 
        return redirect(to:'/php'); 
    }
}
