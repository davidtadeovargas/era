@extends('templates.login_basic_template')

@section('meta_section')
    @parent

    <title>ERA Restaura tu contraseña</title>

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
			
			<div class="remodal" data-remodal-id="email_sent_to_restore_modal"
			  data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
			  <button data-remodal-action="close" class="remodal-close"></button>
			  <h1>ERA</h1>
			  <p>
			    Se ah enviado un correo electrónico a esta dirección para poder restaurar la contraseña
			  </p>
			  <br>		 	
			  <button data-remodal-action="confirm" class="remodal-confirm" id="email_sent_to_restore_modal_ok">OK</button>
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
								<h1>Ingresa a tu correo electrónico</h1>
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
										<input type="text" placeholder="Tu correo electrónico" id="loginEmail" class="form-control" name="name" required data-error="Porfavor ingresa tu correo electrónico aquí">
										<div class="help-block with-errors"></div>
									</div> 
								</div>
								<div class="col-md-4">
							  	</div>
							  	<div class="col-md-4">
							  	</div>
								<div class="col-md-4">									
								</div>	
								<div class="col-md-4">
							  	</div>					
								<div class="col-md-12">
									<div class="submit-button text-center">
										<button class="btn btn-common" id="loginButton" type="submit">Enviar</button>
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
        	
        	$("#email_sent_to_restore_modal_ok").click(function(){
        		window.location.href = "/login";
        	});

        	$("#loginButton").click(function(){

        		// cancel default behavior
        		event.preventDefault();
        		
        		//Get all the fields in variables
			  	var user = $('#loginEmail').val();

			  	//Log fields
			  	console.log("user: " + name);
			  	
			  	//Validate that all the fields has data
			  	var valid = true;
			  	if(!user.trim()){
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
				var RestoreCredentialsRequestModel = 	{ user: user,token:"sdsal1129399458ddkskdklsklds0939"};
				console.log(RestoreCredentialsRequestModel);

				//Disable the form fields to prevent duplication of ajax
				disableFormFieldsLogin();

			  	//Send the ajax
				$.ajax({
				    type: "POST",
				    url: "/email_credentials",
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

				        var inst = $('[data-remodal-id=email_sent_to_restore_modal]').remodal();
						inst.open();
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

				    	//Hide loadings
					    $('#loginLoading').css("visibility", "hidden");
					    $('#loginLoading').css("display", "none");
					  }
				});
        	});
        });        

        //Diable all the fields in the login form
        function disableFormFieldsLogin(){
        	
			$('#user').prop("disabled", true);
			$('#loginButton').prop("disabled", true);
        }

        //Enable all the fields in the login form
        function enaleFormFieldsLogin(){

			$('#user').prop("disabled", false);
			$('#loginButton').prop("disabled", true);
        }	

    </script>
    
@stop