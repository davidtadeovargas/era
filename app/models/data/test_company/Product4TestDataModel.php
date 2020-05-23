<?php

namespace App\models\data\test_company;

class Product4TestDataModel {

	public $codeProduct;
	public $keySAT;
	public $unit;
	public $codeTax;
	public $description;
	public $estation;
	public $branchOffice;
	public $numberCash;
	public $isForSale;
	public $pathIMG;	

	public function __construct(){

		//Create the object
		$this->codeProduct = 'DANFRES15';
		$this->keySAT = 'DANFRES15SAT';
		$this->unit = "PIEZA";
		$this->codeTax = "IVA";
		$this->description = "Danone fresa liquido 15ml";
		$this->estation = "ESTAC1";
		$this->branchOffice = "SUC1";
		$this->numberCash = "1";
		$this->isForSale = 1;
		$this->pathIMG = "http://easyretail.com.mx/company_test/products/danonino.jpg";
	}
}
