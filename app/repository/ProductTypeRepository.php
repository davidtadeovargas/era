<?php

namespace App\repository;

class ProductTypeRepository extends Repository {
	
	public function __construct(){		
	}
	
	public function getById($id){

		//Get the model and return it		
		$ProductType = \ProductType::find($id); 
		return $ProductType;
	}

	public function getAll(){

		//Get the model and return it
		$ProductTypes = \ProductType::all();
		return $ProductTypes;
	}

	public function getLicenciaType(){	
		$ProductType = \ProductType::where('description', '=', "LICENCIA")->first();
		return $ProductType;
	}

	public function getTimbresType(){	
		$ProductType = \ProductType::where('description', '=', "TIMBRES")->first();
		return $ProductType;
	}

	public function getRevocacionType(){	
		$ProductType = \ProductType::where('description', '=', "REVOCACIÓN")->first();
		return $ProductType;
	}
}
