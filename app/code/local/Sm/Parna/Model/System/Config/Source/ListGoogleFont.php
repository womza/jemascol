<?php
/*------------------------------------------------------------------------
 # SM parna - Version 1.1
 # Copyright (c) 2013 YouTech Company. All Rights Reserved.
 # @license - Copyrighted Commercial Software
 # Author: YouTech Company
 # Websites: http://www.magentech.com
-------------------------------------------------------------------------*/

class Sm_Parna_Model_System_Config_Source_ListGoogleFont
{
	public function toOptionArray()
	{	
		return array(
			array('value'=>'', 'label'=>Mage::helper('parna')->__('No select')),
			array('value'=>'Roboto Condensed', 'label'=>Mage::helper('parna')->__('Roboto Condensed')),
			array('value'=>'Anton', 'label'=>Mage::helper('parna')->__('Anton')),
			array('value'=>'Questrial', 'label'=>Mage::helper('parna')->__('Questrial')),
			array('value'=>'Kameron', 'label'=>Mage::helper('parna')->__('Kameron')),
			array('value'=>'Oswald', 'label'=>Mage::helper('parna')->__('Oswald')),
			array('value'=>'Open Sans', 'label'=>Mage::helper('parna')->__('Open Sans')),
			array('value'=>'BenchNine', 'label'=>Mage::helper('parna')->__('BenchNine')),
			array('value'=>'Droid Sans', 'label'=>Mage::helper('parna')->__('Droid Sans')),
			array('value'=>'Droid Serif', 'label'=>Mage::helper('parna')->__('Droid Serif')),
			array('value'=>'PT Sans', 'label'=>Mage::helper('parna')->__('PT Sans')),
			array('value'=>'Vollkorn', 'label'=>Mage::helper('parna')->__('Vollkorn')),
			array('value'=>'Ubuntu', 'label'=>Mage::helper('parna')->__('Ubuntu')),
			array('value'=>'Neucha', 'label'=>Mage::helper('parna')->__('Neucha')),
			array('value'=>'Cuprum', 'label'=>Mage::helper('parna')->__('Cuprum'))	
		);
	}
}
