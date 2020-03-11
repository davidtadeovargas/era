<?php

namespace App\models\request;

class ErrorResponseRequestModel extends ResponseRequestModel {
	
	public function __construct(){
		parent::__construct();
		
		$this->responseStatus = "error";	
	}
}
