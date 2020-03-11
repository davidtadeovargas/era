<?php

namespace App\models\request;

class ErrorInvalidPWDHashResponseRequestModel extends ResponseRequestModel
{    	
	public function __construct(){
		parent::__construct();

		$this->errorCode = "INVALID_PWDHASH_ERROR";
		$this->errorMessage = "Hash invalido";
	}
}