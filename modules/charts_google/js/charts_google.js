/**
 * Created by mmwebaze on 12/28/2016.
 */
(function ($) {
    'use strict';

    Drupal.behaviors.chartsGooglecharts = {
        attach: function(context, settings) {
            google.charts.load('current', {'packages':['corechart']});

            $('.chart-google', context).once('chartsGooglecharts', function() {
                var data = $(this).data();
                var myDataArray = [];
                $.each(data, function(key, val){
                    myDataArray[key] = val;
                });
                console.log(data);
            });
            var str = $('.chart-google', context).once('chartsGooglecharts').attr('data-chart');
            console.log(str);
            //google.charts.setOnLoadCallback(drawChart);
          /*  var dataTable = $('.chart-google').attr('data-chart');
            var googleChartOptions = $('.chart-google').attr('google-options');
            var googleChartType = $('.chart-google').attr('google-chart-type');

            if (dataTable !== undefined){
                console.debug(dataTable+' dataTable')
                $('.chart-google', context).once('.chart-google', function() {});
            }
            if (googleChartOptions !== undefined){
                console.debug(googleChartOptions+' googleChartOptions')
            }
            if (googleChartType !== undefined){
                console.debug(googleChartType+' googleChartType')
            }
*/

            function drawChart() {
                var data = google.visualization.arrayToDataTable(JSON.parse(dataTable));
                var googleChartTypeObject = JSON.parse(googleChartType);
                var googleChartTypeFormatted = googleChartTypeObject.type;
                switch(googleChartTypeFormatted) {
                    case 'BarChart':
                        var chart = new google.visualization.BarChart(document.getElementById('chart'));
                        break;
                    case 'ColumnChart':
                        var chart = new google.visualization.ColumnChart(document.getElementById('chart'));
                        break;
                    case 'PieChart':
                        var chart = new google.visualization.PieChart(document.getElementById('chart'));
                        break;
                    case 'ScatterChart':
                        var chart = new google.visualization.ScatterChart(document.getElementById('chart'));
                        break;
                    case 'AreaChart':
                        var chart = new google.visualization.AreaChart(document.getElementById('chart'));
                        break;
                    case 'LineChart':
                        var chart = new google.visualization.LineChart(document.getElementById('chart'));
                }
                chart.draw(data, JSON.parse(googleChartOptions));

            }
        }
    }
}(jQuery));