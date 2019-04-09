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
		//$posts_dates = json_decode( $posts_dates );

		if ( ! empty( $posts_dates ) ) {
			foreach ( $posts_dates as $unformatted_date ) {
				$date = new \DateTime( $unformatted_date );
				$month_no = $date->format( 'm' );
				$month_name = $date->format( 'M' );
				$month_array[ $month_no ] = $month_name;
			}
        }

          return $month_array;
        //   return $posts_dates;
	}

	function getMonthlyPostCount( $month ) {
        $monthly_post_count = Donacion::whereMonth( 'fecha_donativo', $month )->get()->count();
		return $monthly_post_count;
    }

    /*function getMoneyPostCount($month){
        $dinero = Appointment::where('fecha_donativo', $month)
        ->orderBy('fecha_donativo')
        ->get()
        ->groupBy(function ($val) {
            return Carbon::parse($val->fecha_donativo)->format('d');
        });*/
        // $dinero = Donacion::select(Donacion::raw('SUM(coste) as total_expense'))
        // ->groupBy(Donacion::raw('YEAR(fecha_donativo) DESC, MONTH(fecha_donativo) DESC'));
        // $dinero = json_decode( $dinero );
        // return $dinero;
    //}

	function getMonthlyPostData() {

		$monthly_post_count_array = array();
		$month_array = $this->getAllMonths();
		$month_name_array = array();
		if ( ! empty( $month_array ) ) {
			foreach ( $month_array as $month_no => $month_name ){
				$monthly_post_count = $this->getMonthlyPostCount( $month_no );
				array_push( $monthly_post_count_array, $monthly_post_count );
				array_push( $month_name_array, $month_name );
			}
        }

        //$month_money_array = $this->getMoneyPostCount();

		$max_no = max( $monthly_post_count_array );
		$max = round(( $max_no + 10/2 ) / 10 ) * 10;
		$monthly_post_data_array = array(
			'months' => $month_name_array,
            'post_count_data' => $monthly_post_count_array,
            //'money' =>  $month_money_array,
			'max' => $max,
		);

		return $monthly_post_data_array;

    }
}

