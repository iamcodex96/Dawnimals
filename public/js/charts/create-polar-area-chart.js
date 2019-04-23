( function ( $ ) {

	var charts = {
		init: function (fechaini, fechafin) {
			// -- Set new default font family and font color to mimic Bootstrap's default styling
			Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
			Chart.defaults.global.defaultFontColor = '#292b2c';

			this.ajaxGetPostMonthlyData(fechaini, fechafin);

		},

		ajaxGetPostMonthlyData: function () {
            //artisan serve
            //var urlPath =  'http://' + window.location.hostname + ':8000/get-post-chart-data';
            var urlPath ='http://localhost:8080/Dawnimals/public/get-post-center-data';
            //var urlPath ='http://localhost:8080/Dawnimals/public/prova/'+fechaini+'/'+fechafin;
            //console.log('fechaini: ' + fechaini+' // ' + fechafin);
            //var urlPath ='http://www.abp-politecnics.com/2019/daw/projecte02/dw04/public/get-post-center-data';
			var request = $.ajax( {
				method: 'GET',
				url: urlPath
		} );

			request.done( function ( response ) {
				console.log( response );
				charts.createCentroYDonativoChart( response );
			});
		},

		/**
		 * Crea el grafico donaciones por mes y cantidad monetaria
		 */
		createCentroYDonativoChart: function ( response ) {

			var ctx = document.getElementById("polarAreaChar");
			var myLineChart = new Chart(ctx, {
				type: 'doughnut',
				data: {
                    render: 'value',
					labels: response.nombre_centros, // The response got from the ajax request containing all month names in the database
					datasets: [{
						label: "Donaciones por mes en cada lugar",
						lineTension: 0.3,
						backgroundColor:  response.background_color,
						borderColor: "rgba(255,255,255,255)",
						pointRadius: 5,
						pointBackgroundColor: response.background_color,
						pointBorderColor: "rgba(255,255,255,0.8)",
						pointHoverRadius: 5,
						pointHoverBackgroundColor: response.background_color,
						pointHitRadius: 20,
						pointBorderWidth: 2,
						data: response.cantidad_donaciones // The response got from the ajax request containing data for the completed jobs in the corresponding months
					}],
                },
                options: {
                    legend:{
                        display:true,
                        position:'right',
                        labels:{
                            fontColor:'#000',
                        }
                    },
                    plugins: {
                        datalabels: {
                            formatter: (value, ctx) => {

                                let datasets = ctx.chart.data.datasets;

                                if (datasets.indexOf(ctx.dataset) === datasets.length - 1) {
                                let sum = datasets[0].data.reduce((a, b) => a + b, 0);
                                let percentage = Math.round((value / sum) * 100) + '%';
                                return percentage;
                                } else {
                                return percentage;
                                }
                            },
                            color: '#fff',
                        }
                    }
                },
			});
		}
	};

     charts.init();

    // $('#groupFechasTipos > div > input').change(function(){
    //     getDates();
    // });

    // function getDates() {
    //     if($('#groupFechasTipos > div > #fechaInicioTipos').val() && $('#groupFechasTipos > div > #fechaFinalTipos').val()){
    //         var fechaInicio = $('#fechaInicioTipos').val();

    //         var fechaFinal = $('#fechaFinalTipos').val();

    //         console.log(fechaInicio);

    //         //return 'fechainici: '+ fechaInicio + ' fechafinal: ' + fechaFinal;
    //         charts.init(fechaInicio, fechaFinal);
    //     }
    // }

    // getDates();

} )( jQuery );
