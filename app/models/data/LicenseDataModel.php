<?php

namespace App\models\data;

class LicenseDataModel extends BaseDataModel {

	public $email;
	public $computerIDD;
	public $serie;
	public $name;
	public $computers; //computers[ComputerModel]
	public $numberComputers;
	public $usedUsers;
	public $freeUsers;
	public $asign = false;
	public $computerCreatedAt;
	public $licenseCreatedAt;


	public function __construct(){		
		parent::__construct();
	}
}
