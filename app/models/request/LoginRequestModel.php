<?php

namespace App\models\request;

class LoginRequestModel extends BaseRequestModel {

	public $loginDataModel;


	public function __construct(){		
		parent::__construct();
	}
}
