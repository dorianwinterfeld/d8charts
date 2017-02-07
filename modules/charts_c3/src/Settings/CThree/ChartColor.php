<?php
/**
 * Created by PhpStorm.
 * User: mmwebaze
 * Date: 2/7/2017
 * Time: 4:00 PM
 */

namespace Drupal\charts_c3\Settings\CThree;


class ChartColor implements \JsonSerializable
{
    private $pattern = array();

    /**
     * @return mixed
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * @param mixed $pattern
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;
    }
    public function jsonSerialize() {
        $vars = get_object_vars($this);

        return $vars;
    }
}