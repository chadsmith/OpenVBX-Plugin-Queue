<div class="vbx-applet">
  <h2>Queue Name</h2>
	<div class="vbx-full-pane">
		<fieldset class="vbx-input-container">
			<input type="text" name="queue" class="medium" value="<?php echo AppletInstance::getValue('queue'); ?>" />
		</fieldset>
  </div>
	<h2>Before Connecting</h2>
	<div class="vbx-full-pane">
		<?php echo AppletUI::DropZone('url'); ?>
	</div>
</div>
