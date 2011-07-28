<?php

/**
 * Base components for the ddShoppingCartPlugin ddShoppingCart module.
 * 
 * @package     ddShoppingCartPlugin
 * @subpackage  ddShoppingCart
 * @author      Diego Damico
 * @version     SVN: $Id: BaseActions.class.php 12534 2008-11-01 13:38:27Z Kris.Wallsmith $
 */
abstract class BaseddShoppingCartComponents extends sfComponents
{
	public function executeCartPanel(sfWebRequest $request)
	{
		$this->cart = $this->getUser()->getShoppingCart();
	}
}
