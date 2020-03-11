@extends('templates.login_basic_template')

@section('meta_section')
    @parent

    <title>ERA Nueva contraseña</title>

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
			<div class="remodal" data-remodal-id="password_doesnt_match_modal">
			  <button data-remodal-action="close" class="remodal-close"></button>
			  <h1>Ups!</h1>
			  <p>
			    Las contraseñas no coinciden
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
			  <button data-remodal-action="confirm" class="remodal-confirm" id="invalid_login_modal_ok">OK</button>
			</div>



			<div class="remodal" data-remodal-id="invalid_params_modal"
			  data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
			  <button data-remodal-action="close" class="remodal-close"></button>
			  <h1>Ups!</h1>
			  <p>
					Parámetros invalidos			    
			  </p>
			  <br>		 	
			  <button data-remodal-action="confirm" class="remodal-confirm" id="invalid_params_modal_ok">OK</button>
			</div>
			<div class="remodal" data-remodal-id="invalid_params_length_modal"
			  data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
			  <button data-remodal-action="close" class="remodal-close"></button>
			  <h1>Ups!</h1>
			  <p>
					Longitud de parámetros invalida			    
			  </p>
			  <br>		 	
			  <button data-remodal-action="confirm" class="remodal-confirm" id="invalid_params_length_modal_ok">OK</button>
			</div>
			<div class="remodal" data-remodal-id="invalid_token_hash_modal"
			  data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
			  <button data-remodal-action="close" class="remodal-close"></button>
			  <h1>Ups!</h1>
			  <p>
					Token pwd invalido		    
			  </p>
			  <br>		 	
			  <button data-remodal-action="confirm" class="remodal-confirm" id="invalid_token_hash_modal_ok">OK</button>
			</div>
			<div class="remodal" data-remodal-id="restored_credentials_modal"
			  data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
			  <button data-remodal-action="close" class="remodal-close"></button>
			  <h1>Ups!</h1>
			  <p>
					Tu contraseña ah sido cambiada con éxito
			  </p>
			  <br>		 	
			  <button data-remodal-action="confirm" class="remodal-confirm" id="restored_credentials_modal_ok">OK</button>
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
			  <button data-remodal-action="confirm" class="remodal-confirm" id="error_ajax_modal_ok">OK</button>
			</div>
			<div class="remodal" data-remodal-id="restore_password_continue_modal"
			  data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
			  <button data-remodal-action="close" class="remodal-close"></button>
			  <h1>ERA</h1>
			  <p>
			    ¿Seguro que deseas continuar con el cambio de contraseña?
			  </p>
			  <br>	
			  <button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>	 	
			  <button data-remodal-action="confirm" class="remodal-confirm" id="restore_password_continue_modal_ok">OK</button>
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
								<h1>Ingresa y repite tu nuevas contraseña</h1>
								<!--<p>Estas a punto de formar parte de la experiencia </p>-->
								<div id="loginLoading" class="loader">
									<img src="images/loading.gif"></img>
								</div>
								<div id="loginLoadingInit" class="loader">
									<img src="images/loading.gif"></img>
								</div>
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
										<input type="password" placeholder="Tu contraseña" id="password" class="form-control" name="name" required data-error="Porfavor ingresa tu nueva contraseña">
										<div class="help-block with-errors"></div>
									</div> 									
								</div>
								<div class="col-md-4">
							  	</div>
							  	<div class="col-md-4">
							  	</div>
								<div class="col-md-4">
									<div class="form-group">
										<input type="password" placeholder="Tu contraseña" id="password2" class="form-control" name="name" required data-error="Porfavor repite tu nueva contraseña">
										<div class="help-block with-errors"></div>
									</div> 
								</div>	
								<div class="col-md-4">
							  	</div>					
								<div class="col-md-12">
									<div class="submit-button text-center">
										<button class="btn btn-common" id="loginButton" type="submit">Cambiar</button>
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
        
        $(document).ready(function () {                         	
        	
        	$("#restored_credentials_modal_ok").click(function(){
        		window.location.href = "/login";
        	});

        	$("#restore_password_continue_modal_ok").click(function(){
        		
        		var password = $('#password').val();
        		var password2 = $('#password2').val();

        		//Create the json model for ajax
				var RestoreCredentialsRequestModel = 	{
					"pwdhash":"<?php echo $model->pwdhash;?>", 
					"password":password,
					"password2":password2,
					"token":"sdsal1129399458ddkskdklsklds0939"};
				console.log(RestoreCredentialsRequestModel);

				//Disable the form fields to prevent duplication of ajax
				disableFormFieldsLogin();

			  	//Send the ajax
				$.ajax({
				    type: "POST",
				    url: "/restore_credentials_",
				    async:true,
				    dataType: "json",
				    contentType: 'application/json',
				    data: JSON.stringify(RestoreCredentialsRequestModel),
				    beforeSend: function(){

				    	//Show loadings
					    $('#loginLoading').css("visibility", "visible");
					    $('#loginLoading').css("display", "block");
					  },
				    success: function (data) {

				    	//Console log the raw result
				        console.log("success from ajax: " + data);

				        //If invalid credentials show error
				        if(data["response"]=="PARAMS_ERROR"){
				        	var inst = $('[data-remodal-id=invalid_params_modal]').remodal();
							inst.open();
				        	return;
				        }
				        else if(data["errorCode"]=="PARAMS_ERROR"){
				        	var inst = $('[data-remodal-id=invalid_params_modal]').remodal();
							inst.open();
				        	return;
				        }
				        else if(data["errorCode"]=="INVALID_PARAM_LENGTH_ERROR"){
				        	var inst = $('[data-remodal-id=invalid_params_length_modal]').remodal();
							inst.open();
				        	return;
				        }				        
				        else if(data["errorCode"]=="INVALID_PWDHASH_ERROR"){
				        	var inst = $('[data-remodal-id=invalid_token_hash_modal]').remodal();
							inst.open();
				        	return;
				        }
						
						var inst = $('[data-remodal-id=restored_credentials_modal]').remodal();
						inst.open();
			        	return;				
				    },
				    error: function (data) {

				    	//Log error in console
				        console.log('Error:', data);

				        //Show error modal dialog
						var inst = $('[data-remodal-id=error_ajax_modal]').remodal();
						inst.open();

				    },
				    complete: function(){

				    	//Hide loadings
					    $('#loginLoading').css("visibility", "hidden");
					    $('#loginLoading').css("display", "none");
					  }
				});
        	});

        	$("#loginButton").click(function(){

        		// cancel default behavior
        		event.preventDefault();
        		
        		//Get all the fields in variables
			  	var password = $('#password').val();
			  	var password2 = $('#password2').val();			  	

			  	//Log fields
			  	console.log("password: " + password);
			  	console.log("password2: " + password2);
			  	
			  	//Validate that all the fields has data
			  	var valid = true;
			  	if(!password){
			  		valid = false;
			  	}
			  	if(!password2){
			  		valid = false;
			  	}
			  	if(!valid){

			  		//If some field does not have data show error
			  		var inst = $('[data-remodal-id=empty_fields_modal]').remodal();
					inst.open();
					return;
			  	}

			  	if(password2!==password){
			  		valid = false;
			  	}
			  	if(!valid){

			  		//If some field does not have data show error
			  		var inst = $('[data-remodal-id=password_doesnt_match_modal]').remodal();
					inst.open();
					return;
			  	}

			  	//If some field does not have data show error
		  		var inst = $('[data-remodal-id=restore_password_continue_modal]').remodal();
				inst.open();			  
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