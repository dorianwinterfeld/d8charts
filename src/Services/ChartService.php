<?php
/**
 * Created by PhpStorm.
 * User: mmwebaze
 * Date: 12/28/2016
 * Time: 9:28 AM
 */

namespace Drupal\charts\Services;
/**
 * Service class necessary for getting state of the currently selected Library.
 *
 * Class ChartService
 * @package Drupal\charts\Services
 */

class ChartService
{
    private $librarySelected;

    public function __construct()
    {
        $this->librarySelected = 'highcharts'; //to be removed
    }

    /**
     * Gets the currently enabled Library
     * @return string
     */
    public function getLibrarySelected()
    {
        return $this->librarySelected;
    }

    /**
     * Sets currently enabled Library with a new value
     * @param string $librarySelected
     */
    public function setLibrarySelected($librarySelected)
    {
        $this->librarySelected = $librarySelected;
    }
}