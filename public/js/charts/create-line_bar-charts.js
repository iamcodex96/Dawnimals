( function ( $ ) {

	var charts = {
		init: function () {
			// -- Set new default font family and font color to mimic Bootstrap's default styling
			Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
			Chart.defaults.global.defaultFontColor = '#292b2c';

			this.ajaxGetPostMonthlyData();

		},

		ajaxGetPostMonthlyData: function () {
            //artisan serve
            //var urlPath =  'http://' + window.location.hostname + ':8000/get-post-chart-data';
            var urlPath ='http://localhost:8080/Dawnimals/public/get-post-chart-data';
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
                        pointRadius: 5,
                        pointBackgroundColor: "rgba(102,50,205)",
                        pointBorderColor: "rgba(102,50,205)",
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "rgba(102,50,205)",
                        pointHitRadius: 20,
                        pointBorderWidth: 2,
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
                        pointHitRadius: 20,
                        pointBorderWidth: 2,
                        data: response.money,
                        yAxisID: 'y-axis-1'
                    },
                    ]
                },
                options: {
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'date'
                            },
                            gridLines: {
                                display: false
                            },
                            ticks: {
                                maxTicksLimit: 7
                            }
                        }],
                        // yAxes: [{
                        //     ticks: {
                        //         stacked: true,
                        //         min: 0,
                        //         max: response.max, // The response got from the ajax request containing max limit for y axis
                        //         maxTicksLimit: 5,
                        //         id: 'A',
                        //         //type: 'linear',
                        //         position: 'right'
                        //     },
                        //     ticks: {
                        //         stacked: false,
                        //         min: 0,
                        //         max: 10, // The response got from the ajax request containing max limit for y axis
                        //         maxTicksLimit: 5,
                        //         id: 'B',
                        //         //type: 'linear',
                        //         position: 'left'
                        //     },
                        //     gridLines: {
                        //         color: "rgba(0, 0, 0, .125)",
                        //     }
                        // //     stacked: true,
                        // //     position: "left",
                        // //     id: "y-axis-0",
                        // // }, {
                        // //     stacked: false,
                        // //     position: "right",
                        // //     id: "y-axis-1",
                        // }],
                        yAxes: [{
                            //type: "linear",
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
                            }
                        }, {
                            //type: "linear",
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

	charts.init();

} )( jQuery );
