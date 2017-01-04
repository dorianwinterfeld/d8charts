<?php
/**
 * Created by PhpStorm.
 * User: mmwebaze
 * Date: 12/29/2016
 * Time: 4:18 PM
 */

namespace Drupal\charts\Settings\Google;


class GoogleOptions
{
    private $title;
    private $chartArea;
    private $hAxis;
    private $vAxis;

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
     * @return mixed
     */
    public function getChartArea()
    {
        return $this->chartArea;
    }

    /**
     * @param mixed $chartArea
     */
    public function setChartArea($chartArea)
    {
        $this->chartArea = $chartArea;
    }

    /**
     * @return mixed
     */
    public function getHAxis()
    {
        return $this->hAxis;
    }

    /**
     * @param mixed $hAxis
     */
    public function setHAxis($hAxis)
    {
        $this->hAxis = $hAxis;
    }

    /**
     * @return mixed
     */
    public function getVAxis()
    {
        return $this->vAxis;
    }

    /**
     * @param mixed $vAxis
     */
    public function setVAxis($vAxis)
    {
        $this->vAxis = $vAxis;
    }
}