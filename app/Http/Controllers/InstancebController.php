<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Instance;

class InstancebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instances = Instance::all();
        return view('instance/index', ['instances' => $instances, 'view' => 0]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $instances = Instance::all();
        return view('instance/index', ['instances' => $instances, 'view' => 1]);
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
        $instance = new Instance;
        $instance->version = $request->input('version');
        // $product->stock = $request->get(key:'version');
        $instance->save();
        return redirect(to:'/instanceb');
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
        $instance = Instance::find($id);

        $instances = Instance::all();
        return view('instance/index', ['instances' => $instances, 'instance'=>$instance, 'view' => 2]);
        // return view('instance.edit', ['instance'=>$instance]);
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
        $instance = Instance::find($id);
        $instance->url_backend = $request->input('url_backend');
        if($request->input('typo3')) $instance->typo3_id = (int) $request->input('typo3');
        $instance->save();
        return redirect(to:'/instanceb');

    }

    public function confirm($id)
    {
        $instance = Instance::find($id);
        return view('instance.delete', ['instance'=>$instance]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $instance = Instance::find($id);
        // $instance->delete();
        // return redirect(to:'/instanceb');
    }
}
