<?php

namespace Drupal\charts_highcharts\Settings\Highcharts;


class Yaxis implements \JsonSerializable
{
    private $min;
    //private $max;
    private $title;
    //private $align = 'high';
    private $labels = '';

    /**
     * @return mixed
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * @param mixed $min
     */
    public function setMin($min)
    {
        $this->min = $min;
    }

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
     * @return string
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * @param string $labels
     */
    public function setLabels($labels)
    {
        $this->labels = $labels;
    }
    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }
}