<?php

namespace App\models\data\test_company;

use App\models\data\CompanyDataModel;

class CompanyTestDataModel extends CompanyDataModel {

	public $nom;
	public $codemp;
	public $tel;
	public $lugexp;
	public $calle;	
	public $col;
	public $CP;
	public $ciu;
	public $estad;
	public $pai;
	public $RFC;
	public $corr;
	public $pagweb;
	public $noint;
	public $noext;
	public $regfisc;
	public $bd;



	public function __construct(){		
		parent::__construct();

		//Create the object
		$this->nom = "Mi empresa de prueba";
		$this->codemp = uniqid('TESTERA_');
		$this->tel = "0000000000";		
		$this->calle = "Calle de pruebas";				
		$this->col = "Colonia de pruebas";				
		$this->CP = "36000";
		$this->ciu = "Guadalajara";		
		$this->estad = "Jalisco";
		$this->pai = "MEX";
		$this->RFC = "AAA010101AAA";
		$this->corr = "email@hotmail.com";
		$this->pagweb = "www.misitio.com";
		$this->noint = "A";
		$this->noext = "1000";
		$this->lugexp = "20168";
		$this->regfisc = "603";
		$this->contribuyentType = "F";		
		$this->bd = "era_db_test";
	}
}
