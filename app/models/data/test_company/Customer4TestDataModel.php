<?php

namespace App\models\data\test_company;

class Customer4TestDataModel {

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
        $this->companyCode="EMP4";
        $this->nom="Borradores de mexico s.a de c.v.";
        $this->tel="3348588930";
        $this->calle="Av del iman";
        $this->col="Insurgentes";
        $this->curp="VAVY910708LNB";
        $this->CP="5886885";
        $this->ciu="DF";
        $this->estad="DF";
        $this->pai="MEXICO";
        $this->RFC="VAVY910708LNB";
        $this->pagweb1="www.borradoresdemexico.com";
        $this->noint="10";
        $this->noext="1515";
        $this->list=1;
        $this->estac="ESTAC1";
        $this->sucu="SUC1";
        $this->nocaj="CAJ1";
	}
}
