<?php
/**
 * Created by PhpStorm.
 * User: mmwebaze
 * Date: 2/7/2017
 * Time: 4:01 PM
 */

namespace Drupal\charts_c3\Settings\CThree;


class ChartAxis implements \JsonSerializable
{
    private $rotated;

    /**
     * @return mixed
     */
    public function getRotated()
    {
        return $this->rotated;
    }

    /**
     * @param mixed $rotated
     */
    public function setRotated($rotated)
    {
        $this->rotated = $rotated;
    }
    public function jsonSerialize() {
        $vars = get_object_vars($this);

        return $vars;
    }
}