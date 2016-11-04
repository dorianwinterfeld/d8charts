/**
 * Created by mmwebaze on 11/3/2016.
 */
(function ($, drupalSettings) {

    Drupal.behaviors.charts = {
     attach: function (context, settings) {
         var dataX = drupalSettings.charts.generatechart.data;
         var dataLength = dataX.length;
         var categories = [];
         var data = [];


         for (var i = 0; i < dataLength; i++){
             var colData = dataX[i];
             for(var j= 0; j < colData.length; j++) {
                 console.debug(colData[j]['value']+' -- '+colData[j]['label']);
                 categories.push(colData[j]['label']);
                 console.debug(Number(colData[j]['value']) + 1000);
                 data.push(Number(colData[j]['value']));
             }
         }
         console.debug(categories);
         console.debug(data);

         $('#displaychart').highcharts({
             chart: {
                 type: 'bar'
             },
             title: {
                 text: 'The chart title will come here'
             },
             xAxis: {
                 //categories: ['Africa', 'America', 'Asia', 'Europe', 'Oceania'],
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
             series: [{
                 name: 'Year 1800',
                 //data: [107, 31, 635, 203, 2]
                 data: data
             }]
         });

     }
    }
} (jQuery, drupalSettings));