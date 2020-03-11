<?php

namespace App\repository;

class ChannelsRepository extends Repository {
	
	public function __construct(){		
	}
	
	public function getById($id){

		//Get the model and return it		
		$Channel = \Channel::find($id); 
		return $Channel;
	}

	public function getAll(){

		//Get the model and return it
		$Channels = \Channel::all();
		return $Channels;
	}

	public function getPremimChannel(){
		$Channel = \Channel::where("name","=","PREMIUM")->first();
		return $Channel;
	}

	public function getNotPremiumChannel(){
		$Channel = \Channel::where("name","=","NO PREMIUM")->first();
		return $Channel;
	}
}
