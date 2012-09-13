<?php
$user = OpenVBX::getCurrentUser();
$tenant_id = $user->values['tenant_id'];
$ci =& get_instance();
$twilio = new TwilioRestClient($ci->twilio_sid, $ci->twilio_token, $ci->twilio_endpoint);
$response = $twilio->request("Accounts/{$ci->twilio_sid}/Queues", 'GET');
$queues = $response->ResponseXml->Queues;
$flows = OpenVBX::getFlows(array('tenant_id' => $tenant_id));
if(isset($_POST['sid']) && isset($_POST['flow'])):
  $flow = OpenVBX::getFlows(array('id' => $_POST['flow'], 'tenant_id' => $tenant_id));
    if($flow && $flow[0]->values['data'])
      $twilio->request("Accounts/{$ci->twilio_sid}/Calls/{$_POST['sid']}", 'POST', array(
        'Url' => site_url('twiml/start/voice/' . $flow[0]->values['id'])
      ));
endif;
OpenVBX::addJS('queue.js');
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
?>
<style>
    .header {
      font-size: 16px;
      font-weight: bold;
    }
    .queue,
    .call {
      overflow: hidden;
      padding: 5px 0;
      border-bottom: 1px solid #eee;
    }
	.queue span {
		display: inline-block;
		float: left;
		width: 33%;
		text-align: center;
	}
	.queue a {
		color: #111;
		text-decoration: none;
	}
	.call {
	  display: none;
	  background: #ccc;
	}
	.call span {
		display: inline-block;
		float: left;
		width: 33%;
		text-align: center;
	}
	.header {
	  font-weight: bold;
	}
</style>
<div class="vbx-content-main">
	<div class="vbx-content-menu vbx-content-menu-top">
		<h2 class="vbx-content-heading">Call Queues</h2>
	</div>
	<div class="vbx-table-section">
<?php if(count($queues->Queue)): ?>
    <div>
      <p class="header queue">
        <span>Name</span>
        <span>Size</span>
        <span>Avg. Wait</span>
      </p>
<?php foreach($queues->Queue as $queue):
        if('0' != $queue->CurrentSize):
    $response = $twilio->request("Accounts/{$ci->twilio_sid}/Queues/{$queue->Sid}/Members", 'GET');
    $members = $response->ResponseXml->QueueMembers;
?>
      <p class="queue queue_<?php echo $queue->Sid; ?>">
        <span><?php echo $queue->FriendlyName; ?></span>
        <span><a href="#queue"><?php echo $queue->CurrentSize; ?></a></span>
        <span><?php echo relativeTime($queue->AverageWaitTime); ?></span>
      </p>
<?php     if(count($members->QueueMember)): ?>
      <p class="header call">
        <span>From</span>
        <span>Redirect</span>
        <span>Wait Time</span>
      </p>
<?php       foreach($members->QueueMember as $member):
  $response = $twilio->request("Accounts/{$ci->twilio_sid}/Calls/{$member->CallSid}", 'GET');
  $call = $response->ResponseXml->Call;
?>
      <p class="call">
        <span><?php echo $call->FromFormatted; ?></span>
        <span>
          <select name="call_<?php echo $member->CallSid; ?>">
            <option>Select a Flow</option>
<?php         foreach($flows as $flow): ?>
            <option value="<?php echo $flow->values['id']; ?>"><?php echo $flow->values['name']; ?></option>
<?php         endforeach; ?>
          </select>
        </span>
        <span><?php echo relativeTime($member->WaitTime); ?></span>
      </p>
<?php       endforeach;
          endif;
        endif;
      endforeach; ?>
    </div>
<?php endif; ?>
	</div>
</div>
