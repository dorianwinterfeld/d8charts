<?php

/**
 * @file
 * Theme for Charts views.
 * @param $page
 */

/**
 * Hook attaches assests to pages depending on library selected
 *
 * @param $attachments
 */
function charts_page_attachments(&$attachments)
{
    $service = \Drupal::service('charts.charts_service');
    $library = $service->getLibrarySelected();
    $attachments['#attached']['library'][] = 'charts/charts';

    switch($library){
        case 'google':
            $attachments['#attached']['library'][] = 'charts_google/charts_google';
            $attachments['#attached']['library'][] = 'charts_google/google';
            break;
        case 'highcharts':
            $attachments['#attached']['library'][] = 'charts_highcharts/charts_highcharts';
            $attachments['#attached']['library'][] = 'charts_highcharts/highcharts';
            break;
        case 'c3':
            $attachments['#attached']['library'][] = 'charts_c3/charts_c3';
            $attachments['#attached']['library'][] = 'charts_c3/c3';
            break;
    }
}