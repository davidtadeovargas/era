<?php

namespace App\models\data;

class LoginDataModel extends BaseDataModel {

	public $user;
	public $password;
	public $redirectTo;	


	public function __construct(){		
		parent::__construct();
	}
}
