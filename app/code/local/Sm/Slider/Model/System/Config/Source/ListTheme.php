<?php
/*------------------------------------------------------------------------
 # SM Slider - Version 2.1.0
 # Copyright (c) 2014 YouTech Company. All Rights Reserved.
 # @license - Copyrighted Commercial Software
 # Author: YouTech Company
 # Websites: http://www.magentech.com
-------------------------------------------------------------------------*/

class Sm_Slider_Model_System_Config_Source_ListTheme
{
	public function toOptionArray()
	{	
		return array(
		array('value'	=>		'theme1',		'label'=>Mage::helper('slider')->__('Layout 1')),
		array('value'	=>		'theme2',		'label'=>Mage::helper('slider')->__('Layout 2')),
		);
	}
}
