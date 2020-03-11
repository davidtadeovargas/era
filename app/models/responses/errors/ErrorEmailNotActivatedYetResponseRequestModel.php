<?php

namespace App\models\request;

class ErrorEmailNotActivatedYetResponseRequestModel extends ResponseRequestModel {
	
	public function __construct(){

		parent::__construct();
		
		$this->errorCode = "EMAIL_NOT_ACTIVATED_YET_ERROR";
		$this->errorMessage = "El email aun no esta activado";
	}
}
