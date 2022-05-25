@extends('layouts.template')
@section('Title')
Personas
@endsection

@section('content')
<div class="row mt-5">
  <div class="col">
    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearcarreramodal">Nuevo</a>
  </div>
</div>
<div class="main-panel content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Carreras</h4>
            <p class="card-category">Lista de Carreras</p>
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
                  <th> Carrera </th>
                </thead>
                <tbody>
                  @foreach($datos_carrera as $carrera)
                  <tr>

                    <th scope="row">{{$loop->index+1}}</th>
                    <td> {{$carrera->descripcion_carrera}} </td>
                    <td>
                      <a href="{{route('carreras.show',$carrera->id_carrera)}}" class="btn btn-danger btn-sm" ><i class="far fa-trash-alt"></i></a>
                     <a href="{{route('carreras.edit',$carrera->id_carrera)}}" class="btn btn-sm btn-success" method="post"><i class="far fa-edit"></i></a>
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

@include("carreras.create")

@if(session("modal_edit"))
@include("carreras.edit")
@endif

@if(session("modal_delete"))
@include("carreras.delete")
@endif

@if((Session::has("_old_input")))
    @if(array_key_exists("_method",Session::get("_old_input")))
        @include("carreras.edit")
    @else
         @section("scripts")
             <script type="text/javascript">
                new bootstrap.Modal(document.getElementById('crearcarreramodal')).show();
             </script>
         @endsection
    @endif
@endif

@endsection
