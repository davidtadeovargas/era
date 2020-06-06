<?php

namespace App\models\data\test_company;

class Customer1TestDataModel {

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
        $this->companyCode = "EMP1";
        $this->nom = "Distribuidora mercantil s.a de c.v.";
        $this->tel = "3314404040";
        $this->calle = "Av insurgentes sur";
        $this->col = "Condesa";
        $this->curp = "VAVY910708LNE";
        $this->CP = "445959";
        $this->ciu = "DF";
        $this->estad = "DF";
        $this->pai = "MEXICO";
        $this->RFC = "VAVY910708LNE";
        $this->pagweb1 = "www.distribuidoramercantil.com";
        $this->noint = "10";
        $this->noext = "1515";
        $this->list = 1;
        $this->estac = "ESTAC1";
        $this->sucu = "SUC1";
        $this->nocaj = "CAJ1";
	}
}
