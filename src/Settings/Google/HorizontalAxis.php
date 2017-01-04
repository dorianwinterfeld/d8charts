<?php
/**
 * Created by PhpStorm.
 * User: mmwebaze
 * Date: 12/29/2016
 * Time: 4:26 PM
 */

namespace Drupal\charts\Settings\Google;


class HorizontalAxis
{
    private $title;
    private $minValue = 0;

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getMinValue()
    {
        return $this->minValue;
    }

    /**
     * @param int $minValue
     */
    public function setMinValue($minValue)
    {
        $this->minValue = $minValue;
    }

}