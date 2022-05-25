<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
//use App\Models\Personas;
use App\Models\Personas;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class CarreraController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos_carrera= Carrera::all();
       //    dd($datos_carrera);
        return view("carreras.index",compact("datos_carrera"));
    }
    /*"datos_personas",*/
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
        $request->validate([
            'descripcion_carrera' => 'required',
        ]);
        $datosCarrera = $request->all();
      //  dd($datosCarrera);
        Carrera::create($datosCarrera);
        return redirect()->route('carreras.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function show(Carrera $carrera)
    {
        return back()->with(["modal_delete"=>true,"delete_carrera"=>$carrera]);//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrera $carrera)
    {
        return back()->with(["modal_edit"=>true,"edit_carrera"=>$carrera]);//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrera $carrera)
    {
        //
        $request->validate([

            'descripcion_carrera' => 'required'
        ]);

        $carrera->update($request->all());
        return redirect('carreras');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrera $carrera)
    {
        $carrera->delete();
        return redirect('carreras');

    }
}
