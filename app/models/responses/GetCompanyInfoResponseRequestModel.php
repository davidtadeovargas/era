<?php

namespace App\models\request;

class GetCompanyInfoResponseRequestModel extends OKResponseRequestModel {
	
	public $userID;
	public $companyName;
	public $companyCode;
	public $phone;
	public $phoneDeliver;
	public $expedPlace;
	public $personalPhone1;
	public $personalPhone2;
	public $street;
	public $celen;
	public $certificatePassword;
	public $streetDeliver;
	public $colony;
	public $colonyDeliver;
	public $ladaDeliver;
	public $cp;
	public $cpDeliver;
	public $city;
	public $cityDeliver;
	public $estate;
	public $contactDeliver3;
	public $contactDeliver2;
	public $contactDeliver1;
	public $estateDeliver;
	public $country;
	public $countryDeliver;
	public $rfc;
	public $email;
	public $website;
	public $interiorNumber;
	public $interiorNumberDeliver;
	public $externalNumber;
	public $pathCert;
	public $externalNumberDeliver;
	public $pathCertKey;
	public $moralOrPhisic;
	public $estation;
	public $appPath;

	public function __construct(){

		parent::__construct();
	}
}
