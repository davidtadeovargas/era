<?php

namespace App\models\request;

class ErrorInvalidGenerationSerialResponseRequestModel extends ResponseRequestModel {
	
	public function __construct(){

		parent::__construct();
		
		$this->errorCode = "INVALID_SERIAL_GENERATION_ERROR";
		$this->errorMessage = "Error en la generación del serial";
	}
}
