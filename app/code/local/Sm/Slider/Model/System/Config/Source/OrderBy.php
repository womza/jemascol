<?php
/*------------------------------------------------------------------------
 # SM Slider - Version 2.1.0
 # Copyright (c) 2014 YouTech Company. All Rights Reserved.
 # @license - Copyrighted Commercial Software
 # Author: YouTech Company
 # Websites: http://www.magentech.com
-------------------------------------------------------------------------*/

class Sm_Slider_Model_System_Config_Source_OrderBy
{
	public function toOptionArray()
	{
		return array(
			array('value'	=> 	'name', 			'label' => Mage::helper('slider')->__('Name')),
			array('value'	=> 	'entity_id',		'label' => Mage::helper('slider')->__('Id')),
			array('value'	=> 	'position',		'label' => Mage::helper('slider')->__('Position')),
			array('value'	=> 	'created_at', 		'label' => Mage::helper('slider')->__('Date Created')),
			array('value'	=> 	'price', 			'label' => Mage::helper('slider')->__('Price')),
			array('value'	=> 	'lastest_product', 	'label' => Mage::helper('slider')->__('Lastest Product')),
			array('value'	=> 	'top_rating', 		'label' => Mage::helper('slider')->__('Top Rating')),
			array('value'	=> 	'most_reviewed',	'label' => Mage::helper('slider')->__('Most Reviews')),
			array('value'	=> 	'most_viewed',		'label' => Mage::helper('slider')->__('Most Viewed')),
			array('value'	=> 	'best_sales',		'label' => Mage::helper('slider')->__('Most Selling')),
			array('value'	=> 	'random', 			'label' => Mage::helper('slider')->__('Random')),
		);
	}
}
