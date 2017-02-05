<?php
/**
 * Created by PhpStorm.
 * User: mmwebaze
 * Date: 2/5/2017
 * Time: 12:31 AM
 */

namespace Drupal\charts\Services;


interface ChartInterface
{
    public function getLibrarySelected();
    public function setLibrarySelected($librarySelected);
}