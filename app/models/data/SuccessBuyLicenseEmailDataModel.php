<?php

namespace App\models\data;

class SuccessBuyLicenseEmailDataModel extends BaseDataModel {

	public $user;
	public $password;
	public $computers;


	public function __construct(){		
		parent::__construct();
	}	
}
