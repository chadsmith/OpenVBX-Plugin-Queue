<?php
$type = AppletInstance::getValue('type', 'time');
$next = AppletInstance::getDropZoneUrl('next');
$value = intval(AppletInstance::getValue($type));
$params = array(
  'time' => 'QueueTime',
  'average' => 'AverageQueueTime',
  'position' => 'QueuePosition',
  'size' => 'CurrentQueueSize'
);
$param = $params[$type];
$condition_met = false;

$response = new TwimlResponse;

if(!empty($_REQUEST[$param]))
  $condition_met = intval($_REQUEST[$param]) >= (in_array($type, array('time', 'average')) ? 60 : 1) * $value;
if($condition_met)
  $response->leave();
elseif($next)
  $response->redirect($next);
$response->respond();