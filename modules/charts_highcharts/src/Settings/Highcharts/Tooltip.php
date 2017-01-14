<?php

namespace Drupal\charts_highcharts\Settings\Highcharts;


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