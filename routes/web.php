<?php

//////////////////////////// PAGS FRONTEND ///////////////////////////////////
Route::redirect('/', 'landing');

Route::get('/landing', function () {
    return view('frontend.paginas.landing');
})->name("landing");
//////////////////////////// PAGS FRONTEND ///////////////////////////////////


//////////////////////////// PAGS BACKEND ////////////////////////////////////
Route::get('/backend/login', 'Backend\AccountController@index');
Route::post('/backend/login', 'Backend\AccountController@login')->name("login");
Route::get('/backend/logout', 'Backend\AccountController@logout')->name("logout");

//Route::group(['middleware' => ['auth']], function () {
    Route::get('/backend', function () {
        return view('backend.paginas.backend');
    });

    Route::get('/backend/fichaDonante', function () { //habrá que pasarle el id del donante y mostrar sus datos
        return view('backend.paginas.fichaDonante');
    });

    Route::get('/backend/altaDonante', 'DonanteController@create')->name('altaDonante');
    Route::post('/backend/altaDonante', 'DonanteController@store')->name('guardarDonante');


    Route::get('/backend/donaciones', function () {
        return view('backend.paginas.donaciones');
    });

    Route::get('/backend/donantes', 'Backend\donantesController@indexDonantes')->name('donantes');

    Route::resource("backend/mantenimientos/usuarios", "Backend\Mantenimientos\UsuariosController");

    Route::resource("backend/mantenimientos/perfiles", "Backend\Mantenimientos\PerfilesController");

    Route::get('/backend/donantes', 'DonanteController@index')->name('donantes');
//});
//////////////////////////// PAGS BACKEND ////////////////////////////////////
