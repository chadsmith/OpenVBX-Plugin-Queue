<?php
$name = AppletInstance::getValue('queue');
$url = AppletInstance::getDropZoneUrl('url');

$options = array();
if(!empty($url))
  $options['url'] = $url;

$response = new TwimlResponse;
$dial = $response->dial();
$dial->queue($name, $options);
$response->respond();
