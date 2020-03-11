<?php

namespace App\models\data\test_company;

class Supplier1TestDataModel {

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
        $this->code = "PROV1";
        $this->serie = "PROV";
        $this->name = "Distribuidora mercantil s.a de c.v.";
        $this->phone = "3314404040";
        $this->street = "Av insurgentes sur";
        $this->colony = "Condesa";        
        $this->cp = "445959";
        $this->city = "DF";
        $this->estate = "DF";
        $this->country = "MEXICO";
        $this->rfc = "VAVY910708LNE";
        $this->webpage1 = "www.distribuidoramercantil.com";
        $this->interiorNumber = "10";
        $this->externalNumber = "1515";        
        $this->estac = "ESTAC1";
        $this->sucu = "SUC1";
        $this->nocaj = "CAJ1";
	}
}
