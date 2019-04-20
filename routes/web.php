<?php
use App\Models\Donacion;
use App\Models\Challenge;
use Carbon\Carbon;



Route::get('chgIdioma/{lang}', 'LocalizationController@chgIdioma');


Route::middleware('locale')->group(function(){
    //////////////////////////// PAGS FRONTEND ///////////////////////////////////
    Route::redirect('/', 'landing');

    Route::get('/landing', function () {
        $retos = Challenge::whereDate('fecha_ini', '<=', Carbon::now())->whereDate('fecha_fin', '>=', Carbon::now())->get();
        foreach($retos as $reto){
            if ($reto->objetivo == 0){
                $reto->objetivo = 1;
            }
        }

        $data["retos"] = $retos;

        return view('frontend.paginas.landing', $data);
    })->name("landing");
    Route::get('/challenges', function () {
        $retos = Challenge::whereDate('fecha_ini', '<=', Carbon::now())->whereDate('fecha_fin', '>=', Carbon::now())->orderBy('fecha_fin', 'DESC')->get();
        foreach($retos as $reto){
            if ($reto->objetivo == 0){
                $reto->objetivo = 1;
            }
        }

        $data["retos"] = $retos;

        $retosAcabados = Challenge::whereDate('fecha_fin', '<', Carbon::now())->orderBy('fecha_fin', 'DESC')->get();
        foreach($retosAcabados as $reto){
            if ($reto->objetivo == 0){
                $reto->objetivo = 1;
            }
        }
        $data["retosAcabados"] = $retosAcabados;

        return view('frontend.paginas.challenges', $data);
    })->name("landing");
    Route::get('/quien_somos', function () {
        return view('frontend.paginas.quien_somos');
    })->name("quien_somos");
    Route::get('/como_ayudar', function () {
        return view('frontend.paginas.como_ayudar');
    })->name("como_ayudar");
    //////////////////////////// PAGS FRONTEND ///////////////////////////////////

    //////////////////////////// PAGS BACKEND ////////////////////////////////////
    Route::prefix("backend/")->group(function() {

        Route::get('login', 'Backend\AccountController@index');
        Route::post('login', 'Backend\AccountController@login')->name("login");
        Route::get('logout', 'Backend\AccountController@logout')->name("logout");

        Route::get('requestResetPassword', 'Backend\AccountController@requestResetPassword')->name("requestReset");
        Route::post('sendResetPassword', 'Backend\AccountController@sendResetPassword')->name("sendRequest");
        Route::get('sendResetPassword/{token}', 'Backend\AccountController@resetPassword')->name("resetPassword");
        Route::post('setNewPassword', 'Backend\AccountController@setNewPassword')->name('setNewPassword');

        Route::group(['middleware' => ['auth']], function () {

            Route::get('/', function () {
                $donaciones = Donacion::all();
                $data['donaciones'] = $donaciones;

                $completados = 0;
                $retos = Challenge::whereDate('fecha_ini', '<=', Carbon::now())->whereDate('fecha_fin', '>=', Carbon::now())->get();
                foreach($retos as $reto){
                    if ($reto->getCantidad() >= $reto->objetivo) $completados++;
                }
                $data["retos_completados"] = $completados;
                $data["retos_total"] = count($retos);

                return view('backend.paginas.backend',$data);
            });

            Route::prefix('donaciones')->group(function(){
                Route::resource('', 'Backend\DonacionController');
                Route::get('diploma/{donacione}', 'Backend\DonacionController@diploma');
            });


            Route::resource('donantes', 'Backend\DonanteController');

            Route::prefix("mantenimientos")->middleware('needAdmin')->group(function() {
                Route::resource("usuarios", "Backend\Mantenimientos\UsuariosController");
                Route::resource("subtipos", "Backend\Mantenimientos\SubtiposController");
                Route::resource("challenges", "Backend\Mantenimientos\ChallengesController");
            });
        });
    });
    //////////////////////////// PAGS BACKEND ////////////////////////////////////
});


//////////////////////////// PAGS CHARTS ////////////////////////////////////

Route::get('/estadisticas', function () {
    return view('chart');
});
Route::get('/get-post-chart-data', 'ChartDataController@getMonthlyPostData');

Route::get('/get-post-animal-data', 'ChartDataController@getAllTipesOfAnimals');

Route::get('/get-post-center-data', 'ChartDataController@getAllCentros');

//////////////////////////// PAGS CHARTS ////////////////////////////////////


