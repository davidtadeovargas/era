<?php

namespace App\models\data\test_company;

class Supplier4TestDataModel {

	public $code;
	public $serie;
	public $name;
	public $phone;
	public $street;
	public $colony;
	public $cp;	
	public $city;	
	public $estate;	
	public $country;	
	public $rfc;
	public $webpage1;
	public $interiorNumber;
	public $externalNumber;
	public $estac;
	public $sucu;
	public $nocaj;

	public function __construct(){

		//Create the object		
        $this->code="PROV4";
        $this->serie="PROV";
        $this->name="Borradores de mexico s.a de c.v.";
        $this->phone="3348588930";
        $this->street="Av del iman";
        $this->colony="Insurgentes";
        $this->cp="47886";
        $this->city="DF";
        $this->estate="DF";
        $this->country="MEX";
        $this->rfc="VAVY910708LNB";
        $this->webpage1="www.borradoresdemexico.com";
        $this->interiorNumber="10";
        $this->externalNumber="1515";
        $this->estac="ESTAC1";
        $this->sucu="SUC1";
        $this->nocaj="CAJ1";
	}
}
