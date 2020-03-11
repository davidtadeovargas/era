<?php

namespace App\models\viewmodels;

class AdminPanelViewModel extends BaseViewModel {

	public $isAdmin;
	public $home;
	public $today;
	public $channels;
	public $messages;

	public function __construct(){		
		parent::__construct();
	}
}
