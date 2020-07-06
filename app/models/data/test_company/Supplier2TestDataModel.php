<?php

namespace App\models\data\test_company;

class Supplier2TestDataModel {

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
        $this->code="PROV2";
        $this->serie="PROV";
        $this->name="Distribuidora sajor de mexico s.a de c.v.";
        $this->phone="333050506959";
        $this->street="Av del venado";
        $this->colony="Ayala";
        $this->cp="47886";
        $this->city="GUADALAJARA";
        $this->estate="JALISCO";
        $this->country="MEX";
        $this->rfc="VAVY910708LND";
        $this->webpage1="www.sajortusistema.com";
        $this->interiorNumber="10";
        $this->externalNumber="1515";
        $this->estac="ESTAC1";
        $this->sucu="SUC1";
        $this->nocaj="CAJ1";
	}
}
