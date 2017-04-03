<?php
/**
 * Created by PhpStorm.
 * User: mmwebaze
 * Date: 4/3/2017
 * Time: 10:54 AM
 */

namespace Drupal\charts\Charts;


interface ChartsRenderInterface {
  public function charts_render_charts($options, $categories = [], $seriesData = [], $attachmentDisplayOptions = [], &$variables, $chartId);
  public function charts_library_check($moduleName, $libraryPath);
}