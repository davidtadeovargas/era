<?php

use App\repository\Repository;
use App\models\request\GetComputerStatusResponseRequestModel;
use App\models\viewmodels\DownloadViewModel;

class DownloadController extends BaseController {

	public function showDownload()
	{
		try{

			//Get params
			$data = Input::all();

			//Get variables
			$download = Input::get('download');

			//Validate params exists
			if(!isset($download)){
				return json_encode(new App\models\request\ErrorParametersResponseRequestModel());
			}

			//Create the model
			$DownloadViewModel = new DownloadViewModel();
			$DownloadViewModel->download = $download;

			//Return the view
			return View::make('home/download')->with('model', $DownloadViewModel);

		}catch(Exception $e){

			return json_encode(new  App\models\request\ErrorExceptionResponseRequestModel($e->getMessage()));	
		}
	}

	public function downloadInstaller()
	{
		try{

			//Create path to installer
			$file= public_path(). "/bin/".\Config::get('app_globals.installer_name');

			//Set headers
		    $headers = array(
		              'Content-Type: application/exe',
		            );

		    //Return the file to download
		    return Response::download($file, \Config::get('app_globals.installer_name'), $headers);

		}catch(Exception $e){

			return json_encode(new  App\models\request\ErrorExceptionResponseRequestModel($e->getMessage()));	
		}
	}
}
