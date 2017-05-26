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
class Zinrelo_Extension_Helper_Data extends Mage_Core_Helper_Abstract {
	
  	    public function getOrderData($orderId){

		$order = Mage::getModel('sales/order')->load($orderId);
	
		//array to hold order value in arrray
		$orderData = array();
		
		$orderData['orderdata']['order_id'] = $order->getIncrementId();
		$orderData['orderdata']['discount_code'] = $order->getCouponCode();
		$orderData['orderdata']['total'] = $order->getGrandTotal();
		$orderData['orderdata']['subtotal'] =  $order->getSubtotal();
		$orderData['orderdata']['currency_code'] = $order->getBaseCurrency()->getCurrencyCode();
		$items = $order->getAllItems();
        $tagName= array();
		$data = array();
		$i=0;
		$productData =array();
        foreach ($items as $itemId => $item) {
		$product = Mage::getModel('catalog/product')->load($item->getProductId());
		$cats = $product->getCategoryIds();
		$tagModel = Mage::getModel('tag/tag');
		$tags = $tagModel->getResourceCollection()
			->addPopularity()
			->addStatusFilter($tagModel->getApprovedStatus())
			->addProductFilter($item->getProductId())
			->setFlag('relation', true)
			->addStoreFilter($order->getStoreId())
			->setActiveFilter()
			->load();
	
		if(isset($tags) && !empty($tags)){
			foreach($tags as $tag){
				$tagName[] = $tag->getName();
		}}
        $productData[$i]['product_id'] = $product->getId();
		$productData[$i]['quantity'] = $item->getQtyOrdered();
		$productData[$i]['price'] = $item->getPrice();
		$productData[$i]['img_url'] = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA) . 'catalog/product' . $product->getImage();
		$productData[$i]['title'] = $product->getName();
		$productData[$i]['url'] = $product->getProductUrl();
		$productData[$i]['category'] =  Mage::getModel('catalog/category')->load($cats[0])->getName();
		$productData[$i]['tags'] = $tagName;
          $i++;
		    }
		$orderData['products'] = $productData;
		return $orderData;

    }
	
    
}