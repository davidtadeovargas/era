<?php

namespace App\models\request;

class ErrorComputerNotExistsResponseRequestModel extends ResponseRequestModel {
	
	public function __construct(){

		parent::__construct();
		
		$this->errorCode = "COMPUTER_NOT_EXISTS_ERROR";
		$this->errorMessage = "La computadora no existe";
	}
}
