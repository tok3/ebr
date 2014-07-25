<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Plugin_sidekick extends Plugin
{

	public function _self_doc()
	{
		$info = array(
            'hotline' => array(
                'description' => array(// a single sentence to explain the purpose of this method
                    'de' => 'Zeigt Callout mit Hotline Nummer an ! {{ sidekick:hotline var_name="value"}}'
                ),
                'single' => true,// will it work as a single tag?
                'double' => true,// how about as a double tag?
                'variables' => 'name = personalisiert, f&uuml;r mitarbeiter name ansonsten neutral  '// list all variables available inside the double tag. Separate them|like|this
            ),
          

		);
	
		return $info;
	}


	function hotline()
	{
		
		$retVal =   '<div class="panel callout radius sidekick">
<center>
<h2>Bundesweite Hotline</h2>
<h2><strong class="telNr">{{ variables:telefonnummer }}</strong><br><small class="hint"><div class="itsy">&uuml;bliche Telefongeb&uuml;hren aus dem Festnetz</div> (Keine Zusatzgeb&uuml;hren)</small></h2>';

		if($this->attribute('name') != '')
		   {
			  $retVal .= '<h3>Ansprechpartner<br>' . $this->attribute('name') .'<br>Mo-Fr von 09:00-16:00 Uhr<br><br>-IHR KOMPETENZ TEAM-</h3>';
		   }
else
   {
		  $retVal .= '<h3>-IHR KOMPETENZ TEAM-<br>Mo-Fr von 09:00-16:00 Uhr</h3>';

   }



$retVal .= '</center>
</div>';

		return $retVal; 
	}
	
	function vimeo()
	{
		$id	= ($this->attribute('id') ? $this->attribute('id') : '42722025');
		$width	= ($this->attribute('width') ? $this->attribute('width') : '100%');
		$height	= ($this->attribute('height') ? $this->attribute('height') : '315');
		
		return '<iframe src="http://player.vimeo.com/video/'.$id.'" width="'.$width.'" height="'.$height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
	}
}

/* End of file Plugin_sidekick.php */