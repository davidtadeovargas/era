<?php

namespace App\models\data\test_company;

class Customer5TestDataModel {

	public $companyCode;	
	public $nom;
	public $tel;
	public $calle;
	public $col;
	public $curp;
	public $CP;	
	public $ciu;	
	public $estad;	
	public $pai;	
	public $RFC;
	public $pagweb1;
	public $noint;
	public $noext;
	public $list;
	public $estac;
	public $sucu;
	public $nocaj;

	public function __construct(){

		//Create the object		
        $this->companyCode="EMP5";
        $this->nom="Cartuilinas y articulos de oficina";
        $this->tel="3316384884";
        $this->calle="Mexicaltzingo";
        $this->col="Americana";
        $this->curp="VAVY910708LNA";
        $this->CP="47886";
        $this->ciu="GUADALAJARA";
        $this->estad="JALISCO";
        $this->pai="MEX";
        $this->RFC="VAVY910708LNA";
        $this->pagweb1="www.cartulinasyarticulosoficina.com";
        $this->noint="10";
        $this->noext="1515";
        $this->list=1;
        $this->estac="ESTAC1";
        $this->sucu="SUC1";
        $this->nocaj="CAJ1";
	}
}
