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
    private $attachmentViews;

    public function getAttachmentViews(){

        return $this->attachmentViews;
    }
    public function setAttachmentViews($attachmentViews){
        $this->attachmentViews = $attachmentViews;
    }
}