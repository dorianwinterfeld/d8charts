/**
 * @file
 * JavaScript integration between Highcharts and Drupal.
 */
(function ($) {
  'use strict';

  Drupal.behaviors.chartsHighcharts = {
    attach: function(context, settings) {

      var config = $('.charts-highchart').attr('data-chart');

      if (config !== undefined){
        var config = $('.charts-highchart').attr('data-chart');
        $('.charts-highchart').highcharts(JSON.parse(config));
        $('.charts-highchart', context).once('.charts-highchart', function() {
          /*$(this).highcharts(config);
          if ($(this).attr('data-chart')) {

            var config = JSON.parse($(this).attr('data-chart'));
            $(this).highcharts(config);
          }*/
        });
      }
    }
  };
} (jQuery));
