<?php

namespace App\models\request;

class ErrorUserWithNoMoreLicensesResponseRequestModel extends ResponseRequestModel {
	
	public function __construct(){

		parent::__construct();
		
		$this->errorCode = "USER_WITH_NO_MORE_LICENSES_ERROR";
		$this->errorMessage = "El usuario ya no cuenta con mas licencias";
	}
}
