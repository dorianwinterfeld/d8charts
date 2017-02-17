/**
 * @file
 * JavaScript integration between C3 and Drupal.
 */
(function ($) {
    'use strict';

    Drupal.behaviors.chartsC3 = {
        attach: function(context, settings) {

            $('.charts-c3').once().each(function(){
                if ($(this).attr('data-chart')) {
                    var c3Chart = $('.charts-c3').attr('data-chart');
                    c3.generate(JSON.parse(c3Chart))
                }
            });
        }
    }
}(jQuery));