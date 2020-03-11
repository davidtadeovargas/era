<?php

namespace App\models\request;

class GetComputerStatusResponseRequestModel extends OKResponseRequestModel {
	
	public $email;
	public $name;
	public $serie;
	public $numberComputers;
	public $computerCreatedAt;
	public $channel;
	public $remainingDays;
	public $genericSerial;
	public $PremiumFuntionsDataModel;

	public $TestCompanyDataModel;

	public function __construct(){
		parent::__construct();
	}
}
