<?php

use App\repository\Repository;
use App\models\viewmodels\ShoppingCartViewModel;
use App\managers\ViewModelManager;

class ShoppingCartController extends BaseController {

	public function showShoppingCart()
	{
		try{

			//Get all the products
			$products = Repository::getInstance()->getProductRepository()->getAllProducts();

			//Create the view model
			$ShoppingCartViewModel = ViewModelManager::getInstance()->getShoppingCartViewModel();	
			$ShoppingCartViewModel->products = $products;
			
			//Return the view
			return View::make("home/shopping_cart")->with('model', $ShoppingCartViewModel);

		}catch(Exception $e){

			return json_encode(new  App\models\request\ErrorExceptionResponseRequestModel($e->getMessage()));	
		}
	}
}