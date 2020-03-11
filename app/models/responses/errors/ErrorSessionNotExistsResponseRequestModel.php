<?php

namespace App\models\request;

class ErrorSessionNotExistsResponseRequestModel extends ResponseRequestModel {
	
	public function __construct(){

		parent::__construct();
		
		$this->errorCode = "INVALID_USER_SESSION_ERROR";
		$this->errorMessage = "No existe una sesión de usuario";
	}
}
