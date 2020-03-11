<?php

namespace App\repository;

class EmailTypeRepository extends Repository {
	
	public function __construct(){		
	}

	//Get the especific model for registration
	public function getRegistrationEmailType(){

		//Get the model and return it
		$EmailType = \EmailType::where('name', '=', "REGISTRO")->first();
		return $EmailType;
	}

	//Get the especific model for license purchase
	public function getCompraLicenciaEmailType(){

		//Get the model and return it			
		$EmailType = \EmailType::where('name', '=', "COMPRA DE LICENCIA")->first();
		return $EmailType;
	}

	public function getRestorePasswordEmailType(){

		//Get the model and return it			
		$EmailType = \EmailType::where('name', '=', "CAMBIO DE CONTRASEÑA")->first();
		return $EmailType;
	}

	public function getTestEmailType(){

		//Get the model and return it			
		$EmailType = \EmailType::where('name', '=', "PRUEBA DE CORREO")->first();
		return $EmailType;
	}
}
