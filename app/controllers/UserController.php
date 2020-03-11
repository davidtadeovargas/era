<?php

use App\repository\Repository;
use App\models\viewmodels\BuyLicenseViewModel;
use App\models\viewmodels\RevoqueLicenseViewModel;
use App\managers\ViewModelManager;

class UserController extends BaseController {
	
	public function showPerfil()
	{
		try{

			//Get the user
			$User = Repository::getInstance()->getUserRepository()->getUserFromSession();
			if(!$User){
				return json_encode(new  App\models\request\ErrorUserNotExistsResponseRequestModel());
			}

			//Create the view model
			$PerfilViewModel = ViewModelManager::getInstance()->getPerfilViewModel();			
			$PerfilViewModel->User = $User;

			//Return the view
			return View::make('home/perfil')->with('model', $PerfilViewModel);

		}catch(Exception $e){

			return json_encode(new  App\models\request\ErrorExceptionResponseRequestModel($e->getMessage()));	
		}
	}

	public function updatePerfil()
	{
		try{

			//Get json request
    		$request = \Input::all();

    		//Validate that all the input is properly filled			
			$valid = true;
			if(!array_key_exists("name", $request)){
				$ErrorParametersResponseRequestModel = new ErrorParametersResponseRequestModel();
				$ErrorParametersResponseRequestModel->field = "name";
				return json_encode($ErrorParametersResponseRequestModel);
			}
			if(!array_key_exists('phone', $request)){
				$ErrorParametersResponseRequestModel = new ErrorParametersResponseRequestModel();
				$ErrorParametersResponseRequestModel->field = "phone";
				return json_encode($ErrorParametersResponseRequestModel);
			}
			
			//Get the user data from the session
			$User = Repository::getInstance()->getUserRepository()->getUserFromSession();
			if(!$User){
				return json_encode(new  App\models\request\ErrorUserNotExistsResponseRequestModel());
			}

			//Get the variables
			$name = $request["name"];
			$phone = $request["phone"];			

			
			$usersPath = public_path()."/images/users";

			//Create the user folder if does not exists
			$emailPath = $usersPath."/".$User->email;
			if(!file_exists($emailPath)){
				mkdir($emailPath);  
			}			

			//Move the banner to the folder
			if(Input::hasFile('perfilImageFile')){
				$name = Input::file('perfilImageFile')->getClientOriginalName();				
				Input::file('perfilImageFile')->move($emailPath, "perfil.png");	
			}
								
			//Update the user information
			$User->name = $name;
			$User->phone = $phone;
			Repository::getInstance()->getUserRepository()->updateUser($User);			
						
			$OKResponseRequestModel = new App\models\request\OKResponseRequestModel();			
			return json_encode($OKResponseRequestModel);

		}catch(Exception $e){

			return json_encode(new ErrorExceptionResponseRequestModel($e->getMessage()));	
		}
	}
}