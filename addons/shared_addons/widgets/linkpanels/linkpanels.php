<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Show RSS feeds in your site
 *
 * @author		tobias koch
 * @author		mmsetc.de
 * @package		PyroCMS\Widgets
 */
class Widget_Linkpanels extends Widgets
{

	/**
	 * The translations for the widget title
	 *
	 * @var array
	 */
	public $title = array(
						  'en' => 'Linkpanels',
						  'de' => 'Linkpanels',
						  );

	/**
	 * The translations for the widget description
	 *
	 * @var array
	 */
	public $description = array(
								'en' => 'Display a navigation group in a linkpanel',
								'de' => 'Navigationsgruppe in Panel anzeigen',
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
	public $website = 'mmsetc.de';

	/**
	 * The version of the widget
	 *
	 * @var string
	 */
	public $version = '1.2.0';

	/**
	 * The fields for customizing the options of the widget.
	 *
	 * @var array 
	 */
	public $fields = array(
						   array(
								 'field' => 'group',
								 'label' => 'Navigation group',
								 'rules' => 'required'
								 )
						   ,
						   array(
								 'field' => 'style',
								 'label' => 'Style',
								 'rules' => ''
								 )
						   ,
						   array(
								 'field' => 'limit',
								 'label' => 'Limit',
								 'rules' => ''
								 )
						   ,
						   array(
								 'field' => 'inner_ub',
								 'label' => 'Panel &Uuml;berschrift',
								 'rules' => 'required'
								 )

						   );
	/**	
	 * Constructor method
	 */	
	public function __construct()	
	{
		// Load the navigation model from the navigation module.	
		$this->load->model('navigation/navigation_m');
	}
	
	/**
	 * Get the navigation groups.
	 *
	 * @return array The navigation groups
	 */
	public function form()
	{
		// Loop aroung them and add them in an array keyed by their abbreviated 
		// title.
		$groups = array();
		$_groups = $this->navigation_m->get_groups();
		foreach ($_groups as $group)
			{
				$groups[$group->abbrev] = $group->title;
			}

		// Beam them up Scottie
		return array(
					 'groups' => $groups,
					 'styles' => array('secondary'=>'grau', 'success'=>'gr&uuml;n', ''=>'blau', 'alert'=>'rot' )
					 );
	}

	/**
	 * The main function of the widget.
	 *
	 * @param array $options The options for displaying a Navigation menu.
	 * @return array 
	 */
	public function run($options)
	{
		// We must pass the user group from here so that we can cache the results and still always return the links with the proper permissions
		$params = array(
						$options['group'],
						array(
							  'user_group' => ($this->current_user AND isset($this->current_user->group)) ? $this->current_user->group : false,
							  'front_end' => true,
							  'is_secure' => IS_SECURE,
							  )
						);

		// Load the navigation model from the navigation module.
		$this->load->model('navigation/navigation_m');
		
		$links = $this->pyrocache->model('navigation_m', 'get_link_tree', $params, config_item('navigation_cache'));

		$visible_links = array_slice($links,0,$options['limit']);
		$dropdown_links = array_slice($links, $options['limit'],count($links) - $options['limit']);
		
		
		// Shorter alias
		$widget = & $options['widget'];

		// The title of the navigation menu
		$title = isset($widget['title_tag']) ? '<'.$widget['title_tag'].'>'.$widget['instance_title'].'</'.$widget['title_tag'].'>' : '';

		// What do we use 'ul' or 'ol'
		$list_tag = isset($widget['list_tag']) ? $widget['list_tag'] : 'ul';

		// Give it another CSS class maybe?
		$list_class = isset($widget['list_class']) ? $widget['list_class'] : 'navigation';
		$list_class = $list_class ? ' class="'.$list_class.'"' : '';

		// Specify an 'id' for it?
		$list_id = isset($widget['list_id']) ? $widget['list_id'] : '';
		$list_id = $list_id ? ' id="'.$list_id.'"' : '';

		return array(
					 'links' => $links,
					 'title' => $title,
					 'list_open_tag' => '<'.$list_tag.$list_id.$list_class.'>',
					 'list_close_tag' => '</'.$list_tag.'>',
					 'group' => $options['group'],
					 'style' => $options['style'],
					 'limit' => $options['limit'],
					 'inner_ub' => $options['inner_ub'],
					 'visible_links'=>$visible_links,
					 'dropdown_links'=>$dropdown_links,

					 );
	}

}