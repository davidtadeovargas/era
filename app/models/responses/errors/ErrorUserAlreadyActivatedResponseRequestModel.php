<?php

namespace App\models\request;

class ErrorUserAlreadyActivatedResponseRequestModel extends ResponseRequestModel {
	
	public function __construct(){

		parent::__construct();
		
		$this->errorCode = "USER_ALREADY_ACTIVATED_ERROR";
		$this->errorMessage = "El usuario ya esta activado";
	}
}
