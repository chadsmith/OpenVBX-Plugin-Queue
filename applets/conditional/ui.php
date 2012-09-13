<?php
  $type = AppletInstance::getValue('type', 'time');
  $types = array(
    'time' => 'Time in Queue (minutes)',
    'average' => 'Average Time (minutes)',
    'position' => 'Position in Queue',
    'size' => 'Size of Queue'
  );
?>
<div class="vbx-applet conditional-applet">
  <h2>Condition</h2>
  <p>Leave the queue if the following condition is met.</p>
  <div class="radio-table">
    <fieldset class="vbx-input-container">
      <table>
<?php foreach($types as $key => $desc): ?>
        <tr class="radio-table-row first <?php echo $key == $type ? 'on' : 'off' ?>">
          <td class="radio-cell">
            <input type="radio" name="type" value="<?php echo $key; ?>" <?php echo $key == $type ? 'checked="checked" ' : '' ?> />
          </td>
          <td class="content-cell">
            <div style="float: left;"><h4><?php echo $desc; ?></h4></div>
            <div style="float: right;">
              <div class="vbx-input-container input">
                <input type="text" class="medium" name="<?php echo $key; ?>" value="<?php echo AppletInstance::getValue($key) ?>" />
              </div>
            </div>
          </td>
        </tr>
<?php endforeach; ?>
      </table>
    </fieldset>
  </div>
	<h2>Otherwise</h2>
	<div class="vbx-full-pane">
		<?php echo AppletUI::DropZone('next'); ?>
	</div>
</div>
