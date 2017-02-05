<?php
/**
 * Created by PhpStorm.
 * User: mmwebaze
 * Date: 2/5/2017
 * Time: 12:24 AM
 */

namespace Drupal\charts\Services;


interface ChartAttachmentServiceInterface
{
    public function getAttachmentView();
    public function setAttachmentView($view);
}