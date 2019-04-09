@extends('backend.plantillas.master')

@section('titulo','SPAM Panel de control')

@section('contenido')

<div class="container-fluid" id="main">
   {{-- <h2>Panel de control</h2> --}}
        <div class="col main">

            <div class="row">
            <div class="col-xl-5 col-sm-5 py-2">
                <div class="card text-white bg-success h-100">
                    <div class="card-body bg-success">
                        <div class="row">
                            <div class="text-left col-9">
                                <i class="fa fa-list fa-4x mb-3 text-left"></i>
                            </div>
                                <div class="botonAdd col-3 text-right">
                                <a href="" class="btn btn-secondary mr-2" data-toggle="tooltip" data-placement="top" title="Agregar donación"> <i class="fa fa-plus fa-2x"></i> </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="izquierda text-left col-10">
                                <h6 class="text-uppercase">Total donaciones</h6>
                                <h1 class="display-4">2000€</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-7 col-sm-7 py-2">
                <div class="card h-100">
                    <div class="card-body">
                        <h6 class="text-uppercase">Gráfico sobre donaciones</h6>
                    </div>
                </div>
            </div>

                </div>

        <div class="row">
            <div class="col-xl-5 col-sm-5 py-2">
                <div class="card text-white bg-secondary h-100">
                    <div class="card-body bg-secondary">
                        <div class="row">
                            <div class="text-left col-9">
                                <i class="fa fa-user fa-4x mb-3"></i>
                            </div>
                                <div class="botonAdd col-3 text-right">
                                    <a href="" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Agregar donante"> <i class="fa fa-plus fa-2x"></i> </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="izquierda text-left col-10">
                                <h6 class="text-uppercase">Donantes</h6>
                                <h1 class="display-4">134</h1>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

            <div class="col-xl-7 col-sm-7 py-2">
                <div class="card h-100">
                    <div class="card-body">
                        <h6 class="text-uppercase">Gráfico sobre donantes</h6>
                    </div>
                </div>
            </div>

        </div>

            <div class="row">
                <div class="col-xl-12 col-sm-12 py-10 text-center">
                    <div class="card text-white bg-info h-100">
                        <div class="card-body bg-info">
                            <div class="rotate">
                                <i class="fa fa-twitter fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">Reto Activo</h6>
                            <h6 class="text-uppercase">Nombre</h6>
                            <h6 class="text-uppercase">35/50</h6>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!--/row-->

            <hr>
{{-- ****************************************ULTIMAS DONACIONES****************************** --}}

                <h3>Últimas Donaciones</h3>
                <div class="col-lg-12 col-md-8">
                    <div class="table-responsive" text-align="center">
                        <table class="table table-bordered table-striped">
                        <thead class=" thead-dark">
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Tipo</th>
                                <th class="text-center">Subtipo</th>
                                <th class="text-center">Centro Receptor</th>
                                <th class="text-center">Coste</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($donaciones as $donacion)
                                    <td class="text-center">{{$donacion->id}}</td>
                                    <td class="text-center">{{$donacion->subtipos->tipos->nombre}}</td>
                                    <td class="text-center">{{$donacion->subtipos->nombre}}</td>
                                    <td class="text-center">{{$donacion->centro->nombre}}</td>
                                    <td class="text-center">{{$donacion->coste}}</td>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            <!--/row-->

    @endsection



