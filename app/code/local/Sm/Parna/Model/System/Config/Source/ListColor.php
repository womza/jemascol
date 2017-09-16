<?php
/*------------------------------------------------------------------------
 # SM Parna - Version 1.1
 # Copyright (c) 2013 The YouTech Company. All Rights Reserved.
 # @license - Copyrighted Commercial Software
 # Author: YouTech Company
 # Websites: http://www.magentech.com
-------------------------------------------------------------------------*/

class Sm_Parna_Model_System_Config_Source_ListColor
{
	public function toOptionArray()
	{	
		return array(
		array('value'=>'pink', 'label'=>Mage::helper('parna')->__('Pink')),
		array('value'=>'emerald', 'label'=>Mage::helper('parna')->__('Emerald')),
		array('value'=>'orange', 'label'=>Mage::helper('parna')->__('Orange')),		
		array('value'=>'violet', 'label'=>Mage::helper('parna')->__('Violet'))
		);
	}
}
