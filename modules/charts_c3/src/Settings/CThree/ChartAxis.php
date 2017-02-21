<?php

namespace Drupal\charts_c3\Settings\CThree;


class ChartAxis implements \JsonSerializable
{
    private $rotated = false;
    private $x = array('type' => 'category');

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