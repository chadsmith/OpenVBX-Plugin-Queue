<div class="vbx-applet">
  <h2>Length</h2>
	<div class="vbx-full-pane">
		<fieldset class="vbx-input-container">
			<input type="text" name="length" class="medium" value="<?php echo AppletInstance::getValue('length', 10); ?>" />
		</fieldset>
  </div>
	<h2>Next</h2>
	<div class="vbx-full-pane">
		<?php echo AppletUI::DropZone('next'); ?>
	</div>
</div>
