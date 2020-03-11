<?php

use App\repository\Repository;
use App\managers\EmailSendManager;

class RegisterController extends BaseController {

	public function registerUser()
	{
		try{

			$request = \Input::all();
			
			//Validate that all the input is properly filled
			$valid = true;
			if(!array_key_exists("user", $request)){
				$valid = false;
			}
			if(!$valid){
				return json_encode(new  App\models\request\ErrorParametersResponseRequestModel());
			}
			$user = $request["user"];
			if(!array_key_exists("name", $user)){
				$valid = false;
			}
			if(!array_key_exists("email", $user)){
				$valid = false;
			}
			if(!array_key_exists("password", $user)){
				$valid = false;
			}
			if(!$valid){
				return json_encode(new  App\models\request\ErrorParametersResponseRequestModel());
			}			

			$name = $user["name"];
			$email = $user["email"];
			$password = $user["password"];

			//Validate the length of the params
			if(strlen($name)>50){
				return json_encode(new  App\models\request\ErrorInvalidParamLengthResponseRequestModel());
			}
			if(strlen($email)>70){
				return json_encode(new  App\models\request\ErrorInvalidParamLengthResponseRequestModel());
			}
			if(strlen($password)>20){
				return json_encode(new  App\models\request\ErrorInvalidParamLengthResponseRequestModel());
			}

			//The user should no exits
			$User = Repository::getInstance()->getUserRepository()->getUser($email);
			if($User){
				return json_encode(new  App\models\request\ErrorUserExistsResponseRequestModel());	
			}

			//Generate the hash for email link validation
			$hash = uniqid ("ERA", true);

			//Save the new user in the database
			$User = Repository::getInstance()->getUserRepository()->newUser($name,"",$email,$password,$hash);
			
			//Save history
			Repository::getInstance()->getUserHistoryRepository()->saveUserRegister($User->id);

			//Create the view model for the email
			$RegistrationEmailViewModel = new App\models\viewmodels\RegistrationEmailViewModel();
			$RegistrationEmailViewModel->link = Config::get('app_globals.server')."/activate_email?id=".$hash."&token=".Config::get('app_globals.token');
			$RegistrationEmailViewModel->User = $User;
			
			//Create email data model
			$EmailDataModel = new App\models\data\EmailDataModel();
			$EmailDataModel->emailTo = $User->email;
			$EmailDataModel->subject = "Gracias por registrarte con nosotros Easy Retail Admin!";
			$EmailDataModel->viewName = "registrationEmail";
			$EmailDataModel->model = $RegistrationEmailViewModel;
			$EmailDataModel->emailTypeRegister = true;

			//Send the email
		 	EmailSendManager::getInstance()->setEmailDataModel($EmailDataModel)->send();
		 	
		 	//Return success to the user
			return json_encode(new  App\models\request\OKResponseRequestModel());
		}
		catch(Exception $e){

			return json_encode(new  App\models\request\ErrorExceptionResponseRequestModel($e->getMessage()));	
		}
	}	
}
