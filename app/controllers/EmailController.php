<?php

use App\repository\Repository;
use App\models\viewmodels\TestEmailViewModel;
use App\models\data\TestEmailDataModel;
use App\managers\EmailSendManager;
use App\models\request\ErrorExceptionResponseRequestModel;

class EmailController extends BaseController {

	public function showEmailRegistrationCorrect()
	{
		try{

			//Return the view
			return View::make('home/email_registration_correct');

		}catch(Exception $e){

			return json_encode(new ErrorExceptionResponseRequestModel($e->getMessage()));	
		}
	}

	public function testSendEmail()
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

    		//Create the view model for the email
			$TestEmailViewModel = new TestEmailViewModel();			
			$TestEmailViewModel->User = $User;
			
			//Create email data model
			$TestEmailDataModel = new TestEmailDataModel();			
			$TestEmailDataModel->model = $TestEmailViewModel;
			
			//Send the email
		 	EmailSendManager::getInstance()->setEmailDataModel($TestEmailDataModel)->send();					 	
		 	//Return success to the user
			return json_encode(new App\models\request\OKResponseRequestModel());

		}catch(Exception $e){

			return json_encode(new ErrorExceptionResponseRequestModel($e->getMessage()));	
		}
	}

	public function showEmailRegistrationRepeated()
	{
		try{

			//Return the view
			return View::make('home/email_registration_repeated');

		}catch(Exception $e){

			return json_encode(new ErrorExceptionResponseRequestModel($e->getMessage()));	
		}
	}

	public function activateEmail()
	{
		try{

			$request = \Input::all();
			
			//Validate that all the input is properly filled
			if(!array_key_exists("id", $request)){
				return json_encode(new  App\models\request\ErrorParametersResponseRequestModel());
			}			

			//Get variables
			$id = $request["id"];			

			//Validate that the user exists
			$User = Repository::getInstance()->getUserRepository()->getByHash($id);
			if($User===null){
				return json_encode(new  App\models\request\ErrorUserNotExistsResponseRequestModel());	
			}			

			//Validate if the user is already active
			if($User->emailActive){
				return View::make('home/email_registration_repeated');	
			}

			//Update the activation of the email			
			Repository::getInstance()->getUserRepository()->activateUserEmail($User->id);
			
			//Return success in view
			return View::make('home/email_registration_correct');

		}catch(Exception $e){

			return json_encode(new ErrorExceptionResponseRequestModel($e->getMessage()));	
		}
	}
}
