<?php

namespace App\repository;

use App\models\data\PremiumFuntionsDataModel;

class SeriesXUserRepository extends Repository {
	
	public function __construct(){		
	}

	//Get the model by userID
	public function getByUserID($userID){

		//Find and return the model
		$SeriesXUsers = \SeriesXUser::where("userID","=",$userID)->get();
		return $SeriesXUsers;
	}

	//Get the model by id
	public function getByID($id){

		//Find and return the model
		$SeriesXUser = \SeriesXUser::where("id","=",$id)->first();
		return $SeriesXUser;
	}

	
	//Get the premium functions from license
	public function getPremiumFunctions($id){
		
		//Find the model
		$SeriesXUser = \SeriesXUser::where("id","=",$id)->first();

		//Initially the user has premium funcions active
		$PremiumFuntionsDataModel = new PremiumFuntionsDataModel();
		$PremiumFuntionsDataModel->premium = true;
		$PremiumFuntionsDataModel->sendToOnlyOneDestinataryInFact = false;
		$PremiumFuntionsDataModel->onlyUseIVATax = false;
		$PremiumFuntionsDataModel->onlyOneSerieForDocument = false;
		$PremiumFuntionsDataModel->disableInvoiceTicketsWindow = false;

		if(!$SeriesXUser){ //Has no licence
			
			//Get the period of used system
			$date1 = strtotime($SeriesXUser->created_at);  
			$date2 = strtotime(date("Y-m-d"));
			$diff = abs($date2 - $date1); 
			$years = floor($diff / (365*60*60*24));  
			$months = floor(($diff - $years * 365*60*60*24) 
                               / (30*60*60*24));
			$days = floor(($diff - $years * 365*60*60*24 -  
             $months*30*60*60*24)/ (60*60*24)); 

			if($days>30){
				$PremiumFuntionsDataModel->premium = false;
				$PremiumFuntionsDataModel->sendToOnlyOneDestinataryInFact = true;
				$PremiumFuntionsDataModel->onlyUseIVATax = true;
				$PremiumFuntionsDataModel->onlyOneSerieForDocument = true;
				$PremiumFuntionsDataModel->disableInvoiceTicketsWindow = true;
			}					
		}		

		return $PremiumFuntionsDataModel;
	}	

	//Add user computer to license
	public function addLicenseToUser($userID, $serie, $numberComputers,$paymentID){
		
		//Create the model and save it
		$SeriesXUser = new \SeriesXUser();
		$SeriesXUser->userID = $userID;
		$SeriesXUser->serie = $serie;
		$SeriesXUser->numberComputers = $numberComputers;
		$SeriesXUser->paymentID = $paymentID;		
		$SeriesXUser->save();

		//Return the created model
		return $SeriesXUser;
	}

	//Get the model by serie
	public function getBySerie($serie){

		//Get the model by serie and return it
		$SeriesXUser = \SeriesXUser::where("serie","=",$serie)->first();
		return $SeriesXUser;
	}

	//Get all the series from user
	public function getAllByUserID($userID){

		//Get the models by user id and return them
		$series = \SeriesXUser::where("userID","=",$userID)->get();
		return $series;
	}

	//Get the total of used users for the license
	public function getTotalSerieUsedComputers($serie){

		//Get series x user
		$SeriesXUser = \SeriesXUser::where("serie","=",$serie)->first();

		//Get the total used for the license and return it
		$count = \License::where("seriesXUserID","=",$SeriesXUser->id)->count();
		return $count;
	}
}
