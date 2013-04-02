<div class="vbx-applet">
  <h2>Message</h2>
	<div class="vbx-full-pane">
		<p>Use %position% to substitute the caller's position in the queue, %size% for the total size of the queue, %time% for the time the caller has been in the queue or %average% for the average wait time.</p>
		<fieldset class="vbx-input-container">
			<input type="text" name="message" class="medium" value="<?php echo AppletInstance::getValue('message', 'You are caller number %position% of %size%. You have been in the queue for %time%. The average wait time is %average%.'); ?>" />
		</fieldset>
	</div>
	<h2>Next</h2>
	<div class="vbx-full-pane">
		<?php echo AppletUI::DropZone('next'); ?>
	</div>
</div>