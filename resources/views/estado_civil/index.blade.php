@extends('layouts.template')
@section('Title')
Estado Civil
@endsection

@section('content')
<div class="row mt-5">
  <div class="col">
    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearestadomodal">Nuevo</a>
  </div>
</div>
<div class="main-panel content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Estado Civil</h4>
            <p class="card-category">Lista de Estado Civil</p>
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
                  <th> Descripción </th>
                </thead>
                <tbody>
                  @foreach($datos_estado_civil as $estado_civil)
                  <tr>
                    <th scope="row">{{$loop->index+1}}</th>
                    <td> {{$estado_civil->descripcion}} </td>

                    <td>
                      <a href="{{route('estado_civil.show',$estado_civil->id_estado_civil)}}" class="btn btn-danger btn-sm" ><i class="far fa-trash-alt"></i></a>
                     <a href="{{route('estado_civil.edit',$estado_civil->id_estado_civil)}}" class="btn btn-sm btn-success" method="post"><i class="far fa-edit"></i></a>
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

@include("estado_civil.create")

@if(session("modal_edit"))
@include("estado_civil.edit")
@endif

@if(session("modal_delete"))
@include("estado_civil.delete")
@endif

@if((Session::has("_old_input")))
    @if(array_key_exists("_method",Session::get("_old_input")))
        @include("estado_civil.edit")
    @else
         @section("scripts")
             <script type="text/javascript">
                new bootstrap.Modal(document.getElementById('crearestadomodal')).show();
             </script>
         @endsection
    @endif
@endif

@endsection
