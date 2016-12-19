/**
 * @file
 * JavaScript integration between Highcharts and Drupal.
 */
(function ($) {
  'use strict';

  Drupal.behaviors.chartsHighcharts = {
    attach: function(context, settings) {
      //alert('mike jdhfdjfhd')
      console.debug('hmmmm')
      var config = $('.charts-highchart').attr('data-chart');
      $('.charts-highchart').highcharts(JSON.parse(config));
      $('.charts-highchart').once('charts-highchart', function() {
        console.debug('888888888888');
        if ($(this).attr('data-chart')) {

          var config = $.parseJSON($(this).attr('data-chart'));
          $(this).highcharts(config);
        }
      })
    }
  };
} (jQuery));
