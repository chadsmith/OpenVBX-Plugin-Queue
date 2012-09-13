<?php
function relativeTime($time) {
  if(!$time)
    return '0 seconds';
  $units = array(
    'year' => 60 * 60 * 24 * 365,
    'week' => 60 * 60 * 24 * 7,
    'day' => 60 * 60 * 24,
    'hour' => 60 * 60,
    'minute' => 60,
    'second' => 1,
  );
  $result = array();
  foreach($units as $unit => $seconds)
    if($seconds <= $time) {
      $num = floor($time / $seconds);
      $time = $time % $seconds;
      $result[] = $num . ' ' . $unit . ($num != 1 ? 's' : '');
    }
  return implode(' ', $result);
}

$message = AppletInstance::getValue('message', 'You are caller number %position% of %size%. You have been in the queue for %time%. The average wait time is %average%.');
$next = AppletInstance::getDropZoneUrl('next');

if(!empty($_REQUEST['QueuePosition']))
  $message = str_replace(array('%position%', '%size%', '%time%', '%average%'), array($_REQUEST['QueuePosition'], $_REQUEST['CurrentQueueSize'], relativeTime($_REQUEST['QueueTime']), relativeTime($_REQUEST['AverageQueueTime'])), $message);

$response = new TwimlResponse;
$response->say($message);
if($next)
  $response->redirect($next);
$response->respond();
