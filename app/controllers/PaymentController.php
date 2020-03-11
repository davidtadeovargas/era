<?php

use App\models\data\PaymentDataModel;
use App\managers\PaymentManager;
use App\repository\Repository;
use App\models\request\ErrorParametersResponseRequestModel;
use App\models\request\OKResponseRequestModel;
use App\models\request\ErrorExceptionResponseRequestModel;

class PaymentController extends BaseController {

	public function createPayment()
	{
		try{

			$request = \Input::all();

			//Validate that all the input is properly filled
			$valid = true;
			if(!array_key_exists("name", $request)){
				$ErrorParametersResponseRequestModel = new ErrorParametersResponseRequestModel();
				$ErrorParametersResponseRequestModel->field = "name";
				return json_encode($ErrorParametersResponseRequestModel);
			}
			if(!array_key_exists("card_info", $request)){
				$ErrorParametersResponseRequestModel = new ErrorParametersResponseRequestModel();
				$ErrorParametersResponseRequestModel->field = "card_info";
				return json_encode($ErrorParametersResponseRequestModel);
			}
			if(!array_key_exists("exp_month", $request)){
				$ErrorParametersResponseRequestModel = new ErrorParametersResponseRequestModel();
				$ErrorParametersResponseRequestModel->field = "exp_month";
				return json_encode($ErrorParametersResponseRequestModel);
			}
			if(!array_key_exists("exp_year", $request)){
				$ErrorParametersResponseRequestModel = new ErrorParametersResponseRequestModel();
				$ErrorParametersResponseRequestModel->field = "exp_year";
				return json_encode($ErrorParametersResponseRequestModel);
			}
			if(!array_key_exists("cvv", $request)){
				$ErrorParametersResponseRequestModel = new ErrorParametersResponseRequestModel();
				$ErrorParametersResponseRequestModel->field = "cvv";
				return json_encode($ErrorParametersResponseRequestModel);
			}
			if(!array_key_exists("codes", $request)){
				$ErrorParametersResponseRequestModel = new ErrorParametersResponseRequestModel();
				$ErrorParametersResponseRequestModel->field = "codes";
				return json_encode($ErrorParametersResponseRequestModel);
			}
			if(!array_key_exists("conektaTokenId", $request)){
				$ErrorParametersResponseRequestModel = new ErrorParametersResponseRequestModel();
				$ErrorParametersResponseRequestModel->field = "conektaTokenId";
				return json_encode($ErrorParametersResponseRequestModel);
			}

			//Get the variables
			$name = $request["name"];
			$cardInfo = $request["card_info"];
			$expMonth = $request["exp_month"];
			$expYear = $request["exp_year"];
			$cvv = $request["cvv"];
			$codes = $request["codes"];
			$conektaTokenId = $request["conektaTokenId"];

			//Create the correct codes array
			$separatedComaCodes = "";
			$conektaCodes = array();
			foreach ($codes as $key => $code_) {
				
				//Sanatize the code
				$code_ = trim($code_);
				
				$code = array();
				$code["name"] = $code_;
				$code["unit_price"] = 300;
				$code["quantity"] = 1;

				$separatedComaCodes = $separatedComaCodes.$code_.",";

				//Get the product information
				$Product = Repository::getInstance()->getProductRepository()->getProductByCode($code_);

				array_push($conektaCodes, $code);
			}

			//Remove the last ,
			$separatedComaCodes = substr($separatedComaCodes,0, strlen($separatedComaCodes) - 1);

			//Init the model
			$PaymentDataModel = new PaymentDataModel();
			$PaymentDataModel->name = $name;
			$PaymentDataModel->cardInfo = $cardInfo;
			$PaymentDataModel->expMonth = $expMonth;
			$PaymentDataModel->expYear = $expYear;
			$PaymentDataModel->cvv = $cvv;
			$PaymentDataModel->items = $conektaCodes;
			$PaymentDataModel->conektaTokenId = $conektaTokenId;			

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
			if(\Config::get('app_globals.payment_test')){ //If payment test 
				$PaymentManager->makeSimpleTestConektaPayment();				
				return json_encode(new ErrorExceptionResponseRequestModel($PaymentManager->exception));
			}
			else{
				$PaymentManager->makeSimpleTestConektaPayment();
				//$PaymentManager->createPayment();
				if($PaymentManager->error){
					return json_encode(new App\models\request\ErrorExceptionResponseRequestModel($PaymentManager->exception));
				}
			}

			//Save payment in the database
			$Payment = new \Payment();
			$Payment->ID_ = $PaymentManager->PaymentResponseDataModel->ID;
			$Payment->Status = $PaymentManager->PaymentResponseDataModel->Status;
			$Payment->Amount = $PaymentManager->PaymentResponseDataModel->Amount;
			$Payment->Order = $PaymentManager->PaymentResponseDataModel->Order."//".$separatedComaCodes;
			$Payment->CODE = $PaymentManager->PaymentResponseDataModel->CODE;
			$Payment->CardInfo = $PaymentManager->PaymentResponseDataModel->CardInfo;		
			Repository::getInstance()->getPaymentRepository()->addPayment($Payment);
			
			//The user should exists
			$User = Repository::getInstance()->getUserRepository()->getUserFromSession();
			if(!$User){

				//Take the user from the request
				if(!array_key_exists("user_id", $request)){
					$valid = false;
				}
				if(!$valid){
					return json_encode(new  App\models\request\ErrorUserNotExistsResponseRequestModel());
				}

				//Get the user from repository
				$user_id = $request["user_id"];
				$User = Repository::getInstance()->getUserRepository()->getUserById($user_id);
				if(!$User){
					return json_encode(new  App\models\request\ErrorUserNotExistsResponseRequestModel());
				}
			}

			//Save the license or licenses for the user
			try{

				//Being the licenses transaction
				\DB::beginTransaction();

				//Contains the cache repositories
				$LicenseRepository = Repository::getInstance()->getLicenseRepository();
				$SeriesXUserRepository = Repository::getInstance()->getSeriesXUserRepository();
				$UserHistoryRepository = Repository::getInstance()->getUserHistoryRepository();
				$ProductTypeRepository = Repository::getInstance()->getProductTypeRepository();

				$ProductLicenciaType = $ProductTypeRepository->getLicenciaType();
				$ProductTimbresType = $ProductTypeRepository->getTimbresType();
				$ProductRecovacionType = $ProductTypeRepository->getRevocacionType();

				//Create the licenses body for the email
				$licensesBody = "";

				//Loop in the codes
				foreach ($codes as $key => $code) {

					//Sanatize the code
					$code = trim($code);
					
					//Get the product information
					$Product = Repository::getInstance()->getProductRepository()->getProductByCode($code);
					if(!$Product){
						return json_encode(new  App\models\request\ErrorProductNotFoundResponseRequestModel());
					}

					//If the product is license
					if($Product->productTypeID==$ProductLicenciaType->id){

						//Save history: If the user does not has a license, this is the first time buys a licence
						$SeriesXUsers = $SeriesXUserRepository->getByUserID($User->id);
						if(count($SeriesXUsers)==0){
							$UserHistoryRepository->saveFirstBuyLicense($User->id,$Payment->id,$Product->id);
						}
						else{

							//Save user history and this is just another license buy
							$UserHistoryRepository->saveBuyLicenseHistory($User->id,$Payment->id,$Product->id);
						}

						//Create the serial
						$serie = Repository::getInstance()->getLicenseRepository()->generateSerie($User["id"],$User["user"],$code);

						//Body for the email
						$licensesBody = $licensesBody.$Product->code."-".$Product->description." Serie: ".$serie."<br>";

						//If for any reason the serial generation is invalid return error
						if(!$serie){
							return json_encode(new  App\models\request\ErrorInvalidGenerationSerialResponseRequestModel());
						}

						//If the serial is repeated in database return error
						$serieExists = Repository::getInstance()->getLicenseRepository()->serieExists($serie);
						if($serieExists){
							return json_encode(new  App\models\request\ErrorSerialExistsResponseRequestModel());
						}

						//Asign the license to the user
						$LicenseRepository->addLicense($User->id,$serie,$Product->numberComputers,$Payment->id);
					}
					else if($Product->productTypeID==$ProductTimbresType->id){

						//Save timbres buy history
						$UserHistoryRepository->saveBuyTimbresHistory($User->id,$Payment->id,$Product->id);

						//Body for the email
						$licensesBody = $licensesBody.$Product->code."-".$Product->description."<br>";
					}
					//Another kind of product
					else{

						//Body for the email
						$licensesBody = $licensesBody.$Product->code."-".$Product->description."<br>";
					}
				}

				//Commit the transaction
				\DB::commit();

			}catch(Exception $e){

				\ DB::rollback();

				return json_encode(new  App\models\request\ErrorExceptionResponseRequestModel($e->getMessage()));
			}

			//Send the email
			$emailSend = true;
			$emailErrorMessage = "";			
			try{

				//Create the view model for the email
				$PaymentSuccessEmailViewModel = new App\models\viewmodels\PaymentSuccessEmailViewModel();
				$PaymentSuccessEmailViewModel->user = $User->email;				
				$PaymentSuccessEmailViewModel->User = $User;
				$PaymentSuccessEmailViewModel->licenses = $licensesBody;				

				//Create email data model
				$EmailDataModel = new App\models\data\EmailDataModel();
				$EmailDataModel->emailTo = $User->email;
				$EmailDataModel->subject = "Tu compra fue exitosa, Easy Retail Admin!";
				$EmailDataModel->viewName = "paymentSuccessEmail";
				$EmailDataModel->model = $PaymentSuccessEmailViewModel;
				$EmailDataModel->emailTypeLicensePayment = true;

				//Send the email
				App\managers\EmailSendManager::getInstance()->setEmailDataModel($EmailDataModel)->send();
				
			}catch(Exception $e){
				$emailSend = false;
				$emailErrorMessage = $e->getMessage();
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
