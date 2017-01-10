/**
 * Created by mmwebaze on 12/28/2016.
 */
(function ($) {
    'use strict';

    Drupal.behaviors.chartsHighcharts = {
        attach: function(context, settings) {
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            var dataTable = $('.chart-google').attr('data-chart');
            var googleChartOptions = $('.chart-google').attr('google-options');
            var googleChartType = $('.chart-google').attr('google-chart-type');
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