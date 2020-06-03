<?php

namespace App\models\data\test_company;

class Product5TestDataModel {

	public $code;
	public $keySAT;
	public $unit;
	public $codeTax;
	public $description;
	public $estac;
	public $sucu;
	public $nocaj;
	public $isForSale;
	public $pathIMG;

	public function __construct(){

		//Create the object
		$this->code = 'JAMFOOD100';
		$this->keySAT = 'JAMFOOD100SAT';
		$this->unit = "PIEZA";
		$this->codeTax = "IVA";
		$this->description = "Jamon food de pavo 100gm";
		$this->estac = "ESTAC1";
		$this->sucu = "SUC1";
		$this->nocaj = "1";
		$this->isForSale = 1;
		$this->pathIMG = "http://easyretail.com.mx/company_test/products/jamonfood.jpg";
	}
}
