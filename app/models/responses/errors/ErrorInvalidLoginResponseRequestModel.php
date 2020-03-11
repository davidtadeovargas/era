<?php

namespace App\models\request;

class ErrorInvalidLoginResponseRequestModel extends ResponseRequestModel {
	
	public function __construct(){

		parent::__construct();
		
		$this->errorCode = "INVALID_LOGIN_ERROR";
		$this->errorMessage = "Login invalido";
	}
}
