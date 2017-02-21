<?php

namespace Drupal\charts\Services;

/**
 * Service class necessary for getting and setting the state of the currently selected Library.
 *
 * Class ChartService
 * @package Drupal\charts\Services
 */

class ChartService implements ChartServiceInterface {
  private $librarySelected;

  /**
   * Gets the currently selected Library
   * @return string
   */
  public function getLibrarySelected() {
    return $this->librarySelected;
  }

  /**
   * Sets the previously set Library with the newly selected library value
   * @param string $librarySelected
   */
  public function setLibrarySelected($librarySelected) {
    $this->librarySelected = $librarySelected;
  }

}
