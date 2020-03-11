<?php

use App\repository\Repository;
use App\models\request\GetComputerStatusResponseRequestModel;
use App\models\data\TestCompanyDataModel;

class ComputerController extends BaseController {

	public function getComputerStatus(){

		try{

			$request = \Input::all();
			
			//Validate that all the input is properly filled
			$valid = true;
			if(!array_key_exists("user", $request)){
				$valid = false;
			}
			if(!array_key_exists("password", $request)){
				$valid = false;
			}
			if(!array_key_exists("name", $request)){
				$valid = false;
			}
			if(!array_key_exists("computerIDD", $request)){
				$valid = false;
			}
			if(!$valid){
				return json_encode(new  App\models\request\ErrorParametersResponseRequestModel());
			}

			//Get the independent data
			$user = $request["user"];
			$password = $request["password"];
			$name = $request["name"];
			$computerIDD = $request["computerIDD"];

			//Vaidate that the credentials are correct
			$valid = Repository::getInstance()->getUserRepository()->validateCredentials($user,$password);
			if(!$valid){
				return json_encode(new  App\models\request\ErrorInvalidLoginResponseRequestModel());
			}

			//Get the user
			$User = Repository::getInstance()->getUserRepository()->getUser($user);

			//Start creating the response request model
			$GetComputerStatusResponseRequestModel = new GetComputerStatusResponseRequestModel();

			//Validate if the computer id exists
			$exists = Repository::getInstance()->getLicenseRepository()->computerExists($computerIDD);
			if(!$exists){
				
				//Add the computer
				$Computer = Repository::getInstance()->getComputerRepository()->addComputer($User->id,$name,$computerIDD);
				
				//Add the new test company
				$TestCompany = Repository::getInstance()->getCompanyRepository()->addTestCompanyToUser($User->id);

				//Save the test company
				$GetComputerStatusResponseRequestModel->CompanyTestDataModel = $TestCompany;

				//Save the history
				Repository::getInstance()->getUserHistoryRepository()->saveFirstInstalation($User->id);
			}
			else{

				//Get the computer
				$Computer = Repository::getInstance()->getComputerRepository()->getByComputerIDD($computerIDD);
			}

			//Get the computer license information
			$ComputerLicenseDataModel = Repository::getInstance()->getLicenseRepository()->getComputerLicenseInfo($Computer->id);
			if(!$ComputerLicenseDataModel){
				return json_encode(new  App\models\request\ErrorLicenseInfoNotFoundResponseRequestModel());
			}
			
			//Continue finishing the response request model
			$GetComputerStatusResponseRequestModel->email = $ComputerLicenseDataModel->email;
			$GetComputerStatusResponseRequestModel->name = $ComputerLicenseDataModel->name;
			$GetComputerStatusResponseRequestModel->serie = $ComputerLicenseDataModel->serie;
			$GetComputerStatusResponseRequestModel->numberComputers = $ComputerLicenseDataModel->numberComputers;
			$GetComputerStatusResponseRequestModel->computerCreatedAt = $ComputerLicenseDataModel->created_at;
			$GetComputerStatusResponseRequestModel->channel = $ComputerLicenseDataModel->channel;
			$GetComputerStatusResponseRequestModel->remainingDays = $ComputerLicenseDataModel->remainingDays;
			$GetComputerStatusResponseRequestModel->genericSerial = "XXXX-XXXX-XXXX-XXXX";
			$GetComputerStatusResponseRequestModel->PremiumFuntionsDataModel = $ComputerLicenseDataModel->PremiumFuntionsDataModel;
			$TestCompanyDataModel = new TestCompanyDataModel();
			$TestCompanyDataModel->Product1 = $ComputerLicenseDataModel->Product1;
			$TestCompanyDataModel->Product2 = $ComputerLicenseDataModel->Product2;
			$TestCompanyDataModel->Product3 = $ComputerLicenseDataModel->Product3;
			$TestCompanyDataModel->Product4 = $ComputerLicenseDataModel->Product4;
			$TestCompanyDataModel->Product5 = $ComputerLicenseDataModel->Product5;
			$TestCompanyDataModel->Customer1 = $ComputerLicenseDataModel->Customer1;
			$TestCompanyDataModel->Customer2 = $ComputerLicenseDataModel->Customer2;
			$TestCompanyDataModel->Customer3 = $ComputerLicenseDataModel->Customer3;
			$TestCompanyDataModel->Customer4 = $ComputerLicenseDataModel->Customer4;
			$TestCompanyDataModel->Customer5 = $ComputerLicenseDataModel->Customer5;
			$TestCompanyDataModel->Supplier1 = $ComputerLicenseDataModel->Supplier1;
			$TestCompanyDataModel->Supplier2 = $ComputerLicenseDataModel->Supplier2;
			$TestCompanyDataModel->Supplier3 = $ComputerLicenseDataModel->Supplier3;
			$TestCompanyDataModel->Supplier4 = $ComputerLicenseDataModel->Supplier4;
			$TestCompanyDataModel->Supplier5 = $ComputerLicenseDataModel->Supplier5;
			$TestCompanyDataModel->CompanyTestDataModel = $ComputerLicenseDataModel->CompanyTestDataModel;
			$GetComputerStatusResponseRequestModel->TestCompanyDataModel = $TestCompanyDataModel;
						
			//Return response
			return json_encode($GetComputerStatusResponseRequestModel);

		}catch(Exception $e){

			return json_encode(new  App\models\request\ErrorExceptionResponseRequestModel($e->getMessage()));	
		}
	}	
}
