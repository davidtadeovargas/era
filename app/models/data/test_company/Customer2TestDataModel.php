<?php

namespace App\models\data\test_company;

class Customer2TestDataModel {

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
        $this->companyCode="EMP2";
        $this->nom="Distribuidora sajor de mexico s.a de c.v.";
        $this->tel="333050506959";
        $this->calle="Av del venado";
        $this->col="Ayala";
        $this->curp="VAVY910708LND";
        $this->CP="47886";
        $this->ciu="GUADALAJARA";
        $this->estad="JALISCO";
        $this->pai="MEX";
        $this->RFC="VAVY910708LND";
        $this->pagweb1="www.sajortusistema.com";
        $this->noint="10";
        $this->noext="1515";
        $this->list=1;
        $this->estac="ESTAC1";
        $this->sucu="SUC1";
        $this->nocaj="CAJ1";
	}
}
