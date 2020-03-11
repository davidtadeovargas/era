<?php

namespace App\models\viewmodels;

class PushNotificationsViewModel extends BaseViewModel {

	public $channels;
	public $messages;

	public function __construct(){		
		parent::__construct();
	}
}
