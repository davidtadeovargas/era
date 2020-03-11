<?php

namespace App\models\request;

class ErrorParametersResponseRequestModel extends ErrorResponseRequestModel {
	
	public $field;

	public function __construct(){

		parent::__construct();
		
		$this->errorCode = "PARAMS_ERROR";
		$this->errorMessage = "Parametros invalidos";
	}
}
