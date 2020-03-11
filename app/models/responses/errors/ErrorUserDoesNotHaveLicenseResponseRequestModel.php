<?php

namespace App\models\request;

class ErrorUserDoesNotHaveLicenseResponseRequestModel extends ResponseRequestModel {
	
	public function __construct(){

		parent::__construct();
		
		$this->errorCode = "USER_HAS_NOT_LICENSE_ERROR";
		$this->errorMessage = "El usuario no cuenta con licencia";
	}
}
