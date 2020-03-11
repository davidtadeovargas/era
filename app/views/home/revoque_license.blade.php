@extends('templates.admin_panel_admins_template')

@section('meta_section')
    @parent

    <title>Revocación/Activación licencia ERA</title>

@stop

@section('link_section')
    @parent    
@stop

@section('body_section')
    @parent

	<div class="remodal-bg">

		<div class="remodal" data-remodal-id="to_continue_with_activation_license_modal"
		  data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
		  <button data-remodal-action="close" class="remodal-close"></button>
		  <h1>Eeasy Retail Admin</h1>
		  <p>
		    ¿Segro que deseas continuar con la activación?
		  </p>
		  <br>
		  <button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>		 	
		  <button data-remodal-action="confirm" class="remodal-confirm" id="to_continue_with_activation_license_modal_ok">OK</button>
		</div>
		<div class="remodal" data-remodal-id="to_continue_with_revocation_license_modal"
		  data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
		  <button data-remodal-action="close" class="remodal-close"></button>
		  <h1>Eeasy Retail Admin</h1>
		  <p>
		    ¿Segro que deseas continuar con la revocación?
		  </p>
		  <br>
		  <button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>		 	
		  <button data-remodal-action="confirm" class="remodal-confirm" id="to_continue_with_revocation_license_modal_ok">OK</button>
		</div>
		<div class="remodal" data-remodal-id="successfull_activation_modal"
		  data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
		  <button data-remodal-action="close" class="remodal-close"></button>
		  <h1>Eeasy Retail Admin</h1>
		  <p>
		    Activación de licencia exitosa :)
		  </p>
		  <br>		  
		  <button data-remodal-action="confirm" class="remodal-confirm" id="successfull_activation_modal_ok">OK</button>
		</div>
		<div class="remodal" data-remodal-id="successfull_revocation_modal"
		  data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
		  <button data-remodal-action="close" class="remodal-close"></button>
		  <h1>Eeasy Retail Admin</h1>
		  <p>
		    Revocación de licencia exitosa :)
		  </p>
		  <br>		  
		  <button data-remodal-action="confirm" class="remodal-confirm" id="successfull_revocation_modal_ok">OK</button>
		</div>
		<div class="remodal" data-remodal-id="user_with_no_more_licenses_modal"
		  data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
		  <button data-remodal-action="close" class="remodal-close"></button>
		  <h1>Ups!</h1>
		  <p>
		    Ya no cuentas con mas licencias disponibles
		  </p>
		  <br>		  
		  <button data-remodal-action="confirm" class="remodal-confirm" id="user_with_no_more_licenses_modal_ok">OK</button>
		</div>

		<!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">

            	<div class="row" style="text-align: center">
                	<h1>Revocación/Activación de Licencia</h1><br><br>
				</div>

            	<br>
				<div class="gallery-box">
					<div class="container">
						<h2>Tus computadoras:</h2>
						<div class="clearfix"></div><br>						
						<div class="row">
							<table class="table table-striped" id="tableComputers">
						    <thead>
						      <tr>
						        <th></th>
						        <th></th>
						      </tr>
						    </thead>
						    <tbody>
						    	<?php 

						    		//Iterate all the user computers
						    		foreach ($model->computers as $Computer) { //LicenseDataModel
						    			
						    			if($Computer->asign=="Si"){
											$displayBtnActivate = "none";
											$displayBtnRevocate = "visible";
										}
										else{
											$displayBtnActivate = "visible";
											$displayBtnRevocate = "none";
										}

										$premium = $Computer->premium ? 'Si':'No';

						    			echo '<tr style="background-color: white;">
									        <td>
									        	<label>Nombre de la computadora: '.$Computer->name.'</label><br>
									        	<label>IDD de computadora: '.$Computer->computerIDD.'</label><br>
									        	<label>Creado: '.$Computer->created_at.'</label><br>
									        	<label>Asignado: '.$Computer->asign.'</label><br>
									        	<label>Premium: '.$premium.'</label><br><br>';
									      
									      $comboboxID = "seriesCombobox-".$Computer->computerIDD;

									      echo '<div class="col-sm-4">
									      		</div>
									      		<div class="col-sm-4">
									      			<label>Licencias:</label>
									      			<select class="form-control" id="'.$comboboxID.'">';

									      //Iterate all the licenses
						    			  foreach ($model->series as $LicenseDataModel) {		  	
						    			  	echo '<option value="'.$LicenseDataModel->serie.'">'.$LicenseDataModel->serie.' - ('.$LicenseDataModel->freeUsers.' usuarios disponibles de '.($LicenseDataModel->usedUsers + $LicenseDataModel->freeUsers).')</option>';
						    			  }

									      echo '</select>
									      		</div>
									      		<div class="col-sm-4">
									      		</div><br>';

		      								echo '<div class="col-sm-4">
									        	</div>
									        	<div class="col-sm-4">
									        		<button class="btn btn-success btnComputerActivate" data-btn-computer-id="'.$Computer->computerIDD.'" data-combobox-id="'.$comboboxID.'" style="display:'.$displayBtnActivate.'">Activar</button>
									        		<button class="btn btn-warning btnComputerRevocate" data-btn-computer-id="'.$Computer->computerIDD.'" data-combobox-id="'.$comboboxID.'"style="display:'.$displayBtnRevocate.'">Revocar</button>
									        		<div class="clearfix"></div><br><br>
									        	</div>
									        	<div class="col-sm-4">
									        	</div></td>';

		      echo '</tr>';
						    		}

						    	?>							      
						    </tbody>
						  </table>
						</div>
					</div>
				</div>
			</div>		
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

    <script src="js/shopping_cart/minicart.js"></script>
	<script>
		paypal.minicart.render();
		paypal.minicart.reset();
	</script>
	
	    <script>

	    	//Contains the current computer idd
			var computerIDD;
			
			var comboboxID;
			var serie
	        
	        $(document).ready(function (event) {                         	
	        	
	        	$("#successfull_activation_modal_ok").click(function(event){

	        		// cancel default behavior
	        		event.preventDefault();

	        		//Reload the page
					location.reload();
	        	});

	        	$("#successfull_revocation_modal_ok").click(function(event){

	        		// cancel default behavior
	        		event.preventDefault();

	        		//Reload the page
					location.reload();
	        	});

	        	//When the user clics on continue        	
	        	$("#to_continue_with_revocation_license_modal_ok").click(function(event){

	        		// cancel default behavior
	        		event.preventDefault();

	        		//Log to console the click
	        		console.log("to_continue_with_revocation_license_modal_ok clicked");

	        		//Create the json model for ajax
					var RevocateLicenseRequestModel = 	{ 
						computerIDD:computerIDD,
						serie:serie,
						token:"sdsal1129399458ddkskdklsklds0939"};
					console.log(RevocateLicenseRequestModel);							

					//Send the ajax
					$.ajax({
					    type: "POST",
					    url: "/revoque_license",
					    async:true,
					    dataType: "json",
					    contentType: 'application/json',
					    data: JSON.stringify(RevocateLicenseRequestModel),
					    beforeSend: function(){
					    	showLoading();
						  },
					    success: function (data) {

					    	hideLoading();

					    	//Log to console the raw response
					        console.log("success from ajax: " + data);

					        //Log to console the errorCode
					        console.log("errorCode: " + data["errorCode"]);

					        //If user exists show error
					        if(data["responseStatus"]=="error"){
					        	var inst = $('[data-remodal-id=error_ajax_modal]').remodal();
								inst.open();

								return;
					        }

							//Show success modal dialog
							var inst = $('[data-remodal-id=successfull_revocation_modal]').remodal();
							inst.open();
					    },
					    error: function (data) {

					    	hideLoading();

					    	//Log to console the error
					        console.log('Error:', data);

					        //Show error modal dialog
							var inst = $('[data-remodal-id=error_ajax_modal]').remodal();
							inst.open();

					    },
					    complete: function(){

					    	hideLoading();
						  }
					});
	        	});

	        	//When the user clics on continue        	
	        	$("#to_continue_with_activation_license_modal_ok").click(function(event){

	        		// cancel default behavior
	        		event.preventDefault();

	        		//Log to console the click
	        		console.log("to_continue_with_activation_license_modal_ok clicked");	

	        		//Create the json model for ajax
					var ActivateLicenseRequestModel = 	{ 
						computerIDD:computerIDD,
						serie:serie,
						token:"sdsal1129399458ddkskdklsklds0939"};
					console.log(ActivateLicenseRequestModel);							

					//Send the ajax
					$.ajax({
					    type: "POST",
					    url: "/activate_license",
					    async:true,
					    dataType: "json",
					    contentType: 'application/json',
					    data: JSON.stringify(ActivateLicenseRequestModel),
					    beforeSend: function(){
					    	
					    	//Hide the form while loading
							$("#tableComputers").css("display","none");

							//Show the loading
						    $('#revocationLoading').css("visibility", "visible");
						    $('#revocationLoading').css("display", "block");
						  },
					    success: function (data) {

					    	//Log to console the raw result data
					        console.log("success from ajax: " + data);

					        //Log to console the error code
					        console.log("errorCode: " + data["errorCode"]);

					        //If the user has no more licenses available show message
					        if(data["errorCode"]=="USER_WITH_NO_MORE_LICENSES_ERROR"){
					        	var inst = $('[data-remodal-id=user_with_no_more_licenses_modal]').remodal();
								inst.open();
								return;
					        }

					        //If user exists show error
					        if(data["responseStatus"]=="error"){
					        	var inst = $('[data-remodal-id=error_ajax_modal]').remodal();
								inst.open();

								return;
					        }

							//Show success modal dialog
							var inst = $('[data-remodal-id=successfull_activation_modal]').remodal();
							inst.open();
					    },
					    error: function (data) {

					    	//Log the raw error to the console
					        console.log('Error:', data);

					        //Show error modal dialog
							var inst = $('[data-remodal-id=error_ajax_modal]').remodal();
							inst.open();

							//Hide the loading
					        $('#revocationLoading').css("visibility", "hidden");
						    $('#revocationLoading').css("display", "none");

					    },
					    complete: function(){

					    	//Hide loading
						    $('#revocationLoading').css("visibility", "hidden");
						    $('#revocationLoading').css("display", "none");

						    //Show the form again
						    $("#tableComputers").css("display","block");
						  }
					});
	        	});

	        	//Event when clicking the button to activate license
				$(".btnComputerActivate").click(function(event){
					
					//Get the current computer id
					computerIDD = $(this).attr("data-btn-computer-id");
					
					//Log to console the computerIDD
					console.log("computerIDD: " + computerIDD);

					//Get the combobox id
	        		comboboxID = $(this).attr("data-combobox-id");	        		
	        		
	        		//Log to console the comboboxID
	        		console.log("comboboxID = " + comboboxID);

	        		//Get the selected serie of the combobox
	        		serie = $( "#" + comboboxID + " option:selected" ).val();

	        		//Log to console the serie
	        		console.log("serie = " + serie);

					//Ask the user if wants to continue
					var inst = $('[data-remodal-id=to_continue_with_activation_license_modal]').remodal();
					inst.open();					
				});

				//Event when clicking the button to activate license
				$(".btnComputerRevocate").click(function(event){
					
					//Get the current computer id
					computerIDD = $(this).attr("data-btn-computer-id");
					
					//Log to console the computer IDD
					console.log("computerIDD: " + computerIDD);

					//Get the combobox id
	        		comboboxID = $(this).attr("data-combobox-id");	        		
	        		
	        		//Log to console the comboboxID
	        		console.log("comboboxID = " + comboboxID);

	        		//Get the selected serie of the combobox
	        		serie = $( "#" + comboboxID + " option:selected" ).val();

	        		//Log to console the serie
	        		console.log("serie = " + serie);

					//Ask the user if wants to continue
					var inst = $('[data-remodal-id=to_continue_with_revocation_license_modal]').remodal();
					inst.open();					
				});
	        });	        

	    </script>

@stop