<?php

namespace App\managers;

use App\repository\Repository;
use App\models\viewmodels\ShoppingCartViewModel;
use App\models\viewmodels\BuyLicenseViewModel;
use App\models\viewmodels\AdminPanelViewModel;
use App\models\viewmodels\UsersHistoryViewModel;
use App\models\viewmodels\AdminPanelAdminViewModel;
use App\models\viewmodels\PushNotificationsViewModel;
use App\models\viewmodels\RevoqueLicenseViewModel;
use App\models\viewmodels\LicensesViewModel;
use App\models\viewmodels\PerfilViewModel;
use App\models\viewmodels\PushNotificationsLogViewModel;

class ViewModelManager extends BaseManager {

	// Hold the class instance.
  	private static $instance = null;

	// The constructor is private
  	// to prevent initiation with outer code.
	public function __construct(){
		parent::__construct();
	}

	// The object is created from within the class itself
	// only if the class has no instance.
	public static function getInstance()
	{
	    if (self::$instance == null)
	    {
	      self::$instance = new ViewModelManager();
	    }
	 
	    return self::$instance;
	}

	public function getShoppingCartViewModel(){
		return $this->getViewModel("ShoppingCartViewModel");
	}


	public function getAdminPanelViewModel(){
		return $this->getViewModel("AdminPanelViewModel");	
	}

	public function getAdminPanelAdminViewModel(){
		return $this->getViewModel("AdminPanelAdminViewModel");	
	}

	public function getPushNotificationsViewModel(){
		return $this->getViewModel("PushNotificationsViewModel");	
	}

	public function getRevoqueLicenseViewModel(){
		return $this->getViewModel("RevoqueLicenseViewModel");	
	}

	public function getBuyLicenseViewModel(){
		return $this->getViewModel("BuyLicenseViewModel");	
	}

	public function getUsersHistoryViewModel(){
		return $this->getViewModel("UsersHistoryViewModel");
	}	

	public function getLicensesViewModel(){
		return $this->getViewModel("LicensesViewModel");		
	}

	public function getPerfilViewModel(){
		return $this->getViewModel("PerfilViewModel");
	}

	public function getPushNotificationsLogViewModel(){
		return $this->getViewModel("PushNotificationsLogViewModel");		
	}

	private function getViewModel($viewmodel){

		$BaseViewModel = null;
		switch($viewmodel){

			case "ShoppingCartViewModel":
				$BaseViewModel = new ShoppingCartViewModel();
				break;

			case "AdminPanelViewModel":
				$BaseViewModel = new AdminPanelViewModel();
				break;

			case "AdminPanelAdminViewModel":
				$BaseViewModel = new AdminPanelAdminViewModel();
				break;

			case "PushNotificationsViewModel":
				$BaseViewModel = new PushNotificationsViewModel();
				break;

			case "RevoqueLicenseViewModel":
				$BaseViewModel = new RevoqueLicenseViewModel();
				break;

			case "BuyLicenseViewModel":
				$BaseViewModel = new BuyLicenseViewModel();
				break;

			case "UsersHistoryViewModel		":
				$BaseViewModel = new UsersHistoryViewModel();
				break;

			case "LicensesViewModel":
				$BaseViewModel = new UsersHistoryViewModel();
				break;	

			case "PerfilViewModel":
				$BaseViewModel = new PerfilViewModel();
				break;

			case "PushNotificationsLogViewModel":
				$BaseViewModel = new PushNotificationsLogViewModel();
				break;			
		}

		//Get the type of user
		$User = Repository::getInstance()->getUserRepository()->getUserFromSession();
		$isAdmin = Repository::getInstance()->getUserRepository()->isUserAdmin($User->email);

		if($isAdmin){
			$home = "/admin_panel_admins";
		}
		else{
			$home = "/admin_panel";
		}

		//Add common fields
		$BaseViewModel->home = $home;
		$BaseViewModel->isAdmin = $isAdmin;	
		$BaseViewModel->User = $User;

		//Check if the perfil image exists
		$perfilImage = public_path()."/images/users/".$User->email."/perfil.png";
		if(file_exists($perfilImage)){
			$BaseViewModel->perfilImage = "/images/users/".$User->email."/perfil.png";
		}
		else{
			$BaseViewModel->perfilImage = "images/home/user.png";
		}

		$BaseViewModel->lastLogin = Repository::getInstance()->getUserHistoryRepository()->getLastUserLogin($User->id);
			
		return $BaseViewModel;
	}
}