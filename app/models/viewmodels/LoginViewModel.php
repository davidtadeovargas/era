<?php

namespace App\models\viewmodels;

class LoginViewModel extends BaseViewModel {

	public $redirect;
	public $redirectTo;


	public function __construct(){		
		parent::__construct();
	}
}
