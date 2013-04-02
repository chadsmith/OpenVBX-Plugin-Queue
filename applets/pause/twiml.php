<?php
$length = AppletInstance::getValue('length', 10);
$next = AppletInstance::getDropZoneUrl('next');

$response = new TwimlResponse;
$response->pause(array('length' => intval($length)));
if(!empty($next))
  $response->redirect($next);
$response->respond();