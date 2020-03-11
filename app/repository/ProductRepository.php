<?php

namespace App\repository;

use App\models\request\LicenseInfoResponseRequestModel;
use App\models\data\LicenseDataModel;

class ProductRepository extends Repository {
	
	public function __construct(){		
	}

	//Get the model by id
	public function getProductByID($id){

		//Get the model and return it
		$Product = \Product::where("id","=",$id)->first();
		return $Product;
	}

	//Get the model by code
	public function getProductByCode($code){

		//Get the model and return it
		$Product = \Product::where("code","=",$code)->first();
		return $Product;
	}

	//Get all the models
	public function getAllProducts(){

		//Get the models and return them
		$products = \Product::all();
		return $products;
	}
}
