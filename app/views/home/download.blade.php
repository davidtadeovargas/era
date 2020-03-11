@extends('templates.login_basic_template')

@section('meta_section')
    @parent

    <title>ERA Descarga instalador</title>

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
			
			<div class="remodal" data-remodal-id="user_exists_modal"
			  data-remodal-options="hashTracking: false, closeOnOutsideClick: false">

			  <button data-remodal-action="close" class="remodal-close"></button>
			  <h1>Ups!</h1>
			  <p>
			    Este usuario que intentas registrar ya esta dado de alta
			  </p>
			  <br>		 	
			  <button data-remodal-action="confirm" class="remodal-confirm" id="user_exists_modal_ok">OK</button>
			</div>					

			<!-- Start Events -->
			<div id="events" class="events-box">
				<div class="container">
					<div class="row" style="text-align: center;" id="rowDownloadMessage">
						<div class="col-sm-2">
						</div>
						<div class="col-sm-8">
							<h3>Tu descarga comenzará automáticamente, en caso de que no, puedes hacer tu descarga manual en el botón de "Descargar" que se encuentra en la parte de abajo</h3>
						</div>
						<div class="col-sm-2">						
						</div>
					</div>
					<br><br>
						<div class="row">
							<div class="col-sm-4" style="visibility: hidden;">
								<div class="event-inner">
									<div class="event-img">
										<img class="img-fluid" src="images/home/event-img-01.jpg" alt="" />
									</div>
									<h2>2 June 2018 Engagement</h2>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard </p>
									<a href="#">See location ></a>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="event-inner">
									<div class="event-img">
										<img class="img-fluid" src="images/home/installer.png" alt="" />
									</div>
									<h2>Instalador ERA</h2>
									<p>Instalador de ERA para Windows </p>
									<a href="download_installer" target="_blank">Descargar</a>
								</div>
							</div>
							<div class="col-sm-4"  style="visibility: hidden;">
								<div class="event-inner">
									<div class="event-img">
										<img class="img-fluid" src="images/home/installer.png" alt="" />
									</div>
									<h2>2 June 2018 Engagement</h2>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard </p>
									<a href="#">See location ></a>
								</div>
							</div>
						</div>
				</div>
			</div>
			<!-- End Events -->

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
	        
	        var download = <?php echo $model->download; ?>;

	        $(document).ready(function () {                         	
				
				if(download){				
					window.open('download_installer', '_blank');
				}
				else{
					$("#rowDownloadMessage").css("display","none");
				}

	        	//Event in click ok in success register modal
				$("#successful_register_modal_ok").click(function(event){
					
					//Redirects to login
					window.location.href = "/login";
				});

	        	//Event for the registration ok button
				$("#continue_register_modal_ok").click(function(event){
					
					// cancel default behavior
					event.preventDefault(); 
					
					console.log("continue_register_modal_ok clicked");

					//Get all the fields in variables
				  	var name = $('#name').val();				  	
				  	var email = $('#email').val();
				  	var password = $('#password').val();
				  	var password2 = $('#password2').val();

					//Create the json model for ajax
					var RegisterUserRequestModel = 	{ user : { name: name,phone:"",email:email,password:password},token:"sdsal1129399458ddkskdklsklds0939"};
					console.log(RegisterUserRequestModel);

					//Disable all the fields befor ajax request
					disableFormFieldsRegistration();

					//Send the ajax
					$.ajax({
					    type: "POST",
					    url: "/register",
					    async:true,
					    dataType: "json",
					    contentType: 'application/json',
					    data: JSON.stringify(RegisterUserRequestModel),
					    beforeSend: function(){
						    $('#registerLoading').css("visibility", "visible");
						    $('#registerLoading').css("display", "block");
						  },
					    success: function (data) {

					    	//var json = JSON.parse(data);
					        console.log("success from ajax: " + data);

					        //If user exists show error
					        if(data["errorCode"]=="USER_EXISTS_ERROR"){
					        	var inst = $('[data-remodal-id=user_exists_modal]').remodal();
								inst.open();

								//Enable all the fields again
								enableFormFieldsRegistration();

								//Return
					        	return;
					        }

					        //If any other error show it
					        if(data["errorCode"]=="EXCEPTION_ERROR"){
					        	var inst = $('[data-remodal-id=error_ajax_modal]').remodal();
								inst.open();

								//Enable all the fields again
								enableFormFieldsRegistration();
								
								//Return
					        	return;
					        }

					        //Enable all the fields again
							enableFormFieldsRegistration();

							//Clear all the form fields
							$('#name').val("");
						  	$('#email').val("");
						  	$('#password').val("");
						  	$('#password2').val("");

							//Show success modal dialog
							var inst = $('[data-remodal-id=successful_register_modal]').remodal();
							inst.open();
					    },
					    error: function (data) {

					    	//Log error in console
					        console.log('Error:', data);

					        //Show error modal dialog
							var inst = $('[data-remodal-id=error_ajax_modal]').remodal();
							inst.open();

					        //Enable all the fields again
							enableFormFieldsRegistration();

					    },
					    complete: function(){

					    	//Hide loadings
						    $('#registerLoading').css("visibility", "hidden");
						    $('#registerLoading').css("display", "none");
						  }
					});
				});

				//Event for register button
	        	$("#regiterButton").click(function(event){
				  	
				  	// cancel default behavior
				  	event.preventDefault();

				  	//Get all the fields in variables
				  	var name = $('#name').val();
				  	var email = $('#email').val();
				  	var password = $('#password').val();
				  	var password2 = $('#password2').val();

				  	//Log variables
				  	console.log("name: " + name);				  	
				  	console.log("email: " + email);
				  	console.log("password: " + password);
				  	console.log("password2: " + password2);

				  	//Validate that all the fields has data
				  	var valid = true;
				  	if(!name.trim()){
				  		valid = false;
				  	}
				  	if(!email.trim()){
				  		valid = false;
				  	}
				  	if(!password.trim()){
				  		valid = false;
				  	}
				  	if(!password2.trim()){
				  		valid = false;
				  	}
				  	if(!valid){

				  		//If error in previous validation show the error to the user
						var inst = $('[data-remodal-id=empty_fields_modal]').remodal();
						inst.open();
						return;
				  	}

				  	//Validate the email sintax
				  	if(!email.includes("@") && !email.includes(".")){
				  	
				  		//If any error in the email sintax show the error
						var inst = $('[data-remodal-id=invalid_email_sintax_modal]').remodal();
						inst.open();
						return;
				  	}

				  	//Validate that the passwords are the same
				  	if(password!=password2){
				  	
				  		//If the passowrds are not the same show the error
						var inst = $('[data-remodal-id=password_not_equals_modal]').remodal();
						inst.open();
						return;
				  	}

				  	//Question if continue with the register process
					var inst = $('[data-remodal-id=continue_register_modal]').remodal();
					inst.open();
				});
	        });

			//Disable all the register fields
	        function disableFormFieldsRegistration(){
	        	
				$('#name').prop("disabled", true);
				$('#email').prop("disabled", true);
				$('#password').prop("disabled", true);
				$('#password2').prop("disabled", true);
				$('#regiterButton').prop("disabled", true);
	        }

	        //Enable all the register fields
	        function enableFormFieldsRegistration(){

				$('#name').prop("disabled", false);
				$('#email').prop("disabled", false);
				$('#password').prop("disabled", false);
				$('#password2').prop("disabled", false);
				$('#regiterButton').prop("disabled", false);
	        }

	    </script>

@stop