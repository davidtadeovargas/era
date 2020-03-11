@extends('templates.admin_panel_admins_template')

@section('meta_section')
    @parent

    <title>Historias de Usuario</title>

@stop

@section('link_section')
    @parent    
@stop

@section('body_section')
    @parent

    <div class="remodal-bg">
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
    <div id="wrapper">        
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">

                <div class="row" style="text-align: center">                    
                	<h1>Historias de Usuarios</h1><br><br>
				</div>
				<div class="row" style="text-align: left;margin-left: 10px">
                	<h2>Filtros</h2><br>
				</div>
				<div class="row" style="margin-left: 10px">
					<div class="col-sm-2">
						<label>Tipo:</label>
					</div>
					<div class="col-sm-5">						
						<select id="selectUsersHistoryType">
							<?php 
								foreach($model->UserHistoryTypes as $UserHistoryType){
									echo "<option id='".$UserHistoryType->id."'>".$UserHistoryType->description."</option>";
								}
							?>
						</select>
					</div>					
				</div>
				<div class="row" style="margin-left: 10px">
					<div class="col-sm-2">
						<label>Usuario:</label>
					</div>
					<div class="col-sm-5">
						<input type="text" name="" id="inputUser">
					</div>						
				</div><br>
				<div class="row" style="margin-left: 10px">
					<button type="button" class="btn btn-success" id="btnSearch">Buscar</button>
				</div><br>
				<div class="row" style="text-align: left;margin-left: 10px">
                	<h2>Resultados</h2><br>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<table class="table">
						    <thead>
						      <tr>
						        <th>Tipo</th>
						        <th>Usuario</th>
						        <th>Pago</th>
						        <th>Computadora</th>
						        <th>Producto</th>
						        <th>Serie</th>
						        <th>Creado</th>
						      </tr>
						    </thead>
						    <tbody id="tbody">
						    </tbody>
						  </table>
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
        
        $(document).ready(function () {                         	
        	
        	$("#btnSearch").click(function(){

        		//Get all the fields in variables
			  	var user = $('#inputUser').val().trim();
			  	var usersHistoryTypeID = $('#selectUsersHistoryType option:selected').attr("id");

				//Create the json model for ajax
				var requestModel = 	{ 	user: user,
										usersHistoryType:usersHistoryTypeID,
										token:"sdsal1129399458ddkskdklsklds0939"};
				console.log(requestModel);

				//Send the ajax
				$.ajax({
				    type: "POST",
				    url: "/get_users_history_by_filter",
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
				        
				        $("#tbody").empty();
				        
				        //Add the rows
						$.each(data["meta"], function(k, UserHistory) {
							addHistoryRow(UserHistory);
						});
												
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
        });        
        
        function addHistoryRow(UserHistory){
        	$("#tbody").append("<tr class='info'>" +
			        "<td>" + UserHistory["userHistoryType"] + "</td>" +
			        "<td>" + UserHistory["user"] + "</td>" +
			        "<td>" + UserHistory["payment"] + "</td>" +
			        "<td>" + UserHistory["computer"] + "</td>" +
			        "<td>" + UserHistory["product"] + "</td>" +
			        "<td>" + UserHistory["serie"] + "</td>" +
			        "<td>" + UserHistory["created_at"] + 
			      "</tr>");
        }
    </script>

    @stop