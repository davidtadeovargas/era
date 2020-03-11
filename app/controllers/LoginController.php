<?php

use App\repository\Repository;
use App\models\viewmodels\RestoreCredentialsViewModel;
use App\models\viewmodels\LoginViewModel;
use  App\models\viewmodels\RestoreCredentialsEmailViewModel;
use App\models\responses\error\ErrorInvalidParamLengthResponseRequestModel;
use App\models\data\RestoreCredentialsEmailDataModel;
use App\managers\EmailSendManager;
use App\models\request\LoginResponseRequestModel;
use App\models\request\ErrorParametersResponseRequestModel;
use App\models\request\ErrorInvalidPWDHashResponseRequestModel;
use App\models\request\ErrorExceptionResponseRequestModel;

class LoginController extends BaseController {

	public function showLogin()
	{
		try{

			//Get if the user has session
			$hasSession = Repository::getInstance()->getUserRepository()->userHasSession();

			$redirect = false;
			$redirectTo = "";

			//If the user has session redirect him to admin panel
			if($hasSession){

				$redirect = true;

				$User = Repository::getInstance()->getUserRepository()->getUserFromSession();
				if(!$User){
					return json_encode(new  App\models\request\ErrorUserNotExistsResponseRequestModel());	
				}

				//Determine if the user is admin or not				
				if($User->admin){
					$redirectTo	= "admin_panel_admins";
				}
				else{
					$redirectTo	= "admin_panel";
				}				
			}
			
			//Create the model
			$LoginViewModel = new LoginViewModel();
			$LoginViewModel->redirect = $redirect;
			$LoginViewModel->redirectTo = $redirectTo;

			//Return view
			return View::make("home/login")->with("model",$LoginViewModel);

		}catch(Exception $e){

			return json_encode(new App\models\request\ErrorExceptionResponseRequestModel($e->getMessage()));
		}
	}

	public function showSendRestoreLoginCredentials()
	{
		try{

			//Return the view
			return View::make('home.send_restore_credentials');

		}catch(Exception $e){

			return json_encode(new App\models\request\ErrorExceptionResponseRequestModel($e->getMessage()));	
		}		
	}

	public function emailCredentials()
	{
		try{

    		//Get json request
    		$request = \Input::all();

			//Validate that all the input is properly filled			
			$valid = true;			
			if(!array_key_exists("user", $request)){				
				$valid = false;
			}
			if(!$valid){
				return json_encode(new App\models\request\ErrorParametersResponseRequestModel());
			}

			//Get all variables
			$email = $request["user"];

			//The user should exits
			$User = Repository::getInstance()->getUserRepository()->getUser($email);
			if(!$User){
				return json_encode(new  App\models\request\ErrorUserNotExistsResponseRequestModel());	
			}

			//Create restore hash for the user
			$User = Repository::getInstance()->getUserRepository()->userRestoreCredentialsHash($email);
			
			//Create the view model for the email
			$RestoreCredentialsEmailViewModel = new RestoreCredentialsEmailViewModel();
			$RestoreCredentialsEmailViewModel->link = \Config::get('app_globals.server')."/restore_credentials?id=".$User->pwdhash."&token=".\Config::get('app_globals.token');
			$RestoreCredentialsEmailViewModel->User = $User;
			
			//Create email data model
			$RestoreCredentialsEmailDataModel = new RestoreCredentialsEmailDataModel();
			$RestoreCredentialsEmailDataModel->emailTo = $User->email;			
			$RestoreCredentialsEmailDataModel->model = $RestoreCredentialsEmailViewModel;

			//Send the email
		 	EmailSendManager::getInstance()->setEmailDataModel($RestoreCredentialsEmailDataModel)->send();					 	
		 	//Return success to the user
			return json_encode(new App\models\request\OKResponseRequestModel());

		}catch(Exception $e){

			return json_encode(new ErrorExceptionResponseRequestModel($e->getMessage()));	
		}
	}

	public function showRestoreLoginCredentials()
	{
		try{

			$request = \Input::all();

			//Validate that all the input is properly filled
			$valid = true;
			if(!array_key_exists("id", $request)){
				$valid = false;
			}
			if(!array_key_exists("token", $request)){
				$valid = false;
			}
			if(!$valid){
				return json_encode(new  App\models\request\ErrorParametersResponseRequestModel());
			}

			//Get variables
			$id = $request["id"];
			$token = $request["token"];

			//Create the viewmodel
			$RestoreCredentialsViewModel = new RestoreCredentialsViewModel();
			$RestoreCredentialsViewModel->pwdhash = $id;

			//Return the view
			return View::make('home.restore_credentials')->with('model', $RestoreCredentialsViewModel);			

		}catch(Exception $e){

			return json_encode(new App\models\request\ErrorExceptionResponseRequestModel($e->getMessage()));	
		}		
	}

	public function restoreCredentials()
	{		
		try{

			$request = \Input::all();

			//Validate that all the input is properly filled
			$valid = true;
			if(!array_key_exists("pwdhash", $request)){
				$valid = false;
			}
			if(!array_key_exists("password2", $request)){
				$valid = false;
			}
			if(!$valid){
				return json_encode(new ErrorParametersResponseRequestModel());
			}			
			
			//Get variables
			$hash = $request["pwdhash"];			
			$password2 = $request["password2"];

			//Validate the length of the params
			if(strlen($password2)>30){
				return json_encode(new ErrorInvalidParamLengthResponseRequestModel());
			}

			//The hash should exists for the user
			$User = Repository::getInstance()->getUserRepository()->getByPWDHash($hash);
			if(!$User){
				return json_encode(new ErrorInvalidPWDHashResponseRequestModel());
			}

			//Change the user password
			$User = Repository::getInstance()->getUserRepository()->updateUserPassword($User->email,$password2);

			//Change the password token to prevent new updates with the same hash
			$User = Repository::getInstance()->getUserRepository()->userRestoreCredentialsHash($User->email);

			//All is fine
			return json_encode(new App\models\request\OKResponseRequestModel());

		}catch(Exception $e){

			return json_encode(new ErrorExceptionResponseRequestModel($e->getMessage()));	
		}
	}

	public function login()
	{
		try{

			$request = \Input::all();
			
			//Validate that all the input is properly filled
			$valid = true;
			if(!array_key_exists("loginDataModel", $request)){
				$valid = false;
			}
			if(!$valid){
				return json_encode(new  App\models\request\ErrorParametersResponseRequestModel());
			}
			$loginDataModel = $request["loginDataModel"];
			if(!array_key_exists("user", $loginDataModel)){
				$valid = false;
			}
			if(!array_key_exists("password", $loginDataModel)){
				$valid = false;
			}			
			if(!$valid){
				return json_encode(new  App\models\request\ErrorParametersResponseRequestModel());
			}
			
			//Get variables
			$user = $loginDataModel["user"];
			$password = $loginDataModel["password"];

			//The user should exits
			$User = Repository::getInstance()->getUserRepository()->getUser($user);
			
			if(!$User){
				return json_encode(new  App\models\request\ErrorUserNotExistsResponseRequestModel());
			}

			//Validate the user credentials
			$valid = Repository::getInstance()->getUserRepository()->validateCredentials($user,$password);
			if(!$valid){
				return json_encode(new  App\models\request\ErrorInvalidLoginResponseRequestModel());
			}

			//Validate if the user already has the email activated
			if(!$User->emailActive){
				return json_encode(new  App\models\request\ErrorEmailNotActivatedYetResponseRequestModel());
			}

			//Create the user session
			Repository::getInstance()->getUserRepository()->createUserSession($user);

			//Save the history
			Repository::getInstance()->getUserHistoryRepository()->saveLoginHistory($User->id);

			//If the user is admin redirect to admin panel
			if(Repository::getInstance()->getUserRepository()->isUserAdmin($user)){
				
				//Return admins view
				$LoginResponseRequestModel = new LoginResponseRequestModel();
				$LoginResponseRequestModel->redirectTo = "admin_panel_admins";
				return json_encode($LoginResponseRequestModel);
			}
			else{

				//Return panel view
				$LoginResponseRequestModel = new LoginResponseRequestModel();
				$LoginResponseRequestModel->redirectTo = "admin_panel";
				return json_encode($LoginResponseRequestModel);
			}

		}catch(Exception $e){

			return json_encode(new  App\models\request\ErrorExceptionResponseRequestModel($e->getMessage()));	
		}
	}

	//Login from ERA
	public function loginLocal()
	{
		try{

			$request = \Input::all();
					

			//Validate that all the input is properly filled
			$valid = true;
			if(!array_key_exists("user", $request)){
				$valid = false;
			}
			if(!array_key_exists("password", $request)){
				$valid = false;
			}
			if(!$valid){
				return json_encode(new  App\models\request\ErrorParametersResponseRequestModel());
			}
			
			//Get variables
			$user = $request["user"];
			$password = $request["password"];

			//The user should exits
			$User = Repository::getInstance()->getUserRepository()->getUser($user);
			if(!$User){
				return json_encode(new  App\models\request\ErrorUserNotExistsResponseRequestModel());
			}

			//Validate the user credentials
			$valid = Repository::getInstance()->getUserRepository()->validateCredentials($user,$password);
			if(!$valid){
				return json_encode(new  App\models\request\ErrorInvalidLoginResponseRequestModel());
			}

			//Create the response model
			$LoginLocalResponseRequestModel = new App\models\request\LoginLocalResponseRequestModel();

			//Return the response model
			return json_encode($LoginLocalResponseRequestModel);

		}catch(Exception $e){

			return json_encode(new  App\models\request\ErrorExceptionResponseRequestModel($e->getMessage()));	
		}
	}

	public function isUserLogged()
	{
		try{

			//Validate if the session  exists and return proper response
			$hasSession = Repository::getInstance()->getUserRepository()->userHasSession();
			if($hasSession){
				return json_encode(new App\models\request\UserLoggedResponseModel());
			}
			else{
				return json_encode(new App\models\request\UserNotLoggedResponseModel());
			}

		}catch(Exception $e){

			return json_encode(new  App\models\request\ErrorExceptionResponseRequestModel($e->getMessage()));	
		}
	}

	public function closeSession()
	{
		try{

			$User = Repository::getInstance()->getUserRepository()->getUserFromSession();
			if(!$User){
				return json_encode(new  App\models\request\ErrorUserNotExistsResponseRequestModel());	
			}
			
			//Removes all session data			
			Repository::getInstance()->getUserRepository()->clearUserSession();			

			//Save history
			Repository::getInstance()->getUserHistoryRepository()->saveCloseSessionRegister($User->id);

			//Return ok
			return json_encode(new  App\models\request\OKResponseRequestModel());			

		}catch(Exception $e){

			return json_encode(new  App\models\request\ErrorExceptionResponseRequestModel($e->getMessage()));	
		}
	}
}
