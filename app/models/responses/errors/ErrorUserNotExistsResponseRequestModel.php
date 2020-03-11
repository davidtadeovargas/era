<?php

namespace App\models\request;

class ErrorUserNotExistsResponseRequestModel extends ResponseRequestModel {
	
	public function __construct(){

		parent::__construct();
		
		$this->errorCode = "USER_NOT_EXISTS_ERROR";
		$this->errorMessage = "El usuario no existe";
	}
}
