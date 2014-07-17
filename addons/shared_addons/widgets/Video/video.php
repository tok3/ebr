<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Show RSS feeds in your site
 * 
 * @author  	Phil Sturgeon
 * @author		PyroCMS Dev Team
 * @package		PyroCMS\Core\Widgets
 */
class Widget_Video extends Widgets
{


	/**
	 * The widget title
	 *
	 * @var array
	 */
	public $title = 'Video';

	/**
	 * The translations for the widget description
	 *
	 * @var array
	 */
	public $description = array(
								'en' => 'Embed Youtube or Vimeo video',
								'de' => 'Youtube oder Vimeo Video einbinden',
								);
	
	/**
	 * The author of the widget
	 *
	 * @var string
	 */
	public $author = 'Tobias Koch';

	/**
	 * The author's website.
	 * 
	 * @var string 
	 */
	public $website = 'http://mmsetc.de/';

	/**
	 * The version of the widget
	 *
	 * @var string
	 */
	public $version = '1.0.0';

	/**
	 * The fields for customizing the options of the widget.
	 *
	 * @var array 
	 */
	public $fields = array(
						   array(
								 'field' => 'video_type',
								 'label' => 'Video Type',
								 'rules' => ''
								 ),
						   array(
								 'field' => 'video_id',
								 'label' => 'Video ID',
								 'rules' => 'required'
								 ),
						   array(
								 'field' => 'video_width',
								 'label' => 'Width',
								 'rules' => ''
								 ),
						   array(
								 'field' => 'video_height',
								 'label' => 'height',
								 'rules' => '',
								 'default' => ''
								 )
						   );

	/**
	 * The main function of the widget.
	 *
	 * @param array $options The options for displaying an HTML widget.
	 * @return array 
	 */
	public function run($options)
	{
		if (empty($options['video_id']))
			{
				return array('output' => '');
			}

		
		// Store the feed items
		return array(
					 'video_type' => $this->parser->parse_string($options['video_type'], null, true),
					 'video_id' => $this->parser->parse_string($options['video_id'], null, true),
					 'video_width' => $this->parser->parse_string($options['video_width'], null, true),
					 'video_height' => $this->parser->parse_string($options['video_height'], null, true)
					 );
	}

}