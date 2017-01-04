<?php
/**
 * Created by PhpStorm.
 * User: mmwebaze
 * Date: 12/29/2016
 * Time: 4:25 PM
 */

namespace Drupal\charts\Settings\Google;


class ChartArea
{
    private $width;

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

}