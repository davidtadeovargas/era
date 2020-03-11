<?php

namespace App\models\viewmodels;

class PaymentSuccessEmailViewModel extends BaseViewModel {

	public $computers;
	public $licenses;



	public function __construct(){		
		parent::__construct();
	}
}
