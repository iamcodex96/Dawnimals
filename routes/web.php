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

    Route::get('/backend/altaDonante', function () {
        return view('backend.paginas.altaDonante');
    });


    Route::get('/backend/donaciones', function () {
        return view('backend.paginas.donaciones');
    });

    Route::get('/backend/donantes', 'Backend\donantesController@indexDonantes')->name('donantes');
//});
//////////////////////////// PAGS BACKEND ////////////////////////////////////
