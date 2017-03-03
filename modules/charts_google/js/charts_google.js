/**
 * @file
 * JavaScript integration between Google and Drupal.
 */
(function ($) {
  'use strict';

  Drupal.behaviors.chartsGooglecharts = {
    attach: function (context, settings) {
      google.charts.load('current', {packages: ['corechart']});

      var dataTable;
      var googleChartOptions;
      var googleChartType;

      $('.chart-google').once().each(function () {
        if ($(this).attr('data-chart')) {
          dataTable = $(this).attr('data-chart');
          googleChartOptions = $(this).attr('google-options');
          googleChartType = $(this).attr('google-chart-type');
          google.charts.setOnLoadCallback(drawChart);
        }
      });


      function drawChart() {
        var data = google.visualization.arrayToDataTable(JSON.parse(dataTable));
        var googleChartTypeObject = JSON.parse(googleChartType);
        var googleChartTypeFormatted = googleChartTypeObject.type;
        var chart;
        switch (googleChartTypeFormatted) {
          case 'BarChart':
            chart = new google.visualization.BarChart(document.getElementById('chart'));
            break;
          case 'ColumnChart':
            chart = new google.visualization.ColumnChart(document.getElementById('chart'));
            break;
          case 'PieChart':
            chart = new google.visualization.PieChart(document.getElementById('chart'));
            break;
          case 'ScatterChart':
            chart = new google.visualization.ScatterChart(document.getElementById('chart'));
            break;
          case 'AreaChart':
            chart = new google.visualization.AreaChart(document.getElementById('chart'));
            break;
          case 'LineChart':
            chart = new google.visualization.LineChart(document.getElementById('chart'));
        }
        chart.draw(data, JSON.parse(googleChartOptions));
      }
    }
  };
}(jQuery));
