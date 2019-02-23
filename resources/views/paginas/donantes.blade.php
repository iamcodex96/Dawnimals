@extends('Plantillas.master-private')@section('titulo','donaciones')


@section('contenido')


<form class="form-horizontal" action="" method="post">

<div class="container">

<div class="card mt-3 mb-3 mr-3 ml-3">

    <div class="card-body">
    <button type="button" class="btn btn-success float-right" position="relative">+</button>
    </div>


    <!--Pasaremos todos los datos de los inputs con echo-->

    <div class="card mt-3 mb-3 mr-3 ml-3">
        <!--Header-->
        <h5 class="card-header text-white" style="background-color: #50A5DD;">DONANTES</h5>

        <!--Body-->
        <div class="card-body">
    
            <form action="" method="post">
  
            <div class="col-lg-12 col-md-8">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-inverse">
                          
                                <tr>
                                    <th>#</th>
                                    <th>Nombre/Razon Social</th>
                                    <th>Dirección</th>
                                    <th>Teléfono</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            @foreach ($donantes as $donante)
                                <tr>
                                    <td>1,001</td>
                                    <td>{{$donante->nombreORazonSocial}}</td>
                                    <td>{{$donante->direccion}}</td>
                                    <td>{{$donante->telefono}}</td>
                                    <td>{{$donante->email}}</td>
                                </tr>

                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>

    </form>





















@endsection