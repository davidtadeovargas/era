<?php

namespace App\repository;

class UserHistoryTypeRepository extends Repository {
	
	public function __construct(){		
	}

	public function getFirstInstalationType(){	
		$UserHistoryType = \UserHistoryType::where('description', '=', "PRIMERA INSTALACIÓN")->first();
		return $UserHistoryType;
	}

	public function getFirstBuyLicenseType(){	
		$UserHistoryType = \UserHistoryType::where('description', '=', "PRIMERA COMPRA DE LICENCIAMIENTO")->first();
		return $UserHistoryType;
	}

	public function getBuyLicenseType(){
		$UserHistoryType = \UserHistoryType::where('description', '=', "COMPRA DE LICENCIA")->first();
		return $UserHistoryType;
	}

	public function getActivationLicenseInComputerType(){
		$UserHistoryType = \UserHistoryType::where('description', '=', "ACTIVACIÓN DE LICENCIA EN EQUIPO")->first();
		return $UserHistoryType;
	}

	public function getRevocationLicenseInComputerType(){
		$UserHistoryType = \UserHistoryType::where('description', '=', "REVOCACIÓN DE LICENCIA EN EQUIPO")->first();
		return $UserHistoryType;
	}

	public function getProductBuyType(){
		$UserHistoryType = \UserHistoryType::where('description', '=', "COMPRA DE PRODUCTO")->first();
		return $UserHistoryType;
	}

	public function getLoginType(){
		$UserHistoryType = \UserHistoryType::where('description', '=', "LOGIN")->first();
		return $UserHistoryType;
	}

	public function getCompraTimbresType(){
		$UserHistoryType = \UserHistoryType::where('description', '=', "COMPRA DE TIMBRES")->first();
		return $UserHistoryType;
	}

	public function getRegistroUsuarioType(){
		$UserHistoryType = \UserHistoryType::where('description', '=', "REGISTRO DE USUARIO")->first();
		return $UserHistoryType;
	}

	public function getCierreDeSesionType(){
		$UserHistoryType = \UserHistoryType::where('description', '=', "CIERRE DE SESION DE USUARIO")->first();
		return $UserHistoryType;
	}

	public function getAll(){
		$UserHistoryTypes = \UserHistoryType::all();
		return $UserHistoryTypes;
	}

	public function getByID($id){
		$UserHistoryType = \UserHistoryType::where("id","=",$id)->first();
		return $UserHistoryType;
	}
}
