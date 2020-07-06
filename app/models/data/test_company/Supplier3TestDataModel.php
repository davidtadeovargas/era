<?php

namespace App\models\data\test_company;

class Supplier3TestDataModel {

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
        $this->code="PROV3";
        $this->serie="PROV";
        $this->name="Bic plumas s.a de c.v.";
        $this->phone="3395999400";
        $this->street="Camino al iteso";
        $this->colony="Colonia del sol";
        $this->cp="47886";
        $this->city="ZAPOPAN";
        $this->estate="JALISCO";
        $this->country="MEX";
        $this->rfc="VAVY910708LNC";
        $this->webpage1="www.bictupluma.com";
        $this->interiorNumber="10";
        $this->externalNumber="1515";
        $this->estac="ESTAC1";
        $this->sucu="SUC1";
        $this->nocaj="CAJ1";
	}
}
