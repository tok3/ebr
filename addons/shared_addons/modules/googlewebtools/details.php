<?php defined('BASEPATH') or exit('No direct script access allowed');

class Module_Googlewebtools extends Module 
{
	public $version = '1.0';
	
	public function info()
    {
        return array(
            'name' => array(
                'en' => 'Google Webtools Integration'
            ),
            'description' => array(
                'en' => 'Integrate Google Webmaster Tools verification codes into existing theme metadata.'
            ),
            'frontend' => false,
            'backend' => false
        );
    }
	
	public function install()
	{
		$verification_code_setting = array(
            'slug' => 'gwt_verification',
            'title' => 'Google Webtools Verification Code',
            'description' => 'The verification code for your site given on Google Webmaster Tools.',
            '`default`' => '',
            '`value`' => '',
            'type' => 'text',
            '`options`' => '',
            'is_required' => 0,
            'is_gui' => 1,
            'module' => 'integration'
        );
		
		$this->db->insert('settings', $verification_code_setting);
		
		$this->db->select('value')->from('settings')->where('slug', 'gwt_verification');
		$query = $this->db->get();
		if ($query->num_rows() === 0) 
		{
			return false;
		}
		
		return true;
	}
	
	public function uninstall()
	{
		$this->db->delete('settings', array('slug' => 'gwt_verification'));
		
		return true;
	}
	
	public function upgrade($old_version)
    {
        return true;
    }
}
/* End of file details.php */