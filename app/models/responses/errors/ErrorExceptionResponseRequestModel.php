<?php

namespace App\models\request;

class ErrorExceptionResponseRequestModel extends ErrorResponseRequestModel {
	
	public function __construct($exceptionMessage){
		
		parent::__construct();
		
		$this->errorCode = "EXCEPTION_ERROR";
		$this->errorMessage = $exceptionMessage;
	}
}
