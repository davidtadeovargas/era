<?php

namespace App\models\data;

class PaymentDataModel extends BaseDataModel {

	public $name;
	public $card;
	public $cvv;
	public $expMonth;
	public $expYear;
	public $amount;
	public $conektaTokenId;
	public $items;


	public function __construct(){		
		parent::__construct();
	}
}
