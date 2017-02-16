/**
 * @file
 * JavaScript integration between C3 and Drupal.
 */
(function ($) {
    'use strict';

    Drupal.behaviors.chartsC3 = {
        attach: function(context, settings) {
            var c3Chart = $('.charts-c3').attr('data-chart');
            if (c3Chart !== undefined){
                var c3Chart = $('.charts-c3').attr('data-chart');

                c3.generate(JSON.parse(c3Chart))
                $('.charts-c3', context).once('.charts-c3', function() {});
            }
        }
    }
}(jQuery));