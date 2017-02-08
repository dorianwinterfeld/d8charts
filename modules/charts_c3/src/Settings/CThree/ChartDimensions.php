<?php
/**
 * Created by PhpStorm.
 * User: mmwebaze
 * Date: 2/7/2017
 * Time: 4:04 PM
 */

namespace Drupal\charts_c3\Settings\CThree;


class ChartDimensions implements \JsonSerializable
{
    private $ratio;

    /**
     * @return mixed
     */
    public function getRatio()
    {
        return $this->ratio;
    }

    /**
     * @param mixed $ratio
     */
    public function setRatio($ratio)
    {
        $this->ratio = $ratio;
    }

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }
}