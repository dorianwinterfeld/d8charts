<?php

namespace Drupal\charts\Util;

class Util {

  /**
   * @param $view
   * @param $labelValues
   * @param $labelField
   * @param $color
   * @return array
   */
  public static function viewsData($view, $labelValues, $labelField, $color, $attachmentChartTypeOption) {
    $data = array();

    foreach ($view->result as $id => $row) {
      $numberFields = 0;
      $rowData = array();
      foreach ($labelValues as $fieldId => $rowDataValue) {
        $rowData[$numberFields] = array(
          'value' => $view->field[$fieldId]->getValue($row),
          'label_field' => $view->field[$labelField]->getValue($row),
          'label' => $view->field[$fieldId]->label(),
          // 'label' => $view->display_handler->display['id'], to use display_id
          'color' => $color[$fieldId],
          'type' => $attachmentChartTypeOption,
        );
        $numberFields++;
      }
      $data[$id] = $rowData;
    }

    return $data;
  }

  /**
   * Removes unselected fields
   */

  public static function removeUnselectedFields($valueField) {
    $fieldValues = array();
    foreach ($valueField as $key => $value) {
      if (!empty($value)) {
        $fieldValues[$key] = $value;
      }
    }
    return $fieldValues;
  }

  /**
   * Creates chart data to be used later by visualization frameworks
   */

  public static function createChartableData($data) {
    $chartData = array();
    $categories = array();
    $seriesData = array();

    for ($i = 0; $i < count($data[0]); $i++) {

      $seriesRowData = array('name' => '', 'color' => '', 'type' => '', 'data' => array());
      for ($j = 0; $j < count($data); $j++) {
        $categories[$j] = $data[$j][$i]['label_field'];
        $seriesRowData['name'] = $data[$j][$i]['label'];
        // $seriesRowData['name'] = $data[$j][$i]['label_field'];
        $seriesRowData['type'] = $data[$j][$i]['type'];
        $seriesRowData['color'] = $data[$j][$i]['color'];
        array_push($seriesRowData['data'], ((int) ($data[$j][$i]['value'])));
      }
      array_push($seriesData, $seriesRowData);
    }
    $chartData[0] = $categories;
    $chartData[1] = $seriesData;

    return $chartData;
  }

}
