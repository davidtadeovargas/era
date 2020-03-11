<?php

namespace App\models\request;

class ErrorCompanyNotExistsResponseRequestModel extends ResponseRequestModel {
	
	public function __construct(){

		parent::__construct();
		
		$this->errorCode = "COMPANY_NOT_EXISTS_ERROR";
		$this->errorMessage = "La compañi no existe";
	}
}
