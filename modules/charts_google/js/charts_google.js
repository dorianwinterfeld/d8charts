/**
 * Created by mmwebaze on 12/28/2016.
 */
(function ($) {
    'use strict';

    Drupal.behaviors.chartsGooglecharts = {
        attach: function(context, settings) {
            google.charts.load('current', {'packages':['corechart']});

            var dataTable = 'dfkdgjdgd';
            var googleChartOptions;
            var googleChartType;

            $('.chart-google').once().each(function(){
                if ($(this).attr('data-chart')) {
                    dataTable = $(this).attr('data-chart');
                    googleChartOptions = $(this).attr('google-options');
                    googleChartType = $(this).attr('google-chart-type');
                    google.charts.setOnLoadCallback(drawChart);
                }
            });


            function drawChart() {
                var data = google.visualization.arrayToDataTable(JSON.parse(dataTable));
                console.debug(data)
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