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
                window.alert(googleChartTypeFormatted);
                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.BarChart(document.getElementById('chart'));
                chart.draw(data, JSON.parse(googleChartOptions));
            }
        }
    }
}(jQuery));