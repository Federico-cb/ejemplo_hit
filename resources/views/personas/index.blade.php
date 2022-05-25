@extends('layouts.template')
@section('Title')
Personas
@endsection

@section('content')
<div class="row mt-5">
  <div class="col">
    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearpersonamodal">Nuevo</a>
  </div>
</div>
<div class="main-panel content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Personas</h4>
            <p class="card-category">Lista de Personas</p>
          </div>
          <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
              </ul>
            </div>
            @endif

            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th> # </th>
                  <th> Nombre </th>
                  <th> Apellidos </th>
                  <th> Estado Civil </th>
                  <th> Carrera </th>
                  <th> Direccion </th>
                  <th> Correo </th>
                </thead>
                <tbody>
                  @foreach($datos_personas as $persona)
                  <tr>

                    <th scope="row">{{$loop->index+1}}</th>
                    <td> {{$persona->nombre}} </td>
                    <td> {{$persona->apellidos}} </td>
                    <td> {{$persona->descripcion}} </td>
                      <td> {{$persona->descripcion_carrera}} </td>
                    <td> {{$persona->direccion}} </td>
                    <td> {{$persona->correo}} </td>
                    <td>
                      <a href="{{route('personas.show',$persona->id_personas)}}" class="btn btn-danger btn-sm" ><i class="far fa-trash-alt"></i></a>
                     <a href="{{route('personas.edit',$persona->id_personas)}}" class="btn btn-sm btn-success" method="post"><i class="far fa-edit"></i></a>
                    </td>
                  </tr>
                   @endforeach
                </tbody>

              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

@include("personas.create")

@if(session("modal_edit"))
@include("personas.edit")
@endif

@if(session("modal_delete"))
@include("personas.delete")
@endif

@if((Session::has("_old_input")))
    @if(array_key_exists("_method",Session::get("_old_input")))
        @include("personas.edit")
    @else
         @section("scripts")
             <script type="text/javascript">
                new bootstrap.Modal(document.getElementById('crearpersonamodal')).show();
             </script>
         @endsection
    @endif
@endif

@endsection
