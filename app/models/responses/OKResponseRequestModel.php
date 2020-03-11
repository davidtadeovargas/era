<?php

namespace App\models\request;

class OKResponseRequestModel extends ResponseRequestModel {
	
	public $message;
	public $meta;
	
	public function __construct(){
		parent::__construct();
		
		$this->responseStatus = "ok";
	}
}
