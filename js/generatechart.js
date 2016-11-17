/**
 * Created by mmwebaze on 11/3/2016.
 */
(function ($, drupalSettings) {

    Drupal.behaviors.charts = {
     attach: function (context, settings) {

       var chartData = drupalSettings.charts.generatechart.data;
       var chartOptions = drupalSettings.charts.generatechart.options;
       var chartDataLength = chartData.length;
       var categories = [];
       var seriesData = [];
       var title = chartOptions.title;
       var type = chartOptions.type;

         for (var i = 0; i < chartData[0].length; i++){

             var seriesRowData = {name: "", color: "", data: []};

             for(var j= 0; j < chartDataLength; j++) {

                 categories[j] = chartData[j][i]['label_field']
                 seriesRowData.name = chartData[j][i]['label'];
                 seriesRowData.color = chartData[j][i]['color'];
                 seriesRowData.data.push(Number(chartData[j][i]['value']))
             }
             seriesData.push(seriesRowData);
         }

         $('#container').highcharts({
             chart: {
                 type: type
             },
             title: {
                 text: title
             },
             xAxis: {
                 categories: categories,
                 title: {
                     text: null
                 }
             }/*,
             yAxis: {
                 min: 0,
                 title: {
                     text: 'Population (millions)',
                     align: 'high'
                 },
                 labels: {
                     overflow: 'justify'
                 }
             },
             tooltip: {
                 valueSuffix: ' millions'
             },
             plotOptions: {
                 bar: {
                     dataLabels: {
                         enabled: true
                     }
                 }
             }*//*,
             legend: {
                 layout: 'vertical',
                 align: 'right',
                 verticalAlign: 'top',
                 x: -40,
                 y: 80,
                 floating: true,
                 borderWidth: 1,
                 backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                 shadow: true
             }*//*,
             credits: {
                 enabled: false
             }*/,
             series: seriesData/*[{
                 name: 'Year 1800',
                 //data: [107, 31, 635, 203, 2]
                 data: data
             }]*/
         });

     }
    }
} (jQuery, drupalSettings));

