
<div class="alert-panel <?php echo $options['style'];?>" Data-alert>
	<div class="alert-panel-title">
	<?php 
	if($options['inner_ub'] != "")
	   {
		  echo '<h3>' .$options['inner_ub'] . '</h3>';
	   }
	?>  
	</div>
	<div class="alert-panel-message">
	<?php
	echo $list_open_tag . PHP_EOL;

foreach($visible_links as $key => $item)
{
   echo '<li><a href="' . $item['url'] . '">' . $item['title'] . '</a></li>';   

}
echo $list_close_tag; 
?>
</div>

<?php

if(isset($dropdown_links[0]))
   {
      echo '<div class="alert-panel-action">';
	  $dropOpt['0'] = 'Mehr';
	  foreach($dropdown_links as $key => $item)
		 {
			$dropOpt[$item['url']] = $item['title'];
		 }
	  echo form_dropdown('navDrop_' . $options['group'], $dropOpt, '0', 'id="navDrop_' . $options['group'] . '" onChange="window.document.location.href=this.options[this.selectedIndex].value;"');


   }
 else
	{
	   echo '<div class="alert-panel-action no-drop">';

	}

?>

</div></div>

