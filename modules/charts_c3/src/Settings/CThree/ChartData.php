<?php
/**
 * Created by PhpStorm.
 * User: mmwebaze
 * Date: 2/7/2017
 * Time: 4:11 PM
 */

namespace Drupal\charts_c3\Settings\CThree;


class ChartData implements \JsonSerializable
{
    private $columns = array();
    private $type;
    private $labels = true;

    /**
     * @return array
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * @param array $columns
     */
    public function setColumns($columns)
    {
        $this->columns = $columns;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
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