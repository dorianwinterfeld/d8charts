<?php
/**
 * Created by PhpStorm.
 * User: mmwebaze
 * Date: 2/6/2017
 * Time: 9:52 AM
 */

namespace Drupal\charts_highcharts\Settings\Highcharts;


class YaxisLabel implements \JsonSerializable
{
    private $overflow = 'justify';

    public function setOverflow($overflow){
        $this->overflow = $overflow;
    }
    public function getOverflow(){
        return $this->overflow;
    }
    public function jsonSerialize() {
        $vars = get_object_vars($this);

        return $vars;
    }
}