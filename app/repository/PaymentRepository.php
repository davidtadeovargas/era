<?php

namespace App\repository;

class PaymentRepository extends Repository {
	
	public function __construct(){		
	}

	//Add a new user
	public function addPayment($Payment){

		//Save the model
		$Payment->save();

		//Return the created model
		return $Payment;
	}

	public function getById($id){

		//Get the model and return it
		$Payment = \Payment::where("id","=",$id)->first();
		return $Payment;
	}
}
