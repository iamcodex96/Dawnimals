( function ( $ ) {

    colors_array = [
		'#FF3784',
		'#36A2EB',
		'#4BC0C0',
		'#F77825',
		'#9966FF',
		'#00A8C6',
		'#379F7A',
		'#CC2738',
		'#8B628A',
		'#8FBE00',
		'#606060'
	];

	var charts = {
		init: function (fechaInicio, fechaFinal) {
			// -- Set new default font family and font color to mimic Bootstrap's default styling
			Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
			Chart.defaults.global.defaultFontColor = '#292b2c';

			this.ajaxGetPostMonthlyData(fechaInicio, fechaFinal);

		},

		ajaxGetPostMonthlyData: function (fechaInicio, fechaFinal) {
            //artisan serve
            //var urlPath =  'http://www.abp-politecnics.com/2019/daw/projecte02/dw04/public/get-post-chart-data';
            var urlPath ='http://localhost:8080/Dawnimals/public/get-post-chart-data/'+fechaInicio+'/'+fechaFinal;;
			var request = $.ajax( {
				method: 'GET',
				url: urlPath
		} );

			request.done( function ( response ) {
				console.log( response );
				charts.createDonativoYDineroChart( response );
			});
		},

		/**
		 * Crea el grafico donaciones por mes y cantidad monetaria
		 */
		createDonativoYDineroChart: function ( response ) {

			var ctx = document.getElementById("myAreaChart");
			var myLineChart = new Chart(ctx, {
				// type: 'line',
				// data: {
					// labels: response.months, // The response got from the ajax request containing all month names in the database
					// datasets: [{
					// 	label: "Donaciones por mes",
					// 	lineTension: 0.3,
					// 	backgroundColor: "rgba(2,117,216,0.2)",
					// 	borderColor: "rgba(2,117,216,1)",
					// 	pointRadius: 5,
					// 	pointBackgroundColor: "rgba(2,117,216,1)",
					// 	pointBorderColor: "rgba(255,255,255,0.8)",
					// 	pointHoverRadius: 5,
					// 	pointHoverBackgroundColor: "rgba(2,117,216,1)",
					// 	pointHitRadius: 20,
					// 	pointBorderWidth: 2,
					// 	data: response.post_count_data // The response got from the ajax request containing data for the completed jobs in the corresponding months
					// }],
                // },
                type: 'bar',
                data: {
                    labels: response.months, // The response got from the ajax request containing all month names in the database
                    datasets: [{
                        label: "Donaciones por mes",
                        type: 'line',
                        lineTension: 0.3,
                        backgroundColor: "rgba(102,50,205)",
                        borderColor: "rgba(102,50,205)",
                        pointRadius: 3,
                        pointBackgroundColor: "rgba(102,50,205)",
                        pointBorderColor: "rgba(102,50,205)",
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "rgba(102,50,205)",
                        pointHitRadius: 0,
                        pointBorderWidth: 0,
                        fill: 'false',
                        data: response.post_count_data, // The response got from the ajax request containing data for the completed jobs in the corresponding months
                        yAxisID: 'y-axis-2'

                    }, {
                        label: "Dinero donado",
                        lineTension: 0.3,
                        backgroundColor: "rgba(153,205,50)",
                        borderColor: "rgba(76,205,50)",
                        pointRadius: 5,
                        pointBackgroundColor: "rgba(2,117,216,1)",
                        pointBorderColor: "rgba(255,255,255,0.8)",
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "rgba(2,117,216,1)",
                        pointHitRadius: 0,
                        pointBorderWidth: 0,
                        data: response.money,
                        yAxisID: 'y-axis-1'
                    },
                    ]
                },
                options: {
                    plugins: {
                        datalabels: {
                            backgroundColor: function(context) {
                                return context.dataset.backgroundColor;
                            },
                            borderRadius: 4,
                            color: 'white',
                            font: {
                                weight: 'bold'
                            },
                            formatter: Math.round
                        }
                        // datalabels: {
                        //     align: function(context) {
                        //         var index = context.dataIndex;
                        //         var curr = context.dataset.data[index];
                        //         var prev = context.dataset.data[index - 1];
                        //         var next = context.dataset.data[index + 1];
                        //         return prev < curr && next < curr ? 'end' :
                        //             prev > curr && next > curr ? 'start' :
                        //             'center';
                        //     },
                        //     backgroundColor: 'rgba(255, 255, 255, 0.7)',
                        //     borderColor: 'rgba(128, 128, 128, 0.7)',
                        //     borderRadius: 4,
                        //     borderWidth: 1,
                        //     color: function(context) {
                        //         var i = context.dataIndex;
                        //         var value = context.dataset.data[i];
                        //         var prev = context.dataset.data[i - 1];
                        //         var diff = prev !== undefined ? value - prev : 0;
                        //         return diff < 0 ? colors_array[0] :
                        //             diff > 0 ? colors_array[1] :
                        //             'gray';
                        //     },
                        //     offset: 8,
                        //     align: 'end',
						// formatter: function(value, context) {
						// 	var i = context.dataIndex;
						// 	var prev = context.dataset.data[i - 1];
						// 	var diff = prev !== undefined ? prev - value : 0;
						// 	var glyph = diff < 0 ? '\u25B2' : diff > 0 ? '\u25BC' : '\u25C6';
						// 	return glyph + ' ' + Math.round(value);
						// }
                        // }
                    },
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'date'
                            },
                            gridLines: {
                                display: false
                            },
                            ticks: {
                                maxTicksLimit: 7,
                                beginAtZero: true
                            }
                        }],
                        yAxes: [{
                            display: true,
                            position: "left",
                            id: "y-axis-1",
                            min: 0,
                            max:10,
                            maxTicksLimit: 5,
                            gridLines:{
                                display: false
                            },
                            labels: {
                                show:true,
                            },
                            ticks:{
                                fontColor: "rgba(153,205,50)",
                                beginAtZero: true,
                                minRotation: 30
                            }
                        }, {
                            display: true,
                            position: "right",
                            id: "y-axis-2",
                            min: 0,
                            max:  10,
                            maxTicksLimit: 5,
                            gridLines:{
                                display: false
                            },
                            labels: {
                                show:true,
                            },
                            ticks:{
                                fontColor: "#6632cd",
                                beginAtZero: true,
                                minRotation: 30
                            }
                        }]
                    },
                    legend:{
                        display:true,
                        position:'top',
                        labels:{
                            fontColor:'#000',
                        }
                        },

                }
			});
		}
	};

    //charts.init();

    $('#groupFechasTipos > div > input').change(function(){
        getDates();
    });

    function getDates() {
        if($('#groupFechasTipos > div > #fechaInicioTipos').val() && $('#groupFechasTipos > div > #fechaFinalTipos').val()){
            var fechaInicio = $('#fechaInicioTipos').val();

            var fechaFinal = $('#fechaFinalTipos').val();

            console.log(fechaInicio);

            //return 'fechainici: '+ fechaInicio + ' fechafinal: ' + fechaFinal;
            charts.init(fechaInicio, fechaFinal);
        }
    }

    getDates();

} )( jQuery );
