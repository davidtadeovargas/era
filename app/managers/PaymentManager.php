<?php

//https://developers.conekta.com/resources/testing
//https://developers.conekta.com/api?language=php
//https://developers.conekta.com/resources/testing
//https://github.com/conekta/conekta-php

/*
	Testing cards

	number 				token id 					card type
	4242424242424242	tok_test_visa_4242			Visa
	4012888888881881	tok_test_visa_1881			Visa
	5555555555554444	tok_test_mastercard_4444	MasterCard
	5105105105105100	tok_test_mastercard_5100	MasterCard
	378282246310005		tok_test_amex_0005			American Express
	371449635398431		tok_test_amex_8431			American Express

	Debit

	4915669353237603								VISA	
*/

namespace App\managers;

use App\models\request\ErrorInvalidNumberLengthResponseRequestModel;
use App\models\request\ErrorInvalidParamLengthResponseRequestModel;
use App\models\request\OKResponseRequestModel;
use App\models\data\PaymentResponseDataModel;
use App\models\request\ErrorExceptionResponseRequestModel;
use App\repository\Repository;
use App\models\request\ErrorParametersResponseRequestModel;

//public test: key_ONRQY5c3M627RBaU7MbVpHw
//private test: key_PjaykhkEsXKtarciUBaq3w

//public prod: key_Scyv2KbirtkCzfCTjKzbaMQ
//private prod: key_dGjEECRZLxb8MDm1MctZfA

class PaymentManager {

	public $PaymentDataModel;
	public $error = false;
	public $exception;
	public $PaymentResponseDataModel;
	public $Payment;


	
	public function __construct(){
	}

	public function validateLength(){
		
		//Validate the length of the params
		if(strlen($this->PaymentDataModel->name)>60){

			$this->error = true;
			$ErrorInvalidParamLengthResponseRequestModel = new ErrorInvalidParamLengthResponseRequestModel();
			$ErrorInvalidParamLengthResponseRequestModel->field = "name > 60";
			$this->exception = $ErrorInvalidParamLengthResponseRequestModel;
		}
		if(sizeof($this->PaymentDataModel->items)==0){
			$this->error = true;
			$ErrorInvalidParamLengthResponseRequestModel = new ErrorInvalidParamLengthResponseRequestModel();
			$ErrorInvalidParamLengthResponseRequestModel->field = "items == 0";
			$this->exception = $ErrorInvalidParamLengthResponseRequestModel;
		}
		if(strlen($this->PaymentDataModel->cardInfo) < 16 || strlen($this->PaymentDataModel->cardInfo) > 19){
			$this->error = true;
			$ErrorInvalidParamLengthResponseRequestModel = new ErrorInvalidParamLengthResponseRequestModel();
			$ErrorInvalidParamLengthResponseRequestModel->field = "cardInfo < 16 || > 19";
			$this->exception = $ErrorInvalidParamLengthResponseRequestModel;
		}
	}

	public function validateNumerics(){

		//Validate that some fields that should contain numeric values
		if(!is_numeric($this->PaymentDataModel->cvv)){
			$this->error = true;
			$this->exception = new  App\models\request\ErrorParamNotNumericResponseRequestModel("cvv not numeric");
		}
		if(!is_numeric($this->PaymentDataModel->expMonth)){
			$this->error = true;
			$this->exception = new  App\models\request\ErrorParamNotNumericResponseRequestModel("expMonth not numeric");
		}
		if(!is_numeric($this->PaymentDataModel->expYear)){
			$this->error = true;
			$this->exception = new  App\models\request\ErrorParamNotNumericResponseRequestModel("expYear not numeric");
		}
	}

	public function validateLenghtNumerics(){

		//Validate that some fields be compliant with numeric lenght requirement
		if(!(intval($this->PaymentDataModel->expMonth) >= 1 && intval($this->PaymentDataModel->expMonth) <= 12)){
			$this->error = true;
			$ErrorInvalidNumberLengthResponseRequestModel = new ErrorInvalidNumberLengthResponseRequestModel();
			$ErrorInvalidNumberLengthResponseRequestModel->field = "expMonth >= 1 && <=12";
			$this->exception = $ErrorInvalidNumberLengthResponseRequestModel;
		}
		if(!(intval($this->PaymentDataModel->expYear) >= 19 && intval($this->PaymentDataModel->expYear) <= 99)){
			$this->error = true;
			$ErrorInvalidNumberLengthResponseRequestModel = new ErrorInvalidNumberLengthResponseRequestModel();
			$ErrorInvalidNumberLengthResponseRequestModel->field = "expYear >= 19 && <=99";
			$this->exception = $ErrorInvalidNumberLengthResponseRequestModel;
		}
		if((intval($this->PaymentDataModel->cvv) < 100 ) || (intval($this->PaymentDataModel->cvv) > 999 )){
			$this->error = true;
			$ErrorInvalidNumberLengthResponseRequestModel = new ErrorInvalidNumberLengthResponseRequestModel();
			$ErrorInvalidNumberLengthResponseRequestModel->field = "cvv < 100 and cvv > 999";
			$this->exception = $ErrorInvalidNumberLengthResponseRequestModel;
		}
	}

	public function makeSimpleTestConektaPayment(){

		try{

			//Init conekta
			\Conekta\Conekta::setApiKey("key_PjaykhkEsXKtarciUBaq3w"); //test private
			\Conekta\Conekta::setApiVersion("2.0.0");

		  $order = \Conekta\Order::create(
		    [		    	
		      "line_items" => $this->PaymentDataModel->items,
		      "shipping_lines" => [
		        [
		          "amount" => 0,
		          "carrier" => "FEDEX"
		        ]
		      ], //optional - shipping_lines are only required for physical goods
		      "currency" => "MXN",
		      "customer_info" => [
		        "name" => $this->PaymentDataModel->name,
		        "email" => "fulanito@conekta.com",
		        "phone" => "5512345678"
		      ],
		      "shipping_contact" => [
		        "address" => [
		          "street1" => "Calle 123, int 2",
		          "postal_code" => "06100",
		          "country" => "MX"
		        ]
		      ], //optional - shipping_contact is only required for physical goods
		      "metadata" => ["reference" => "12987324097", "more_info" => "lalalalala"],
		      "charges" => [
		        [
		          "payment_method" => [
		            "type" => "card",
		            "token_id" => "tok_test_visa_4242"
		          ] //payment_method - use customer's default - a card
		            //to charge a card, different from the default,
		            //you can indicate the card's source_id as shown in the Retry Card Section
		        ]
		      ]
		    ]
		  );
		} catch (\Conekta\ProcessingError $e){
			$this->error = true;			
			$this->exception = $e->getMessage();
			return;
		} catch (\Conekta\ParameterValidationError $e){
		  	$this->error = true;		  			  	
			$this->exception = $e->getMessage();
			return;
		} catch (\Conekta\Handler $e){
		  	$this->error = true;
			$this->exception = $e->getMessage();
			return;
		}

		//Create the response model
		$PaymentResponseDataModel = new PaymentResponseDataModel();
		$PaymentResponseDataModel->ID = $order->id;
		$PaymentResponseDataModel->Status = $order->payment_status;
		$PaymentResponseDataModel->Amount = "$".$order->amount/100 . $order->currency;
		$PaymentResponseDataModel->Order = $order->line_items[0]->quantity .
		      "-". $order->line_items[0]->name .
		      "- $". $order->line_items[0]->unit_price/100;
		$PaymentResponseDataModel->CODE = $order->charges[0]->payment_method->auth_code;
		$PaymentResponseDataModel->CardInfo = "- ". $order->charges[0]->payment_method->name .
		      "- ". $order->charges[0]->payment_method->last4 .
		      "- ". $order->charges[0]->payment_method->brand .
		      "- ". $order->charges[0]->payment_method->type;

		//Save the local response
		$this->PaymentResponseDataModel = $PaymentResponseDataModel;
	}


	public function createPayment(){

		try{

			//Init conekta
			\Conekta\Conekta::setApiKey("key_dGjEECRZLxb8MDm1MctZfA"); //production private
			\Conekta\Conekta::setApiVersion("2.0.0");

		  $order = \Conekta\Order::create(
		    [
		      "line_items" => $this->PaymentDataModel->items,
		      "shipping_lines" => [
		        [
		          "amount" => 0,
		          "carrier" => "FEDEX"
		        ]
		      ],
		      "currency" => "MXN",
		      "customer_info" => [
		        "name" => $this->PaymentDataModel->name,
		        "email" => "coritocorito@hotmail.com",
		        "phone" => "3310644917"
		      ],
		      "shipping_contact" => [
		        "address" => [
		          "street1" => "Calle 123, int 2",
		          "postal_code" => "06100",
		          "country" => "MX"
		        ]
		      ], //optional - shipping_contact is only required for physical goods
		      "metadata" => ["reference" => uniqid(), "more_info" => ""],
		      "charges" => [
		        [
		          "payment_method" => [
		            "type" => "card",
		            "token_id" => $this->PaymentDataModel->conektaTokenId
		          ] //payment_method - use customer's default - a card
		            //to charge a card, different from the default,
		            //you can indicate the card's source_id as shown in the Retry Card Section
		        ]
		      ]
		    ]
		  );
		} catch (\Conekta\ProcessingError $e){
			$this->error = true;			
			$this->exception = $e->getMessage();
			return;
		} catch (\Conekta\ParameterValidationError $e){
		  	$this->error = true;		  			  	
			$this->exception = $e->getMessage();
			return;
		} catch (\Conekta\Handler $e){
		  	$this->error = true;
			$this->exception = $e->getMessage();
			return;
		}

		//Create the response model
		$PaymentResponseDataModel = new PaymentResponseDataModel();
		$PaymentResponseDataModel->ID = $order->id;
		$PaymentResponseDataModel->Status = $order->payment_status;
		$PaymentResponseDataModel->Amount = "$".$order->amount/100 . $order->currency;
		$PaymentResponseDataModel->Order = $order->line_items[0]->quantity .
		      "-". $order->line_items[0]->name .
		      "- $". $order->line_items[0]->unit_price/100;
		$PaymentResponseDataModel->CODE = $order->charges[0]->payment_method->auth_code;
		$PaymentResponseDataModel->CardInfo = "- ". $order->charges[0]->payment_method->name .
		      "- ". $order->charges[0]->payment_method->last4 .
		      "- ". $order->charges[0]->payment_method->brand .
		      "- ". $order->charges[0]->payment_method->type;
		
		//Save the local response
		$this->PaymentResponseDataModel = $PaymentResponseDataModel;
	}


	public function createTestPaymentFreeAmount(){

		try{	
			
			//Init conekta
			\Conekta\Conekta::setApiKey("key_Scyv2KbirtkCzfCTjKzbaMQ"); //production private
			\Conekta\Conekta::setApiVersion("2.0.0");

		  $order = \Conekta\Order::create(
		    [		    	
		      "line_items" => [
		        [
		          "name" => "Tacos",
		          "unit_price" => $this->PaymentDataModel->amount,
		          "quantity" => 1
		        ]
		      ],
		      "shipping_lines" => [
		        [
		          "amount" => 0,
		          "carrier" => "FEDEX"
		        ]
		      ], //optional - shipping_lines are only required for physical goods
		      "currency" => "MXN",
		      "customer_info" => [
		        "name" => "nombre",
		        "email" => "davidlozano@hotmail.com",
		        "phone" => "3310644917"
		      ],
		      "shipping_contact" => [
		        "address" => [
		          "street1" => "Calle 123, int 2",
		          "postal_code" => "06100",
		          "country" => "MX"
		        ]
		      ], //optional - shipping_contact is only required for physical goods
		      "metadata" => ["reference" => uniqid(), "more_info" => ""],
		      "charges" => [
		        [
		          "payment_method" => [
		            "type" => "card",
		            "token_id" => $this->PaymentDataModel->conektaTokenId
		          ] //payment_method - use customer's default - a card
		            //to charge a card, different from the default,
		            //you can indicate the card's source_id as shown in the Retry Card Section
		        ]
		      ]
		    ]
		  );
		} catch (\Conekta\ProcessingError $e){
			$this->error = true;			
			$this->exception = $e->getMessage();
			return;
		} catch (\Conekta\ParameterValidationError $e){
		  	$this->error = true;		  			  	
			$this->exception = $e->getMessage();
			return;
		} catch (\Conekta\Handler $e){
		  	$this->error = true;
			$this->exception = $e->getMessage();
			return;
		}

		//Create the response model
		$PaymentResponseDataModel = new PaymentResponseDataModel();
		$PaymentResponseDataModel->ID = $order->id;
		$PaymentResponseDataModel->Status = $order->payment_status;
		$PaymentResponseDataModel->Amount = "$".$order->amount/100 . $order->currency;
		$PaymentResponseDataModel->Order = $order->line_items[0]->quantity .
		      "-". $order->line_items[0]->name .
		      "- $". $order->line_items[0]->unit_price/100;
		$PaymentResponseDataModel->CODE = $order->charges[0]->payment_method->auth_code;
		$PaymentResponseDataModel->CardInfo = "- ". $order->charges[0]->payment_method->name .
		      "- ". $order->charges[0]->payment_method->last4 .
		      "- ". $order->charges[0]->payment_method->brand .
		      "- ". $order->charges[0]->payment_method->type;

		//Save the local response
		$OKResponseRequestModel = new OKResponseRequestModel();
		$OKResponseRequestModel->message = $PaymentResponseDataModel;
		return json_encode($OKResponseRequestModel);
	}
}
