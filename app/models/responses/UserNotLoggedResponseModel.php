<?php

namespace App\models\request;

class UserNotLoggedResponseModel extends ResponseRequestModel {
	
	public function __construct(){

		parent::__construct();
		
		$this->responseStatus = "USER_NOT_LOGGED_RESPONSE";		
	}
}
