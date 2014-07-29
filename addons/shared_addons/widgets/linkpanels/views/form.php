<ul>
	<li class="even">
		<label>Navigation group</label>
		<?php echo form_dropdown('group', $groups, $options['group']); ?>
	</li>
	<li class="even">
		<label>Style</label>
	 <?php echo form_dropdown('style', $styles, $options['style']); ?>
	</li>
	<li class="even">
	<label>Panel &Uuml;berschrift</label>
		<?php echo form_input(array('name'=>'inner_ub', 'value' => $options['inner_ub'])); ?>
	</li>
	<li class="even">
						   <label>Limit</label>
		<?php echo form_input(array('name'=>'limit', 'value' => $options['limit'])); ?>
	</li>

</ul>