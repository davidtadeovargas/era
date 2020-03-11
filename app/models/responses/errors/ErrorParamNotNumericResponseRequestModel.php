<?php

namespace App\models\request;

class ErrorParamNotNumericResponseRequestModel extends ResponseRequestModel {
	
	public $field;



	public function __construct(){
		parent::__construct();		
		$this->init();
	}

	public function __construct($field){
		parent::__construct();		
		$this->field = $field;
		$this->init();
	}

	public init(){
		$this->errorCode = "PARAM_NOT_NUMERIC_ERROR";
		$this->errorMessage = "El parámetro no es numérico";
	}
}
