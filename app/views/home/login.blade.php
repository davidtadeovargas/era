@extends('templates.login_basic_template')

@section('meta_section')
    @parent

    <title>ERA Login</title>

@stop

@section('link_section')
    @parent    
@stop

@section('body_section')
    @parent

    <!-- LOADER -->
	    <!--<div id="preloader">
			<div class="preloader pulse">
				<i class="fa fa-heartbeat" aria-hidden="true"></i>
			</div>
	    </div>--><!-- end loader -->
	    <!-- END LOADER -->

		<div class="remodal-bg">
			
			<div class="remodal" data-remodal-id="empty_fields_modal">
			  <button data-remodal-action="close" class="remodal-close"></button>
			  <h1>Ups!</h1>
			  <p>
			    Aun hay campos sin llenar, porfavor completalos antes de continuar
			  </p>
			  <br>
			  <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
			</div>
			<div class="remodal" data-remodal-id="invalid_login_modal"
			  data-remodal-options="hashTracking: false, closeOnOutsideClick: false">

			  <button data-remodal-action="close" class="remodal-close"></button>
			  <h1>Ups!</h1>
			  <p>
			    Tus credenciales de acceso son incorrectas!
			  </p>
			  <br>		 	
			  <button data-remodal-action="confirm" class="remodal-confirm" id="continue_register_modal_ok">OK</button>
			</div>
			<div class="remodal" data-remodal-id="email_not_active_modal"
			  data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
			  <button data-remodal-action="close" class="remodal-close"></button>
			  <h1>Ups!</h1>
			  <p>
			    Aun no has activado tu correo electrónico. Desde tu bandeja de entrada activalo dando clic en el link que se envio cuando hiciste tu registro.
			  </p>
			  <br>		 	
			  <button data-remodal-action="confirm" class="remodal-confirm" id="email_not_active_modal_ok">OK</button>
			</div>
			<div class="remodal" data-remodal-id="error_ajax_modal"
			  data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
			  <button data-remodal-action="close" class="remodal-close"></button>
			  <h1>Ups!</h1>
			  <p>
			    No pudimos procesar tu solicitud en este momento, una disculpa
			  </p>
			  <br>		 	
			  <button data-remodal-action="confirm" class="remodal-confirm" id="continue_register_modal_ok">OK</button>
			</div>
			<div class="remodal" data-remodal-id="user_not_exists_modal"
			  data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
			  <button data-remodal-action="close" class="remodal-close"></button>
			  <h1>Ups!</h1>
			  <p>
			    El usuario con el que intentas ingresar no existe
			  </p>
			  <br>		 	
			  <button data-remodal-action="confirm" class="remodal-confirm" id="user_not_exists_modal_ok">OK</button>
			</div>

			<br>		
			<!-- Start  Login -->
			<div id="login" class="contact-box">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="title-box">
								<h2>Ingresa a tu cuenta</h2>								
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-sm-12 col-xs-12">
						  <div class="contact-block">
							<form id="loginForm">
							  <div class="row">
							  	<div class="col-md-4">
							  	</div>
								<div class="col-md-4">
									<div class="form-group">
										<input type="text" placeholder="Tu correo electrónico" id="loginEmail" class="form-control" name="name" required data-error="Porfavor ingresa tu correo electrónico aquí">
										<div class="help-block with-errors"></div>
									</div> 
								</div>
								<div class="col-md-4">
							  	</div>
							  	<div class="col-md-4">
							  	</div>
								<div class="col-md-4">
									<div class="form-group">
										<input type="password" placeholder="Tu contraseña" id="loginPassword" class="form-control" name="name" required data-error="Porfavor ingresa tu contraseña para la cuenta">
										<div class="help-block with-errors"></div>
									</div> 
								</div>	
								<div class="col-md-4">
							  	</div>					
								<div class="col-md-12">
									<div class="submit-button text-center">
										<button class="btn btn-common" id="loginButton" type="submit">Entrar</button>
										<br><br><a href="send_restore_credentials" style="color: blue">¿Olvidates tu contraseña?</a>
										<div id="msgSubmit" class="h3 text-center hidden"></div> 
										<div class="clearfix"></div> 
									</div>
								</div>							
							  </div>            
							</form>
						  </div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Login -->

		</div>		

@stop

@section('footer_section')
    @parent    
@stop

@section('js_section')
    @parent    
@stop

@section('custom_js_section')
    @parent

    <script>
                
        var redirectTo = "<?php echo $model->redirectTo; ?>";
        var redirect = "<?php echo $model->redirect; ?>";

        $(document).ready(function () {

        	console.log("redirectTo = " + redirectTo);
        	console.log("redirect = " + redirect);

        	if(redirect){
        		window.location.href = redirectTo;
        	}

        	$("#loginButton").click(function(){

        		// cancel default behavior
        		event.preventDefault();
        		
        		//Get all the fields in variables
			  	var user = $('#loginEmail').val();
			  	var password = $('#loginPassword').val();			  	

			  	//Log fields
			  	console.log("user: " + name);
			  	console.log("password: " + password);
			  	
			  	//Validate that all the fields has data
			  	var valid = true;
			  	if(!user.trim()){
			  		valid = false;
			  	}
			  	if(!password.trim()){
			  		valid = false;
			  	}			  	

			  	if(!valid){

			  		//If some field does not have data show error
			  		var inst = $('[data-remodal-id=empty_fields_modal]').remodal();
					inst.open();
					return;
			  	}

			  	//Validate the user email sintax
			  	if(!user.includes("@") && !user.includes(".")){
			  	
			  		//If invlaid email sintax show error
					var inst = $('[data-remodal-id=invalid_email_sintax_modal]').remodal();
					inst.open();
					return;
			  	}

			  	//Create the json model for ajax
				var LoginRequestModel = 	{ loginDataModel : { user: user, password:password},token:"sdsal1129399458ddkskdklsklds0939"};
				console.log(LoginRequestModel);

				//Disable the form fields to prevent duplication of ajax
				disableFormFieldsLogin();

			  	//Send the ajax
				$.ajax({
				    type: "POST",
				    url: "/login",
				    async:true,
				    dataType: "json",
				    contentType: 'application/json',
				    data: JSON.stringify(LoginRequestModel),
				    beforeSend: function(){
				    	showLoading();
					  },
				    success: function (data) {

				    	hideLoading();

				    	//Console log the raw result
				        console.log("success from ajax: " + data);

				        //If invalid credentials show error
				        if(data["errorCode"]=="INVALID_LOGIN_ERROR"){
				        	var inst = $('[data-remodal-id=invalid_login_modal]').remodal();
							inst.open();
				        	return;
				        }

				        //If user exists show error
				        if(data["errorCode"]=="USER_NOT_EXISTS_ERROR"){
				        	var inst = $('[data-remodal-id=user_not_exists_modal]').remodal();
							inst.open();
				        	return;
				        }

				        //If the users has not activated the email show error
				        if(data["errorCode"]=="EMAIL_NOT_ACTIVATED_YET_ERROR"){
				        	var inst = $('[data-remodal-id=email_not_active_modal]').remodal();
							inst.open();
				        	return;
				        }

				        //Enable all the fields again
						enaleFormFieldsLogin();

						//Clear all the form fields
						$('#loginEmail').val("");
					  	$('#loginPassword').val("");

						//Redirects to the main panel
						window.location.href = "/" + data["redirectTo"] + "?token=sdsal1129399458ddkskdklsklds0939";
												
				    },
				    error: function (data) {

				    	//Log error in console
				        console.log('Error:', data);

				        //Show error modal dialog
						var inst = $('[data-remodal-id=error_ajax_modal]').remodal();
						inst.open();

				        //Enable all the fields again
						enaleFormFieldsLogin();

				    },
				    complete: function(){
						hideLoading();
					  }
				});
        	});
        });        

        //Diable all the fields in the login form
        function disableFormFieldsLogin(){
        	
			$('#user').prop("disabled", true);
			$('#password').prop("disabled", true);			
        }

        //Enable all the fields in the login form
        function enaleFormFieldsLogin(){

			$('#user').prop("disabled", false);
			$('#password').prop("disabled", false);			
        }	

    </script>
    
@stop