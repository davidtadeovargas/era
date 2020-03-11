<?php

namespace App\models\data;

class RestoreCredentialsEmailDataModel extends EmailDataModel
{    
	public function __construct(){
		parent::__construct();

		$this->subject = "Cambio de contrasñas en tu portal";
		$this->viewName = "restoreCredentialsEmail";
		$this->emailTypeRestoreCredentials = true;
	}
}