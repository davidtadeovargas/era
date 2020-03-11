<?php

namespace App\repository;

class Repository {
	
	// Hold the class instance.
  	private static $instance = null;

  	//Create the repositories
  	private $EmailTypeRepository = null;  	
  	private $UsersRepository = null;
  	private $LicenseRepository = null;
  	private $CompanyRepository = null;
  	private $SeriesXUserRepository = null;
  	private $ComputerRepository = null;
  	private $ProductRepository = null;
  	private $PaymentRepository = null;
  	public $ChannelsRepository = null;
  	public $PushNotificationsAutomatedRepository = null;
  	public $PushNotificationsAutomatedLogRepository = null;
  	public $UserHistoryTypeRepository = null;
  	public $UserHistoryRepository = null;
  	public $ProductTypeRepository = null;




  	// The constructor is private
  	// to prevent initiation with outer code.
	private function __construct(){
	}

	// The object is created from within the class itself
	// only if the class has no instance.
	public static function getInstance()
	{
	    if (self::$instance == null)
	    {
	      self::$instance = new Repository();
	    }
	 
	    return self::$instance;
	 }

	 public function getEmailTypeRepository(){
	 	if($this->EmailTypeRepository==null){
	 		$this->EmailTypeRepository = new EmailTypeRepository();
	 	}
	 	return $this->EmailTypeRepository;
	 }
	 public function getUserRepository(){
	 	if($this->UsersRepository==null){
	 		$this->UsersRepository = new UsersRepository();
	 	}
	 	return $this->UsersRepository;
	 }
	 public function getLicenseRepository(){
	 	if($this->LicenseRepository==null){
	 		$this->LicenseRepository = new LicenseRepository();
	 	}
	 	return $this->LicenseRepository;
	 }
	 public function getCompanyRepository(){
	 	if($this->CompanyRepository==null){
	 		$this->CompanyRepository = new CompanyRepository();
	 	}
	 	return $this->CompanyRepository;
	 }
	 public function getSeriesXUserRepository(){
	 	if($this->SeriesXUserRepository==null){
	 		$this->SeriesXUserRepository = new SeriesXUserRepository();
	 	}
	 	return $this->SeriesXUserRepository;
	 }
	 public function getComputerRepository(){
	 	if($this->ComputerRepository==null){
	 		$this->ComputerRepository = new ComputerRepository();
	 	}
	 	return $this->ComputerRepository;
	 }
	 public function getProductRepository(){
	 	if($this->ProductRepository==null){
	 		$this->ProductRepository = new ProductRepository();
	 	}
	 	return $this->ProductRepository;
	 }
	 public function getChannelsRepository(){
	 	if($this->ChannelsRepository==null){
	 		$this->ChannelsRepository = new ChannelsRepository();
	 	}
	 	return $this->ChannelsRepository;
	 }
	 public function getPushNotificationsAutomatedRepository(){
	 	if($this->PushNotificationsAutomatedRepository==null){
	 		$this->PushNotificationsAutomatedRepository = new PushNotificationsAutomatedRepository();
	 	}
	 	return $this->PushNotificationsAutomatedRepository;
	 }
	 public function getPushNotificationsAutomatedLogRepository(){
	 	if($this->PushNotificationsAutomatedLogRepository==null){
	 		$this->PushNotificationsAutomatedLogRepository = new PushNotificationsAutomatedLogRepository();
	 	}
	 	return $this->PushNotificationsAutomatedLogRepository;
	 }	 
	 public function getPaymentRepository(){
	 	if($this->PaymentRepository==null){
	 		$this->PaymentRepository = new PaymentRepository();
	 	}
	 	return $this->PaymentRepository;
	 }
	 public function getUserHistoryTypeRepository(){
	 	if($this->UserHistoryTypeRepository==null){
	 		$this->UserHistoryTypeRepository = new UserHistoryTypeRepository();
	 	}
	 	return $this->UserHistoryTypeRepository;
	 }
	 public function getUserHistoryRepository(){
	 	if($this->UserHistoryRepository==null){
	 		$this->UserHistoryRepository = new UserHistoryRepository();
	 	}
	 	return $this->UserHistoryRepository;
	 }
	 public function getProductTypeRepository(){
	 	if($this->ProductTypeRepository==null){
	 		$this->ProductTypeRepository = new ProductTypeRepository();
	 	}
	 	return $this->ProductTypeRepository;
	 }
}
