<?php

namespace App\Http\Controllers\Backend;

use App\Models\Donante;
use App\Models\Sexo;
use App\Models\TipoDonante;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Classes\Utilitat;
use App\Exports\ConverterExcel;


class DonanteController extends Controller
{

    const PREFIX = 'backend.paginas.donante.';
    const CONTROLADOR = 'Backend\DonanteController@';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donantes = Donante::all();
        $data['donantes']=$donantes;
        $headings = [
            'id','tipos_donantes_id','es_habitual','nombre','cif','cp','sexos_id','tiene_aninales','telefono',
            'correo','direccion','vinculo_entidad','spam','poblacion','pais','es_colaborador','tipo_colaboracion',
            'fecha_alta'
        ];
        return ConverterExcel::export($donantes, $headings, "Donantes");
        return view(self::PREFIX.'index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['sexos']=Sexo::all();
        $data['tipodonantes']=TipoDonante::all();

        return view(self::PREFIX.'create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validation = validator($request->all());
        if($validation->fails()){
            return redirect('DonanteController@create')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $donante = new Donante();
            $donante->tipos_donantes_id = $request->input('tipoD');
            $donante->nombre = $request->input('full_name');
            $donante->cif = $request->input('cif');
            $donante->direccion = $request->input('direccion');
            $donante->poblacion = $request->input('ciudad');
            $donante->telefono = $request->input('telefono');
            $donante->pais = $request->input('pais');
            $donante->cp = $request->input('cp');
            $donante->sexos_id = $request->input('sexo');
            $donante->correo = $request->input('email');
            $donante->tiene_aninales = $request->input('tieneAnimales');
            $donante->es_habitual = $request->input('esHabitual');
            $donante->spam = $request->input('aAdoptado');
            $donante->es_colaborador = $request->input('esColaborador');
            $donante->tipo_colaboracion = $request->input('tipoColaborador');
            $donante->vinculo_entidad = $request->input('vinculo');
            $donante->fecha_alta = (new \DateTime())->format('Y-m-d H:i:s');

            try{
                $donante->save();
                return redirect()->action(self::CONTROLADOR .'index');
            }catch(QueryException $e){
                $error = Utilitat::errorMessages($e);
                $request->session()->flash('error',$error);
                return redirect()->action(self::CONTROLADOR .'create')->withInput();
            }
        }


    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'tipoD' => ['required', 'int'],
            'full_name' => ['string', 'max:64'],
            'telefono'=>['number','max:45'],
            'cif' => ['unique:donantes','string', 'max:9','min:9'],
            'direccion'=> ['max:45'],
            'ciudad'=> ['max:45']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donante  $donante
     * @return \Illuminate\Http\Response
     */
    public function show(Donante $donante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donante  $donante
     * @return \Illuminate\Http\Response
     */
    public function edit(Donante $donante)
    {

        $data['donante']=$donante;
        $data['sexos']=Sexo::all();
        $data['tipodonantes']=TipoDonante::all();
        return view(self::PREFIX.'edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donante  $donante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donante $donante)
    {
        $validation = validator($request->all());
        if($validation->fails()){
            return redirect('DonanteController')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $donante->tipos_donantes_id = $request->input('tipoD');
            $donante->nombre = $request->input('full_name');
            $donante->cif = $request->input('cif');
            $donante->direccion = $request->input('direccion');
            $donante->poblacion = $request->input('ciudad');
            $donante->telefono = $request->input('telefono');
            $donante->pais = $request->input('pais');
            $donante->cp = $request->input('cp');
            $donante->sexos_id = $request->input('sexo');
            $donante->correo = $request->input('email');
            $donante->tiene_aninales = $request->input('tieneAnimales');
            $donante->es_habitual = $request->input('esHabitual');
            $donante->spam = $request->input('aAdoptado');
            $donante->es_colaborador = $request->input('esColaborador');
            $donante->tipo_colaboracion = $request->input('tipoColaborador');
            $donante->vinculo_entidad = $request->input('vinculo');
            $donante->fecha_alta = (new \DateTime())->format('Y-m-d H:i:s');

            try{
                $donante->save();
                return redirect()->action(self::CONTROLADOR .'index');
            }catch(QueryException $e){
                $error = Utilitat::errorMessages($e);
                $request->session()->flash('error',$error);
                return redirect()->action(self::CONTROLADOR .'edit')->withInput();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donante  $donante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donante $donante)
    {
        try{
            if($donante!=null){
                $donante->delete();
                return redirect()->action(self::CONTROLADOR .'index');
            }
        }catch(QueryException $e){
            $error = Utilitat::errorMessages($e);
            $request->session()->flash('error',$error);
            return redirect()->action(self::CONTROLADOR .'index');
        }

    }

}
