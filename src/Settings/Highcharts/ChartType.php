<?php
/**
 * Created by PhpStorm.
 * User: mmwebaze
 * Date: 12/24/2016
 * Time: 2:01 PM
 */

namespace Drupal\charts\Settings\Highcharts;


class ChartType implements \JsonSerializable
{
    private $type;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }
}