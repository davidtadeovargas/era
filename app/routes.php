<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::post('register', 'RegisterController@registerUser')->before('containsBody')->before('token');

//ShoppingCartController
Route::get('shopping_cart', 'ShoppingCartController@showShoppingCart')->before('session');

//UserController
Route::get('perfil', 'UserController@showPerfil');
Route::post('update_perfil', 'UserController@updatePerfil');

//UsersHistoryController
Route::get('users_history', 'UsersHistoryController@showUsersHistory');
Route::post('get_users_history_by_filter', 'UsersHistoryController@getUsersHistoryByFilter');

//PushNotificationsController
Route::get('send_message', 'PushNotificationsController@sendMessage');
Route::post('save_automated_message', 'PushNotificationsController@saveAutomatedMessage');
Route::post('delete_automated', 'PushNotificationsController@deleteAutomated');
Route::get('push_notifications_log', 'PushNotificationsController@showPushNotificationsLog');

//EmailController
Route::get('activate_email', 'EmailController@activateEmail')->before('tokeng');
Route::get('repeated_email', 'EmailController@showEmailRegistrationRepeated')->before('tokeng');
Route::get('email_registration_correct', 'EmailController@showEmailRegistrationCorrect')->before('tokeng');
Route::post('test_email', 'EmailController@testSendEmail');

//RevocationController
Route::post('revoque_license', 'RevocationController@revoqueLicense')->before('session')->before('token');
Route::post('revoque_license_test', 'RevocationController@revoqueLicenseTest')->before('token');
Route::get('revoque_activate_license', 'RevocationController@showRevoqueLicense')->before('session');

//ActivationController
Route::post('activate_license', 'ActivationController@activateLicense')->before('session')->before('token');
Route::post('activate_license_test', 'ActivationController@activateLicenseTest')->before('token');

//LoginController
Route::post('is_user_logged', 'LoginController@isUserLogged')->before('token');
Route::post('close_session', 'LoginController@closeSession')->before('token');
Route::get('login', 'LoginController@showLogin');
Route::post('login', 'LoginController@login')->before('containsBody')->before('token');
Route::post('login_local', 'LoginController@loginLocal')->before('token');
Route::get('send_restore_credentials', 'LoginController@showSendRestoreLoginCredentials');
Route::post('restore_credentials_', 'LoginController@restoreCredentials');
Route::get('restore_credentials', 'LoginController@showRestoreLoginCredentials');
Route::post('email_credentials', 'LoginController@emailCredentials');

//LicenseController
Route::get('buy_license', 'LicenseController@showBuyLicense')->before('session');
Route::get('buy_license_test', 'LicenseController@showBuyLicenseTest');
Route::post('get_license_info', 'LicenseController@getLicenseInfo')->before('token')->before('session');
Route::post('get_license_info_test', 'LicenseController@getLicenseInfoTest')->before('token');
Route::get('test_get_premium_or_not_computer', 'LicenseController@testGetPremiumOrNotComputer');
Route::get('licenses', 'LicenseController@showLicenses');

//ComputerController
Route::post('get_computer_status', 'ComputerController@getComputerStatus')->before('token');

//PaymentTestController
Route::post('create_test_payment', 'PaymentTestController@createPayment')->before('token');
Route::post('create_test_payment_free_amount', 'PaymentTestController@createTestPaymentFreeAmount')->before('token');

//PaymentController
Route::post('create_payment', 'PaymentController@createPayment')->before('token');

//CompanyController
Route::post('add_or_update_company', 'CompanyController@addOrUpdateCompany')->before('token');
Route::post('get_company_info', 'CompanyController@getCompanyInfo')->before('token');
Route::post('delete_company', 'CompanyController@deleteCompany')->before('token');

//DownloadController
Route::get('download', 'DownloadController@showDownload');
Route::get('download_installer', 'DownloadController@downloadInstaller');

//AdminPanelController
Route::get('admin_panel', 'AdminPanelController@showAdminPanel')->before('session');
Route::get('admin_panel_admins', 'AdminPanelController@showAdminPanelAdmins')->before('session');
Route::get('push_notifications', 'AdminPanelController@showPushNotifications')->before('session');

//HomeController
Route::get('/', function()
{
	return View::make('home/index');	
});

//HomeController
Route::get('/token', function()
{
	return View::make('home/token');	
});
