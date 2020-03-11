<?php

namespace App\repository;

use App\models\request\LicenseInfoResponseRequestModel;
use App\models\data\LicenseDataModel;
use App\models\data\LicensesDataModel;
use App\models\data\test_company\CompanyTestDataModel;
use App\models\data\test_company\Product1TestDataModel;
use App\models\data\test_company\Product2TestDataModel;
use App\models\data\test_company\Product3TestDataModel;
use App\models\data\test_company\Product4TestDataModel;
use App\models\data\test_company\Product5TestDataModel;
use App\models\data\test_company\Customer1TestDataModel;
use App\models\data\test_company\Customer2TestDataModel;
use App\models\data\test_company\Customer3TestDataModel;
use App\models\data\test_company\Customer4TestDataModel;
use App\models\data\test_company\Customer5TestDataModel;
use App\models\data\test_company\Supplier1TestDataModel;
use App\models\data\test_company\Supplier2TestDataModel;
use App\models\data\test_company\Supplier3TestDataModel;
use App\models\data\test_company\Supplier4TestDataModel;
use App\models\data\test_company\Supplier5TestDataModel;
use App\models\data\ComputerLicenseDataModel;
use App\models\data\PremiumFuntionsDataModel;

class LicenseRepository extends Repository {
	
	public function __construct(){		
	}

	//Get the license by id
	public function getByID($licenseID){

		//Get the model and return it
		$License = \License::where("id","=",$licenseID)->first();
		return $License;
	}

	public function getPremiumOrNotComputer($computerID){

		//It is not premium
		$premium = false;

		//Get the computer
		$Computer = Repository::getInstance()->getComputerRepository()->getByID($computerID);

		//Get the licence info model
		$License = $this->getByComputerID($computerID);

		//If the computer user has license so it is premium
		if($License){
			$premium = true;
		}

		// Declare and define two dates 
		//$date1 = $Computer->created_at;
		//$date2 = date("Y-m-d");
		$date1 = strtotime($Computer->created_at);
		$date2 = strtotime(date("Y-m-d")); 

		//Formulate the Difference between two dates 
		$diff = abs($date2 - $date1);  
		
		// To get the year divide the resultant date into 
		// total seconds in a year (365*60*60*24) 
		$years = floor($diff / (365*60*60*24));  
		  
		  
		// To get the month, subtract it with years and 
		// divide the resultant date into 
		// total seconds in a month (30*60*60*24) 
		$months = floor(($diff - $years * 365*60*60*24) 
		                               / (30*60*60*24));  
		  
		  
		// To get the day, subtract it with years and  
		// months and divide the resultant date into 
		// total seconds in a days (60*60*24) 
		$days = floor(($diff - $years * 365*60*60*24 -  
		             $months*30*60*60*24)/ (60*60*24)); 

		//If the computer user is still in test period so it is premium
		if($months == 0) { //Correct one if($months == 0)
			$premium = true;
		}
	
		$premium = true; //test

		//Return the value of premium
		return $premium;
	}

	//Get licence info for a computer
	public function getComputerLicenseInfo($computerID){

		//Get the computer
		$Computer = Repository::getInstance()->getComputerRepository()->getByID($computerID);		
		//Get the user
		$User = Repository::getInstance()->getUserRepository()->getUserById($Computer->userID);
		
		//Get the licence info model
		$License = $this->getByComputerID($Computer->id);
		
		//Create the response model
		$ComputerLicenseDataModel = new ComputerLicenseDataModel();
		$ComputerLicenseDataModel->id = $Computer->id;
		$ComputerLicenseDataModel->userID = $Computer->userID;		
		$ComputerLicenseDataModel->name = $Computer->name;
		$ComputerLicenseDataModel->asign = "No";	
		$ComputerLicenseDataModel->computerIDD = $Computer->computerIDD;
		$ComputerLicenseDataModel->email = $User->email;
		$ComputerLicenseDataModel->created_at = $Computer->created_at->format('Y-m-d h:m:s');
		$ComputerLicenseDataModel->numberComputers = 0;	
		$ComputerLicenseDataModel->CompanyTestDataModel = new CompanyTestDataModel();
		$ComputerLicenseDataModel->premium = $this->getPremiumOrNotComputer($Computer->id);
		$ComputerLicenseDataModel->Product1 = new Product1TestDataModel();
		$ComputerLicenseDataModel->Product2 = new Product2TestDataModel();
		$ComputerLicenseDataModel->Product3 = new Product3TestDataModel();
		$ComputerLicenseDataModel->Product4 = new Product4TestDataModel();
		$ComputerLicenseDataModel->Product5 = new Product5TestDataModel();
		$ComputerLicenseDataModel->Customer1 = new Customer1TestDataModel();
		$ComputerLicenseDataModel->Customer2 = new Customer2TestDataModel();
		$ComputerLicenseDataModel->Customer3 = new Customer3TestDataModel();
		$ComputerLicenseDataModel->Customer4 = new Customer4TestDataModel();
		$ComputerLicenseDataModel->Customer5 = new Customer5TestDataModel();
		$ComputerLicenseDataModel->Supplier1 = new Supplier1TestDataModel();
		$ComputerLicenseDataModel->Supplier2 = new Supplier2TestDataModel();
		$ComputerLicenseDataModel->Supplier3 = new Supplier3TestDataModel();
		$ComputerLicenseDataModel->Supplier4 = new Supplier4TestDataModel();
		$ComputerLicenseDataModel->Supplier5 = new Supplier5TestDataModel();

		//If has license
		if($License){			

			//Get the series x user model
			$SeriesXUser = Repository::getInstance()->getSeriesXUserRepository()->getByID($License->seriesXUserID);
			
			//Complete the information
			$ComputerLicenseDataModel->serie = $SeriesXUser->serie;

			//Get if it is assigned to a license
			$License = $this->computerExistsInLicense($Computer->computerIDD);			
			$ComputerLicenseDataModel->asign = "Si";
			$ComputerLicenseDataModel->numberComputers = $SeriesXUser->numberComputers;
			$ComputerLicenseDataModel->remainingDays = "-1";
		}

		//Get if the user stills has premium
		$PremiumFuntionsDataModel = new PremiumFuntionsDataModel();
		$premium = $this->getPremiumOrNotComputer($Computer->id);
		if(!$premium){
			
			$PremiumFuntionsDataModel->premium = false;
			$PremiumFuntionsDataModel->sendToOnlyOneDestinataryInFact = true;
			$PremiumFuntionsDataModel->onlyUseIVATax = true;
			$PremiumFuntionsDataModel->onlyOneSerieForDocument = true;
			$PremiumFuntionsDataModel->disableInvoiceTicketsWindow = true;
			$ComputerLicenseDataModel->remainingDays = "0";

			$ComputerLicenseDataModel->channel = Repository::getInstance()->getChannelsRepository()->getNotPremiumChannel()->name;
		}
		else{

			//Get the remaining days of the licence
			if(!$License){
				$OldDate = strtotime($Computer->created_at->format('Y-m-d'));
				$NewDate = date('M j, Y', $OldDate);
				$diff = date_diff(date_create($NewDate),date_create(date("M j, Y")));
				$dayDif = 30 - $diff->format('%R%');

				$ComputerLicenseDataModel->remainingDays = $dayDif;
			}

			$PremiumFuntionsDataModel->premium = true;
			$PremiumFuntionsDataModel->sendToOnlyOneDestinataryInFact = false;
			$PremiumFuntionsDataModel->onlyUseIVATax = false;
			$PremiumFuntionsDataModel->onlyOneSerieForDocument = false;
			$PremiumFuntionsDataModel->disableInvoiceTicketsWindow = false;

			$ComputerLicenseDataModel->channel = Repository::getInstance()->getChannelsRepository()->getPremimChannel()->name;
		}
		
		$ComputerLicenseDataModel->PremiumFuntionsDataModel = $PremiumFuntionsDataModel;

		//Return the model
		return $ComputerLicenseDataModel;
	}


	//Get all the licenses info for a user
	public function getAllLicensesInfo($userID){

		//Get all the series model for the user
		$series = Repository::getInstance()->getSeriesXUserRepository()->getAllByUserID($userID);

		//Loop over all the series and get each individual model info
		$LicenseDataModels = array();
		foreach ($series as $SeriesXUser) {
			$LicenseDataModel = $this->getLicenseInfo($SeriesXUser->serie);			
			array_push($LicenseDataModels,$LicenseDataModel);
		}

		//Return the series
		return $LicenseDataModels;
	}

	//Get license info by serie
	public function getLicenseInfo($serie){
			
		//Return the session info for this user
		$SeriesXUser = Repository::getInstance()->getSeriesXUserRepository()->getBySerie($serie);
		if($SeriesXUser){

			//Get the user info
			$User = Repository::getInstance()->getUserRepository()->getUserById($SeriesXUser->userID);
			
			//Get all the computers that belongs to the license and create the computers models
			$Computers = Repository::getInstance()->getComputerRepository()->getAllByUserID($SeriesXUser->id);

			//Create the computers array
			$computers = array();
			foreach($Computers as $Computer_){
				
				//Create the computer model
				$ComputerLicenseDataModel = $this->getComputerLicenseInfo($Computer_->id);

				//Add the computers array
			    array_push($computers,$ComputerLicenseDataModel);
			}
			
			//Get the total of users for the license
			$usedUsers = $this->getUsedUsersForLicense($serie);

			//Get the total of free users
			$freeUsers = $this->getFreeUsersForLicense($serie);

			//Create the model
			$LicenseDataModel = new LicenseDataModel();
			$LicenseDataModel->email = $User->email;
			$LicenseDataModel->computerIDD = "";
			$LicenseDataModel->name = "";
			$LicenseDataModel->serie = $SeriesXUser->serie;
			$LicenseDataModel->numberComputers = $SeriesXUser->numberComputers;
			$LicenseDataModel->freeUsers = $freeUsers;			
			$LicenseDataModel->usedUsers = $usedUsers;
			$LicenseDataModel->computers = $computers;		
			$LicenseDataModel->computerCreatedAt = "";
			$LicenseDataModel->licenseCreatedAt = $SeriesXUser->created_at;

			//Return the license info model
			return $LicenseDataModel;
		}
		else{
			return null;
		}
	}

	//Get license info based on computer id
	public function getByComputerID($computerID){

		//Get the model and return it
		$License = \License::where("computerID","=",$computerID)->first();
		return $License;
	}

	//Check if a user has a current license
	public function userHasLicense($userID){

		//Get the license info
		$SeriesXUser = Repository::getInstance()->getSeriesXUserRepository()->getByUserID($userID);

		//Return the response
		if($SeriesXUser){
			return true;
		}
		else{
			return false;
		}
	}

	//Generate serial for a new user in  license payment 
	public function generateSerie($userID,$email,$productCode){

		//Concatenate the values for the serie generation
		$md5 = strtoupper(md5($userID."|".$email."|".$productCode."|".microtime()));
	
		$code[] = substr ($md5, 0, 5);
		$code[] = substr ($md5, 5, 5);
		$code[] = substr ($md5, 10, 5);
		$code[] = substr ($md5, 15, 5);
		
		//Return the serie
		$membcode = implode ("-", $code);
		if (strlen($membcode) == "23") { 
			return ($membcode); 
		} else { 
			return (false); 
		}
	}

	//Add a new license for a user
	public function addLicense($userID,$serie,$numberComputers,$paymentID){
		
		//Asign the license to the user
		$SeriesXUser = Repository::getInstance()->getSeriesXUserRepository()->addLicenseToUser($userID,$serie,$numberComputers,$paymentID);

		//Return the result
		return $SeriesXUser;
	}

	//Validate if the computer exists
	public function computerExists($computerIDD){

		//Get the model and return if exists or not
		$Computer = Repository::getInstance()->getComputerRepository()->getByComputerIDD($computerIDD);
		return $Computer ? true:false;		
	}

	//Add a user computer to license
	public function activateLicense($serie,$computerIDD){

		//Get the computer information
		$Computer = Repository::getInstance()->getComputerRepository()->getByComputerIDD($computerIDD);

		//Get the user license information
		$SeriesXUser = Repository::getInstance()->getSeriesXUserRepository()->getBySerie($serie);

		//Asign the user computer to the existing license
		$License = new \License();
		$License->computerID = $Computer->id;
		$License->seriesXUserID = $SeriesXUser->id;
		$License->save();

		//Return the license information
		return $SeriesXUser;
	}

	//Remove item by seriesXUserID
	public function removeBySeriesXUserID($seriesXUserID){

		//Get the model and delete ir
		$res = \License::where("seriesXUserID","=",$seriesXUserID)->delete();

		//Return result
		return $res;
	}

	//Remove item by computerID
	public function deleteByComputerID($computerID){

		//Delete the model
		$res = \License::where("computerID","=",$computerID)->delete();

		//Return the result
		return $res;
	}

	//Remove user computer from license
	public function deleteComputerUserFromLicense($serie,$computerID){

		//Get the series x user info model
		$SeriesXUser = Repository::getInstance()->getSeriesXUserRepository()->getBySerie($serie);

		//Remove the computer from the license
		$res = \License::where("seriesXUserID","=",$SeriesXUser->id)->where("computerID","=",$computerID)->delete();

		//Return the result
		return $res;
	}

	//Remove a license for a computer user
	public function revoqueLicense($serie,$computerIDD){

		//Get the compute information
		$Computer = Repository::getInstance()->getComputerRepository()->getByComputerIDD($computerIDD);

		//Remove the user computer to the existing license
		$res = $this->deleteComputerUserFromLicense($serie,$Computer->id);		

		//Return the deletion result
		return $res;
	}

	//Get if there are more availables computers to use for the license
	public function computersAvailables($serie){

		//There are not more available users for the license
		$valid = false;

		//Get total of computers for the licence
		$totalUsers = $this->getTotalUsersForLicense($serie);		

		//Get all the used computers for the license
		$usedComputers = $this->getUsedUsersForLicense($serie);

		//Validate if still exists computers to use for this license
		if($totalUsers > $usedComputers){
			$valid = true;
		}

		//Return the result
		return $valid;
	}

	//Verify if a serie exists
	public function serieExists($serie){

		//Get the model
		$SeriesXUser = Repository::getInstance()->getSeriesXUserRepository()->getBySerie($serie);

		//Return if exists or not
		return $SeriesXUser ? true:false;			
	}

	//Validate if user exists for a license
	public function computerExistsInLicense($computerIDD){

		//Get the computer
		$Computer = Repository::getInstance()->getComputerRepository()->getByComputerIDD($computerIDD);

		//Get the license for the computer user		
		$License = $this->getByComputerID($Computer->id);

		//Return if the computer user already has a license
		return $License ? true:false;			
	}
	
	//Get the total computers for a license
	public function getTotalComputersForLicense($serie){

		//Get the total of computers for the license
		$SeriesXUser = Repository::getInstance()->getSeriesXUserRepository()->getBySerie($serie);

		//Get the total number of computers for the serie		
		if($SeriesXUser){
			$numberComputers = $SeriesXUser->numberComputers;
		}
		else{
			return 0;
		}
	}

	//Get license info based on computer id
	public function getBySerie($serie){

		//Get the model
		$License = \License::where("serie","=",$serie)->first();

		//Return the model
		return $License;
	}

	//Get the total used users for a license
	public function getUsedUsersForLicense($serie){

		//Total used computers per license
		$totalUsed = Repository::getInstance()->getSeriesXUserRepository()->getTotalSerieUsedComputers($serie);

		//Return the amount of used users for the license
		return $totalUsed;
	}

	//Get the total  users for a license
	public function getTotalUsersForLicense($serie){

		//Get the licence info by serie
		$SeriesXUser = Repository::getInstance()->getSeriesXUserRepository()->getBySerie($serie);

		//Total user per license
		$totalUsers = $SeriesXUser->numberComputers;

		//Return the total of users for the license
		return $totalUsers;
	}

	//Get the total free users for a license
	public function getFreeUsersForLicense($serie){

		//Get the total users for the license
		$totalUsers = $this->getTotalUsersForLicense($serie);
		
		//Get the used users for the license
		$totalUsedUsers = Repository::getInstance()->getSeriesXUserRepository()->getTotalSerieUsedComputers($serie);

		//Calculate the total of free licenses
		$freeUsers = $totalUsers - $totalUsedUsers;

		//Return the amount of free users for the license
		return $freeUsers;
	}

	public function getComputersLicensesInfo($userID){

		//Get all the existing computers
		$computers = Repository::getInstance()->getComputerRepository()->getAllByUserID($userID);

		//Create the computers variable to store array
		$computers_ = array();

		//Loop over all the computers
		foreach ($computers as $computer) {
			
			//Get the computer license info
			$ComputerLicenseDataModel = $this->getComputerLicenseInfo($computer->id);

			//Add to the computers array the model	
			array_push($computers_, $ComputerLicenseDataModel);			
		}

		//Return the array
		return $computers_;
	}
}
