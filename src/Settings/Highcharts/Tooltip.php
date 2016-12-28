<?php
/**
 * Created by PhpStorm.
 * User: mmwebaze
 * Date: 12/24/2016
 * Time: 3:58 PM
 */

namespace Drupal\charts\Settings\Highcharts;


class Tooltip implements \JsonSerializable
{
    private $valueSuffix = 'millions';

    /**
     * @return string
     */
    public function getValueSuffix()
    {
        return $this->valueSuffix;
    }

    /**
     * @param string $valueSuffix
     */
    public function setValueSuffix($valueSuffix)
    {
        $this->valueSuffix = $valueSuffix;
    }
    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }
}