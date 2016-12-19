<?php

class ChartType{
    public $type;
}
class ChartTitle{
    public $text;
}
class Label{
    public $rotation;
}
class Xaxis{
    public $categories = array();
    public $title;
    public $labels;
}
class YaxisTitle extends ChartTitle{
    public $align = 'high';
}
class ChartLabel{
    public $rotation;
}
class Yaxis{
    public $min;
    //public $max;
    public $title;
    //public $align = 'high';
    public $labels = '';
}
class Tooltip
{
    public $valueSuffix = 'millions';
}
class DataLabelStatus{
    public $enabled = true;
}

class DataLabels{
    public $dataLabels;
}

class PlotOptions{
    public $bar;
}

/*class PlotOptions{
//    public $bar = '';
}*/

class ChartLegend{
    public $layout = 'vertical';
    public $align = 'right';
    public $verticalAlign = 'top';
    public $x = -40;
    public $y = 80;
    public $floating = true;
    public $borderWidth = 1;
    public $backgroundColor = '((Highcharts.theme && Highcharts.theme.legendBackgroundColor) ||'. '#FFFFFF'.')';
    public $shadow = true;
}
class ChartCredits {
    public $enabled = false;
}

class Highcharts{
    public $chart;
    public $title;
    public $xAxis;
    public $yAxis;
    public $tooltip;
    public $plotOptions;
    public $legend;
    public $credits;
    public $series;
}