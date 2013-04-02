<?php
$name = AppletInstance::getValue('queue');
$waitUrl = AppletInstance::getDropZoneUrl('waitUrl');
$next = AppletInstance::getDropZoneUrl('next');

$options = array();
if(!empty($waitUrl))
  $options['waitUrl'] = $waitUrl;

$response = new TwimlResponse;
$response->enqueue($name, $options);

if(!empty($next))
  $response->redirect($next);

$response->respond();