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
            $attachments['#attached']['library'][] = 'charts_google/google';
            $attachments['#attached']['library'][] = 'charts_google/charts_google';
            break;
        case 'highcharts':
            $attachments['#attached']['library'][] = 'charts_highcharts/charts_highcharts';
            $attachments['#attached']['library'][] = 'charts_highcharts/highcharts';
            break;
        case 'C3':
            $attachments['#attached']['library'][] = 'c3/c3';
            break;
    }
}


/*function template_preprocess_views_view_charts(&$variables) {

  $options = $variables['view']->style_plugin->options;
  $view = $variables['view'];
  $variables['data'] = array();

  $valueField = $view->style_plugin->options['data_fields'];
   array_pop($valueField);

  $labelField = $view->style_plugin->options['label_field'];

  $color = $view->style_plugin->options['field_colors'];

  $data = array();

  foreach ($view->result as $id => $row) {
      $numberFields = 0;
      $rowData = array();
      foreach($valueField as $fieldId => $rowDataValue) {
          $rowData[$numberFields] = array(
              'value' => $view->field[$fieldId]->getValue($row),
              'label_field' => $view->field[$labelField]->getValue($row),
              'label' => $view->field[$fieldId]->label(),
              'color' => $color[$fieldId],
          );
          $numberFields++;
      }
      $data[$id] = $rowData;
  }


  $variables['data'] = $data;
  $variables['options'] = $options;
  $variables['#attached']['drupalSettings']['charts']['generatechart']['data'] = $data;
  $variables['#attached']['drupalSettings']['charts']['generatechart']['options'] = $options;
}*/
