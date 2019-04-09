<?php
use App\Models\Donacion;
use App\Models\Challenge;
//////////////////////////// PAGS FRONTEND ///////////////////////////////////
Route::redirect('/', 'landing');

Route::get('/landing', function () {
    $data["retos"] = Challenge::all();
    return view('frontend.paginas.landing', $data);
})->name("landing");
Route::get('/quien_somos', function () {
    return view('frontend.paginas.quien_somos');
})->name("quien_somos");
Route::get('/como_ayudar', function () {
    return view('frontend.paginas.como_ayudar');
})->name("como_ayudar");
//////////////////////////// PAGS FRONTEND ///////////////////////////////////

//////////////////////////// PAGS BACKEND ////////////////////////////////////
Route::prefix("backend/")->middleware("locale")->group(function() {

    Route::get('chgIdioma/{lang}', 'LocalizationController@chgIdioma');

    Route::get('login', 'Backend\AccountController@index');
    Route::post('login', 'Backend\AccountController@login')->name("login");
    Route::get('logout', 'Backend\AccountController@logout')->name("logout");

    Route::get('requestResetPassword', 'Backend\AccountController@requestResetPassword')->name("requestReset");
    Route::post('sendResetPassword', 'Backend\AccountController@sendResetPassword')->name("sendRequest");
    Route::get('sendResetPassword/{token}', 'Backend\AccountController@resetPassword')->name("resetPassword");
    Route::post('setNewPassword', 'Backend\AccountController@setNewPassword')->name('setNewPassword');

    //Route::group(['middleware' => ['auth']], function () {
        Route::get('/', function () {
            $donaciones = Donacion::all();
            $data['donaciones']=$donaciones;

            return view('backend.paginas.backend',$data);
        });
        Route::resource('donaciones', 'Backend\DonacionController');
        Route::resource('donantes', 'Backend\DonanteController');



            Route::prefix("mantenimientos")->middleware('needAdmin')->group(function() {
            Route::resource("usuarios", "Backend\Mantenimientos\UsuariosController");
            Route::resource("subtipos", "Backend\Mantenimientos\SubtiposController");
            Route::resource("challenges", "Backend\Mantenimientos\ChallengesController");
        });

    //});
});
//////////////////////////// PAGS BACKEND ////////////////////////////////////

//////////////////////////// PAGS CHARTS ////////////////////////////////////

Route::get('/testing', function () {
    return view('chart');
});
Route::get('/get-post-chart-data', 'ChartDataController@getMonthlyPostData');

Route::get('/test', 'ChartDataController@getMoneyPostCount');

//////////////////////////// PAGS CHARTS ////////////////////////////////////


