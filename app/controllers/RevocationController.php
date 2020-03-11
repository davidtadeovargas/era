<?php

use App\repository\Repository;
use App\models\viewmodels\RevoqueLicenseViewModel;
use App\managers\ViewModelManager;

class RevocationController extends BaseController {

	public function showRevoqueLicense()
	{
		try{

			//Get the user
			$User = Repository::getInstance()->getUserRepository()->getUserFromSession();
			
			//If any error with the user return error
			if(!$User){
				return json_encode(new  App\models\request\ErrorUserNotExistsResponseRequestModel($e->getMessage()));
			}
			
			//Get the license info
			$LicensesDataModel = Repository::getInstance()->getLicenseRepository()->getAllLicensesInfo($User->id);

			//If the user does not have license yet redirect

			if(sizeof($LicensesDataModel)==0){
				$view = "home/revoque_license_not_license";
			}
			else{
				$view = "home/revoque_license";
			}
			
			//Get the all the existing user computers 
			$computers = Repository::getInstance()->getLicenseRepository()->getComputersLicensesInfo($User->id);
						
			//Get all the licenses for the user
			$series = Repository::getInstance()->getLicenseRepository()->getAllLicensesInfo($User->id);
			
			//Create el viewmodel			
			$RevoqueLicenseViewModel = ViewModelManager::getInstance()->getRevoqueLicenseViewModel();
			$RevoqueLicenseViewModel->computers = $computers;
			$RevoqueLicenseViewModel->series = $series;

			//Return the view
			return View::make($view)->with('model', $RevoqueLicenseViewModel);

		}catch(Exception $e){

			return json_encode(new  App\models\request\ErrorExceptionResponseRequestModel($e->getMessage()));
		}
	}

	public function revoqueLicense()
	{
		try{

			$request = \Input::all();
			
			//Validate that all the input is properly filled
			$valid = true;
			if(!array_key_exists("computerIDD", $request)){
				$valid = false;
			}
			if(!array_key_exists("serie", $request)){
				$valid = false;
			}
			if(!$valid){
				return json_encode(new  App\models\request\ErrorParametersResponseRequestModel());
			}

			//Get the especific data in variables
			$computerIDD = $request["computerIDD"];
			$serie = $request["serie"];

			//The session user should exits
			$User = Repository::getInstance()->getUserRepository()->getUserFromSession();
			if(!$User){
				return json_encode(new  App\models\request\ErrorUserNotExistsResponseRequestModel());	
			}

			//Validate that the serial exists
			$exists = Repository::getInstance()->getLicenseRepository()->serieExists($serie);
			if(!$exists){
				return json_encode(new  App\models\request\ErrorLicenseInfoNotFoundResponseRequestModel());	
			}

			//Validate that the computerIDD exists
			$Computer = Repository::getInstance()->getLicenseRepository()->computerExists($computerIDD);
			if(!$Computer){
				return json_encode(new  App\models\request\ErrorComputerNotExistsResponseRequestModel());	
			}
			
			//Validate that the computer exists in a license
			$computerHasLicense = Repository::getInstance()->getLicenseRepository()->computerExistsInLicense($computerIDD);
			if(!$computerHasLicense){
				return json_encode(new  App\models\request\ErrorUserDoesNotHaveLicenseResponseRequestModel());	
			}
			
			//Remove the computer user from the license
			Repository::getInstance()->getLicenseRepository()->revoqueLicense($serie,$computerIDD);

			$Computer = Repository::getInstance()->getComputerRepository()->getByComputerIDD($computerIDD);
			if(!$Computer){
				return json_encode(new  App\models\request\ErrorComputerNotExistsResponseRequestModel());	
			}

			//Save the history
			Repository::getInstance()->getUserHistoryRepository()->saveRevocationLicenseInComputer($User->id,$Computer->id,$serie);

			//Return success to the user
			return json_encode(new  App\models\request\OKResponseRequestModel());
		}
		catch(Exception $e){

			return json_encode(new  App\models\request\ErrorExceptionResponseRequestModel($e->getMessage()));	
		}
	}
}
