<?php

namespace App\models\request;

class ErrorInvalidParamLengthResponseRequestModel extends ResponseRequestModel {
	
	public $field;

	public function __construct(){
		parent::__construct();
		$this->init();
	}

	public function init(){
		$this->errorCode = "INVALID_PARAM_LENGTH_ERROR";
		$this->errorMessage = "Longitud de contenido de parámetro invalida";	
	}
}
