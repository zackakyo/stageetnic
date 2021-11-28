<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mysql; 

class MysqlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $mysqls = Mysql::all(); 
        return view('mysql/index', ['mysqls' => $mysqls, 'view' => 0]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mysqls = Mysql::all(); 
        return view('mysql/index', ['mysqls' => $mysqls, 'view' => 1]);
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
        $mysql = new Mysql; 
        $mysql->version = $request->input('version'); 
        $mysql->save(); 
        return redirect(to:'/mysql'); 
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
        $mysql = Mysql::find($id); 
        
        $mysqls = Mysql::all(); 
        return view('mysql/index', ['mysqls' => $mysqls, 'mysql'=>$mysql, 'view' => 2]);
        // return view('mysql.edit', ['mysql'=>$mysql]); 
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
        $mysql = Mysql::find($id);  
        $request->validate([
            'version'=>'required', 
        ]); 
        $mysql->version = $request->input('version'); 
        $mysql->save(); 
        return redirect(to:'/mysql'); 
    
    }

    public function confirm($id)
    {
        $mysql = Mysql::find($id); 
        return view('mysql.delete', ['mysql'=>$mysql]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mysql = Mysql::find($id); 
        $mysql->delete(); 
        return redirect(to:'/mysql'); 
    }
}
