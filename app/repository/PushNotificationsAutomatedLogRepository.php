<?php

namespace App\repository;

class PushNotificationsAutomatedLogRepository extends Repository {
	
	public function __construct(){		
	}
	
	public function add($PushNotificationAutomatedLog){

		//Save the model
		$PushNotificationAutomatedLog->save();

		//Return the created model
		return $PushNotificationAutomatedLog;
	}


	public function getAll(){
		
		$records = \PushNotificationAutomatedLog::all();

		//Return the created model
		return $records;
	}

	public function getAllFormated(){
		
		$records = \PushNotificationAutomatedLog::all();

		$recordsFormated = array();
		foreach($records as $record){

			$PushNotificationAutomatedLog = $this->getFormated($record);
			
			array_push($recordsFormated, $PushNotificationAutomatedLog);
		}

		//Return the created model
		return $recordsFormated;
	}

	public function getFormated($PushNotificationAutomatedLog){
		
		//Get the channel 
	    $Channel = Repository::getInstance()->getChannelsRepository()->getById($PushNotificationAutomatedLog->channel_id);
	    
		$PushNotificationAutomatedLog_ = new \PushNotificationAutomatedLog();
		$PushNotificationAutomatedLog_->id = $PushNotificationAutomatedLog->id;
		$PushNotificationAutomatedLog_->channel_id = $Channel->name;
		$PushNotificationAutomatedLog_->everyday = $PushNotificationAutomatedLog->everyday==1?"Si":"No";
		$PushNotificationAutomatedLog_->from = $PushNotificationAutomatedLog->from;
		$PushNotificationAutomatedLog_->to = $PushNotificationAutomatedLog->to;
		$PushNotificationAutomatedLog_->bannerAction = $PushNotificationAutomatedLog->bannerAction;
		$PushNotificationAutomatedLog_->bannerFile = $PushNotificationAutomatedLog->bannerFile;
		$PushNotificationAutomatedLog_->created_at = $PushNotificationAutomatedLog->created_at;
		$PushNotificationAutomatedLog_->updated_at = $PushNotificationAutomatedLog->updated_at;

		return $PushNotificationAutomatedLog_;
	}
}
