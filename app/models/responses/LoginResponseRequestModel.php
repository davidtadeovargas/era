<?php

namespace App\models\request;

class LoginResponseRequestModel extends OKResponseRequestModel {
	
	public $redirectTo;	

	public function __construct(){

		parent::__construct();
	}
}
