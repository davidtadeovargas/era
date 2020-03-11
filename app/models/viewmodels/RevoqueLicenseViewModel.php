<?php

namespace App\models\viewmodels;

class RevoqueLicenseViewModel extends BaseViewModel {

	public $computers;
	public $licenses;


	public function __construct(){		
		parent::__construct();
	}
}
