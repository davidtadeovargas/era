@extends('templates.admin_panel_admins_template')

@section('meta_section')
    @parent

    <title>Tu perfil</title>
    
	<script type="text/javascript" src="https://cdn.conekta.io/js/latest/conekta.js"></script>
	<script type="text/javascript" src="/js/global.js"></script>

@stop

@section('link_section')
    @parent    
@stop

@section('body_section')
    @parent	

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
		<div class="remodal" data-remodal-id="invalid_token_conekta_modal">
		  <button data-remodal-action="close" class="remodal-close"></button>
		  <h1>Ups!</h1>
		  <p>
		    Error en la generación del token para tu pago
		  </p>
		  <br>
		  <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
		</div>
		<div class="remodal" data-remodal-id="error_fields_length_modal">
		  <button data-remodal-action="close" class="remodal-close"></button>
		  <h1>Ups!</h1>
		  <p>
		    Algunos campos no tienen la longitud apropiada
		  </p>
		  <br>
		  <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
		</div>		
		<div class="remodal" data-remodal-id="error_ajax_modal"
		  data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
		  <button data-remodal-action="close" class="remodal-close"></button>
		  <h1>Ups!</h1>
		  <p>
		    No pudimos procesar tu solicitud en este momento, una disculpa
		  </p>
		  <label id="error_ajax_modal_label"></label>
		  <br>		 	
		  <button data-remodal-action="confirm" class="remodal-confirm" id="continue_register_modal_ok">OK</button>
		</div>
		<div class="remodal" data-remodal-id="continue_send_perfil_modal"
			  data-remodal-options="hashTracking: false, closeOnOutsideClick: false, closeOnConfirm: true">	  
			  <h1>Easy Retail Admin</h1>
			  <p>
			    ¿Seguro que deseas continuar?
			  </p>
			  <br>
			  <button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
			  <button data-remodal-action="confirm" class="remodal-confirm" id="continue_send_perfil_modal_ok">OK</button>
			</div>
			<div class="remodal" data-remodal-id="perfil_updated_modal"
			  data-remodal-options="hashTracking: false, closeOnOutsideClick: false, closeOnConfirm: true">	  
			  <h1>Easy Retail Admin</h1>
			  <p>
			    Datos actualizados correctamente
			  </p>
			  <br>			  
			  <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
			</div>
		<br>

		<div id="page-wrapper">
            <div id="page-inner">                
            	<!-- Start license info-->		
           <div class="row">
           		<div class="col-sm-3">
           		</div>
           		<div class="col-sm-6">           		
           			<h1>MODIFICA TU PERFIL</h1><br><br><br><br>
           		</div>
           		<div class="col-sm-3">           		
           		</div>           		
           </div>
           <div class="row">           	
           		<div class="col-sm-4"></div>
           		<div class="col-sm-4">
           			<img src="<?php echo $model->perfilImage; ?>" class="img-thumbnail" style="width: 250px;height: 300px" id="perfilImage"/>
           			<input type="file" name="" id="perfilImageFile">
           		</div>
           		<div class="col-sm-4"></div>
           </div><br>
		<div id="licenseInfo" style="font-size: 17px">
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<div class="col-sm-3">
						<label>Nombre: </label>
					</div>
					<div class="col-sm-9">
						<input style="width: 100%" type="text-align" name="" value="<?php echo $model->User->name; ?>" id="name">
					</div>										
				</div>
				<div class="col-sm-3"></div>				
			</div>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<div class="col-sm-3">
						<label>Teléfono: </label>
					</div>
					<div class="col-sm-9">
						<input style="width: 100%" type="text-align" name="" value="<?php echo $model->User->phone; ?>" id="phone">
					</div>										
				</div>
				<div class="col-sm-3"></div>				
			</div>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<div class="col-sm-3">
						<label>Correo: </label>
					</div>
					<div class="col-sm-9">
						<input style="width: 100%;background-color: #e8e4e3" type="text-align" name="" value="<?php echo $model->User->email; ?>" readonly id="email">
					</div>										
				</div>
				<div class="col-sm-3"></div>				
			</div>
			<div class="row">				
			</div>
		</div>
		<div class="clearfix"></div> <br><br>
		<div class="row" style="text-align: center;">
			<div class="col-sm-5">
			</div>
			<div class="col-sm-3">				
				<button type="button" class="btn btn-success" id="btnSave">Guardar</button>
			</div>
			<div class="col-sm-4">				
			</div>			
		</div>			
		<!-- End license info -->
		<!-- Start Compra licencia -->		
		<!-- End Compra licencia -->

		<!-- Start  Login -->
		<div id="login" class="contact-box">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
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
								</div> 
							</div>
							<div class="col-md-4">
						  	</div>
						  	<div class="col-md-4">
						  	</div>
							<div class="col-md-4">
								<div class="form-group">									
									<div class="help-block with-errors"></div>
								</div> 
							</div>	
							<div class="col-md-4">
						  	</div>					
							<div class="col-md-12">
								<div class="submit-button text-center">									
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
        	 
        	 $(document).on("change","#perfilImageFile", function(evt){
				
				var tgt = evt.target || window.event.srcElement,
			        files = tgt.files;

			    // FileReader support
			    if (FileReader && files && files.length) {
			        var fr = new FileReader();
			        fr.onload = function () {
			            document.getElementById("perfilImage").src = fr.result;
			            existsImage = true;
			        }
			        fr.readAsDataURL(files[0]);
			    }
			    // Not supported
			    else {

			    	$("#perfilImage").attr("src","images/home/user.png");

			        // fallback -- perhaps submit the input to an iframe and temporarily store
			        // them on the server until the user's session ends.
			    }
			});

			//Event for the payment ok button
			$("#continue_send_perfil_modal_ok").click(function(event){
				
				// cancel default behavior
				event.preventDefault();

				//Get all the fields in variables
			  	var name = $('#name').val().trim();
			  	var phone = $('#phone').val().trim();

			  	//Log to console the fields
			  	console.log("name: " + name);
			  	console.log("phone: " + phone);

			  	//Create the json model for ajax
				var RequestModel = 	{ 	name:name, 
										phone:phone,
										token:"sdsal1129399458ddkskdklsklds0939"};
				console.log(RequestModel);

				// Create formdata
				var formdata = false;
				if(window.FormData) 
					formdata = new FormData();
				if(formdata === false) {
					alert("Your browser does not support form data");
					return false;
				}
				var val = document.getElementById("perfilImageFile");
				if(val.files.length>0){

					console.log("Found image");

					var file = val.files[0];

					console.log("id: perfilImageFile");
					console.log("file: " + file);

					formdata.append("perfilImageFile", file);
				}
				formdata.append("name", name);
				formdata.append("phone", phone);

				//Send the ajax
				$.ajax({
				    type: "POST",
				    url: "/update_perfil",
				    processData: false,  //IMPORTANT when sending formdata
	        		contentType: false,  //IMPORTANT when sending formdata
				    async:true,
				    dataType: "json",				    
				    data: formdata,
				    beforeSend: function(){
				    	showLoading();
					  },
				    success: function (data) {

				    	hideLoading();

				    	//Log to console the raw response
				        console.log("success from ajax: " + data);

				        //If user exists show error
				        if(data["responseStatus"]=="error"){

				        	//If user exists show error
				        	$("#error_ajax_modal_label").text(data["errorMessage"]);
				        	var inst = $('[data-remodal-id=error_ajax_modal]').remodal();
							inst.open();

							console.log("errorCode: " + data["errorCode"]);
							console.log("errorMessage: " + data["errorMessage"]);

							//Enable all the fields again
							enaleFormFieldsRegistration();

							//Return
				        	return;
				        }

				        //Show success modal dialog
						var inst = $('[data-remodal-id=perfil_updated_modal]').remodal();
						inst.open();
				    },
				    error: function (data) {

				    	hideLoading();

				    	//Log to console the raw error
				        console.log('Error:', data);

				        //Show error modal dialog
						var inst = $('[data-remodal-id=error_ajax_modal]').remodal();
						inst.open();

				        //Enable all the fields again
						enaleFormFieldsRegistration();

				    },
				    complete: function(){

				    	hideLoading();
					  }
				});
			});

			$("#btnSave").click(function(){

        		//Get all the fields in variables
			  	var name = $('#name').val().trim();
			  	var phone = $('#phone').val().trim();			  	

			  	//Log fields
			  	console.log("name: " + name);
			  	console.log("phone: " + phone);

			  	//Validate that all the fields has data
			  	var valid = true;
			  	if(!name.trim()){
			  		valid = false;
			  	}
			  	if(!phone.trim()){
			  		valid = false;
			  	}
			  	if(!valid){

			  		//If some field does not have data show error
			  		var inst = $('[data-remodal-id=empty_fields_modal]').remodal();
					inst.open();
					return;
			  	}

			  	var inst = $('[data-remodal-id=continue_send_perfil_modal]').remodal();
				inst.open();        		
        	});
        });

    </script>
@stop