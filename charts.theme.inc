<?php

/**
 * @file
 * Theme for Charts views.
 * @param $page
 */

function charts_page_attachments(&$page)
{
  $page['#attached']['library'][] = 'charts/charts';
  /*$page['#attached']['library'][] = 'charts_highcharts/charts_highcharts';
  $page['#attached']['library'][] = 'charts_highcharts/highcharts';*/
}


function template_preprocess_views_view_charts(&$variables) {

  $options = $variables['view']->style_plugin->options;
  $view = $variables['view'];
   // debug(array_keys($view->field['field_number']));
    //debug(get_class($view->field['field_number']->label));
    //debug(get_class($view->result[0]));
    //drupal_set_message(json_encode($view->result[0]->_entity));
    //debug(array_keys($view->field));
    //debug(get_class($view->field['field_number']));
   $variables['data'] = array();

  $valueField = $view->style_plugin->options['data_fields'];
    //debug(array_keys($valueField));
    array_pop($valueField);
    //$fieldValue = $valueField['field_number'];
    //$fieldValueTwo = $valueField['field_second_number'];

  $title = $view->style_plugin->options['label_field'];
    debug(array_keys($view->result[0]));

  $color = $view->style_plugin->options['field_colors'];

  $data = array();

  foreach ($view->result as $id => $row) {
      $numberFields = 0;
      $rowData = array();
      foreach($valueField as $fieldId => $rowDataValue) {
          $rowData[$numberFields] = array(
              'value' => $view->field[$fieldId]->getValue($row),
              'title' => $view->field[$title]->getValue($row),
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
}
