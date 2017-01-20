<?php

namespace Drupal\charts_c3\Settings\C3;

class ChartLabel implements \JsonSerializable
{
    private $rotation;

    /**
     * @return mixed
     */
    public function getRotation()
    {
        return $this->rotation;
    }

    /**
     * @param mixed $rotation
     */
    public function setRotation($rotation)
    {
        $this->rotation = $rotation;
    }
    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }
}