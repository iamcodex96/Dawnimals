<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//////////////////////////// PAGS BACKEND ////////////////////////////////////
Route::get('/', function () {
    return view('backend.paginas.login');
});

Route::get('/login', function () {
    return view('backend.paginas.login');
});

Route::get('/backend', function () {
    return view('backend.paginas.backend');
});

Route::get('/donantes', function () {
    return view('backend.paginas.donantes');
});

Route::get('/donantes', 'Backend\donantesController@indexDonantes')->name('donantes');

Route::get('/fichaDonante', function () { //habrá que pasarle el id del donante y mostrar sus datos
    return view('backend.paginas.fichaDonante');
});

Route::get('/altaDonante', function () {
    return view('backend.paginas.altaDonante');
});

//////////////////////////// PAGS BACKEND ////////////////////////////////////

//////////////////////////// PAGS FRONTEND ///////////////////////////////////
Route::get('/landing', function () {
    return view('frontend.paginas.landing');
});
//////////////////////////// PAGS FRONTEND ///////////////////////////////////

