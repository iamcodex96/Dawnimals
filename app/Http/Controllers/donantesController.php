<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Clases\donante;
use App\Clases\empresa;
use App\Clases\particular;


class donantesController extends Controller
{
    public function rellenarDonantes()
    {
        $donantes = [];

        $empresa = new empresa();
        $empresa ->esEmpresa = true;
        $empresa ->nombreORazonSocial = "EmpresaSA";
        $empresa ->CIF = "B12345697";
        $empresa ->direccion = "c/ algo 21";
        $empresa ->telefono = "933888745";
        $empresa ->email = "bla@bla.com";
        $empresa ->vinculo = "socio";
        $empresa ->esHabitual = true;


    
        array_push($donantes,$empresa);
    
      
        $particular = new particular();
        $particular ->nombreORazonSocial='Pepito';
        $particular ->dni='7856695K';
        $particular ->sexo='Mujer';
        $particular ->esEmpresa = false;
        $particular ->tieneAnimales=true;
        $particular ->animalAdoptado=true;
        $particular ->direccion = "c/ algo 21";
        $particular ->telefono = "933888745";
        $particular ->email = "bla@bla.com";
        $particular ->vinculo = "socio";
        $particular ->esHabitual = true;

    
        array_push($donantes,$particular);

        
    
        return $donantes;
    }


    public function indexDonantes(Request $request)
    {
        if($request->session()->has('donaciones')){ //si existe

            $donantes = $request->session()->get('donaciones'); //obtener valores

        }else{

            $donantes = self::rellenarDonantes(); 
            $request->session()->put('donaciones',$donantes); //guardar

        }

        $datos['donantes']=$donantes;
        $datos['titulo']='donaciones';
    
        return view('paginas.donantes',$datos);
    }
}
