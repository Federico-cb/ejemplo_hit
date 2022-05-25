<?php

namespace App\Http\Controllers;

use App\Models\EstadoCivil;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class EstadoCivilController extends Controller
{
    public function index()
    {
        $datos_estado_civil= EstadoCivil::all();
        return view("estado_civil.index",compact("datos_estado_civil"));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {

        $request->validate([
            'descripcion' => 'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+) '
        ]);

        $datosEstadoCivil= $request->all();
        EstadoCivil::create($datosEstadoCivil);
        return redirect()->route('estado_civil.index');
    }


    public function show(EstadoCivil $estado_civil)
    {
        return back()->with(["modal_delete"=>true,"delete_estado"=>$estado_civil]);
    }

    public function edit(EstadoCivil $estado_civil)
    {
        //dd($persona);
        return back()->with(["modal_edit"=>true,"edit_estado"=>$estado_civil]);//

    }

    public function update(Request $request, EstadoCivil $estado_civil)
    {
        //dd(Request::url());
        $request->validate([
            'descripcion' => 'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+) ',
        ]);

        $estado_civil->update($request->all());
        return redirect('estado_civil');
    }

    /**
     * Remove the specified resource from storage.
     *
     *
     */
    public function destroy(EstadoCivil $estado_civil)
    {
        $estado_civil->delete();
        return redirect('estado_civil');
    }

}
