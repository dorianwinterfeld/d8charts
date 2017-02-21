<?php

namespace Drupal\charts\Services;

class ChartAttachmentService implements ChartAttachmentServiceInterface {
  private $attachmentViews;

  public function getAttachmentViews() {

    return $this->attachmentViews;
  }

  public function setAttachmentViews($attachmentViews) {
    $this->attachmentViews = $attachmentViews;
  }

}
