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
            console.debug(c3ChartData);
            var chart = c3.generate(c3ChartData);
        }
    }
}(jQuery));

