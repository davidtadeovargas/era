<?php

namespace App\models\request;

class UserLoggedResponseModel extends ResponseRequestModel {
	
	public function __construct(){

		parent::__construct();
		
		$this->responseStatus = "USER_LOGGED_RESPONSE";		
	}
}
