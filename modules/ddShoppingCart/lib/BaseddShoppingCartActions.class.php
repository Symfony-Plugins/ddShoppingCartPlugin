<?php

/**
 * Base actions for the ddShoppingCartPlugin ddShoppingCart module.
 * 
 * @package     ddShoppingCartPlugin
 * @subpackage  ddShoppingCart
 * @author      Diego D
 * @version     SVN: $Id: BaseActions.class.php 12534 2008-11-01 13:38:27Z Kris.Wallsmith $
 */
abstract class BaseddShoppingCartActions extends sfActions
{
	public function executeIndex(sfWebRequest $request)
	{
		$this->cart = $this->getUser()->getShoppingCart();
	}
	
	public function executeAddItem(sfWebRequest $request)
	{
		$cart = $this->getUser()->getShoppingCart();
		$this->forward404Unless($product = ProductTable::getInstance()->find($request->getParameter('item_id')));
		
		$item = $cart->getItem('Product', $product->getId());
		if(!$item)
		{
			$item = new ddShoppingCartItem('Product', $product->getId());
			$cart->addItem($item);
		}
			
		$item->addQuantity($request->getParameter('quantity', 1));
		$item->setPrice($product->getPrice());
		
		if($request->isXmlHttpRequest())
		{
			return $this->renderText(json_encode(array('status' => 'ok', 'items' => $cart->getNbItems())));
		}else
		{
			$this->redirect('@dd_shopping_cart');
		}
	}
	
	public function executeDeleteItem(sfWebRequest $request)
	{
		$cart = $this->getUser()->getShoppingCart();
		
		$cart->deleteItem('Product', $request->getParameter('item_id'));
		
		$this->redirect('@dd_shopping_cart');
	}
	
	public function executeSetItemQuantity(sfWebRequest $request)
	{
		$cart = $this->getUser()->getShoppingCart();
		
		$item = $cart->getItem('Product', $request->getParameter('item_id'));
		$item->setQuantity($request->getParameter('quantity', 1));
				
		$this->redirect('@dd_shopping_cart');
	}
	
	public function executeOrder(sfWebRequest $request)
	{
		
	}
}
