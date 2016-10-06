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

  $valueField = $view->style_plugin->options['chart_value'];
  $labelField = $view->style_plugin->options['chart_label_field'];
  $data = array();
  foreach ($view->result as $id => $row) {
    $data[$id] = array(
//      'value' =>  $view->field[$valueField]->getValue($row),
//      'label' => $view->field[$labelField]->getValue($row),
    );
  }

  $variables['data'] = $data;
  $variables['options'] = $options;
}
