<?php
/**
 * Created by PhpStorm.
 * User: mmwebaze
 * Date: 2/3/2017
 * Time: 3:24 PM
 */

namespace Drupal\charts\Services;


class ChartAttachmentService implements ChartAttachmentServiceInterface
{
    private $attachmentView;

    public function getAttachmentView(){

        return $this->attachmentView;
    }
    public function setAttachmentView($view){
        $this->attachmentView = $view;
    }
}