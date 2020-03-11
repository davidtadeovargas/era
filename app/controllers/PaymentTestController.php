<?php

use App\models\data\PaymentDataModel;
use App\managers\PaymentManager;
use App\models\request\OKResponseRequestModel;
use App\models\request\ErrorExceptionResponseRequestModel;
use App\models\request\ErrorParametersResponseRequestModel;

class PaymentTestController extends BaseController {

	public function createPayment()
	{
		try{

			$request = \Input::all();

			//Validate that all the input is properly sent
			$valid = true;
			if(!array_key_exists("name", $request)){
				$valid = false;
			}
			if(!array_key_exists("card_info", $request)){
				$valid = false;
			}
			if(!array_key_exists("exp_month", $request)){
				$valid = false;
			}
			if(!array_key_exists("exp_year", $request)){
				$valid = false;
			}
			if(!array_key_exists("cvv", $request)){
				$valid = false;
			}
			if(!array_key_exists("codes", $request)){
				$valid = false;
			}
			if(!array_key_exists("amount", $request)){
				$valid = false;
			}			
			if(!$valid){
				return json_encode(new ErrorParametersResponseRequestModel());
			}			

			//Get the variables
			$name = $request["name"];
			$cardInfo = $request["card_info"];
			$expMonth = $request["exp_month"];
			$expYear = $request["exp_year"];
			$cvv = $request["cvv"];
			$codes = $request["codes"];
			$amount = $request["amount"];

			//Init the model
			$PaymentDataModel = new PaymentDataModel();
			$PaymentDataModel->name = $name;
			$PaymentDataModel->cardInfo = $cardInfo;
			$PaymentDataModel->expMonth = $expMonth;
			$PaymentDataModel->expYear = $expYear;
			$PaymentDataModel->cvv = $cvv;
			$PaymentDataModel->items = $codes;
			$PaymentDataModel->amount = $amount;

			//If all the fields are properly filled create the payment
			$PaymentManager = new PaymentManager();
			$PaymentManager->PaymentDataModel = $PaymentDataModel;
			$PaymentManager->validateLength();
			if($PaymentManager->error){
				return json_encode(new ErrorExceptionResponseRequestModel($PaymentManager->exception));
			}
			$PaymentManager->validateNumerics();
			if($PaymentManager->error){
				return json_encode(new ErrorExceptionResponseRequestModel($PaymentManager->exception));
			}
			$PaymentManager->validateLenghtNumerics();
			if($PaymentManager->error){
				return json_encode(new ErrorExceptionResponseRequestModel($PaymentManager->exception));
			}
			$PaymentManager->makeSimpleTestConektaPayment();
			if($PaymentManager->error){
				return json_encode(new ErrorExceptionResponseRequestModel($PaymentManager->exception));
			}			

			//Return success
			$OKResponseRequestModel = new OKResponseRequestModel();
			$OKResponseRequestModel->message = $PaymentManager->PaymentResponseDataModel;
			return json_encode($OKResponseRequestModel);
			
		}catch(Exception $e){

			return json_encode(new  App\models\request\ErrorExceptionResponseRequestModel($e->getMessage()));	
		}
	}


	public function createTestPaymentFreeAmount()
	{
		try{

			$request = \Input::all();

			//Validate that all the input is properly filled
			$valid = true;
			if(!array_key_exists("amount", $request)){
				$ErrorParametersResponseRequestModel = new ErrorParametersResponseRequestModel();
				$ErrorParametersResponseRequestModel->field = "amount";
				return json_encode($ErrorParametersResponseRequestModel);
			}
			if(!array_key_exists("token_id", $request)){
				$ErrorParametersResponseRequestModel = new ErrorParametersResponseRequestModel();
				$ErrorParametersResponseRequestModel->field = "token_id";
				return json_encode($ErrorParametersResponseRequestModel);
			}

			//Get the variables
			$amount = $request["amount"];
			$token_id = $request["token_id"];

			//Init the model
			$PaymentDataModel = new PaymentDataModel();
			$PaymentDataModel->amount = $amount;
			$PaymentDataModel->conektaTokenId = $token_id;			

			//If all the fields are properly filled create the payment
			$PaymentManager = new PaymentManager();
			$PaymentManager->PaymentDataModel = $PaymentDataModel;
			$PaymentManager->createTestPaymentFreeAmount();
			if($PaymentManager->error){
				return json_encode(new ErrorExceptionResponseRequestModel($PaymentManager->exception));
			}			

			//Return success
			$OKResponseRequestModel = new OKResponseRequestModel();
			$OKResponseRequestModel->message = $PaymentManager->PaymentResponseDataModel;
			return json_encode($OKResponseRequestModel);
			
		}catch(Exception $e){

			return json_encode(new  App\models\request\ErrorExceptionResponseRequestModel($e->getMessage()));	
		}
	}
}
