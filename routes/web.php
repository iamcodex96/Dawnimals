<?php

//////////////////////////// PAGS FRONTEND ///////////////////////////////////
Route::redirect('/', 'landing');

Route::get('/landing', function () {
    return view('frontend.paginas.landing');
})->name("landing");
//////////////////////////// PAGS FRONTEND ///////////////////////////////////

//////////////////////////// PAGS BACKEND ////////////////////////////////////
Route::prefix("backend/")->middleware("locale")->group(function() {

    Route::get('chgIdioma/{lang}', 'LocalizationController@chgIdioma');

    Route::get('login', 'Backend\AccountController@index');
    Route::post('login', 'Backend\AccountController@login')->name("login");
    Route::get('logout', 'Backend\AccountController@logout')->name("logout");

    //Route::group(['middleware' => ['auth']], function () {
        Route::get('/', function () {
            return view('backend.paginas.backend');
        });

        Route::resource('donantes', 'Backend\DonanteController');

        Route::resource('donaciones', 'Backend\DonacionController');

        Route::prefix("mantenimientos")->group(function() {
            Route::resource("usuarios", "Backend\Mantenimientos\UsuariosController");
            Route::resource("perfiles", "Backend\Mantenimientos\PerfilesController");
            Route::resource("subtipos", "Backend\Mantenimientos\SubtiposController");
            Route::resource("challenges", "Backend\Mantenimientos\ChallengesController");
        });

    //});
});
//////////////////////////// PAGS BACKEND ////////////////////////////////////


