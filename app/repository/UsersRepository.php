<?php

namespace App\repository;

class UsersRepository extends Repository {
	
	public function __construct(){		
	}

	//Add a new user
	public function newUser($name,$phone,$email,$password,$hash){

		//Save the new user in the database		
		$User = new \User();
		$User->name = $name;
		$User->phone = $phone;
		$User->email = $email;
		$User->password = $password;
		$User->hash = $hash;
		$User->save();

		//Return the created model
		return $User;
	}
	
	//Add a new user
	public function updateUser($User){

		$User->save();

		//Return the created model
		return $User;
	}

	//Validate user credentials
	public function validateCredentials($email,$password){

		//Get the model and return it
		$User = \User::where("email","=",$email)->where("password","=",$password)->first();
		return $User ? true:false;
	}

	//Check if the user is admin
	public function isUserAdmin($email){

		//Get the model and return it
		$User = \User::where("email","=",$email)->where("admin","=",true)->first();
		return $User ? true:false;
	}

	public function userRestoreCredentialsHash($user){
     	
     	//Get the user
		$User = $this->getUser($user);

		//Create the hash
		$hash = uniqid ("ERA", true);		

		//Add the hash to the user
		$User->pwdhash = $hash;
		$User->save();

		//Return the user
		return $User;   
    }
	
	
	public function getByPWDHash($hash){
        
        //Get the model and return it
		$User = \User::where("pwdhash","=",$hash)->first();
		return $User;
    }

	//Get the user based on email
	public function getUser($email){

		//Get the model and return it
		$User = \User::where("email","=",$email)->first();
		return $User;
	}

	//Get the user from session
	public function getUserFromSession(){		

		//Get the model and return it
		$User = $this->getUser(\Session::get("user"));		
		return $User;
	}

	//Get the user by id
	public function getUserById($userID){

		//Get the model and return it
		$User = \User::where("id","=",$userID)->first();
		return $User;
	}

	//Get the user by hash
	public function getByHash($hash){

		//Get the model and return it
		$User = \User::where("hash","=",$hash)->first();
		return $User;
	}

	//Get the user by ID
	public function getByID($id){

		//Get the model and return it
		$User = \User::where("id","=",$id)->first();
		return $User;
	}

	//Checks if the user has session
	public function userHasSession(){		

		//Validate if exists session
		$hasSession = \Session::has("user");

		//Return the result
		return $hasSession;
	}

	//Create user session
	public function createUserSession($email){

		//Create the user session		
		\Session::put('user', $email);
	}

	//Clear user session
	public function clearUserSession(){

		//Clear the user session
		\Session::flush();
	}

	//Activate the registration email for the user
	public function activateUserEmail($userID){

		//Get the model and update it
		$User = \User::where("id","=",$userID)->first();
		$User->emailActive = true;
		$User->save();
		
		//Return result
		return $User;
	}

	public function updateUserPassword($email, $password){
 	    
 	    $User = $this->getUser($email);
 	    $User->password = $password;
 	    $User->save();

 	    return $User;
    }
}
