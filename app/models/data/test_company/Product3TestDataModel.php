<?php

namespace App\models\data\test_company;

class Product3TestDataModel {

	public $code;
	public $name;
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
		$this->code = 'TRIDENT72';
		$this->name = 'Trident sin azucar pqte c/2';
		$this->keySAT = '01010101';
		$this->unit = "PIEZA";
		$this->codeTax = "IVA";
		$this->description = "Trident sin azucar pqte c/2";
		$this->estac = "ESTAC1";
		$this->sucu = "SUC1";
		$this->nocaj = "1";
		$this->isForSale = 1;
		$this->pathIMG = "http://easyretail.com.mx/company_test/products/trident.jpg";
	}
}
