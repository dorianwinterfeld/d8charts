/**
 * @file
 * JavaScript integration between Highcharts and Drupal.
 */
(function ($) {
  'use strict';

  Drupal.behaviors.chartsHighcharts = {
    attach: function(context, settings) {
      var config = $('.charts-highchart').attr('data-chart');
      $('.charts-highchart').highcharts(JSON.parse(config));
      $('.charts-highchart').once('charts-highchart', function() {
        if ($(this).attr('data-chart')) {

          var config = $.parseJSON($(this).attr('data-chart'));
          $(this).highcharts(config);
        }
      })
    }
  };
} (jQuery));
