@extends('templates.admin_panel_admins_template')

@section('meta_section')
    @parent

    <title>Log de Notificaciones Push</title>
    
	<script type="text/javascript" src="https://cdn.conekta.io/js/latest/conekta.js"></script>
	<script type="text/javascript" src="/js/global.js"></script>

	<style type="text/css">
		table {
    		table-layout: fixed;
		    word-wrap: break-word;
		}	
	</style>
	

@stop

@section('link_section')
    @parent    
@stop

@section('body_section')
    @parent	

	<div class="remodal-bg">
				
		<br>

		<div id="page-wrapper">
            <div id="page-inner">                
            	<!-- Start license info-->		
		<div id="licenseInfo">
			<div class="row">
				<div class="title-box" style="text-align: center;">
					<h1>LOGS DE NOTIFICACIONES PUSH</h1><br><br><br>
				</div>
			</div>			
			<div class="row">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-2">
						</div>
						<div class="col-sm-8" style="text-align:center">
							<table class="table table-condensed" style="width: 100%">
							    <thead>
							      <tr>
							      	<th>ID</th>
							        <th>Canal</th>
							        <th>Diario</th>
							        <th>Diario a las</th>
							        <th>Enviado</th>
							        <th>Desde</th>
							        <th>Hasta</th>
							        <th>Acción del banner</th>
							        <th>Banner</th>
							        <th>Creado</th>
							      </tr>
							    </thead>
							    <tbody>
							    	<?php 

							    		if(count($model->logs)>=0){							    		
							    			foreach ($model->logs as $log) {
							    			
							    			echo '	<tr>
							    						<td>'.$log->id.'</td>
							    						<td>'.$log->channel_id.'</td>
							    						<td>'.$log->everyday.'</td>
							    						<td>'.$log->everyDayAt.'</td>
							    						<td>'.$log->send.'</td>
							    						<td>'.$log->from.'</td>
							    						<td>'.$log->to.'</td>
							    						<td>'.$log->bannerAction.'</td>
							    						<td>'.$log->bannerFile.'</td>
							    						<td>'.$log->created_at.'</td>
							    					</tr>';								    			
							    			}
							    		}						    

							    	?>								    
							    </tbody>
							  </table>

							  <?php  

							  	if(count($model->logs)==0){
							    	echo "<label style='color:blue;'>Aun no hay envios realizados :( </label>";
							    }
							  ?>
						</div>
						<div class="col-sm-2">
						</div>					
					</div>
				</div>					
			</div>
		</div>
		<div class="clearfix"></div> <br><br>
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

    <script type="text/javascript">
    	
    	Conekta.setPublicKey('key_Scyv2KbirtkCzfCTjKzbaMQ');

	  var conektaSuccessResponseHandler = function(token) {
	    var $form = $("#card-form");
	    //Inserta el token_id en la forma para que se envíe al servidor
	     $form.append($('<input type="hidden" name="conektaTokenId" id="conektaTokenId">').val(token.id));
	    
	    $form.find("button").prop("disabled", false);

	    payment();
	  };
	  var conektaErrorResponseHandler = function(response) {
	    var $form = $("#card-form");
	    $form.find(".card-errors").text(response.message_to_purchaser);
	    $form.find("button").prop("disabled", false);
	  };


	  //jQuery para que genere el token después de dar click en submit
	  $(function () {
	    $("#card-form").submit(function(event) {
	      var $form = $(this);
	      // Previene hacer submit más de una vez
	      $form.find("button").prop("disabled", true);
	      Conekta.Token.create($form, conektaSuccessResponseHandler, conektaErrorResponseHandler);
	      return false;
	    });
	  });

	</script>

	<script>
        
        $(document).ready(function () {
        	
        	//Retrieve the payment model
        	var ShoppingCartDataModel = localStorage.getItem('ShoppingCartDataModel');        

        	//Log to console the ShoppingCartDataModel
        	console.log('ShoppingCartDataModel: ', JSON.parse(ShoppingCartDataModel));

        	//Parse to json
        	ShoppingCartDataModel = JSON.parse(ShoppingCartDataModel);

        	//Get the totals of payment
        	var ShoppingCartTotalsDataModel = localStorage.getItem('ShoppingCartTotalsDataModel');

        	//Log to console to total payments
        	console.log('ShoppingCartTotalsDataModel: ', JSON.parse(ShoppingCartTotalsDataModel));

        	//Parse to json
        	ShoppingCartTotalsDataModel = JSON.parse(ShoppingCartTotalsDataModel);
        	
        	//Console to log the totals
        	console.log("Subtotal: " + ShoppingCartTotalsDataModel["subtotal"]);
        	console.log("Taxes: " + ShoppingCartTotalsDataModel["taxes"]);
        	console.log("Total: " + ShoppingCartTotalsDataModel["total"]);

        	//Get the  totals with currency
        	var subtotal = ShoppingCartTotalsDataModel["subtotal"];
        	var taxes = ShoppingCartTotalsDataModel["taxes"];
        	console.log("taxes: " + taxes); //Console to log the taxes
        	var total = ShoppingCartTotalsDataModel["total"];

        	//Calculate the taxes
        	var tax = parseFloat(taxes) *  parseFloat(IVA);

        	//Log to console the taxes
        	console.log("IVA: " + IVA);
        	console.log("tax: " + tax);

        	//Set the new value for taxes
        	taxes = tax;

        	//Calculate the total
        	total = parseFloat(total) + parseFloat(taxes);

        	//Get the  totales with currency
        	subtotal = toCurency(subtotal);
        	taxes = toCurency(taxes);
        	console.log("taxes: " + taxes); //Log to console the taxes
        	total = toCurency(total);

        	//Add the totals to the view
        	$("#subtotal").text(subtotal);
			$("#taxes").text(taxes);
			$("#total").text(total);

        	//Add all the cart items to the table
        	jQuery.each(ShoppingCartDataModel, function(i, val) {

        		var price = toCurency(val["price"]);

			  	$("#tbodyItems").append("<tr>" +
									        "<td>" + val["code"] + "</td>" +
									        "<td>" + val["description"] + "</td>" +
									        "<td>" + price + "</td>" +
									    "</tr>");
			});        	

        	//When clicking in ok in the dialog after the license purchase was successfull
			$("#license_payment_successfull_modal_ok").click(function(event){				

				//Redirect to the revocation screen
				window.location.href = "/revoque_activate_license";
			});

        	//Event for the payment ok button
			$("#to_continue_generic_modal_ok").click(function(event){
				
				// cancel default behavior
				event.preventDefault();

				//Get all the fields in variables
			  	var name = $('#nombretarjetahabiente').val().trim();
			  	var card_info = $('#tarjeta').val().trim();
			  	var cvv = $('#cvc').val().trim();
			  	var exp_month = $('#expirationMonth').val().trim();
			  	var exp_year = $('#expirationYear').val().trim();			  	
			  	var conektaTokenId = $('#conektaTokenId').val();

			  	//Log to console the fields
			  	console.log("name: " + name);
			  	console.log("card_info: " + card_info);
			  	console.log("cvv: " + cvv);
			  	console.log("exp_month: " + exp_month);
			  	console.log("exp_year: " + exp_year);
			  	console.log("conektaTokenId: " + conektaTokenId);

			  	//Get all the license codes to buy
			  	var codes = [];
			  	jQuery.each(ShoppingCartDataModel, function(i, val) {

			  		var code = val["code"];
			  		codes.push(code);	        		
				});

				//Create the json model for ajax
				var LicensePaymentRequestModel = 	{ name:name, card_info:card_info, exp_month:exp_month, exp_year:exp_year, cvv:cvv, codes:codes,conektaTokenId:conektaTokenId,token:"sdsal1129399458ddkskdklsklds0939"};
				console.log(LicensePaymentRequestModel);

				//Disable all the fields befor ajax request
				disableFormFieldsRegistration();

				//Send the ajax
				$.ajax({
				    type: "POST",
				    url: "/create_payment",
				    async:true,
				    dataType: "json",
				    contentType: 'application/json',
				    data: JSON.stringify(LicensePaymentRequestModel),
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
						var inst = $('[data-remodal-id=license_payment_successfull_modal]').remodal();
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
        });        
		
		function payment(){
			
			//Get all the fields in variables
		  	var name = $('#nombretarjetahabiente').val();
		  	var card_info = $('#tarjeta').val();
		  	var cvv = $('#cvc').val();
		  	var exp_month = $('#expirationMonth').val();
		  	var exp_year = $('#expirationYear').val();
		  	var conektaTokenId = $('#conektaTokenId').val();

		  	//Log variables to console
		  	console.log("name: " + name);
		  	console.log("card_info: " + card_info);
		  	console.log("cvv: " + cvv);
		  	console.log("exp_month: " + exp_month);
		  	console.log("exp_year: " + exp_year);
		  	console.log("conektaTokenId: " + conektaTokenId);

		  	//Validate that the token exists
		  	var valid = true;
		  	if(!conektaTokenId.trim()){
		  		valid = false;
		  	}
		  	if(!valid){

		  		//If any field does not have data show error
				var inst = $('[data-remodal-id=invalid_token_conekta_modal]').remodal();
				inst.open();
				return;
		  	}

		  	//Validate that all the fields has data			  	
		  	valid = true;
		  	if(!name.trim()){
		  		valid = false;
		  	}
		  	if(!card_info.trim()){
		  		valid = false;
		  	}
		  	if(!cvv.trim()){
		  		valid = false;
		  	}
		  	if(!exp_month.trim()){
		  		valid = false;
		  	}
		  	if(!exp_year.trim()){
		  		valid = false;
		  	}
		  	if(!valid){

		  		//If any field does not have data show error
				var inst = $('[data-remodal-id=empty_fields_modal]').remodal();
				inst.open();
				return;
		  	}

		  	//Log to console the fields length
		  	console.log("name length: " + name.trim().length);
		  	console.log("card_info length: " + card_info.trim().length);
		  	console.log("cvv length: " + cvv.trim().length);
		  	console.log("exp_month length: " + exp_month.trim().length);
		  	console.log("exp_year length: " + exp_year.trim().length);			  	

		  	//Validate that all the fields has the proper length
		  	valid = true;
		  	if(card_info.trim().length < 16 || card_info.trim().length > 19){
		  		valid = false;
		  	}
		  	if(cvv.trim().length < 3 || cvv.trim().length > 4){
		  		valid = false;
		  	}
		  	if(exp_month.trim().length > 2 || exp_month.trim().length > 2){
		  		valid = false;
		  	}
		  	if(exp_year.trim().length < 2 || exp_year.trim().length > 2){
		  		valid = false;
		  	}
		  	if(!valid){

		  		//If any field has wrong length show errror
				var inst = $('[data-remodal-id=error_fields_length_modal]').remodal();
				inst.open();
				return;
		  	}

		  	//Validate that month is in proper range
		  	valid = true;
		  	if(!(parseInt(exp_month.trim()) >= 01 && parseInt(exp_month.trim()) <= 12)){
		  		valid = false;
		  	}
		  	if(!valid){

		  		//If month is not in proper range show error
				var inst = $('[data-remodal-id=invalid_range_month_modal]').remodal();
				inst.open();
				return;
		  	}

		  	//Validate that year is in proper range
		  	valid = true;
		  	if(!(parseInt(exp_year.trim()) >= 19 && parseInt(exp_year.trim()) <= 99)){
		  		valid = false;
		  	}
		  	if(!valid){

		  		//If the year is in proper range show error
				var inst = $('[data-remodal-id=invalid_range_year_modal]').remodal();
				inst.open();
				return;
		  	}

		  	//Ask the user to continue
			var inst = $('[data-remodal-id=to_continue_generic_modal]').remodal();
			inst.open();
		}

		//Disable all the form fields
		function disableFormFieldsRegistration(){
	        	
			$('#nombretarjetahabiente').prop("disabled", true);
			$('#tarjeta').prop("disabled", true);
			$('#cvc').prop("disabled", true);
			$('#expirationMonth').prop("disabled", true);
			$('#expirationYear').prop("disabled", true);			
			$('#processPayment').prop("disabled", true);
        }

        //Enable all the form fields
        function enaleFormFieldsRegistration(){

			$('#nombretarjetahabiente').prop("disabled", false);
			$('#tarjeta').prop("disabled", false);
			$('#cvc').prop("disabled", false);
			$('#expirationMonth').prop("disabled", false);
			$('#expirationYear').prop("disabled", false);
			$('#processPayment').prop("disabled", false);
        }

    </script>
@stop