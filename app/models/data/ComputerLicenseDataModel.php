<?php

namespace App\models\data;

class ComputerLicenseDataModel extends BaseDataModel {

	public $id;
	public $userID;
	public $serie;
	public $name;
	public $computerIDD;
	public $email;
	public $created_at;
	public $channel;
	public $remainingDays;
	public $genericSerial;
	public $asign;
	public $numberComputers;	
	public $CompanyTest;
	public $premium;
	public $Product1;
	public $Product2;
	public $Product3;
	public $Product4;
	public $Product5;	
	public $Customer1;
	public $Customer2;
	public $Customer3;
	public $Customer4;
	public $Customer5;
	public $Supplier1;
	public $Supplier2;
	public $Supplier3;
	public $Supplier4;
	public $Supplier5;	



	public function __construct(){		
		parent::__construct();
	}
}
