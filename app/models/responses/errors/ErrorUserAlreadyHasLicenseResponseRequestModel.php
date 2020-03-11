<?php

namespace App\models\request;

class ErrorUserAlreadyHasLicenseResponseRequestModel extends ResponseRequestModel {
	
	public function __construct(){

		parent::__construct();
		
		$this->errorCode = "USER_ALREADY_HAS_LICENSE_ERROR";
		$this->errorMessage = "El usuario ya cuenta con una licencia previa";
	}
}
