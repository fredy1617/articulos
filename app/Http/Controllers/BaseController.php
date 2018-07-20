<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Base;
use App\Revista;
use DB;

class BaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query=trim($request->get('searchText'));
        $base =DB::table('bases')->where('titulo','LIKE','%'.$query.'%')
        ->orderBy('id','desc')
        ->paginate(10);

        
        return view('base.index', ["base" => $base, "searchText"=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $base = new Base;
        $revistas=Revista::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        
        return view("base.create", ["base" => $base])->with('revistas', $revistas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $base = new Base;
        
        $base->titulo=$request->titulo;
        $base->year=$request->year;
        $base->id_revista=$request->id_revista;
        $base->tipo=$request->tipo;
        
        
        $base->save();

        if($base->save()){
            return redirect("/infobase/");
        }else{
            return view("base.create");
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
        $base = Base::find($id);
        $base->revista;

        if ($base->tipo=="Pending") { $ruta='#'; }
        if ($base->tipo=="Tool") { $ruta='/Form1/create'; }
        if ($base->tipo=="Application") { $ruta='/Form2/create'; }
        if ($base->tipo=="Energy Source") { $ruta='/Form3/create'; }
        if ($base->tipo=="Report") { $ruta='/Form4/create'; }
        if ($base->tipo=="Review") { $ruta='/Form5/create'; }
        if ($base->tipo=="Theorist") { $ruta='/Form6/create'; }

        return view("base.vistabase", ["base" => $base],["ruta" => $ruta]);
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
         $base = Base::find($id);
        
        $base->tipo=$request->tipo;
        
        
        if($base->save()){
            return redirect('/infobase/'.$base->id.'/edit');
        }else{
            return view("base.edit");
        }
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
