<?php

/**
 * @file
 *
 *
 */

namespace Drupal\charts\Services;


class ViewsDataService implements ViewsDataInterface {

  private $viewsData;

  public function getViewsData() {
    return $this->viewsData;
  }

  public function setViewsData($viewsData) {
    $this->viewsData = $viewsData;
  }
}