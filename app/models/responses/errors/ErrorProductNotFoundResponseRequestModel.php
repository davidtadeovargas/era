<?php

namespace App\models\request;

class ErrorProductNotFoundResponseRequestModel extends ResponseRequestModel {
	
	public function __construct(){

		parent::__construct();
		
		$this->errorCode = "PRODUCT_NOT_FOUND_ERROR";
		$this->errorMessage = "El producto no existe";
	}
}
