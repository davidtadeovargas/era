<?php

namespace App\models\data;

class EmailDataModel extends BaseDataModel {

	public $emailTo;
	public $subject;
	public $viewName;
	public $model;
	public $emailTypeRegister = false;
	public $emailTypeLicensePayment = false;
	public $emailTypeRestoreCredentials = false;
	public $emailTypeTest = false;


	public function __construct(){		
		parent::__construct();
	}
}
