<?php
/**
 * Created by PhpStorm.
 * User: mmwebaze
 * Date: 12/24/2016
 * Time: 4:01 PM
 */

namespace Drupal\charts\Settings\Highcharts;


class Xaxis implements \JsonSerializable
{
    private $categories = array();
    private $title;
    private $labels;

    /**
     * @return array
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param array $categories
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
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
     * @return mixed
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * @param mixed $labels
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