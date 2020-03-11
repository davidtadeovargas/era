<?php

namespace App\models\data;

class PaymentResponseDataModel extends BaseDataModel {

	public $ID;
	public $Status;
	public $Amount;
	public $Order;
	public $CODE;
	public $CardInfo;


	public function __construct(){		
		parent::__construct();
	}
}
