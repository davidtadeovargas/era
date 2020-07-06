<?php

namespace App\models\data\test_company;

class Customer3TestDataModel {

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
        $this->companyCode="EMP3";
        $this->nom="Bic plumas s.a de c.v.";
        $this->tel="3395999400";
        $this->calle="Camino al iteso";
        $this->col="Colonia del sol";
        $this->curp="VAVY910708LNC";
        $this->CP="47886";
        $this->ciu="ZAPOPAN";
        $this->estad="JALISCO";
        $this->pai="MEX";
        $this->RFC="VAVY910708LNC";
        $this->pagweb1="www.bictupluma.com";
        $this->noint="10";
        $this->noext="1515";
        $this->list=1;
        $this->estac="ESTAC1";
        $this->sucu="SUC1";
        $this->nocaj="CAJ1";
	}
}
