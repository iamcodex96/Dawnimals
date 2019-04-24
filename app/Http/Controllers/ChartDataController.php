<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Donacion;
use App\Models\Centro;
use App\Models\Subtipo;
use Carbon\Carbon;

class ChartDataController extends Controller
{
    public function getAllMonths($fechaini, $fechafin){

        $dateini = new Carbon( $fechaini );
        $datefin = new Carbon( $fechafin );


		$month_array = array();
        $posts_dates = Donacion::whereDate('fecha_donativo', '>=', $dateini)
        ->whereDate('fecha_donativo', '<=', $datefin)
        ->orderBy( 'fecha_donativo', 'ASC' )->get()
        ->pluck( 'fecha_donativo' );
		//$posts_dates = json_decode( $posts_dates );

		if ( ! empty( $posts_dates ) ) {
			foreach ( $posts_dates as $unformatted_date ) {
				$date = new \DateTime( $unformatted_date );
				$month_no = $date->format( 'Y-m' );
				$month_name = $date->format( 'm-Y' );
                $month_array[ $month_no ] = $month_name;
			}
        }
          return $month_array ;
	}

	function getMonthlyPostCount( $month ) {
        $monthly_post_count = Donacion::whereMonth( 'fecha_donativo', $month->month )->get()->count();
		return $monthly_post_count;
    }

    function getMoneyPostCount( $month ){
        $dinero = Donacion::whereMonth( 'fecha_donativo', $month->month )->sum('coste');
        return $dinero;
    }
    //Cantidad donaciones y cantidad de dinero donado  por mes
	function getMonthlyPostData($fechaini, $fechafin) {
        //$dateini = new Carbon( $fechaini );
        //$datefin = new Carbon( $fechafin );
        $monthly_post_count_array = array();
        $monthly_money_count_array = array();
        $month_array = $this->getAllMonths($fechaini, $fechafin);
        $month_name_array = array();

		if ( ! empty( $month_array ) ) {
			foreach ( $month_array as $month_no => $month_name ){
                $month =  new Carbon( $month_no );
                $monthly_post_count = $this->getMonthlyPostCount( $month );
                $monthly_money_count = $this->getMoneyPostCount( $month );
                 array_push( $monthly_post_count_array, $monthly_post_count );
                 array_push( $monthly_money_count_array, $monthly_money_count );
                 array_push( $month_name_array, $month_name );
                //return $monthly_post_count_array;
            }


        }
           //return $monthly_money_count_array;
		$max_no = max( $monthly_post_count_array );
		$max = round((( $max_no + 10/2 ) / 10 ) * 10)-3;
		$monthly_post_data_array = array(
			'months' => $month_name_array,
            'post_count_data' => $monthly_post_count_array,
            'money' =>  $monthly_money_count_array,
			'max' => $max,
		);

		return $monthly_post_data_array;

    }
    //cantidad donaciones por animal
    function getAllTipesOfAnimals(){
        $now = Carbon::now();
        $animal_donacion = array();
        $background_color = array('#99CD32','#6632cd','#cdb432','#3299cd','#c45850');
		$posts_animals = Donacion::orderBy( 'desc_animal', 'ASC' )->distinct()->pluck( 'desc_animal' );
        $posts_animals = json_decode( $posts_animals );

        if ( ! empty( $posts_animals ) ) {
			foreach ( $posts_animals as $animal ){
                $animal_donacion_count = $this->getDonationAnimalCount( $animal, $now );
				array_push( $animal_donacion, $animal_donacion_count );
			}
        }

        $animal_donacion_array = array(
            'animals' => $posts_animals,
            'post_count_animals' => $animal_donacion,
            'background_color' => $background_color
        );

          return $animal_donacion_array;
    }

    function getDonationAnimalCount( $animal, $now ) {
        $animal_donacion_count = Donacion::where( 'desc_animal', $animal )
        ->whereMonth( 'fecha_donativo', $now->month )
        ->whereYear( 'fecha_donativo', $now->year )
        ->get()
        ->count();
		return $animal_donacion_count;
    }
    //Cantidad donaciones por  centro
    function getAllCentros(){
        $now = Carbon::now();
        $centros_receptor_array = array();
        $centros_receptor = array();
        $centros_receptor_cantidad = array();
        $background_color = array('#99CD32','#6632cd','#cdb432','#3299cd','#c45850');
        $centros_receptor_id = Donacion::orderBy( 'centros_receptor_id', 'ASC' )
        ->whereMonth( 'fecha_donativo', $now->month )
        ->whereYear( 'fecha_donativo', $now->year )
        ->distinct()
        ->pluck( 'centros_receptor_id' );
        $centros_receptor_id = json_decode( $centros_receptor_id );


        if ( ! empty( $centros_receptor_id ) ) {
			foreach ( $centros_receptor_id as $centrosreceptor ){
                $centros_receptor_nom = $this->getNomCentreReceptor( $centrosreceptor );
                $centros_receptor_count = $this->getDonationCentroCount( $centrosreceptor, $now );
                array_push( $centros_receptor, $centros_receptor_nom->nombre );
                array_push( $centros_receptor_cantidad, $centros_receptor_count );
			}
        }

        $centros_receptor_array = array(
            'nombre_centros' => $centros_receptor,
            'cantidad_donaciones' => $centros_receptor_cantidad,
            'background_color' => $background_color
        );

        return $centros_receptor_array;
    }

    function getNomCentreReceptor ( $centros_receptor_id ) {
        $centro_donacion_nom = Centro::find( $centros_receptor_id );
		return $centro_donacion_nom;
    }

    function getDonationCentroCount( $centros_receptor_id, $now ) {
        $centro_donacion_count = Donacion::where( 'centros_receptor_id', $centros_receptor_id )
        ->whereMonth( 'fecha_donativo', $now->month )
        ->whereYear( 'fecha_donativo', $now->year )
        ->get()
        ->count();
		return $centro_donacion_count;
    }

    //Cantidad donaciones y dinero por año

    function  getDonacionXAnyo(){
        $now = Carbon::now();
        $donaciones_count = Donacion::whereYear( 'fecha_donativo', $now->year )
        ->get()
        ->count();
		return $donaciones_count;
    }


    function getAllSubtipos(){
        $now = Carbon::now();
        $subtipos_id_array = array();
        $subtipos_id_nom = array();
        $subtipos_id_cantidad = array();
        $background_color = array('#99CD32','#6632cd','#cdb432','#3299cd','#c45850','#89b82d','#7546d2','#cdb432',
        '#8258d6','#c96861','#b04f48','#bda83f','#d2bb46','#7ba528','#2db85d','#b82d88','#b82d43','#2DB8A2','#2DB85D',
        '#B85D2D','#2D88B8','#88B82D','#B82D88','#2DB85D','#2DB8A3');
        $subtipos_id = Donacion::orderBy( 'subtipos_id', 'ASC' )
        ->whereMonth( 'fecha_donativo', $now->month )
        ->whereYear( 'fecha_donativo', $now->year )
        ->distinct()
        ->pluck( 'subtipos_id' );
        $subtipos_id = json_decode( $subtipos_id );


        if ( ! empty( $subtipos_id ) ) {
			foreach ( $subtipos_id as $subtipos ){
                $subtipos_id_nom_var = $this->getNomSubtipos( $subtipos );
                $subtipos_id_cantidad_count = $this->getSubtipos( $subtipos );
                array_push( $subtipos_id_nom, $subtipos_id_nom_var->nombre_esp );
                array_push( $subtipos_id_cantidad, $subtipos_id_cantidad_count );
			}
        }

        $subtipos_id_array = array(
            'nombre_subtipos' => $subtipos_id_nom,
            'cantidad_subtipos' => $subtipos_id_cantidad,
            'background_color' => $background_color
        );

        return $subtipos_id_array;
    }

    function getNomSubtipos ( $subtipos_id ) {
        $subtipos_id_nom = Subtipo::find( $subtipos_id );
		return $subtipos_id_nom;
    }

    function  getSubtipos($subtipos_id){
        $now = Carbon::now();
        $donaciones_count = Donacion::where( 'subtipos_id', $subtipos_id )
        ->whereMonth( 'fecha_donativo', $now->month )
        ->get()
        ->count();
		return $donaciones_count;
    }

}

