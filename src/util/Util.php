<?php

/**
 * Created by PhpStorm.
 * User: mmwebaze
 * Date: 2/4/2017
 * Time: 11:30 AM
 */
namespace Drupal\charts\util;

class Util
{
    public static function viewsData($view, $labelValues, $labelField, $color){
        $dataAttachment = array();

        foreach ($view->result as $id => $row) {
            $numberFields = 0;
            $rowData = array();
            foreach($labelValues as $fieldId => $rowDataValue) {
                $rowData[$numberFields] = array(
                    'value' => $view->field[$fieldId]->getValue($row),
                    'label_field' => $view->field[$labelField]->getValue($row),
                    'label' => $view->field[$fieldId]->label(),
                    'color' => $color[$fieldId],
                );
                $numberFields++;
            }
            $dataAttachment[$id] = $rowData;
        }

        return $dataAttachment;
    }
    public static function removeUnselectedFields($valueField){
        $fieldValues = array();
        foreach($valueField as $key => $value) {
            if (!empty($value)){
                $fieldValues[$key] = $value;
            }
        }
        return $fieldValues;
    }

    public static function createChartableData($data){
        $temp = array();
        $categories = array();
        $seriesData = array();

        for ($i = 0; $i < count($data[0]); $i++){

            $seriesRowData = array('name' => '','color' => '', 'data' => array());
            for($j = 0; $j < count($data); $j++) {
                $categories[$j] = $data[$j][$i]['label_field'];
                $seriesRowData['name'] = $data[$j][$i]['label'];
                $seriesRowData['color'] = $data[$j][$i]['color'];
                array_push($seriesRowData['data'],((int)($data[$j][$i]['value'])));
            }
            array_push($seriesData, $seriesRowData);
        }
        $temp[0] = $categories;
        $temp[1] = $seriesData;

        return $temp;
    }
}