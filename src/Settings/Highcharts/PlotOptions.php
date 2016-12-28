<?php
/**
 * Created by PhpStorm.
 * User: mmwebaze
 * Date: 12/24/2016
 * Time: 3:56 PM
 */

namespace Drupal\charts\Settings\Highcharts;


class PlotOptions implements \JsonSerializable
{
    private $bar;

    /**
     * @return mixed
     */
    public function getBar()
    {
        return $this->bar;
    }

    /**
     * @param mixed $bar
     */
    public function setBar($bar)
    {
        $this->bar = $bar;
    }
    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }
}