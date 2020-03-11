<?php

namespace App\models\request;

class ErrorLicenseInfoNotFoundResponseRequestModel extends ResponseRequestModel {
	
	public function __construct(){

		parent::__construct();
		
		$this->errorCode = "LICENSE_INFO_NOT_FOUND_ERROR";
		$this->errorMessage = "No se encontro información de licenciamiento";
	}
}
