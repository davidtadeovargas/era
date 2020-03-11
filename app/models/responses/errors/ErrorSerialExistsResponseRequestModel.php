<?php

namespace App\models\request;

class ErrorSerialExistsResponseRequestModel extends ResponseRequestModel {
	
	public function __construct(){

		parent::__construct();
		
		$this->errorCode = "SERIAL_EXISTS_ERROR";
		$this->errorMessage = "La generación de serial creo una serie ya existente";
	}
}
