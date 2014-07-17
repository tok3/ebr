<?


		$id	= ($options['video_id'] ? $options['video_id'] : '42722025');
		$width	= ($options['video_width'] ? $options['video_width'] : '100%');
		$height	= ($options['video_height'] ? $options['video_height'] : '150');

if($options['video_type'] == 'youtube')
   {		
		echo '<iframe src="http://www.youtube.com/embed/'.$id.'" width="'.$width.'" height="'.$height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
	}

if($options['video_type'] == 'vimeo')
   {
		
		echo '<iframe src="http://player.vimeo.com/video/'.$id.'" width="'.$width.'" height="'.$height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
	}