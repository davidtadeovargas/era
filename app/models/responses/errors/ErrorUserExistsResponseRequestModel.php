<?php

namespace App\models\request;

class ErrorUserExistsResponseRequestModel extends ResponseRequestModel {
	
	public function __construct(){
		
		parent::__construct();

		$this->errorCode = "USER_EXISTS_ERROR";
		$this->errorMessage = "El usuario ya existe";
	}
}
