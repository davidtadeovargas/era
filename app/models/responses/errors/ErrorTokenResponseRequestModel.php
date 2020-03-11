<?php

namespace App\models\request;

class ErrorTokenResponseRequestModel extends ResponseRequestModel {
	
	public function __construct(){

		parent::__construct();
		
		$this->errorCode = "TOKEN_ERROR";
		$this->errorMessage = "El token es invalido";
	}
}
