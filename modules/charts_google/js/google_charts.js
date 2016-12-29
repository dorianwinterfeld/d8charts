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
            function drawChart() {
                var data = google.visualization.arrayToDataTable($.parseJSON(dataTable));
                // Set chart options
                var options = {'title':'How Much Pizza I Ate Last Night',
                    'width':600,
                    'height':400};

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.BarChart(document.getElementById('chart'));
                chart.draw(data, options);
            }
        }
    }
}(jQuery));