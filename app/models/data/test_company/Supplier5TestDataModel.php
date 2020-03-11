<?php

namespace App\models\data\test_company;

class Supplier5TestDataModel {

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
        $this->code="PROV1";
        $this->serie="PROV";
        $this->name="Cartuilinas y articulos de oficina";
        $this->phone="3316384884";
        $this->street="Mexicaltzingo";
        $this->colony="Americana";
        $this->cp="45647";
        $this->city="GUADALAJARA";
        $this->estate="JALISCO";
        $this->country="MEXICO";
        $this->rfc="VAVY910708LNA";
        $this->webpage1="www.cartulinasyarticulosoficina.com";
        $this->interiorNumber="10";
        $this->externalNumber="1515";
        $this->estac="ESTAC1";
        $this->sucu="SUC1";
        $this->nocaj="CAJ1";
	}
}
