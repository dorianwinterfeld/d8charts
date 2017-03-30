<?php

/**
 * @ file
 *
 *
 */
namespace Drupal\charts\Charts;

use Drupal\charts\Util\Util;

class ModuleSelector {

  private $moduleName;
  private $assetLocation = '/vendor/';
  private $assetName;
  private $categories;
  private $seriesData;
  private $options;
  private $attachmentDisplayOptions;
  private $chartId;
  private $variables;

  public function __construct($moduleName, $categories, $seriesData, $options, $attachmentDisplayOptions, $variables, $chartId) {
    $this->moduleName = $moduleName;
    $this->categories = $categories;
    $this->seriesData = $seriesData;
    $this->options = $options;
    $this->attachmentDisplayOptions = $attachmentDisplayOptions;
    $this->variables = $variables;
    $this->chartId = $chartId;

//    Util::checkMissingLibrary('charts_'.$moduleName, $this->assetLocation.'/'.$moduleName.'/'.$assetName);
    $this->moduleExists($moduleName);
  }
  private function moduleExists($moduleName){
    $moduleExist = \Drupal::moduleHandler()->moduleExists($moduleName);
    if ('charts_'.$moduleExist){
      drupal_set_message('I do exies charts_'.$moduleName);
      $className = ucfirst($moduleName);
      //$object = new $className;
      $naamSpace = 'Drupal\charts_'.$moduleName.'\Charts\\'.ucfirst($moduleName).'ChartsRender';

      $googelCharts = new $naamSpace($this->categories, $this->seriesData, $this->options, $this->attachmentDisplayOptions, $this->variables, $this->chartId);
    }
    else
      drupal_set_message('damn '.$moduleName);
  }
  public function getVariables(){

    return $this->variables;
  }
}