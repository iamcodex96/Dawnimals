<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Donacion;
use Carbon\Carbon;

class ChartDataController extends Controller
{
    public function getAllMonths(){

		$month_array = array();
		$posts_dates = Donacion::orderBy( 'fecha_donativo', 'ASC' )->pluck( 'fecha_donativo' );
		$posts_dates = json_decode( $posts_dates );

		if ( ! empty( $posts_dates ) ) {
			foreach ( $posts_dates as $unformatted_date ) {
				$date = new \DateTime( $unformatted_date );
				$month_no = $date->format( 'm' );
				$month_name = $date->format( 'M' );
				$month_array[ $month_no ] = $month_name;
			}
        }
          return $month_array;
	}

	function getMonthlyPostCount( $month ) {
        $monthly_post_count = Donacion::whereMonth( 'fecha_donativo', $month )->get()->count();
		return $monthly_post_count;
    }

    function getMoneyPostCount( $month ){
        $dinero = Donacion::whereMonth( 'fecha_donativo', $month )->sum('coste');
        return $dinero;
    }

	function getMonthlyPostData() {

        $monthly_post_count_array = array();
        $monthly_money_count_array = array();
		$month_array = $this->getAllMonths();
        $month_name_array = array();

		if ( ! empty( $month_array ) ) {
			foreach ( $month_array as $month_no => $month_name ){
                $monthly_post_count = $this->getMonthlyPostCount( $month_no );
                $monthly_money_count = $this->getMoneyPostCount( $month_no );
                array_push( $monthly_post_count_array, $monthly_post_count );
                array_push( $monthly_money_count_array, $monthly_money_count );
				array_push( $month_name_array, $month_name );
			}
        }

		$max_no = max( $monthly_money_count_array );
		$max = round(( $max_no + 10/2 ) / 10 ) * 10;
		$monthly_post_data_array = array(
			'months' => $month_name_array,
            'post_count_data' => $monthly_post_count_array,
            'money' =>  $monthly_money_count_array,
			'max' => $max,
		);

		return $monthly_post_data_array;

    }

    function getAllTipesOfAnimals(){
        $animal_donacion = array();
        $background_color = array('#4ccd32','#6632cd','#cdb432','#3299cd','#c45850');
		$posts_animals = Donacion::orderBy( 'desc_animal', 'ASC' )->distinct()->pluck( 'desc_animal' );
        $posts_animals = json_decode( $posts_animals );

        if ( ! empty( $posts_animals ) ) {
			foreach ( $posts_animals as $animal ){
                $animal_donacion_count = $this->getDonationAnimalCount( $animal );
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

    function getDonationAnimalCount( $animal ) {
        $animal_donacion_count = Donacion::where( 'desc_animal', $animal )->get()->count();
		return $animal_donacion_count;
    }
}

