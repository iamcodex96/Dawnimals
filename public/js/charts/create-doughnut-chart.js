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
            var urlPath ='http://localhost:8080/Dawnimals/public/get-post-animal-data';
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

			var ctx = document.getElementById("doughnutChar");
			var myLineChart = new Chart(ctx, {
				type: 'doughnut',
				data: {
                    render: 'value',
					labels: response.animals, // The response got from the ajax request containing all month names in the database
					datasets: [{
						label: "Donaciones por mes",
						lineTension: 0.3,
						backgroundColor: response.background_color,
						borderColor: "rgba(255,255,255,255)",
						pointRadius: 5,
						pointBackgroundColor: response.background_color,
						pointBorderColor: "rgba(255,255,255,0.8)",
						pointHoverRadius: 5,
						pointHoverBackgroundColor: response.background_color,
						pointHitRadius: 20,
						pointBorderWidth: 2,
						data: response.post_count_animals // The response got from the ajax request containing data for the completed jobs in the corresponding months
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
                },

			});
		}
	};

	charts.init();

} )( jQuery );
