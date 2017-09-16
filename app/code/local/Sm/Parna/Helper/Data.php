<?php
class Sm_Parna_Helper_Data extends Mage_Core_Helper_Abstract
{
	public function __construct(){
		$this->defaults = array(
			/* general options */
			'showcpanel'				=> '1',
			'color'						=> 'blue',
			'body_background_color'		=> '#ffffff',
			'body_link_color'			=> '#666666',
			'body_text_color'			=> '#666666',
			'menu_styles'				=> '1',
			'google_font'				=> '',
			'google_font_targets'		=> '',
			'body_font_size'			=> '12px',
			'body_font_family'			=> 'Open Sans',
		);
	}

	function get($attributes=array())
	{
		$data = $this->defaults;
		$general = Mage::getStoreConfig("parna_cfg/general");
		if (!is_array($attributes)) {
			$attributes = array($attributes);
		}
		if (is_array($general))	
		$data = array_merge($data, $general);
		return array_merge($data, $attributes);;
	}
}
	 