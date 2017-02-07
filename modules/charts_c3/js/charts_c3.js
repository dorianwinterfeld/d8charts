/**
 * @file
 * JavaScript integration between C3 and Drupal.
 */
(function ($) {
    'use strict';

    Drupal.behaviors.chartsC3 = {
        attach: function(context, settings) {
            var c3Chart = $('.charts-c3').attr('data-chart');
            var c3ChartData = JSON.parse(c3Chart);
            var chart = c3.generate(c3ChartData);
            /*var formattedType = c3ChartData.chart.type;
            var c3ChartDataSeries = c3ChartData.series;
            if(c3ChartData.labels !== 'true') {
                var c3ChartLabels = null;
            } else {
                c3ChartLabels = JSON.parse(c3ChartData.labels);
            }

            switch (formattedType) {
                 case 'bar':
                     formattedType = 'bar';
                     var rotatedAxis = true;
                     break;
                case 'column':
                    formattedType = 'bar';
                    rotatedAxis = false;
                    break;
            }
            var chart = c3.generate({
                bindto: '#chart',
                data: {
                    columns: c3ChartDataSeries,
                    type: formattedType,
                    labels: c3ChartLabels
                 //   names: c3ChartData.labels
                },
                // size: {
                //     width: 600,
                //     height:400,
                // },
                bar: {
                    width: {
                        ratio: 0.5
                    }
                },
                color: {
                    pattern: c3ChartData.pattern
                },
                axis: {
                    rotated: rotatedAxis
                }
            });*/
        }
    }
}(jQuery));

