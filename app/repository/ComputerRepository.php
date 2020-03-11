<?php

namespace App\repository;

use App\models\data\CompanyTestDataModel;

class ComputerRepository extends Repository {
	
	public function __construct(){		
	}

	//Return the model by id
	public function getByID($id){

		//Get the model and return it
		$Computer = \Computer::where("id","=",$id)->first();
		return $Computer;
	}

	//Get all the models by user id
	public function getAllByUserID($userID){

		//Get the models and return them
		$computers = \Computer::where("userID","=",$userID)->get();
		return $computers;
	}

	//Get the model by computer idd
	public function getByComputerIDD($computerIDD){

		//Get the model and return it
		$Computer = \Computer::where("computerIDD","=",$computerIDD)->first();
		return $Computer;
	}

	//Add computer
	public function addComputer($userID,$name,$computerIDD){

		//Create the model and save it
		$Computer = new \Computer();
		$Computer->userID = $userID;
		$Computer->name = $name;
		$Computer->computerIDD = $computerIDD;
		$Computer->save();

		//Return the model
		return $Computer;
	}
}
