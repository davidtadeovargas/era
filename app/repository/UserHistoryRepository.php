<?php

namespace App\repository;

use App\models\data\UserHistoryDataModel;

class UserHistoryRepository extends Repository {
	
	public function __construct(){		
	}

	public function saveFirstInstalation($user_id){	
		
		$UserHistoryType = Repository::getInstance()->getUserHistoryTypeRepository()->getFirstInstalationType();

		$UserHistory = new \UserHistory();
		$UserHistory->user_history_type_id = $UserHistoryType->id;
		$UserHistory->user_id = $user_id;
		$UserHistory->save();

		return $UserHistory;
	}

	public function getLastUserLogin($user_id){

		$UserHistoryType = Repository::getInstance()->getUserHistoryTypeRepository()->getLoginType();

		$results = \DB::select('SELECT * FROM users_history
								WHERE user_id = '.$user_id.'
								AND user_history_type_id = '.$UserHistoryType->id.' ORDER BY id DESC limit 2');

		if(count($results)==1){
			$lastUserLogin = $results[0]->created_at;
		}
		else{
			$lastUserLogin = $results[1]->created_at;
		}

		return $lastUserLogin;
	}

	public function saveFirstBuyLicense($user_id,$payment_id,$product_id){
		
		$UserHistoryType = Repository::getInstance()->getUserHistoryTypeRepository()->getFirstBuyLicenseType();

		$UserHistory = new \UserHistory();
		$UserHistory->user_history_type_id = $UserHistoryType->id;
		$UserHistory->user_id = $user_id;
		$UserHistory->payment_id = $payment_id;
		$UserHistory->product_id = $product_id;
		$UserHistory->save();

		return $UserHistory;
	}

	public function saveBuyLicenseHistory($user_id,$payment_id,$product_id){
		
		$UserHistoryType = Repository::getInstance()->getUserHistoryTypeRepository()->getBuyLicenseType();

		$UserHistory = new \UserHistory();
		$UserHistory->user_history_type_id = $UserHistoryType->id;
		$UserHistory->user_id = $user_id;
		$UserHistory->payment_id = $payment_id;
		$UserHistory->product_id = $product_id;
		$UserHistory->save();

		return $UserHistory;
	}

	public function saveBuyTimbresHistory($user_id,$payment_id,$product_id){
		
		$UserHistoryType = Repository::getInstance()->getUserHistoryTypeRepository()->getCompraTimbresType();

		$UserHistory = new \UserHistory();
		$UserHistory->user_history_type_id = $UserHistoryType->id;
		$UserHistory->user_id = $user_id;
		$UserHistory->payment_id = $payment_id;
		$UserHistory->product_id = $product_id;
		$UserHistory->save();

		return $UserHistory;
	}
	
	public function saveLoginHistory($user_id){
		
		$UserHistoryType = Repository::getInstance()->getUserHistoryTypeRepository()->getLoginType();

		$UserHistory = new \UserHistory();
		$UserHistory->user_history_type_id = $UserHistoryType->id;
		$UserHistory->user_id = $user_id;		
		$UserHistory->save();

		return $UserHistory;
	}

	public function saveActivationLicenseInComputer($user_id,$computer_id,$serie){
		
		$UserHistoryType = Repository::getInstance()->getUserHistoryTypeRepository()->getActivationLicenseInComputerType();

		$UserHistory = new \UserHistory();
		$UserHistory->user_history_type_id = $UserHistoryType->id;
		$UserHistory->user_id = $user_id;
		$UserHistory->computer_id = $computer_id;
		$UserHistory->serie = $serie;
		$UserHistory->save();

		return $UserHistory;
	}

	public function saveRevocationLicenseInComputer($user_id,$computer_id,$serie){
		
		$UserHistoryType = Repository::getInstance()->getUserHistoryTypeRepository()->getRevocationLicenseInComputerType();

		$UserHistory = new \UserHistory();
		$UserHistory->user_history_type_id = $UserHistoryType->id;
		$UserHistory->user_id = $user_id;
		$UserHistory->computer_id = $computer_id;
		$UserHistory->serie = $serie;
		$UserHistory->save();

		return $UserHistory;
	}

	public function saveProductBuy($user_id,$payment_id,$product_id){
		
		$UserHistoryType = Repository::getInstance()->getUserHistoryTypeRepository()->getProductBuyType();

		$UserHistory = new \UserHistory();
		$UserHistory->user_history_type_id = $UserHistoryType->id;
		$UserHistory->user_id = $user_id;
		$UserHistory->payment_id = $payment_id;
		$UserHistory->product_id = $product_id;
		$UserHistory->save();

		return $UserHistory;
	}


	public function saveUserRegister($user_id){
		
		$UserHistoryType = Repository::getInstance()->getUserHistoryTypeRepository()->getRegistroUsuarioType();

		$UserHistory = new \UserHistory();
		$UserHistory->user_history_type_id = $UserHistoryType->id;
		$UserHistory->user_id = $user_id;
		$UserHistory->save();

		return $UserHistory;
	}

	public function saveCloseSessionRegister($user_id){
		
		$UserHistoryType = Repository::getInstance()->getUserHistoryTypeRepository()->getCierreDeSesionType();

		$UserHistory = new \UserHistory();
		$UserHistory->user_history_type_id = $UserHistoryType->id;
		$UserHistory->user_id = $user_id;
		$UserHistory->save();

		return $UserHistory;
	}

	public function getUsersHistoryByFilter($UsersHistoryFilersDataModel){
		
		//Get all the records that
		$results = \DB::select('SELECT * FROM users_history 
						LEFT OUTER JOIN users ON users.id = users_history.user_id
						LEFT OUTER JOIN users_history_type ON users_history_type.id = users_history.user_history_type_id
						WHERE users.email like("%'.$UsersHistoryFilersDataModel->user.'%")
						AND users_history_type.id = '.$UsersHistoryFilersDataModel->usersHistoryType);
		//Get the repositories								
		$UserRepository = Repository::getInstance()->getUserRepository();
		$ProductRepository = Repository::getInstance()->getProductRepository();
		$PaymentRepository = Repository::getInstance()->getPaymentRepository();
		$UserHistoryTypeRepository = Repository::getInstance()->getUserHistoryTypeRepository();
		$ComputerRepository = Repository::getInstance()->getComputerRepository();

		//Create the new list of results
		$UserHistories = array();
		foreach($results as $result){
	
			$UserHistoryDataModel = new UserHistoryDataModel();

			//Get the user
			$User = $UserRepository->getUserById($result->user_id);
			if($User){
				$UserHistoryDataModel->user = $User->email;
			}
			else{
				$UserHistoryDataModel->user = "";
			}

			//Get the payment
			$Payment = $PaymentRepository->getById($result->payment_id);
			if($Payment){
				$UserHistoryDataModel->payment = $Payment->Order;
			}
			else{
				$UserHistoryDataModel->payment = "";
			}

			//Get the product
			$Product = $ProductRepository->getProductByID($result->product_id);
			if($Product){
				$UserHistoryDataModel->product = $Product->description;
			}
			else{
				$UserHistoryDataModel->product = "";
			}

			//Get the computer
			$Computer = $ComputerRepository->getByID($result->computer_id);
			if($Computer){
				$UserHistoryDataModel->computer = $Computer->computerIDD;
			}
			else{
				$UserHistoryDataModel->computer = "";
			}
			
			//Get the type
			$UserHistoryType = $UserHistoryTypeRepository->getByID($UsersHistoryFilersDataModel->usersHistoryType);
			$UserHistoryDataModel->userHistoryType = $UserHistoryType->description;			

			$UserHistoryDataModel->user_history_type_id = $result->user_history_type_id;
			$UserHistoryDataModel->user_id = $result->user_id;			
			$UserHistoryDataModel->payment_id = $result->payment_id;			
			$UserHistoryDataModel->computer_id = $result->computer_id;			
			$UserHistoryDataModel->product_id = $result->product_id;			
			$UserHistoryDataModel->serie = $result->serie==null?"":$result->serie;
			$UserHistoryDataModel->created_at = $result->created_at;

			array_push($UserHistories, $UserHistoryDataModel);
		}

		//Return the response
		return $UserHistories;	
	}
}
