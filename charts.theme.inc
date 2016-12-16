<?php

/**
 * @file
 * Theme for Charts views.
 * @param $page
 */

function charts_page_attachments(&$page)
{
  $page['#attached']['library'][] = 'charts/charts';
  $page['#attached']['library'][] = 'charts_highcharts/highcharts';
}


function template_preprocess_views_view_charts(&$variables) {

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
}
