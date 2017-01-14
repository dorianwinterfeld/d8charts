<?php

namespace Drupal\charts_highcharts\Settings\Highcharts;


class YaxisTitle extends ChartTitle implements \JsonSerializable
{
    private $align = 'high';

    /**
     * @return string
     */
    public function getAlign()
    {
        return $this->align;
    }

    /**
     * @param string $align
     */
    public function setAlign($align)
    {
        $this->align = $align;
    }
    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }
}