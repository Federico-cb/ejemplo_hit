<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Personas;
use App\Models\EstadoCivil;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\DB;
class PersonasController extends Controller
{
    public function index()
    {
///SELECT personas.nombre,personas.apellidos,personas.direccion,personas.correo,estado_civil.descripcion,carreras.descripcion_carrera FROM personas,estado_civil,carreras
///  WHERE personas.id_estado_civil=estado_civil.id_estado_civil AND personas.id_carrera = carreras.id_carrera

	 $datos_personas = Personas::join('estado_civil', 'personas.id_estado_civil', '=', 'estado_civil.id_estado_civil')
         ->join("carreras","personas.id_carrera","carreras.id_carrera")
         ->select('personas.*','estado_civil.descripcion',"carreras.descripcion_carrera")->get();
     //dd($datos_personas);
     $datos_estado_civil= EstadoCivil::all();
     $datos_carreras=Carrera::all();
     //dd($datos_personas);
        return view("personas.index",compact("datos_personas","datos_estado_civil","datos_carreras"));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+) ',
            'apellidos' => 'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)',
            'id_estado_civil' => 'required',
            'direccion' => 'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)',
            'correo' => 'required|email',
            'password' =>  [
                                'required',
                                'max:50',
                                Password::min(8)
                                    ->mixedCase()
                                    ->letters()
                                    ->numbers()
                                    ->symbols()
                                    ->uncompromised(),
                            ],
        ]);

        $datosPersonas = $request->all();
        Personas::create($datosPersonas);
        return redirect()->route('personas.index');
    }


    public function show(Personas $persona)
    {
    //dd($persona);
     return back()->with(["modal_delete"=>true,"delete_persona"=>$persona]);//

    }

    public function edit(Personas $persona)
    {
       //dd($persona);
        return back()->with(["modal_edit"=>true,"edit_persona"=>$persona]);//

    }

    public function update(Request $request, Personas $persona)
    {

    //dd(Request::url());
       $request->validate([
                   'nombre' => 'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+) ',
                   'apellidos' => 'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)',
                   'id_estado_civil' => 'required',
                   'direccion' => 'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)',
                   'correo' => 'required|email',
        ]);

    $persona->update($request->all());
             return redirect('personas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personas $persona)
    {
    //dd($id);

        $persona->delete();
        return redirect('personas');
    }
}
