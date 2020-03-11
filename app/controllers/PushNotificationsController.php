<?php

use App\models\request\ErrorParametersResponseRequestModel;
use App\repository\Repository;
use App\models\request\ErrorExceptionResponseRequestModel;
use App\managers\ViewModelManager;

class PushNotificationsController extends BaseController {

	public $bannerFile;
	public $bannerAction;
	public $channel = "era";




	public function showPushNotificationsLog()
	{
		try{

			//Get the user
			$User = Repository::getInstance()->getUserRepository()->getUserFromSession();
			if(!$User){
				return json_encode(new  App\models\request\ErrorUserNotExistsResponseRequestModel());
			}

			//Create the view model
			$PushNotificationsLogViewModel = ViewModelManager::getInstance()->getPushNotificationsLogViewModel();

			//Get the pussh notifications logs
			$logs = Repository::getInstance()->getPushNotificationsAutomatedLogRepository()->getAllFormated();
			$PushNotificationsLogViewModel->logs = $logs;
			
			//Return the view
			return View::make('home/push_notifications_log')->with('model', $PushNotificationsLogViewModel);

		}catch(Exception $e){

			return json_encode(new  App\models\request\ErrorExceptionResponseRequestModel($e->getMessage()));	
		}
	}

	public function sendMessage()
	{
		try{
			
    		$request = \Input::all();

    		//Validate that all the input is properly filled						
			/*if(!array_key_exists('bannerFile', $request)){
				$ErrorParametersResponseRequestModel = new ErrorParametersResponseRequestModel();
				$ErrorParametersResponseRequestModel->field = "bannerFile";
				return json_encode($ErrorParametersResponseRequestModel);
			}
			if(!array_key_exists("bannerAction", $request)){
				$ErrorParametersResponseRequestModel = new ErrorParametersResponseRequestModel();
				$ErrorParametersResponseRequestModel->field = "bannerAction";
				return json_encode($ErrorParametersResponseRequestModel);
			}			

			//Get the variables
			$bannerFile = $request["bannerFile"];
			$bannerAction = $request["bannerAction"];*/

			//Send the push notification
			$options = array(
			    'cluster' => 'us2',
			    'useTLS' => true
			);
			$pusher = new Pusher\Pusher(
			    '61e2e7c9033d9ac84aef', //904e03827b9aa4ad55cf
			    'bd6c838c847ddf59f5c9', //1092dd5e8f13473563e5
			    '940375', //919138
			    $options
			);

			//Create the json response
			$json = array();
			$json["urlBanner"] = $this->bannerFile;
			$json["bannerAction"] = $this->bannerAction;

			//Trigger the messagte to push server
			$data['message'] = json_encode($json);
			$res = $pusher->trigger($this->channel, 'main-event', $data);

			//Return success to the user			
			return $res;

		}catch(Exception $e){

			return json_encode(new ErrorExceptionResponseRequestModel($e->getMessage()));	
		}
	}


	public function saveAutomatedMessage()
	{
		try{

			//Get json request
    		$request = \Input::all();

    		//Validate that all the input is properly filled			
			$valid = true;
			if(!Input::hasFile('bannerFile')){
				$ErrorParametersResponseRequestModel = new ErrorParametersResponseRequestModel();
				$ErrorParametersResponseRequestModel->field = "bannerFile";
				return json_encode($ErrorParametersResponseRequestModel);
			}
			if(!array_key_exists("bannerAction", $request)){
				$ErrorParametersResponseRequestModel = new ErrorParametersResponseRequestModel();
				$ErrorParametersResponseRequestModel->field = "bannerAction";
				return json_encode($ErrorParametersResponseRequestModel);
			}
			if(!array_key_exists('fromDate', $request)){
				$ErrorParametersResponseRequestModel = new ErrorParametersResponseRequestModel();
				$ErrorParametersResponseRequestModel->field = "fromDate";
				return json_encode($ErrorParametersResponseRequestModel);
			}
			if(!array_key_exists("toDate", $request)){
				$ErrorParametersResponseRequestModel = new ErrorParametersResponseRequestModel();
				$ErrorParametersResponseRequestModel->field = "toDate";
				return json_encode($ErrorParametersResponseRequestModel);
			}
			if(!array_key_exists('everyday', $request)){
				$ErrorParametersResponseRequestModel = new ErrorParametersResponseRequestModel();
				$ErrorParametersResponseRequestModel->field = "everyday";
				return json_encode($ErrorParametersResponseRequestModel);
			}
			if(!array_key_exists("channelID", $request)){
				$ErrorParametersResponseRequestModel = new ErrorParametersResponseRequestModel();
				$ErrorParametersResponseRequestModel->field = "channelID";
				return json_encode($ErrorParametersResponseRequestModel);
			}
			
			//Get the user data from the session
			$User = Repository::getInstance()->getUserRepository()->getUserFromSession();
			if(!$User){
				return json_encode(new  App\models\request\ErrorUserNotExistsResponseRequestModel());
			}

			//Get the variables
			$bannerAction = $request["bannerAction"];
			$fromDate = $request["fromDate"];
			$toDate = $request["toDate"];
			$bannerAction = $request["bannerAction"];
			$channelID = $request["channelID"];
			$everyday = $request["everyday"];			

			//Create the banners folder if does not exists
			$bannersPath = public_path()."/banners";
			if(!file_exists($bannersPath)){
				mkdir($bannersPath);  
			}			

			//Move the banner to banners folder
			$name = Input::file('bannerFile')->getClientOriginalName();
			$newName = uniqid(rand (),true).".png";
			Input::file('bannerFile')->move($bannersPath, $newName);
			
			$bannerFile = \Config::get('app_globals.server')."/banners/".$newName;			

			//Save the information in the database
			$PushNotificationAutomated = new \PushNotificationAutomated();
			$PushNotificationAutomated->bannerFile = $bannerFile;
			$PushNotificationAutomated->bannerAction = $bannerAction;
			$PushNotificationAutomated->from = $fromDate;
			$PushNotificationAutomated->to = $toDate;
			$PushNotificationAutomated->everyday = $everyday?1:0;
			$PushNotificationAutomated->channel_id = $channelID;
			$PushNotificationAutomated = Repository::getInstance()->getPushNotificationsAutomatedRepository()->add($PushNotificationAutomated);

			//Get the message formated
			$PushNotificationAutomated = Repository::getInstance()->getPushNotificationsAutomatedRepository()->getFormated($PushNotificationAutomated);

			$result = array();
			$result["id"] = $PushNotificationAutomated->id;
			$result["channel_id"] = $PushNotificationAutomated->channel_id;
			$result["everyday"] = $PushNotificationAutomated->everyday;
			$result["from"] = $PushNotificationAutomated->from;
			$result["to"] = $PushNotificationAutomated->to;
			$result["bannerAction"] = $PushNotificationAutomated->bannerAction;
			$result["bannerFile"] = $PushNotificationAutomated->bannerFile;
			$result["created_at"] = $PushNotificationAutomated->created_at;
			$result["updated_at"] = $PushNotificationAutomated->updated_at;			

			//Return the model
			$OKResponseRequestModel = new App\models\request\OKResponseRequestModel();
			$OKResponseRequestModel->message = $result;
			return json_encode($OKResponseRequestModel);

		}catch(Exception $e){

			return json_encode(new ErrorExceptionResponseRequestModel($e->getMessage()));	
		}
	}


	public function deleteAutomated()
	{
		try{

			//Get json request
    		$request = \Input::all();

    		//Validate that all the input is properly filled			
			$valid = true;
			if(!array_key_exists("id", $request)){
				$ErrorParametersResponseRequestModel = new ErrorParametersResponseRequestModel();
				$ErrorParametersResponseRequestModel->field = "id";
				return json_encode($ErrorParametersResponseRequestModel);
			}			
			
			//Get the user data from the session
			$User = Repository::getInstance()->getUserRepository()->getUserFromSession();
			if(!$User){
				return json_encode(new  App\models\request\ErrorUserNotExistsResponseRequestModel());
			}

			//Get the variables
			$id = $request["id"];

			//Delete the record from the database
			$res = Repository::getInstance()->getPushNotificationsAutomatedRepository()->deleteById($id);

			//Return the model
			$OKResponseRequestModel = new App\models\request\OKResponseRequestModel();
			$OKResponseRequestModel->message = $res;
			return json_encode($OKResponseRequestModel);

		}catch(Exception $e){

			return json_encode(new ErrorExceptionResponseRequestModel($e->getMessage()));	
		}
	}
}
