<?php

namespace App\models\data;

class TestEmailDataModel extends EmailDataModel
{    
	public function __construct(){
		parent::__construct();

		$this->subject = "Prueba";
		$this->viewName = "testEmail";
		$this->emailTypeTest = true;
	}
}