<?php

namespace App\models\data\test_company;

class Product5TestDataModel {

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
	public $priceList1;
	public $taxes;

	public function __construct(){

		//Create the object
		$this->code = 'JAMFOOD100';
		$this->name = 'Jamon food de pavo 100gm';
		$this->keySAT = '01010101';
		$this->unit = "PIEZA";
		$this->codeTax = "IVA";
		$this->description = "Jamon food de pavo 100gm";
		$this->estac = "ESTAC1";
		$this->sucu = "SUC1";
		$this->nocaj = "1";
		$this->isForSale = 1;
		$this->pathIMG = "http://easyretail.com.mx/company_test/products/jamonfood.jpg";
		$this->priceList1 = 15.00;
		$this->taxes = array('IVA');
	}
}
