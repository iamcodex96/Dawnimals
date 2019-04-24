( function ( $ ) {

    var myLineChart;
	var charts = {

		init: function (fechaInicio, fechaFinal) {
			// -- Set new default font family and font color to mimic Bootstrap's default styling
			Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#292b2c';

            document.getElementById("myAreaChart");
            $("#myAreaChart").html('');

			this.ajaxGetPostMonthlyData(fechaInicio, fechaFinal);

		},

		ajaxGetPostMonthlyData: function (fechaInicio, fechaFinal) {


            var urlPath =  'http://www.abp-politecnics.com/2019/daw/projecte02/dw04/public/get-post-chart-data/'+fechaInicio+'/'+fechaFinal;
            //var urlPath ='http://localhost:8080/Dawnimals/public/get-post-chart-data/'+fechaInicio+'/'+fechaFinal;
            //artisan serve
            //var urlPath ='http://127.0.0.1:8000/get-post-chart-data/'+fechaInicio+'/'+fechaFinal;
			request = $.ajax( {

				method: 'GET',
                url: urlPath,
                success: function () {
                    request.done( function ( response ) {
                        console.log( response );
                        $("#myAreaChart").html('');

                        charts.createDonativoYDineroChart( response );

                    });
                },
                error: function (err) {
                    $("#myAreaChart").html("Error");
                }
		} );


		},

		/**
		 * Crea el grafico donaciones por mes y cantidad monetaria
		 */
		createDonativoYDineroChart: function ( response ) {

            var recu = document.getElementById("myAreaChart").getAttribute("data-upd");

            if(recu == 1){
                myLineChart.destroy();
            }

            var ctx = document.getElementById("myAreaChart").getContext('2d');
            //var upd = document.getElementById("myAreaChart").getAttribute("data-upd");
            var mod = document.getElementById("myAreaChart").setAttribute("data-upd", '1');



            myLineChart = new Chart(ctx, {
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
                            display: 'auto',
                            font: {
                                weight: 'bold'
                            },
                            formatter: Math.round
                        }
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
                            max:  response.max,
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
                                minRotation: 30,
                                max: response.max
                            }
                        }]
                    },
                    legend:{
                        display:true,
                        position:'bottom',
                        labels:{
                            fontColor:'#000',
                        }
                        },

                }

            });
        },
	};

    charts.init();

    $('#groupFechasTipos > div > input').change(function(){
         getDates();
     });

    function getDates() {
        if($('#groupFechasTipos > div > #fechaInicioTipos').val() && $('#groupFechasTipos > div > #fechaFinalTipos').val()){
            var fechaInicio = $('#fechaInicioTipos').val();
            var fechaFinal = $('#fechaFinalTipos').val();
            //console.log(fechaInicio);
            charts.init(fechaInicio, fechaFinal);
        }
    }
     getDates();

} )( jQuery );
