/**
 * Created by mmwebaze on 11/3/2016.
 */
(function ($, drupalSettings) {

    Drupal.behaviors.charts = {
     attach: function (context, settings) {

         var chartData = drupalSettings.charts.generatechart.data;
        console.debug(chartData);
         var chartDataLength = chartData.length;
         var categories = [];
         var data = [];
         var seriesData = [];

         for (var i = 0; i < chartData[0].length; i++){
            // var colData = chartData[i];
               // console.debug(colData)
             var seriesRowData = {name: "", color: "", data: []};

             for(var j= 0; j < chartDataLength; j++) {

                // categories[i] = colData[j]['title']
                 categories[j] = chartData[j][i]['title']
                // console.debug("title "+chartData[j][i]['title'])
                 seriesRowData.name = chartData[j][i]['label'];
                 seriesRowData.color = chartData[j][i]['color'];
                 //console.debug("label "+chartData[j][i]['label']+" * J = "+j+" - i = "+i)
                 seriesRowData.data.push(Number(chartData[j][i]['value']))
                 //categories.push(colData[j]['label']);
             }
             seriesData.push(seriesRowData);
         }
         //console.debug('&&&&&&&&&')
         //console.debug(categories)

         $('#container').highcharts({
             chart: {
                 type: 'bar'
             },
             title: {
                 text: 'The chart title will comes here'
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
