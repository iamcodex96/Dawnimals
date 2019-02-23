
@extends('Plantillas.master-private')

@section('contenido')
    <div class="logo col-2 mx-auto mt-3">
        <img class="center-block" src="../storage/app/public/imagenes/spam.jpg" width= "200px" alt="">
    </div>
    <main class="login-form">
        <div class="cotainer">
            <div class="row align-items-center h-75">
                <div class="col-6 mx-auto">
                    <div class="card">
                        <div class="card-header">Login</div>
                        <div class="card-body">
                            <form action="" method="">
                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="email-address" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control" name="password" required>
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Iniciar sesión
                                    </button>
                                    <a href="#" class="btn btn-link">
                                        Has olvidado tu contraseña?
                                    </a>
                                </div>
                        </div>
                        </form>

                    </div>
                    <div class="loginAnimal col-2 mx-auto mt-5">
                        <img class="rounded float-right" src="../../storage/app/public/imagenes/loginDog.png" width= "200px" alt="">
                        </div>
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection




