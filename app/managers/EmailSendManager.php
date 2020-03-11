<?php

namespace App\managers;

use App\repository\Repository;

class EmailSendManager extends BaseManager {

	// Hold the class instance.
  	private static $instance = null;

	public $EmailDataModel;


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
	      self::$instance = new EmailSendManager();
	    }
	 
	    return self::$instance;
	}

	public function setEmailDataModel($EmailDataModel){
		$this->EmailDataModel = $EmailDataModel;
		return $this;
	}

	public function send(){
		
		//Send the email
		$emailSend = true;
		$emailErrorMessage = "";
		try{

			$model = $this->EmailDataModel->model;
			$User = $this->EmailDataModel->model->User;			

			ini_set('max_execution_time', 60000);
			\Mail::send('emails.'.$this->EmailDataModel->viewName, ['model' => $this->EmailDataModel->model], function ($m) use ($User) {
	        	$m->from('coritocorito@hotmail.com', 'Easy Retail Admin');
	        	$m->to($User->email, $User->name)->subject($this->EmailDataModel->subject);
	         });			
		}
		catch(Exception $e){
			$emailSend = false;
			$emailErrorMessage = $e->getMessage();
		}			

		//Get the email type
		$emailTypeID = -1;		
		if($this->EmailDataModel->emailTypeRegister){
			$emailTypeID = Repository::getInstance()->getEmailTypeRepository()->getRegistrationEmailType()->id;
		}
		else if($this->EmailDataModel->emailTypeLicensePayment){
			$emailTypeID = Repository::getInstance()->getEmailTypeRepository()->getCompraLicenciaEmailType()->id;
		}
		else if($this->EmailDataModel->emailTypeRestoreCredentials){			
			$emailTypeID = Repository::getInstance()->getEmailTypeRepository()->getRestorePasswordEmailType()->id;
		}
		else if($this->EmailDataModel->emailTypeTest){			
			$emailTypeID = Repository::getInstance()->getEmailTypeRepository()->getTestEmailType()->id;
		}
		
		//Save the email log
		$Email = new \Email();
		$Email->userID = $this->EmailDataModel->model->User->id;
		$Email->emailTypeID = $emailTypeID;
		$Email->send = $emailSend;
		$Email->errorDescription = $emailErrorMessage;
		$Email->save();			
	}	
}