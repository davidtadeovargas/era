<?php

namespace App\models\viewmodels;

class RegistrationEmailViewModel extends BaseViewModel {

	public $link;
	public $User;


	public function __construct(){		
		parent::__construct();
	}
}
