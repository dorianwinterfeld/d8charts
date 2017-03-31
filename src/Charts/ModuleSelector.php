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

  public function __construct($moduleName, $categories, $seriesData, $options, $attachmentDisplayOptions, &$variables, $chartId) {
    $this->moduleName = $moduleName;
    $this->categories = $categories;
    $this->seriesData = $seriesData;
    $this->options = $options;
    $this->attachmentDisplayOptions = $attachmentDisplayOptions;
    $this->chartId = $chartId;

//    Util::checkMissingLibrary('charts_'.$moduleName, $this->assetLocation.'/'.$moduleName.'/'.$assetName);
    $this->moduleExists($moduleName, $variables);
  }
  private function moduleExists($moduleName, &$variables){
    $moduleExist = \Drupal::moduleHandler()->moduleExists($moduleName);
    if ('charts_'.$moduleExist){
      $className = ucfirst($moduleName);
      //$object = new $className;
      $moduleChartsRenderer = 'Drupal\charts_'.$moduleName.'\Charts\\'.ucfirst($moduleName).'ChartsRender';
      $chartingModule = new $moduleChartsRenderer($this->categories, $this->seriesData, $this->options, $this->attachmentDisplayOptions, $variables, $this->chartId);
    }
  }
}