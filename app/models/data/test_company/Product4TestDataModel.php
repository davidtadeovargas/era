<?php

namespace App\models\data\test_company;

class Product4TestDataModel {

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
		$this->code = 'DANFRES15';
		$this->name = 'Danone fresa liquido 15ml';
		$this->keySAT = '01010101';
		$this->unit = "PIEZA";
		$this->codeTax = "IVA";
		$this->description = "Danone fresa liquido 15ml";
		$this->estac = "ESTAC1";
		$this->sucu = "SUC1";
		$this->nocaj = "1";
		$this->isForSale = 1;
		$this->pathIMG = "http://easyretail.com.mx/company_test/products/danonino.jpg";
		$this->priceList1 = 15.00;
		$this->taxes = array('IVA');
	}
}
