<?php

namespace App\models\request;

class ErrorInvalidNumberLengthResponseRequestModel extends ResponseRequestModel {
	
	public $field;



	public function __construct(){

		parent::__construct();		
		$this->init();
	}

	public function init(){
		$this->errorCode = "INVALID_NUMBER_LENGTH_ERROR";
		$this->errorMessage = "Longitud de número invalida";
	}
}
