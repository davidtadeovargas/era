@extends('templates.admin_panel_admins_template')

@section('meta_section')
    @parent

    <title>Notificaciones Push</title>

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
			<div class="remodal" data-remodal-id="continue_send_push_modal"
			  data-remodal-options="hashTracking: false, closeOnOutsideClick: false, closeOnConfirm: true">	  
			  <h1>Easy Retail Admin</h1>
			  <p>
			    ¿Seguro que deseas continuar con el envio del mensaje?
			  </p>
			  <br>
			  <button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
			  <button data-remodal-action="confirm" class="remodal-confirm" id="continue_send_push_modal_ok">OK</button>
			</div>
			<div class="remodal" data-remodal-id="continue_delete_message_modal"
			  data-remodal-options="hashTracking: false, closeOnOutsideClick: false, closeOnConfirm: true">	  
			  <h1>Easy Retail Admin</h1>
			  <p>
			    ¿Seguro que deseas continuar con el borrado del mensaje?
			  </p>
			  <br>
			  <button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
			  <button data-remodal-action="confirm" class="remodal-confirm" id="continue_delete_message_modal_ok">OK</button>
			</div>
			<div class="remodal" data-remodal-id="empty_fields_modal">
			  <button data-remodal-action="close" class="remodal-close"></button>
			  <h1>Ups!</h1>
			  <p>
			    Aun hay campos sin llenar, porfavor completalos antes de continuar
			  </p>
			  <br>
			  <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
			</div>
			<div class="remodal" data-remodal-id="channel_not_selected_modal">
			  <button data-remodal-action="close" class="remodal-close"></button>
			  <h1>Ups!</h1>
			  <p>
			    Selecciona un canal de difusión
			  </p>
			  <br>
			  <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
			</div>
			<div class="remodal" data-remodal-id="end_date_greater_init_date_modal">
			  <button data-remodal-action="close" class="remodal-close"></button>
			  <h1>Ups!</h1>
			  <p>
			    La fecha final no puede ser menor a la fecha inicial
			  </p>
			  <br>
			  <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
			</div>
			<div class="remodal" data-remodal-id="init_date_lesser_than_today_modal">
			  <button data-remodal-action="close" class="remodal-close"></button>
			  <h1>Ups!</h1>
			  <p>
			    La fecha inicial no puede ser menor al día de hoy
			  </p>
			  <br>
			  <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
			</div>
			<div class="remodal" data-remodal-id="empty_init_date_modal">
			  <button data-remodal-action="close" class="remodal-close"></button>
			  <h1>Ups!</h1>
			  <p>
			    La fecha de inicio esta vacia
			  </p>
			  <br>
			  <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
			</div>
			<div class="remodal" data-remodal-id="empty_end_date_modal">
			  <button data-remodal-action="close" class="remodal-close"></button>
			  <h1>Ups!</h1>
			  <p>
			    La fecha de fin esta vacia
			  </p>
			  <br>
			  <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
			</div>
			<div class="remodal" data-remodal-id="banner_not_set_modal">
			  <button data-remodal-action="close" class="remodal-close"></button>
			  <h1>Ups!</h1>
			  <p>
			    Selecciona el banner del mensaje
			  </p>
			  <br>
			  <button data-remodal-action="confirm" class="banner_not_set_modal_ok">OK</button>
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
			<div class="remodal" data-remodal-id="message_sent_modal"
			  data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
			  <button data-remodal-action="close" class="remodal-close"></button>
			  <h1>Easy Retail Admin</h1>
			  <p>
			    Notificación programada
			  </p>
			  <br>		 	
			  <button data-remodal-action="confirm" class="remodal-confirm" id="message_sent_modal_ok">OK</button>
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
    <div id="wrapper">        
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">

            	<div class="row" style="text-align: center">
                	<h1>Notificaciones Push</h1><br><br>
				</div>

                <div class="row">                    
						<div class="col-lg-12 col-sm-12 col-xs-12">
						  <div class="contact-block">
							<form id="loginForm">
							  <div class="row">
							  	<div class="col-md-3">
							  	</div>
								<div class="col-md-6">
                                    <div class="row">                               
                                        <div class="title-box" style="text-align: center;">
                                            <h2>Selecciona el banner</h2><br><br>                               
                                        </div>
                                    </div>
									<div class="form-group">
										<img src="/images/home/image.jpg" id="imgBanner" style="width: 100%;height: 300px"></img><br><br>
										<label style="color:red">Si tu imágen se ve bien aquí entonces el usuario la vera igual</label>
										<label style="color:red">(Medida base 800px ancho y 350px alto, en caso de ser mas grande solo revisa que se muestre proporcional en la parte de arriba)</label>
										<input type='file' id='bannerFile' size='8'/>
										<div class="help-block with-errors"></div>
										<div class="row">											
										<br>URL Acción:<br>
										<input type="text" id="bannerAction" style="width: 100%"><br><br><br>
										<hr width="100%" size="8" align="center">						
										<div class="title-box" style="text-align: center;">
	                                            <h2>Parametrización</h2><br><br>
	                                        </div>
	                                    </div>
	                                    <div class="row">
	                                    	<div class="col-sm-2">
	                                    		<label>Canal:</label>
	                                    	</div>
	                                    	<div class="col-sm-10">
	                                    		<select id="channelsCombo" style="width: 100%">
	                                    			<?php 
	                                    				foreach($model->channels as $channel){
	                                    					echo "<option id='".$channel->id."'>".$channel->name."</option>";
	                                    				}
	                                    			?>
												</select> 
	                                    	</div>	                                    	
	                                    </div>		                                    
										<br>										
										<div class="row">
											<div class="col-sm-4">
												<input type="checkbox" id="everyday">Todos los días
											</div>											
											<div class="col-sm-4">
												<label>De:</label>
												<input type="date" id="fromDate"><br>
											</div>
											<div class="col-sm-4">
												<label>Hasta:</label>
												<input type="date" id="toDate"><br>
											</div>
										</div>											
							  	</div>
									</div> 
								</div>
								<div class="col-md-3">
							  	</div>
							  	<div class="col-md-4">
							  	</div>
								<div class="col-md-4">									
								</div>	
								<div class="col-md-4">
							  	</div>							  	
								<div class="col-md-12">
									<div class="submit-button text-center"><br><br>
										<button class="btn btn-common" id="loginButton" type="submit">Enviar</button>
										<br><br>
										<div id="msgSubmit" class="h3 text-center hidden"></div> 
										<div class="clearfix"></div> 
									</div>
								</div>						
								<div class="clearfix"></div>
								<br>
								<div class="row">
									<div class="col-sm-4">
										<button type="button" class="btn btn-primary" id="btnEnviados">Enviados</button>
									</div>
									<div class="col-sm-4"></div>
									<div class="col-sm-4"></div>									
								</div>
								<div class="row">
										<hr width="100%" size="8" align="center">						
										<div class="title-box" style="text-align: center;">
	                                            <h2>Listado</h2><br><br>
	                                        </div>
	                                    </div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<table class="table">
										    <thead>
										      <tr>
										        <th>Canal</th>
										        <th>Diario</th>
										        <th>Desde</th>
										        <th>Hasta</th>
										        <th>Banner</th>
										        <th>Acción</th>
										        <th>Creado</th>
										      </tr>
										    </thead>
										    <tbody id="tbody">
										    	<?php 

										    		foreach($model->messages as $message){		
										    			$rowID = $message->id."-row";
										    			echo "<tr class='info' id='".$rowID."'>".
														        "<td>".$message->channel_id."</td>".
														        "<td>".$message->everyday."</td>".
														        "<td>".$message->from."</td>".
														        "<td>".$message->to."</td>".
														        "<td>".$message->bannerFile."</td>".
														        "<td>".$message->bannerAction."</td>".
														        "<td>".$message->created_at."<button type='button' class = 'btn btn-danger delete_automated' id='".$message->id."'>Borrar</button></td>".
														      "</tr>";
										    		}
										    	?>
										    </tbody>
										  </table>
									</div>										
								</div>
							  </div>
							</form>
						  </div>
						</div>
					</div>

                

                
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    @stop

    @section('custom_js_section')
        @parent

    <script>
        
        var existsImage = false;
        var delete_message_id = -1;
        var rowID;

        $(document).ready(function () {                         	
        	
        	//Init the from and to dates
        	var now = new Date();
			var day = ("0" + now.getDate()).slice(-2);
			var month = ("0" + (now.getMonth() + 1)).slice(-2);
			var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
			$('#fromDate').val(today);
			$('#toDate').val(today);			

			$(document).on('click', '.delete_automated', function() {
				
				delete_message_id = $(this).attr("id");
			    console.log("delete_message_id = " + delete_message_id);
			    rowID = delete_message_id  + "-row";
			    console.log("rowID = " + rowID);

				var inst = $('[data-remodal-id=continue_delete_message_modal]').remodal();
				inst.open();
			});

			$("#btnEnviados").click(function(){
				window.location.href = "push_notifications_log";
			});

			$("#continue_delete_message_modal_ok").click(function(){


				//Create the json model for ajax
				var requestModel = 	{ id: delete_message_id,token:"sdsal1129399458ddkskdklsklds0939"};
				console.log(requestModel);

				//Send the ajax
				$.ajax({
				    type: "POST",
				    url: "/delete_automated",
				    async:true,
				    dataType: "json",
				    contentType: 'application/json',
				    data: JSON.stringify(requestModel),
				    beforeSend: function(){
				    	showLoading();
					  },
				    success: function (data) {

				    	//Console log the raw result
				        console.log("success from ajax: " + data);

				        //If invalid credentials show error
				        if(data["responseStatus"]!="ok"){
				        	console.log(data["errorMessage"]);
				        	var inst = $('[data-remodal-id=error_ajax_modal]').remodal();
							inst.open();
				        	return;
				        }
				        
				        //Delete the row
						$('#' + rowID).remove();
												
				    },
				    error: function (data) {

				    	//Log error in console
				        console.log('Error:', data);

				        //Show error modal dialog
						var inst = $('[data-remodal-id=error_ajax_modal]').remodal();
						inst.open();

				        hideLoading();

				    },
				    complete: function(){

				    	hideLoading();
					  }
				});
			});

        	$('#everyday').change(function(){ 
			    
			    //If is checked disable some controls
			    if($(this).prop("checked") == true){
					console.log("checked");
					
					$("#fromDate").attr("disabled",true);
				    $("#toDate").attr("disabled",true);
	            }
	            else if($(this).prop("checked") == false){
	                console.log("unchecked");

	                $("#fromDate").attr("disabled",false);
				    $("#toDate").attr("disabled",false);
	            }

			});

        	$('#channelsCombo').change(function(){ 
			    var value = $(this).val();
			    var channelID = $(this).attr("id");
			    console.log("channelsCombo value " + value);
			    console.log("channelsCombo channelID " + channelID);
			});

        	$(document).on("change","#bannerFile", function(evt){
				
				var id = $(this).attr('id');
				var idImg = "imgBanner";
				var tgt = evt.target || window.event.srcElement,
			        files = tgt.files;

			    // FileReader support
			    if (FileReader && files && files.length) {
			        var fr = new FileReader();
			        fr.onload = function () {
			            document.getElementById(idImg).src = fr.result;
			            existsImage = true;
			        }
			        fr.readAsDataURL(files[0]);
			    }
			    // Not supported
			    else {

			    	$("#imgBanner").attr("src","images/home/image.jpg");

			        // fallback -- perhaps submit the input to an iframe and temporarily store
			        // them on the server until the user's session ends.
			    }
			});

        	$("#message").text("");

        	$("#continue_send_push_modal_ok").click(function(){

        		// Create formdata
				var formdata = false;
				if(window.FormData) 
					formdata = new FormData();
				if(formdata === false) {
					alert("Your browser does not support form data");
					return false;
				}

				var bannerAction = $("#bannerAction").val();
				var fromDate = $('#fromDate').val().trim();
			  	var toDate = $('#toDate').val().trim();
			  	var everyday = $("#everyday").prop("checked") == true ? 1:0;
			  	var channelID = $('#channelsCombo option:selected').attr("id");

				console.log("bannerAction: " + bannerAction);

				//Append the data to the form data
				var val = document.getElementById("bannerFile");
				if(val.files.length>0){

					console.log("Found banner image");

					var file = val.files[0];

					console.log("id: bannerFile");
					console.log("file: " + file);

					formdata.append("bannerFile", file);
				}
				formdata.append("bannerAction", bannerAction);
				formdata.append("fromDate", fromDate);
				formdata.append("toDate", toDate);
				formdata.append("channelID", channelID);				
				formdata.append("everyday", everyday);
				formdata.append("token", "sdsal1129399458ddkskdklsklds0939");

			  	//Send the ajax
				$.ajax({
				    type: "POST",
				    url: "/save_automated_message",
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

				    	//Console log the raw result
				        console.log("success from ajax: " + data);

				        $("#loginButton").attr("disabled",false);

				        //If invalid credentials show error
				        if(data["responseStatus"]==="error"){
				        	var inst = $('[data-remodal-id=error_ajax_modal]').remodal();
							inst.open();
				        	return;
				        }

				        //Add message to the list
				        addMessage(data["message"]);

				        //Clear all the form fields
						$('#bannerAction').val("");
						$('#bannerFile').val(null);
						existsImage = false;
						$('#imgBanner').attr("src","/images/home/image.jpg");
						$('#fromDate').val(today);
						$('#toDate').val(today);
						$("#everyday").prop("checked", false);
						channelID = -1;
						
						$("#fromDate").attr("disabled",false);
					    $("#toDate").attr("disabled",false);					    

						//Redirects to the main panel
						var inst = $('[data-remodal-id=message_sent_modal]').remodal();
						inst.open();
												
				    },
				    error: function (data) {

                        hideLoading();

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

        	$("#loginButton").click(function(){

        		// cancel default behavior
        		event.preventDefault();
			  	
			  	//Image should exists
			  	if(!existsImage){

			  		//If some field does not have data show error
			  		var inst = $('[data-remodal-id=banner_not_set_modal]').remodal();
					inst.open();
					return;
			  	}

			  	//Get all the fields in variables
			  	var bannerAction = $('#bannerAction').val().trim();
			  	var fromDate = $('#fromDate').val().trim();
			  	var toDate = $('#toDate').val().trim();

			  	//Log fields
			  	console.log("bannerAction: " + bannerAction);

			  	//Validate that all the fields has data
			  	var valid = true;
			  	if(!bannerAction.trim()){
			  		valid = false;
			  	}
			  	if(!valid){

			  		//If some field does not have data show error
			  		var inst = $('[data-remodal-id=empty_fields_modal]').remodal();
					inst.open();
					return;
			  	}

			  	var channelID = $('#channelsCombo option:selected').attr("id");
			  	if(channelID==-1){

			  		var inst = $('[data-remodal-id=channel_not_selected_modal]').remodal();
					inst.open();
					return;
			  	}

			  	//Only if the checkbox of everyday is not checked validate the next
			  	if($("#everyday").prop("checked") != true){

			  		//Validate that from date has data
				  	valid = true;
				  	if(fromDate.trim()==''){
				  		valid = false;
				  	}
				  	if(!valid){

				  		//If some field does not have data show error
				  		var inst = $('[data-remodal-id=empty_init_date_modal]').remodal();
						inst.open();
						return;
				  	}

				  	//Validate that to date has data
				  	valid = true;
				  	if(toDate.trim()==''){
				  		valid = false;
				  	}
				  	if(!valid){

				  		//If some field does not have data show error
				  		var inst = $('[data-remodal-id=empty_end_date_modal]').remodal();
						inst.open();
						return;
				  	}

				  	//Validate that the init date does not be lesser than today
				  	valid = true;
				  	var dstartDate = Date.parse(fromDate);
				  	var dendDate = Date.parse(today);
				  	console.log("dstartDate = " + dstartDate);
				  	console.log("dendDate = " + dendDate);					
					if (dstartDate < dendDate) {
						valid = false;    
					}
				  	if(!valid){

				  		//If some field does not have data show error
				  		var inst = $('[data-remodal-id=init_date_lesser_than_today_modal]').remodal();
						inst.open();
						return;
				  	}

				  	//Validate that the end date does not be lesser than init date
				  	valid = true;
				  	dstartDate = Date.parse(fromDate);
					dendDate = Date.parse(toDate);
					if (dstartDate > dendDate) {
						valid = false;    
					}
				  	if(!valid){

				  		//If some field does not have data show error
				  		var inst = $('[data-remodal-id=end_date_greater_init_date_modal]').remodal();
						inst.open();
						return;
				  	}
			  	}				  	

        		//Question if continue with the register process
				var inst = $('[data-remodal-id=continue_send_push_modal]').remodal();
				inst.open();        		
        	});
        });        
        
        function addMessage(message){
        	$("#tbody").append("<tr class='info'>" +
			        "<td>" + message["channel_id"] + "</td>" +
			        "<td>" + message["everyday"] + "</td>" +
			        "<td>" + message["from"] + "</td>" +
			        "<td>" + message["to"] + "</td>" +
			        "<td>" + message["bannerFile"] + "</td>" +
			        "<td>" + message["bannerAction"] + "</td>" +
			        "<td>" + message["created_at"]["date"] + "<button " + 
			        "type='button' class='btn btn-danger'>Borrar</button></td>" + 
			      "</tr>");
        }
    </script>

    @stop