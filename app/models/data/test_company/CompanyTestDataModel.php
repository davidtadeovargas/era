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
		$this->lugexp = "Guadalajara";
		$this->calle = "Calle de pruebas";				
		$this->col = "Colonia de pruebas";				
		$this->CP = "44190";
		$this->ciu = "Guadalajara";		
		$this->estad = "Jalisco";
		$this->pai = "Mexico";
		$this->RFC = "XAXX010101000";
		$this->corr = "email@hotmail.com";
		$this->pagweb = "www.misitio.com";
		$this->noint = "A";
		$this->noext = "1000";
		$this->regfisc = "F";
		$this->bd = "era_db_test";
	}
}
