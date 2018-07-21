<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Form3;
use App\Base;

class Form3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Form3.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form3 = new Form3;
        $bases=Base::orderBy('titulo', 'ASC')->pluck('titulo', 'id');
        
        return view("Form3.create", ["form3" => $form3])->with('bases', $bases);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form3 = new Form3;
        $form3->id_info=$request->id_info;

        if ($request->Tema1==null  ) { $request->Tema1=''; }
        if ($request->Tema2==null ) { $request->Tema2=''; }
        if ($request->Tema3==null ) { $request->Tema3=''; }
        if ($request->Tema4==null  ) { $request->Tema4=''; }
        
        $form3->Tema1=$request->Tema1;
        $form3->Tema2=$request->Tema2;
        $form3->Tema3=$request->Tema3;
        $form3->Tema4=$request->Tema4;

        $form3->Country=$request->Country;

        $form3->Focus=$request->Focus;
        $form3->Tecnology=$request->Tecnology;
        $form3->Economic=$request->Economic;
        $form3->Environment=$request->Environment;
        $form3->Social=$request->Social;
        
        if ($request->Other==null) { $request->Other=" "; }
        
        $form3->Other=$request->Other;
        $form3->Keyboard=$request->Keyboard;
        $form3->Abstract=$request->Abstract;
        $form3->save();

        if($form3->save()){
            return redirect("/infobase");
        }else{
            return view("Form3.create");
        }
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
