<?php

use App\repository\Repository;
use App\models\viewmodels\AdminPanelViewModel;
use App\models\viewmodels\AdminPanelAdminViewModel;
use App\managers\ViewModelManager;

class AdminPanelController extends BaseController {

	public function showAdminPanel()
	{
		try{
			
			//Create the model
			$AdminPanelViewModel = ViewModelManager::getInstance()->getAdminPanelViewModel();

			//Return the view
			return View::make('home/admin_panel')->with('model', $AdminPanelViewModel);

		}catch(Exception $e){

			return json_encode(new  App\models\request\ErrorExceptionResponseRequestModel($e->getMessage()));	
		}
	}

	public function showAdminPanelAdmins()
	{
		try{
			
			//Create the model
			$AdminPanelAdminViewModel = ViewModelManager::getInstance()->getAdminPanelAdminViewModel();		

			//Return the view
			return View::make('home/admin_panel_admins')->with('model', $AdminPanelAdminViewModel);

		}catch(Exception $e){

			return json_encode(new  App\models\request\ErrorExceptionResponseRequestModel($e->getMessage()));	
		}
	}

	public function showPushNotifications()
	{
		try{
			
			//Create the model
			$PushNotificationsViewModel = ViewModelManager::getInstance()->getPushNotificationsViewModel();
			$channels = Repository::getInstance()->getChannelsRepository()->getAll();
			$PushNotificationsViewModel->channels = $channels;
			$PushNotificationsViewModel->messages = Repository::getInstance()->getPushNotificationsAutomatedRepository()->getAllFormated();
			
			//Return the view
			return View::make('home/push_notifications')->with('model', $PushNotificationsViewModel);

		}catch(Exception $e){

			return json_encode(new  App\models\request\ErrorExceptionResponseRequestModel($e->getMessage()));	
		}
	}
}
