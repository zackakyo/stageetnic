<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Typo3; 

class Typo3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $typo3s = Typo3::all(); 
        return view('typo3/index', ['typo3s' => $typo3s, 'view' => 0]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typo3s = Typo3::all(); 
        return view('typo3/index', ['typo3s' => $typo3s, 'view' => 1]);
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
            'version_courte'=>'required', 
            'version_complete'=>'required', 
        ]); 
        $typo3 = new Typo3; 
        $typo3->version_courte = $request->input('version_courte'); 
        $typo3->version_complete = $request->input('version_complete'); 
        $typo3->save(); 
        return redirect(to:'/typo3'); 
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
        $typo3 = Typo3::find($id); 
        
        $typo3s = Typo3::all(); 
        return view('typo3/index', ['typo3s' => $typo3s, 'typo3'=>$typo3, 'view' => 2]);
        // return view('typo3.edit', ['typo3'=>$typo3]); 
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
        $typo3 = Typo3::find($id);  
        $request->validate([
            'version_courte'=>'required', 
            'version_complete'=>'required', 
        ]); 
        $typo3->version_courte = $request->input('version_courte'); 
        $typo3->version_complete = $request->input('version_complete'); 
        $typo3->save(); 
        return redirect(to:'/typo3'); 
    
    }

    public function confirm($id)
    {
        $typo3 = Typo3::find($id); 
        return view('typo3.delete', ['typo3'=>$typo3]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $typo3 = Typo3::find($id); 
        $typo3->delete(); 
        return redirect(to:'/typo3'); 
    }
}
