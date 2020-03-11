<?php

use App\repository\Repository;
use App\models\request\GetComputerStatusResponseRequestModel;
use App\models\viewmodels\DownloadViewModel;
use App\managers\ViewModelManager;
use App\models\request\OKResponseRequestModel;
use App\models\data\UsersHistoryFilersDataModel;

class UsersHistoryController extends BaseController {

	public function showUsersHistory()
	{
		try{

			//Create the model
			$UsersHistoryViewModel = ViewModelManager::getInstance()->getAdminPanelViewModel();		

			//Get all users history types and set it in the view model
			$UserHistoryTypes = Repository::getInstance()->getUserHistoryTypeRepository()->getAll();
			$UsersHistoryViewModel->UserHistoryTypes = $UserHistoryTypes;

			return View::make('home/users_history')->with("model",$UsersHistoryViewModel);

		}catch(Exception $e){

			return json_encode(new  App\models\request\ErrorExceptionResponseRequestModel($e->getMessage()));	
		}
	}

	public function getUsersHistoryByFilter()
	{
		try{

			$request = \Input::all();
			
			//Validate that all the input is properly filled
			$valid = true;
			if(!array_key_exists("usersHistoryType", $request)){
				$ErrorParametersResponseRequestModel = new ErrorParametersResponseRequestModel();
				$ErrorParametersResponseRequestModel->field = "usersHistoryType";
				return json_encode($ErrorParametersResponseRequestModel);
			}
			if(!array_key_exists("user", $request)){
				$ErrorParametersResponseRequestModel = new ErrorParametersResponseRequestModel();
				$ErrorParametersResponseRequestModel->field = "user";
				return json_encode($ErrorParametersResponseRequestModel);
			}
			
			//Get variables
			$usersHistoryType = $request["usersHistoryType"];
			$user = $request["user"];

			//Create the filter data model
			$UsersHistoryFilersDataModel = new UsersHistoryFilersDataModel();
			$UsersHistoryFilersDataModel->usersHistoryType = $usersHistoryType;
			$UsersHistoryFilersDataModel->user = $user;

			//Get all the users history based on filters
			$UserHistories = Repository::getInstance()->getUserHistoryRepository()->getUsersHistoryByFilter($UsersHistoryFilersDataModel);

			//Return response
			$OKResponseRequestModel = new OKResponseRequestModel();
			$OKResponseRequestModel->meta = $UserHistories;
			return json_encode($OKResponseRequestModel);

		}catch(Exception $e){

			return json_encode(new  App\models\request\ErrorExceptionResponseRequestModel($e->getMessage()));	
		}
	}
}
