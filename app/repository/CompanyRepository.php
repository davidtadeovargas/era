<?php

namespace App\repository;

use App\models\data\test_company\CompanyTestDataModel;

class CompanyRepository extends Repository {
	
	public function __construct(){		
	}

	//Add the test company to the user
	public function addTestCompanyToUser($userID){

		//Create the test company
		$CompanyTestDataModel = new CompanyTestDataModel();

		//Add the test company to the remote database for the user
		$Company = new \Company();
		$Company->userID = $userID;
		$Company->companyName = $CompanyTestDataModel->companyName;
		$Company->companyCode = $CompanyTestDataModel->companyCode.$userID;
		$Company->phone = $CompanyTestDataModel->phone;
		$Company->phoneDeliver = $CompanyTestDataModel->phoneDeliver;
		$Company->expedPlace = $CompanyTestDataModel->expedPlace;
		$Company->personalPhone1 = $CompanyTestDataModel->personalPhone1;
		$Company->personalPhone2 = $CompanyTestDataModel->personalPhone2;
		$Company->estateDeliver = $CompanyTestDataModel->estateDeliver;		
		$Company->street = $CompanyTestDataModel->street;
		$Company->celen = $CompanyTestDataModel->celen;
		$Company->certificatePassword = $CompanyTestDataModel->certificatePassword;
		$Company->streetDeliver = $CompanyTestDataModel->streetDeliver;
		$Company->colony = $CompanyTestDataModel->colony;
		$Company->colonyDeliver = $CompanyTestDataModel->colonyDeliver;
		$Company->ladaDeliver = $CompanyTestDataModel->ladaDeliver;
		$Company->cp = $CompanyTestDataModel->cp;
		$Company->cpDeliver = $CompanyTestDataModel->cpDeliver;
		$Company->city = $CompanyTestDataModel->city;
		$Company->cityDeliver = $CompanyTestDataModel->cityDeliver;
		$Company->estate = $CompanyTestDataModel->estate;
		$Company->contactDeliver3 = $CompanyTestDataModel->contactDeliver3;
		$Company->contactDeliver2 = $CompanyTestDataModel->contactDeliver2;
		$Company->contactDeliver1 = $CompanyTestDataModel->contactDeliver1;
		$Company->country = $CompanyTestDataModel->country;
		$Company->countryDeliver = $CompanyTestDataModel->countryDeliver;
		$Company->rfc = $CompanyTestDataModel->rfc;
		$Company->email = $CompanyTestDataModel->email;
		$Company->website = $CompanyTestDataModel->website;
		$Company->interiorNumber = $CompanyTestDataModel->interiorNumber;
		$Company->interiorNumberDeliver = $CompanyTestDataModel->interiorNumberDeliver;
		$Company->externalNumber = $CompanyTestDataModel->externalNumber;
		$Company->pathCert = $CompanyTestDataModel->pathCert;
		$Company->externalNumberDeliver = $CompanyTestDataModel->externalNumberDeliver;
		$Company->pathCertKey = $CompanyTestDataModel->pathCertKey;
		$Company->moralOrPhisic = $CompanyTestDataModel->moralOrPhisic;
		$Company->estation = $CompanyTestDataModel->estation;
		$Company->appPath = $CompanyTestDataModel->appPath;
		$Company->sucursal = $CompanyTestDataModel->sucursal;
		$Company->cashNumber = $CompanyTestDataModel->cashNumber;
		$Company->companyDB = $CompanyTestDataModel->companyDB;
		$Company->costMethod = $CompanyTestDataModel->costMethod;
		$Company->extension = $CompanyTestDataModel->extension;
		$Company->fiscalRegimen = $CompanyTestDataModel->fiscalRegimen;
		$Company->template = $CompanyTestDataModel->template;

		$Company->save();
		
		//Return the result
		return $Company;
	}

	//Add the test company to the user
	public function addOrUpdateCompany(		$userID,
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
											$template){

			//Get the company
			$Company = \Company::where("userID","=",$userID)->where("companyCode","=",$companyCode)->first();
			
			//If it is for update create the model
			if(!$Company){
				$Company = new \Company();
			}
			
			//Update it or create it			
			$Company->userID = $userID;
			$Company->companyName = $companyName;
			$Company->companyCode = $companyCode;
			$Company->phone = $phone;
			$Company->phoneDeliver = $phoneDeliver;
			$Company->expedPlace = $expedPlace;
			$Company->personalPhone1 = $personalPhone1;
			$Company->personalPhone2 = $personalPhone2;
			$Company->street = $street;
			$Company->celen = $celen;
			$Company->certificatePassword = $certificatePassword;
			$Company->streetDeliver = $streetDeliver;
			$Company->colony = $colony;
			$Company->colonyDeliver = $colonyDeliver;
			$Company->ladaDeliver = $ladaDeliver;
			$Company->cp = $cp;
			$Company->cpDeliver = $cpDeliver;
			$Company->city = $city;
			$Company->cityDeliver = $cityDeliver;
			$Company->estate = $estate;
			$Company->contactDeliver3 = $contactDeliver3;
			$Company->contactDeliver2 = $contactDeliver2;
			$Company->contactDeliver1 = $contactDeliver1;
			$Company->estateDeliver = $estateDeliver;
			$Company->country = $country;
			$Company->countryDeliver = $countryDeliver;
			$Company->rfc = $rfc;
			$Company->email = $email;
			$Company->website = $website;
			$Company->interiorNumber = $interiorNumber;
			$Company->interiorNumberDeliver = $interiorNumberDeliver;
			$Company->externalNumber = $externalNumber;
			$Company->pathCert = $pathCert;
			$Company->externalNumberDeliver = $externalNumberDeliver;
			$Company->pathCertKey = $pathCertKey;
			$Company->moralOrPhisic = $moralOrPhisic;
			$Company->estation = $estation;
			$Company->appPath = $appPath;
			$Company->sucursal = $sucursal;
			$Company->cashNumber = $cashNumber;
			$Company->companyDB = $companyDB;
			$Company->costMethod = $costMethod;
			$Company->extension = $extension;
			$Company->fiscalRegimen = $fiscalRegimen;
			$Company->template = $template;
			$Company->save();

			//Return the updated model
			return $Company;
	}

	//Delete a company by id
	public function deleteCompany($userID,$companyCode){
		
		//Delete the company
		$res = \Company::where("userID","=",$userID)->where("companyCode","=",$companyCode)->delete();			

		//Return the result
		return $res;
	}


	//Get all companies for a user
	public function getAllCompaniesFromUser($userID){

		//Get all the user companies
		$companies = \Company::where("userID","",$userID)->get();

		//Return the companies
		return $companies;
	}


	//Get company if
	public function getCompanyInfo($userID,$companyCode){

		//Get the company info
		$Company = \Company::where("userID","=",$userID)->where("companyCode","=",$companyCode)->first();

		//Return the model
		return $Company;
	}
}
