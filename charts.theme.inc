<?php

/**
 * @file
 * Theme for Charts views.
 * @param $page
 */
use Drupal\Component\Serialization\Json;

function charts_highcharts_page_attachments(&$page)
{
  $page['#attached']['library'][] = 'charts/charts';
  $page['#attached']['library'][] = 'charts_highcharts/charts_highcharts';
  $page['#attached']['library'][] = 'charts_highcharts/highcharts';
}


function template_preprocess_views_view_charts(&$variables) {

  $options = $variables['view']->style_plugin->options;
  $view = $variables['view'];
    $kit = Json::encode( $view);
    drupal_set_message($kit.' --');
  $rows = $variables['rows'];
   $variables['data'] = array();

  $valueField = $rows->style_plugin->options['data_fields'];//field_number;
    $fieldValue = $valueField['field_number'];

  $labelField = $rows->style_plugin->options['label_field'];
  $data = array();
  foreach ($view as $id => $row) {
    $data[$id] = array(
      'value' =>  $view->field[$fieldValue],
      'label' => $view->field[$labelField],
    );
  }
    $kit = Json::encode( $view->field[$fieldValue]);
    drupal_set_message($kit.' --');
  $variables['data'] = $data;
  //$variables['options'] = $options;
}
