<?php

namespace App\models\request;

class LicenseInfoResponseRequestModel extends OKResponseRequestModel {
	
	public $serie;
	public $numberComputers;

	public function __construct(){
		parent::__construct();
	}
}
