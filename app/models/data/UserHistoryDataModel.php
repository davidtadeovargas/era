<?php

namespace App\models\data;

class UserHistoryDataModel extends BaseDataModel {

	public $user_history_type_id;
	public $userHistoryType;
	public $user_id;
	public $user;
	public $payment_id;
	public $payment;
	public $computer_id;
	public $computer;
	public $product_id;
	public $product;
	public $serie;
	public $created_at;


	public function __construct(){		
		parent::__construct();
	}
}
