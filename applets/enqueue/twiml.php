<?php
$name = AppletInstance::getValue('queue');
$waitUrl = AppletInstance::getDropZoneUrl('waitUrl');
$action = AppletInstance::getDropZoneUrl('action');

$options = array();
if(!empty($waitUrl))
  $options['waitUrl'] = $waitUrl;
if(!empty($action))
  $options['action'] = $action;

$response = new TwimlResponse;
$response->enqueue($name, $options);
$response->respond();
