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
class Zinrelo_Extension_Block_Successsnippet extends Mage_Checkout_Block_Success {

    /**
     * Check if Zinrelo tracking is enabled.
     *
     * @return string
     */
    public function isEnabled() {
        return Mage::getStoreConfig('extension/extension_settings/extension_active');
    }
	
	

   
}