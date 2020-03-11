<?php

namespace App\repository;

class PushNotificationsAutomatedRepository extends Repository {
	
	public function __construct(){		
	}
	
	public function add($PushNotificationAutomated){

		//Save the model
		$PushNotificationAutomated->save();

		//Return the created model
		return $PushNotificationAutomated;
	}

	public function getAll(){
		
		$records = \PushNotificationAutomated::all();

		//Return the created model
		return $records;
	}

	public function deleteById($id){
		
		$PushNotificationAutomated = $this->getById($id);

		$res = -1;
		if($PushNotificationAutomated){
			$res = $PushNotificationAutomated->delete();
		}

		//Return the created model
		return $res;
	}

	public function getById($id){
		
		//Get the model and return it		
		$PushNotificationAutomated = \PushNotificationAutomated::find($id); 
		return $PushNotificationAutomated;
	}

	public function messageSend($id){
		
		//Get the model and return it		
		$PushNotificationAutomated = $this->getById($id);
		$PushNotificationAutomated->send = true;
		$PushNotificationAutomated->save();
		
		return $PushNotificationAutomated;
	}

	public function getAllFormated(){
		
		$records = \PushNotificationAutomated::all();

		$recordsFormated = array();
		foreach($records as $record){

			//Get the channel 
		    $Channel = Repository::getInstance()->getChannelsRepository()->getById($record->channel_id);

			$PushNotificationAutomated = $this->getFormated($record);
			
			array_push($recordsFormated, $PushNotificationAutomated);
		}

		//Return the created model
		return $recordsFormated;
	}

	public function getFormated($PushNotificationAutomated){
		
		//Get the channel 
	    $Channel = Repository::getInstance()->getChannelsRepository()->getById($PushNotificationAutomated->channel_id);
		$PushNotificationAutomated_ = new \PushNotificationAutomated();
		$PushNotificationAutomated_->id = $PushNotificationAutomated->id;
		$PushNotificationAutomated_->channel_id = $Channel->name;
		$PushNotificationAutomated_->everyday = $PushNotificationAutomated->everyday==1?"Si":"No";
		$PushNotificationAutomated_->from = $PushNotificationAutomated->from;
		$PushNotificationAutomated_->to = $PushNotificationAutomated->to;
		$PushNotificationAutomated_->bannerAction = $PushNotificationAutomated->bannerAction;
		$PushNotificationAutomated_->bannerFile = $PushNotificationAutomated->bannerFile;
		$PushNotificationAutomated_->created_at = $PushNotificationAutomated->created_at;
		$PushNotificationAutomated_->updated_at = $PushNotificationAutomated->updated_at;

		return $PushNotificationAutomated_;
	}

	public function getAllForToday(){
		
		$results = \DB::select(\DB::raw("SELECT * FROM push_notifications_automated 
										WHERE everyday = 1 
										AND everyDayAt <= DATE_FORMAT(NOW(), '%T') 
										AND send = 0") );				
		return $results;
	}


	public function getAllForAvailableDates(){
		
		$results = \DB::select(\DB::raw("SELECT * FROM push_notifications_automated 
										WHERE everyday = 0 
										AND (DATE(NOW()) >= DATE(`from`) AND DATE(NOW()) <= DATE(`from`)) 
										AND everyDayAt >= DATE_FORMAT(NOW(),'%T') 
										AND send = 0") );				
		return $results;
	}
}
