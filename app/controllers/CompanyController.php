<?php

use App\repository\Repository;
use App\models\request\GetComputerStatusResponseRequestModel;
use App\models\request\AddOrUpdateCompanyReponseRequestModel;
use App\models\request\DeleteCompanyReponseRequestModel;
use App\models\request\ErrorCompanyNotExistsResponseRequestModel;

class CompanyController extends BaseController {

	public function addOrUpdateCompany(){

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
			if(!array_key_exists("companyCode", $request)){
				$valid = false;
			}
			if(!array_key_exists("phone", $request)){
				$valid = false;
			}
			if(!array_key_exists("phoneDeliver", $request)){
				$valid = false;
			}
			if(!array_key_exists("personalPhone1", $request)){
				$valid = false;
			}
			if(!array_key_exists("personalPhone2", $request)){
				$valid = false;
			}
			if(!array_key_exists("street", $request)){
				$valid = false;
			}
			if(!array_key_exists("celen", $request)){
				$valid = false;
			}
			if(!array_key_exists("certificatePassword", $request)){
				$valid = false;
			}
			if(!array_key_exists("streetDeliver", $request)){
				$valid = false;
			}
			if(!array_key_exists("colony", $request)){
				$valid = false;
			}
			if(!array_key_exists("colonyDeliver", $request)){
				$valid = false;
			}
			if(!array_key_exists("ladaDeliver", $request)){
				$valid = false;
			}
			if(!array_key_exists("cp", $request)){
				$valid = false;
			}
			if(!array_key_exists("cpDeliver", $request)){
				$valid = false;
			}
			if(!array_key_exists("city", $request)){
				$valid = false;
			}
			if(!array_key_exists("cityDeliver", $request)){
				$valid = false;
			}
			if(!array_key_exists("estate", $request)){
				$valid = false;
			}
			if(!array_key_exists("contactDeliver3", $request)){
				$valid = false;
			}
			if(!array_key_exists("contactDeliver2", $request)){
				$valid = false;
			}
			if(!array_key_exists("contactDeliver1", $request)){
				$valid = false;
			}
			if(!array_key_exists("estateDeliver", $request)){
				$valid = false;
			}
			if(!array_key_exists("country", $request)){
				$valid = false;
			}
			if(!array_key_exists("countryDeliver", $request)){
				$valid = false;
			}
			if(!array_key_exists("rfc", $request)){
				$valid = false;
			}
			if(!array_key_exists("email", $request)){
				$valid = false;
			}
			if(!array_key_exists("website", $request)){
				$valid = false;
			}
			if(!array_key_exists("interiorNumber", $request)){
				$valid = false;
			}
			if(!array_key_exists("interiorNumberDeliver", $request)){
				$valid = false;
			}
			if(!array_key_exists("externalNumber", $request)){
				$valid = false;
			}
			if(!array_key_exists("pathCert", $request)){
				$valid = false;
			}
			if(!array_key_exists("externalNumberDeliver", $request)){
				$valid = false;
			}
			if(!array_key_exists("pathCertKey", $request)){
				$valid = false;
			}
			if(!array_key_exists("moralOrPhisic", $request)){
				$valid = false;
			}
			if(!array_key_exists("estation", $request)){
				$valid = false;
			}
			if(!array_key_exists("appPath", $request)){
				$valid = false;
			}
			if(!array_key_exists("sucursal", $request)){
				$valid = false;
			}
			if(!array_key_exists("cashNumber", $request)){
				$valid = false;
			}
			if(!array_key_exists("companyDB", $request)){
				$valid = false;
			}
			if(!array_key_exists("costMethod", $request)){
				$valid = false;
			}
			if(!array_key_exists("extension", $request)){
				$valid = false;
			}
			if(!array_key_exists("fiscalRegimen", $request)){
				$valid = false;
			}
			if(!array_key_exists("template", $request)){
				$valid = false;
			}			
			if(!$valid){
				return json_encode(new  App\models\request\ErrorParametersResponseRequestModel());
			}

			//Get the independent data
			$user = $request["user"];
			$password = $request["password"];
			$companyName = $request["name"];
			$companyCode = $request["companyCode"];			
			$phone = $request["phone"];
			$phoneDeliver = $request["phoneDeliver"];
			$expedPlace = $request["expedPlace"];
			$personalPhone1 = $request["personalPhone1"];
			$personalPhone2 = $request["personalPhone2"];
			$street = $request["street"];
			$celen = $request["celen"];
			$certificatePassword = $request["certificatePassword"];
			$streetDeliver = $request["streetDeliver"];
			$colony = $request["colony"];
			$colonyDeliver = $request["colonyDeliver"];
			$ladaDeliver = $request["ladaDeliver"];
			$cp = $request["cp"];
			$cpDeliver = $request["cpDeliver"];
			$city = $request["city"];
			$cityDeliver = $request["cityDeliver"];
			$estate = $request["estate"];
			$contactDeliver3 = $request["contactDeliver3"];
			$contactDeliver2 = $request["contactDeliver2"];
			$contactDeliver1 = $request["contactDeliver1"];
			$estateDeliver = $request["estateDeliver"];
			$country = $request["country"];
			$countryDeliver = $request["countryDeliver"];
			$rfc = $request["rfc"];
			$email = $request["email"];
			$website = $request["website"];
			$interiorNumber = $request["interiorNumber"];
			$interiorNumberDeliver = $request["interiorNumberDeliver"];
			$externalNumber = $request["externalNumber"];
			$pathCert = $request["pathCert"];
			$externalNumberDeliver = $request["externalNumberDeliver"];
			$pathCertKey = $request["pathCertKey"];
			$moralOrPhisic = $request["moralOrPhisic"];
			$estation = $request["estation"];
			$appPath = $request["appPath"];
			$sucursal = $request["sucursal"];
			$cashNumber = $request["cashNumber"];
			$companyDB = $request["companyDB"];
			$costMethod = $request["costMethod"];
			$extension = $request["extension"];
			$fiscalRegimen = $request["fiscalRegimen"];
			$template = $request["template"];

			//Vaidate that the credentials are correct
			$valid = Repository::getInstance()->getUserRepository()->validateCredentials($user,$password);
			if(!$valid){
				return json_encode(new  App\models\request\ErrorInvalidLoginResponseRequestModel());
			}

			//Get the user
			$User = Repository::getInstance()->getUserRepository()->getUser($user);

			//Add or update the company to the database
			Repository::getInstance()->getCompanyRepository()->addOrUpdateCompany(	$User->id,
																					$companyName,
																					$companyCode,
																					$phone,
																					$phoneDeliver,
																					$expedPlace,
																					$personalPhone1,
																					$personalPhone2,
																					$street,
																					$celen,
																					$certificatePassword,
																					$streetDeliver,
																					$colony,
																					$colonyDeliver,
																					$ladaDeliver,
																					$cp,
																					$cpDeliver,
																					$city,
																					$cityDeliver,
																					$estate,
																					$contactDeliver3,
																					$contactDeliver2,
																					$contactDeliver1,
																					$estateDeliver,
																					$country,
																					$countryDeliver,
																					$rfc,
																					$email,
																					$website,
																					$interiorNumber,
																					$interiorNumberDeliver,
																					$externalNumber,
																					$pathCert,
																					$externalNumberDeliver,
																					$pathCertKey,
																					$moralOrPhisic,
																					$estation,
																					$appPath,
																					$sucursal,
																					$cashNumber,
																					$companyDB,
																					$costMethod,
																					$extension,
																					$fiscalRegimen,
																					$template);			
			//If the company does not exists create it
			$AddOrUpdateCompanyReponseRequestModel = new AddOrUpdateCompanyReponseRequestModel();

			//Return response
			return json_encode($AddOrUpdateCompanyReponseRequestModel);

		}catch(Exception $e){

			return json_encode(new  App\models\request\ErrorExceptionResponseRequestModel($e->getMessage()));	
		}
	}

	public function getCompanyInfo(){
		
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
			if(!array_key_exists("companyCode", $request)){
				$valid = false;
			}
			if(!$valid){
				return json_encode(new  App\models\request\ErrorParametersResponseRequestModel());
			}

			//Get the independent data
			$user = $request["user"];
			$password = $request["password"];
			$companyCode = $request["companyCode"];			
			
			//Vaidate that the credentials are correct
			$valid = Repository::getInstance()->getUserRepository()->validateCredentials($user,$password);
			if(!$valid){
				return json_encode(new  App\models\request\ErrorInvalidLoginResponseRequestModel());
			}

			//Get the user
			$User = Repository::getInstance()->getUserRepository()->getUser($user);

			//Get the company model
			$Company = Repository::getInstance()->getCompanyRepository()->getCompanyInfo($User->id,$companyCode);			
			if(!$Company){
				return json_encode(new  App\models\request\ErrorCompanyNotExistsResponseRequestModel());	
			}

			//Create the response model
			$GetCompanyInfoResponseRequestModel = new App\models\request\GetCompanyInfoResponseRequestModel();
			$GetCompanyInfoResponseRequestModel->companyName = $Company->companyName;
			$GetCompanyInfoResponseRequestModel->companyCode = $Company->companyCode;
			$GetCompanyInfoResponseRequestModel->phone = $Company->phone;
			$GetCompanyInfoResponseRequestModel->phoneDeliver = $Company->phoneDeliver;
			$GetCompanyInfoResponseRequestModel->expedPlace = $Company->expedPlace;
			$GetCompanyInfoResponseRequestModel->personalPhone1 = $Company->personalPhone1;
			$GetCompanyInfoResponseRequestModel->personalPhone2 = $Company->personalPhone2;
			$GetCompanyInfoResponseRequestModel->street = $Company->street;
			$GetCompanyInfoResponseRequestModel->celen = $Company->celen;
			$GetCompanyInfoResponseRequestModel->certificatePassword = $Company->certificatePassword;
			$GetCompanyInfoResponseRequestModel->streetDeliver = $Company->streetDeliver;
			$GetCompanyInfoResponseRequestModel->colony = $Company->colony;
			$GetCompanyInfoResponseRequestModel->colonyDeliver = $Company->colonyDeliver;
			$GetCompanyInfoResponseRequestModel->ladaDeliver = $Company->ladaDeliver;
			$GetCompanyInfoResponseRequestModel->cp = $Company->cp;
			$GetCompanyInfoResponseRequestModel->cpDeliver = $Company->cpDeliver;
			$GetCompanyInfoResponseRequestModel->city = $Company->city;
			$GetCompanyInfoResponseRequestModel->cityDeliver = $Company->cityDeliver;
			$GetCompanyInfoResponseRequestModel->estate = $Company->estate;
			$GetCompanyInfoResponseRequestModel->contactDeliver3 = $Company->contactDeliver3;
			$GetCompanyInfoResponseRequestModel->contactDeliver2 = $Company->contactDeliver2;
			$GetCompanyInfoResponseRequestModel->contactDeliver1 = $Company->contactDeliver1;
			$GetCompanyInfoResponseRequestModel->estateDeliver = $Company->estateDeliver;
			$GetCompanyInfoResponseRequestModel->country = $Company->country;
			$GetCompanyInfoResponseRequestModel->countryDeliver = $Company->countryDeliver;
			$GetCompanyInfoResponseRequestModel->rfc = $Company->rfc;
			$GetCompanyInfoResponseRequestModel->email = $Company->email;
			$GetCompanyInfoResponseRequestModel->website = $Company->companyName;
			$GetCompanyInfoResponseRequestModel->interiorNumber = $Company->interiorNumber;
			$GetCompanyInfoResponseRequestModel->interiorNumberDeliver = $Company->interiorNumberDeliver;
			$GetCompanyInfoResponseRequestModel->externalNumber = $Company->externalNumber;
			$GetCompanyInfoResponseRequestModel->pathCert = $Company->pathCert;
			$GetCompanyInfoResponseRequestModel->externalNumberDeliver = $Company->externalNumberDeliver;
			$GetCompanyInfoResponseRequestModel->pathCertKey = $Company->pathCertKey;
			$GetCompanyInfoResponseRequestModel->moralOrPhisic = $Company->moralOrPhisic;
			$GetCompanyInfoResponseRequestModel->estation = $Company->estation;
			$GetCompanyInfoResponseRequestModel->appPath = $Company->appPath;
			$GetCompanyInfoResponseRequestModel->sucursal = $Company->sucursal;
			$GetCompanyInfoResponseRequestModel->cashNumber = $Company->cashNumber;

			//Return response
			return json_encode($GetCompanyInfoResponseRequestModel);

		}catch(Exception $e){

			return json_encode(new  App\models\request\ErrorExceptionResponseRequestModel($e->getMessage()));	
		}		
	}

	public function deleteCompany(){

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
			if(!array_key_exists("companyCode", $request)){
				$valid = false;
			}
			if(!$valid){
				return json_encode(new  App\models\request\ErrorParametersResponseRequestModel());
			}

			//Get the independent data
			$user = $request["user"];
			$password = $request["password"];			
			$companyCode = $request["companyCode"];

			//Vaidate that the credentials are correct
			$valid = Repository::getInstance()->getUserRepository()->validateCredentials($user,$password);
			if(!$valid){
				return json_encode(new  App\models\request\ErrorInvalidLoginResponseRequestModel());
			}

			//Get the user
			$User = Repository::getInstance()->getUserRepository()->getUser($user);

			//Get the company model
			$Company = Repository::getInstance()->getCompanyRepository()->getCompanyInfo($User->id,$companyCode);			
			if(!$Company){
				return json_encode(new  App\models\request\ErrorCompanyNotExistsResponseRequestModel());	
			}

			//Delete the company
			$res = Repository::getInstance()->getCompanyRepository()->deleteCompany($User->id,$companyCode);

			//Create the response model
			$DeleteCompanyReponseRequestModel = new DeleteCompanyReponseRequestModel();
			$DeleteCompanyReponseRequestModel->res = $res;

			//Return response
			return json_encode($DeleteCompanyReponseRequestModel);

		}catch(Exception $e){

			return json_encode(new  App\models\request\ErrorExceptionResponseRequestModel($e->getMessage()));	
		}
	}
}	
