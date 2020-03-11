<?php

namespace App\models\request;

class GetComputerStatusRequestModel extends BaseRequestModel {
	
	public $user;
	public $passsword;

	public function __construct(){
		parent::__construct();
		
		$this->responseStatus = "ok";
	}
}
