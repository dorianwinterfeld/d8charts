/**
 * Created by mmwebaze on 12/27/2016.
 */

(function ($) {
    'use strict';

    Drupal.behaviors.chartsC3 = {
        attach: function(context, settings) {
            var c3ChartType = $('.charts-c3').attr('c3-chart-type');
            var type = JSON.parse(c3ChartType);
            var formattedType = type.type;
            window.alert(formattedType);
            var chart = c3.generate({
                bindto: '#chart',
                data: {
                    columns: [
                        ['data1', 30, 200, 100, 400, 150, 250],
                        ['data2', 50, 20, 10, 40, 15, 25]
                    ],
                    type: formattedType
                }
            });
        }
    }
}(jQuery));

