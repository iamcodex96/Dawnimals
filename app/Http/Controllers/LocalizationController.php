<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Http\Controllers\Controller;

class LocalizationController extends Controller
{
    public function chgIdioma($lang){
        App::setLocale($lang);

        session()->put('locale', $lang);

        return redirect()->back();
    }
}
?>
