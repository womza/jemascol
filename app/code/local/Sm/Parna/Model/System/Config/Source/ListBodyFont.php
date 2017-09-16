<?php
/*------------------------------------------------------------------------
 # SM Parna - Version 1.1
 # Copyright (c) 2013 The YouTech Company. All Rights Reserved.
 # @license - Copyrighted Commercial Software
 # Author: YouTech Company
 # Websites: http://www.magentech.com
-------------------------------------------------------------------------*/

class Sm_Parna_Model_System_Config_Source_ListBodyFont
{
	public function toOptionArray()
	{	
		return array(
			array('value'=>'Arial', 'label'=>Mage::helper('parna')->__('Arial')),
			array('value'=>'Arial Black', 'label'=>Mage::helper('parna')->__('Arial-black')),
			array('value'=>'Courier New', 'label'=>Mage::helper('parna')->__('Courier New')),
			array('value'=>'Georgia', 'label'=>Mage::helper('parna')->__('Georgia')),
			array('value'=>'Impact', 'label'=>Mage::helper('parna')->__('Impact')),
			array('value'=>'Lucida Console', 'label'=>Mage::helper('parna')->__('Lucida-console')),
			array('value'=>'Lucida Grande', 'label'=>Mage::helper('parna')->__('Lucida-grande')),
			array('value'=>'Palatino', 'label'=>Mage::helper('parna')->__('Palatino')),
			array('value'=>'Tahoma', 'label'=>Mage::helper('parna')->__('Tahoma')),
			array('value'=>'Times New Roman', 'label'=>Mage::helper('parna')->__('Times New Roman')),	
			array('value'=>'Trebuchet', 'label'=>Mage::helper('parna')->__('Trebuchet')),	
			array('value'=>'Verdana', 'label'=>Mage::helper('parna')->__('Verdana'))		
		);
	}
}
