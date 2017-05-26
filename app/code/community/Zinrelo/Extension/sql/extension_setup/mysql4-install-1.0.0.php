<?php
/*
* Magento
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License version 3.0
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* https://opensource.org/licenses/osl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@zinrelo.com so we can send you a copy immediately.
*
* @category  Zinrelo
* @package   Zinrelo_Extension
* @copyright Copyright (c) 2017 Zinrelo, Inc.
* @license   https://opensource.org/licenses/osl-3.0.php Open Software License version 3.0
*/

/**

* @category Zinrelo
* @package  Zinrelo_Extension
* @author   Zinrelo Developer <dev@zinrelo.com>
*/

	$storeUrl = Mage::app()->getStore()->getUrl();
	$date = new DateTime();
	$timpstamp =  $date->getTimestamp();
	$input = Mage::app()->getStore()->getUrl().$timpstamp;
    $partner_id = 'MG_'.substr(strtolower(base64_encode(sha1($input))),0,8);
	$setup = new Mage_Core_Model_Config();
    $setup->saveConfig('extension/extension_settings/extension_partner_id', $partner_id, 'default', 0);
	 
?>