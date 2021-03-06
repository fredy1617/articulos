<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Form6;
use App\Base;
use App\Revista;

class Form6Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view("Form5.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $bases=Base::find($id);
        $revista=Revista::find($bases->id_revista);
        $form6 = new Form6;
        
        return view("Form6.create", ["form6" => $form6])->with('base',$bases)->with('revista',$revista);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $form6 = new Form6;
        $form6->id_info=$id;

        if ($request->Tema1==null  ) { $request->Tema1=''; }
        if ($request->Tema2==null ) { $request->Tema2=''; }
        if ($request->Tema3==null ) { $request->Tema3=''; }
        if ($request->Tema4==null  ) { $request->Tema4=''; }

        $form6->Tema1=$request->Tema1;
        $form6->Tema2=$request->Tema2;
        $form6->Tema3=$request->Tema3;
        $form6->Tema4=$request->Tema4;

        $form6->Algorithms_Tecnologies=$request->Algorithms_Tecnologies;
        $form6->Keyboard=$request->Keyboard;
        $form6->Abstract=$request->Abstract;

        $form6->save();

        if($form6->save()){
            return redirect("/infobase");
        }else{
            return view("form6.create");
        }
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
