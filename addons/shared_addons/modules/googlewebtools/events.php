<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Events_Googlewebtools
{
	protected $ci;
    
    public function __construct()
    {
        $this->ci =& get_instance();
        
        Events::register('public_controller', array($this, 'run'));
     }
        
    public function run()
    {		
		$this->ci->db->select('value')->from('settings')->where('slug', 'gwt_verification');
		$query = $this->ci->db->get();
		if ($query->num_rows() > 0) {
			$row = $query->row();
			$verification_code = $row->value;
			empty($verification_code) or $this->ci->template->set_metadata("google-site-verification", $verification_code);
		}
		$query->free_result();
			
        return 'The Public Controller has ran';
    }
}
/* End of file events.php */