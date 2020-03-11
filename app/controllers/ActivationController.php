<?php

use App\repository\Repository;

class ActivationController extends BaseController {

	public function activateLicense()
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

			//Validate that the computer does not exists yet in a license
			$computerHasLicense = Repository::getInstance()->getLicenseRepository()->computerExistsInLicense($computerIDD);
			if($computerHasLicense){
				return json_encode(new  App\models\request\ErrorUserAlreadyHasLicenseResponseRequestModel());
			}

			//Validate that the license user has available number of computers
			$freeUsers = Repository::getInstance()->getLicenseRepository()->getFreeUsersForLicense($serie);
			if($freeUsers==0){
				return json_encode(new  App\models\request\ErrorUserWithNoMoreLicensesResponseRequestModel());
			}

			//Add the computer user for the license
			Repository::getInstance()->getLicenseRepository()->activateLicense($serie,$computerIDD);
			
			$Computer = Repository::getInstance()->getComputerRepository()->getByComputerIDD($computerIDD);
			if(!$Computer){
				return json_encode(new  App\models\request\ErrorComputerNotExistsResponseRequestModel());	
			}

			//Save the history
			Repository::getInstance()->getUserHistoryRepository()->saveActivationLicenseInComputer($User->id,$Computer->id,$serie);

			//Return success to the user
			return json_encode(new  App\models\request\OKResponseRequestModel());
		}
		catch(Exception $e){

			return json_encode(new  App\models\request\ErrorExceptionResponseRequestModel($e->getMessage()));	
		}
	}
}
