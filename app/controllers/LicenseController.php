<?php

use App\repository\Repository;
use App\models\viewmodels\BuyLicenseViewModel;
use App\models\viewmodels\RevoqueLicenseViewModel;
use App\managers\ViewModelManager;

class LicenseController extends BaseController {
	
	public function showBuyLicense()
	{
		try{

			//Get the user
			$User = Repository::getInstance()->getUserRepository()->getUserFromSession();
			if(!$User){
				return json_encode(new  App\models\request\ErrorUserNotExistsResponseRequestModel());
			}

			//Create the view model
			$BuyLicenseViewModel = ViewModelManager::getInstance()->getBuyLicenseViewModel();

			//Get the license info
			$LicensesDataModel = Repository::getInstance()->getLicenseRepository()->getAllLicensesInfo($User->id);
			$BuyLicenseViewModel->LicensesDataModel = $LicensesDataModel;
			
			//Return the view
			return View::make('home/buy_license')->with('model', $BuyLicenseViewModel);

		}catch(Exception $e){

			return json_encode(new  App\models\request\ErrorExceptionResponseRequestModel($e->getMessage()));	
		}
	}

	public function showLicenses()
	{
		try{

			//Get the user
			$User = Repository::getInstance()->getUserRepository()->getUserFromSession();
			if(!$User){
				return json_encode(new  App\models\request\ErrorUserNotExistsResponseRequestModel());
			}

			//Create the view model
			$LicensesViewModel = ViewModelManager::getInstance()->getLicensesViewModel();

			//Get the license info
			$LicensesDataModel = Repository::getInstance()->getLicenseRepository()->getAllLicensesInfo($User->id);
			$LicensesViewModel->LicensesDataModel = $LicensesDataModel;
			
			//Return the view
			return View::make('home/licenses')->with('model', $LicensesViewModel);

		}catch(Exception $e){

			return json_encode(new  App\models\request\ErrorExceptionResponseRequestModel($e->getMessage()));	
		}
	}

	public function testGetPremiumOrNotComputer(){

		//Get params
		$data = Input::all();

		//Get variables
		$computerID = Input::get('computerID');

		$res = Repository::getInstance()->getLicenseRepository()->getPremiumOrNotComputer($computerID);

		if($res){
			echo "true";
		}
		else{
			echo "false";
		}
	}	
}