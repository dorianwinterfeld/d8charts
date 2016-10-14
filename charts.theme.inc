<?php

/**
 * @file
 * Theme for Charts views.
 * @param $page
 */



function charts_highcharts_page_attachments(&$page)
{
  $page['#attached']['library'][] = 'charts/charts';
  $page['#attached']['library'][] = 'charts_highcharts/charts_highcharts';
  $page['#attached']['library'][] = 'charts_highcharts/highcharts';
}


function template_preprocess_views_view_charts(&$variables) {

  $options = $variables['view']->style_plugin->options;
  $view = $variables['view'];
  $rows = $variables['rows'];
  $variables['data'] = array();

  $valueField = $rows->style_plugin->options['data_fields'];
  //$fieldValue = $this->$valueField['number_field'];

  $labelField = $rows->style_plugin->options['label_field'];
  $data = array();
  foreach ($view as $id => $row) {
    $data[$id] = array(
      'value' =>  $view->field[$valueField],
      'label' => $view->field[$labelField],
    );
  }
  $variables['data'] = $data;
  $variables['options'] = $options;
}
