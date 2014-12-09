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

        if($this->agent->is_mobile() == 1)
        {
			$find = array("-","/"," ","+");
			$replace = array("");
			$arr = array($this->variables->telefonnummer);
			$telArr =  str_replace($find,$replace,$arr);


			$telNr = '<a href="tel:' . $telArr[0] . '">' . $this->variables->telefonnummer . '</a>';
        }
        else
        {
			$telNr = $this->variables->telefonnummer;

        }

        $retVal =   '<div class="panel callout radius sidekick">
<center>
<h2>Bundesweite Hotline</h2>
<h2><strong class="telNr">' . $telNr  . '</strong><br><div class="hint"><div class="itsy">&uuml;bliche Telefongeb&uuml;hren aus dem Festnetz</div> (Keine Zusatzgeb&uuml;hren)</div></h2>';

        if($this->attribute('name') != '')
        {
			$retVal .= '<h3>Ansprechpartner<br>' . $this->attribute('name') .'<br>Mo-Fr von 09:00-16:00 Uhr<br><br>-IHR KOMPETENZ TEAM-</h3>';
        }
        else
        {
			$retVal .= '<h3>-IHR KOMPETENZ TEAM-<br>Mo-Fr von 09:00-16:00 Uhr</h3>';

        }

        if(isset($_COOKIE['ihre_energieberater_af_id']))
        {
               $this->load->library('cockpit/format');

			$retVal .= '<h3><strong>Aktionscode:</strong> ' . $this->format->get_aktionscode($_COOKIE['ihre_energieberater_af_id']);
        }



        $retVal .= '</center>
</div>';

        return $retVal; 
    }
	

    // --------------------------------------------------------------------
   
    function callback()
    {

        $retVal = '
				 <div class="panel" id="formCallback">
				 <h5>Bitte um R&uuml;ckruf</h5>
				 {{ contact:form anrede="dropdown|required|=Anrede|Herr|Frau" name="text|required" tel="text|required" aktionscode="text" subject="dropdown|Anfrage|Support|Sales|Feedback|Sonstiges" success-redirect="contact/success" template="ruckrufbitte"}}</p>
				 <div class="row">
				 <span class="small-5 columns"><label for="anrede">Anrede:</label>{{ anrede }}</span>
				 <span class="small-7 columns"><label for="name">Name:</label>{{ name }}</span>
				 </div>
				 <div class="row">
				 <span class="small-5 columns"><label for="aktionscode">Aktionscode:</label>{{ aktionscode }}</span>
				 <span class="small-7 columns"><label for="email">Ihre Telefonnummer:</label>{{ tel }}</span>
				 </div>
				 <style>

				 </style>

				 {{ /contact:form }}
				 <div class="row">
				 </div>
				 </div>
				 ';




        return $retVal;
    }

}

/* End of file Plugin_sidekick.php */