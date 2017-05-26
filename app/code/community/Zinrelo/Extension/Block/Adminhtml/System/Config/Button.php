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
class Zinrelo_Extension_Block_Adminhtml_System_Config_Button extends Mage_Adminhtml_Block_System_Config_Form_Field
{
  /**
   * Set template
   */
  protected function _construct()
  {
    parent::_construct();
   $this->setTemplate('extension/system/config/button.phtml');
  }

  /**
   * Return element html
   *
   * @param  Varien_Data_Form_Element_Abstract $element
   * @return string
   */
  protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
  {
    return $this->_toHtml();
  }

  /**
   * Generate button html
   *
   * @return string
   */
  public function getButtonHtml()
  {
    $button = $this->getLayout()->createBlock('adminhtml/widget_button')->setData(array(
      'id' => 'extension_generate_button',
      'label' => $this->helper('adminhtml')->__('Register'),
      'onclick' => 'javascript:sendData(); return false;'
     ));
     return $button->toHtml();
  }
}
?>