@extends('templates.index_basic_template')

@section('meta_section')
    @parent

    <title>Easy Retail Admin</title>

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
			<div class="remodal" data-remodal-id="password_not_equals_modal">
			  <button data-remodal-action="close" class="remodal-close"></button>
			  <h1>Ups!</h1>
			  <p>
			    Tus contraseñas no coinciden, porfavor revisalas
			  </p>
			  <br>
			  <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
			</div>
			<div class="remodal" data-remodal-id="continue_register_modal"
			  data-remodal-options="hashTracking: false, closeOnOutsideClick: false, closeOnConfirm: true">	  
			  <h1>Easy Retail Admin</h1>
			  <p>
			    ¿Seguro que deseas continuar con el registro?
			  </p>
			  <br>
			  <button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
			  <button data-remodal-action="confirm" class="remodal-confirm" id="continue_register_modal_ok">OK</button>
			</div>
			<div class="remodal" data-remodal-id="successful_register_modal"
			  data-remodal-options="hashTracking: false, closeOnOutsideClick: false">

			  <button data-remodal-action="close" class="remodal-close"></button>
			  <h1>Easy Retail Admin</h1>
			  <p>
			    Felicidades, tu registro se proceso con éxito. Enviamos un correo electrónico a tu bandeja de entrada para que puedas activar tu correo electrónico y puedas accesar a tu panel admnistrativo
			  </p>
			  <br>		 	
			  <button data-remodal-action="confirm" class="remodal-confirm" id="successful_register_modal_ok">OK</button>
			</div>			
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
			
			<!-- Start Banner -->
			<div class="ulockd-home-slider">
				<div class="container-fluid">
					<div class="row">
						<div class="pogoSlider" id="js-main-slider">
							<div class="pogoSlider-slide" data-transition="zipReveal" data-duration="1500" style="background-image:url(images/home/slider-01.jpg);">
								<div class="lbox-caption">
									<div class="lbox-details">
										<h1>Eeasy Retail</h1>
										<h2>Tu sistema inteligente</h3>
										<p>Descarga tu versión de prueba <strong>Descubrelo</strong></p>
										<a href="#" class="btn ">Descargar</a>
									</div>
								</div>
							</div>
							<div class="pogoSlider-slide" data-transition="blocksReveal" data-duration="1500" style="background-image:url(images/home/slider-01.jpg);">
								<div class="lbox-caption">
									<div class="lbox-details">
										<h1>Eeasy Retail</h1>
										<h2>Tu sistema inteligente</h3>
										<p>Descarga tu versión de prueba <strong>Descubrelo</strong></p>
										<a href="#" class="btn ">Descargar</a>
									</div>
								</div>
							</div>
							<div class="pogoSlider-slide" data-transition="shrinkReveal" data-duration="2000" style="background-image:url(images/home/slider-01.jpg);">
								<div class="lbox-caption">
									<div class="lbox-details">
										<h1>Eeasy Retail</h1>
										<h2>Tu sistema inteligente</h3>
										<p>Descarga tu versión de prueba <strong>Descubrelo</strong></p>
										<a href="#" class="btn ">Descargar</a>
									</div>
								</div>
								
							</div>
						</div><!-- .pogoSlider -->
					</div>
				</div>
			</div>
			<!-- End Banner -->
			
			<!-- Start About us -->
			<div id="about" class="about-box">
				<div class="about-a1">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="title-box">
									<h2>Quienes somos</h2>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="row align-items-center about-main-info">
									<div class="col-lg-8 col-md-6 col-sm-12">
										<h2> Acerca de <span>Nosotros</span></h2>
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
									</div>
									<div class="col-lg-4 col-md-6 col-sm-12">
										<div class="about-img">
											<img class="img-fluid rounded" src="images/home/about-img-01.jpg" alt="" />
										</div>
									</div>
								</div>
								<div class="row align-items-center about-main-info">
									<div class="col-lg-4 col-md-6 col-sm-12">
										<div class="about-img">
											<img class="img-fluid rounded" src="images/home/about-img-02.jpg" alt="" />
										</div>
									</div>
									<div class="col-lg-8 col-md-6 col-sm-12">
										<h2> Acerca de<span> Easy Retail</span></h2>
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End About us -->
			
			<!-- Start  Register -->
			<div id="story" class="contact-box">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="title-box">
								<h2>Registrate aquí</h2>								
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
						</div>
						<div class="col-md-6">
							<div class="col-lg-12 col-sm-12 col-xs-12">
							  <div class="contact-block">
								<form id="registerForm">
								  <div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" maxlength="50" id="name" name="name" placeholder="Tu nombre completo" required data-error="Porfavor ingresa tu nombre completo aquí">
											<div class="help-block with-errors"></div>
										</div>                                 
									</div>
									<!--<div class="col-md-12">
										<div class="form-group">
											<input type="text" placeholder="Tu teléfono" id="phone" class="form-control" name="name" required data-error="Porfavor ingresa tu teléfono aquí">
											<div class="help-block with-errors"></div>
										</div> 
									</div>-->
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" placeholder="Tu correo electrónico" maxlength="70" id="email" class="form-control" name="name" required data-error="Porfavor ingresa tu correo electrónico aquí">
											<div class="help-block with-errors"></div>
										</div> 
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="password" placeholder="La contraseña de tu cuenta" maxlength="20" id="password" class="form-control" name="name" required data-error="Porfavor ingresa la contraseña de tu cuenta aquí">
											<div class="help-block with-errors"></div>
										</div> 
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="password" placeholder="Repite la contraseña de tu cuenta" maxlength="20" id="password2" class="form-control" name="name" required data-error="Porfavor ingresa nuevamente la contraseña de tu cuenta aquí">
											<div class="help-block with-errors"></div>
										</div> 
									</div>
									<div class="col-md-12">
										<div class="submit-button text-center">
											<button class="btn btn-common" id="regiterButton" type="submit">Registrarme</button>
											<div id="msgSubmit" class="h3 text-center hidden"></div> 
											<div class="clearfix"></div> 										
										</div>									
									</div>						
									<!--<div class="col-md-12">
										<div class="form-group"> 
											<textarea class="form-control" id="message" placeholder="Tu mensaje" rows="8" data-error="Write your message" required></textarea>
											<div class="help-block with-errors"></div>
										</div>
										<div class="submit-button text-center">
											<button class="btn btn-common" id="submit" type="submit">Enviar mensaje</button>
											<div id="msgSubmit" class="h3 text-center hidden"></div> 
											<div class="clearfix"></div> 
										</div>
									</div>-->
								  </div>            
								</form>
							  </div>
							</div>
						</div>
						<div class="col-md-3">
						</div>					
					</div>
				</div>
			</div>		
			<!-- End Start register -->

			<!-- Start Story -->
			<!--<div id="story" class="story-box main-timeline-box">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="title-box">
								<h2>Our Story</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
							</div>
						</div>
					</div>
					<div class="row timeline-element separline">
						<div class="timeline-date-panel col-xs-12 col-md-6  align-left">         
		                    <div class="time-line-date-content">
		                        <p class="mbr-timeline-date mbr-fonts-style display-font">
		                            1 March 2018  
		                        </p>
		                    </div>
						</div>
						<span class="iconBackground"></span>
						<div class="col-xs-12 col-md-6 align-left">
							<div class="timeline-text-content">
								<h4 class="mbr-timeline-title pb-3 mbr-fonts-style display-font">First meet</h4>
								<p class="mbr-timeline-text mbr-fonts-style display-7">
								   We met at the wedding of our close friends and immediately found a common language, so a year later our first date happened.
								</p>
							 </div>
						</div>
					</div>
					<div class="row timeline-element reverse separline">
						<div class="timeline-date-panel col-xs-12 col-md-6  align-left">         
		                    <div class="time-line-date-content">
		                        <p class="mbr-timeline-date mbr-fonts-style display-font">
		                            2 April 2018  
		                        </p>
		                    </div>
						</div>
						<span class="iconBackground"></span>
						<div class="col-xs-12 col-md-6 align-right">
							<div class="timeline-text-content">
								<h4 class="mbr-timeline-title pb-3 mbr-fonts-style display-font">First date</h4>
								<p class="mbr-timeline-text mbr-fonts-style display-7">
								   We met at the wedding of our close friends and immediately found a common language, so a year later our first date happened.
								</p>
							 </div>
						</div>
					</div>
					<div class="row timeline-element separline">
						<div class="timeline-date-panel col-xs-12 col-md-6  align-left">         
		                    <div class="time-line-date-content">
		                        <p class="mbr-timeline-date mbr-fonts-style display-font">
		                            1 May 2018  
		                        </p>
		                    </div>
						</div>
						<span class="iconBackground"></span>
						<div class="col-xs-12 col-md-6 align-left">
							<div class="timeline-text-content">
								<h4 class="mbr-timeline-title pb-3 mbr-fonts-style display-font">Proposal</h4>
								<p class="mbr-timeline-text mbr-fonts-style display-7">
								   Fusce convallis ante id purus sagittis malesuada. Sed erat ipsum, suscipit sit amet auctor quis, vehicula ut leo. Maecenas felis nulla, tincidunt ac blandit a, consectetur quis elit.
								</p>
							 </div>
						</div>
					</div>
					<div class="row timeline-element reverse separline">
						<div class="timeline-date-panel col-xs-12 col-md-6  align-left">         
		                    <div class="time-line-date-content">
		                        <p class="mbr-timeline-date mbr-fonts-style display-font">
		                            2 June 2018  
		                        </p>
		                    </div>
						</div>
						<span class="iconBackground"></span>
						<div class="col-xs-12 col-md-6 align-right">
							<div class="timeline-text-content">
								<h4 class="mbr-timeline-title pb-3 mbr-fonts-style display-font">Engagement</h4>
								<p class="mbr-timeline-text mbr-fonts-style display-7">
								   Proin tempus felis quis justo pretium interdum. Praesent sollicitudin lectus eu mattis egestas. Praesent luctus magna at dignissim placerat.
								</p>
							 </div>
						</div>
					</div>
					
				</div>
			</div>-->
			<!-- End Story -->
			
			<!-- Start Family -->
			<div id="family" class="family-box">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="title-box">
								<h2>Conoce nuestro producto</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="single-team-member">
								<div class="family-img">
									<img class="img-fluid" src="images/home/family-01.jpg" alt="" />
								</div>
								<div class="family-info">
									<h4>Mr. Alonso Wiles </h4>
									<p>{ Leida’s Father }</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="single-team-member">
								<div class="family-img">
									<img class="img-fluid" src="images/home/family-02.jpg" alt="" />
								</div>
								<div class="family-info">
									<h4>Mr. Evon Wiles </h4>
									<p>{ Leida’s Mother }</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="single-team-member">
								<div class="family-img">
									<img class="img-fluid" src="images/home/family-03.jpg" alt="" />
								</div>
								<div class="family-info">
									<h4>Mr. Chris Wiles </h4>
									<p>{ Leida’s Brother }</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="single-team-member">
								<div class="family-img">
									<img class="img-fluid" src="images/home/family-04.jpg" alt="" />
								</div>
								<div class="family-info">
									<h4>Mr. Adina Wiles </h4>
									<p>{ Leida’s Sister }</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="single-team-member">
								<div class="family-img">
									<img class="img-fluid" src="images/home/family-05.jpg" alt="" />
								</div>
								<div class="family-info">
									<h4>Mr. Annetta Wiles </h4>
									<p>{ Leida’s Sister }</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="single-team-member">
								<div class="family-img">
									<img class="img-fluid" src="images/home/family-06.jpg" alt="" />
								</div>
								<div class="family-info">
									<h4>Mr. Ladonna Wiles </h4>
									<p>{ Leida’s Sister }</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Family -->
			
			
			
			<!-- Start Events -->
			<div id="events" class="events-box">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="title-box">
								<h2>Noticias</h2>
								<p>Ponte al día con nuestros últimos anuncios</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="event-inner">
								<div class="event-img">
									<img class="img-fluid" src="images/home/event-img-01.jpg" alt="" />
								</div>
								<h2>2 June 2018 Engagement</h2>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard </p>
								<a href="#">See location ></a>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="event-inner">
								<div class="event-img">
									<img class="img-fluid" src="images/home/event-img-02.jpg" alt="" />
								</div>
								<h2>3 June 2018 Main Ceremony </h2>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard </p>
								<a href="#">See location ></a>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="event-inner">
								<div class="event-img">
									<img class="img-fluid" src="images/home/event-img-03.jpg" alt="" />
								</div>
								<h2>4 June 2018 Wedding party </h2>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard </p>
								<a href="#">See location ></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Events -->
			
			<!-- Start Contact -->
			<div id="contact" class="contact-box">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="title-box">
								<h2>Contacta con nosotros</h2>
								<p>Somos tu mejor opción</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-sm-12 col-xs-12">
						  <div class="contact-block">
							<form id="contactForm">
							  <div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<input type="text" class="form-control" id="name" name="name" placeholder="Tu nombre completo" required data-error="Please enter your name">
										<div class="help-block with-errors"></div>
									</div>                                 
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="text" placeholder="Tu correo electrónico" id="email" class="form-control" name="name" required data-error="Please enter your email">
										<div class="help-block with-errors"></div>
									</div> 
								</div>
								<!--<div class="col-md-12">
									<div class="form-group">
										<select class="custom-select d-block form-control" id="guest" required data-error="Please select an item in the list.">
										  <option disabled selected>Number Of Guest*</option>
										  <option value="1">1</option>
										  <option value="2">2</option>
										  <option value="3">3</option>
										  <option value="4">4</option>
										  <option value="5">5</option>
										</select>
										<div class="help-block with-errors"></div>
									</div> 
								</div>-->
								<!--<div class="col-md-12">
									<div class="form-group">
										<select class="custom-select d-block form-control" id="event" required data-error="Please select an item in the list.">
										  <option disabled selected>I Am Attending*</option>
										  <option value="1">All events</option>
										  <option value="2">Wedding ceremony</option>
										  <option value="3">Reception party</option>
										</select>
										<div class="help-block with-errors"></div>
									</div> 
								</div>-->
								<div class="col-md-12">
									<div class="form-group"> 
										<textarea class="form-control" id="message" placeholder="Tu mensaje" rows="8" data-error="Write your message" required></textarea>
										<div class="help-block with-errors"></div>
									</div>
									<div class="submit-button text-center">
										<button class="btn btn-common" id="submit" type="submit">Enviar mensaje</button>
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
			<!-- End Contact -->
			
			<!-- Start  Login -->
			<!--<div id="login" class="contact-box">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="title-box">
								<h2>Ingresa a tu cuenta</h2>							
								<div id="loginLoading" class="loader">
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
										<div id="msgSubmit" class="h3 text-center hidden"></div> 
										<div class="clearfix"></div> 
									</div>
								</div>						
								<div class="col-md-12">
									<div class="form-group"> 
										<textarea class="form-control" id="message" placeholder="Tu mensaje" rows="8" data-error="Write your message" required></textarea>
										<div class="help-block with-errors"></div>
									</div>
									<div class="submit-button text-center">
										<button class="btn btn-common" id="submit" type="submit">Enviar mensaje</button>
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
			</div>-->
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
	        	        	
	        	//Event in click ok in success register modal
				$("#successful_register_modal_ok").click(function(event){
					
					//Redirects to login
					window.location.href = "/download?download=true";
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
						    showLoading();
						  },
					    success: function (data) {

					    	hideLoading();

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
					    	hideLoading();
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