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
   $variables['data'] = array();

  $valueField = $view->style_plugin->options['data_fields'];
    array_pop($valueField);

    //$fieldValue = $valueField['field_number'];
    //$fieldValueTwo = $valueField['field_second_number'];

  $labelField = $view->style_plugin->options['label_field'];
  $data = array();

  foreach ($view->result as $id => $row) {
      $numberFields = 0;
      $rowData = array();
      foreach($valueField as $dataId => $dataValue) {
          $rowData[$numberFields] = array(
              'value' => $view->field[$dataId]->getValue($row),
             'label' => $view->field[$labelField]->getValue($row),
          );
          $numberFields++;
      }
      $data[$id] = $rowData;
  }

  $variables['data'] = $data;
  $variables['options'] = $options;
}
