<ul>
	<li class="odd">
		<label>Video Type</label>
	<?php echo form_dropdown('video_type', array('youtube'=>'youtube','vimeo'=>'vimeo'),$options['video_type']); ?>
	</li>
	<li class="even">
		<label>Video ID</label>
		<?php echo form_input(array('name'=>'video_id', 'value' => $options['video_id'])); ?>
	</li>
	<li class="odd">
		<label>Video Width</label>
		<?php echo form_input(array('name'=>'video_width', 'value' => $options['video_width'])); ?>
	</li>
	<li class="evan">
		<label>Video Height</label>
		<?php echo form_input(array('name'=>'video_height', 'value' => $options['video_height'])); ?>
	</li>

</ul>