<?php

namespace App\models\data\test_company;

class Product5TestDataModel {

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
		$this->codeProduct = 'JAMFOOD100';
		$this->keySAT = 'JAMFOOD100SAT';
		$this->unit = "PIEZA";
		$this->codeTax = "IVA";
		$this->description = "Jamon food de pavo 100gm";
		$this->estation = "ESTAC1";
		$this->branchOffice = "SUC1";
		$this->numberCash = "1";
		$this->isForSale = 1;
		$this->pathIMG = "https://sitioweb.lat/imgs/jamonfood.jpg";
	}
}
