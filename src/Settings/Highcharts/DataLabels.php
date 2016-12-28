<?php
/**
 * Created by PhpStorm.
 * User: mmwebaze
 * Date: 12/24/2016
 * Time: 3:57 PM
 */

namespace Drupal\charts\Settings\Highcharts;


class DataLabels implements \JsonSerializable
{
    private $dataLabels;

    /**
     * @return mixed
     */
    public function getDataLabels()
    {
        return $this->dataLabels;
    }

    /**
     * @param mixed $dataLabels
     */
    public function setDataLabels($dataLabels)
    {
        $this->dataLabels = $dataLabels;
    }
    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }
}