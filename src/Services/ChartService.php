<?php
/**
 * Created by PhpStorm.
 * User: mmwebaze
 * Date: 12/28/2016
 * Time: 9:28 AM
 */

namespace Drupal\charts\Services;


class ChartService
{
    private $librarySelected;

    public function __construct()
    {
        $this->librarySelected = 'highcharts';
    }

    /**
     * @return string
     */
    public function getLibrarySelected()
    {
        return $this->librarySelected;
    }

    /**
     * @param string $librarySelected
     */
    public function setLibrarySelected($librarySelected)
    {
        $this->librarySelected = $librarySelected;
    }
}