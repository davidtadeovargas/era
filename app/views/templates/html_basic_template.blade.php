<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>		
	
	@section('meta_section')

		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
	   
	    <!-- Mobile Metas -->
	    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	 
	     <!-- Site Metas -->	    
	    <meta name="keywords" content="">
	    <meta name="description" content="">
	    <meta name="author" content="">

	    <script src="js/home/jquery.min.js"></script>

	@show

    @section('link_section')

    	<!-- Site Icons -->
	    <link rel="shortcut icon" href="images/home/era.ico" type="image/x-icon">
	    <link rel="apple-touch-icon" href="images/home/apple-touch-icon.png">

	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="css/home/bootstrap.min.css">
	    <!-- Pogo Slider CSS -->
	    <link rel="stylesheet" href="css/home/pogo-slider.min.css">
		<!-- Site CSS -->
	    <link rel="stylesheet" href="css/home/style.css">    
	    <!-- Responsive CSS -->
	    <link rel="stylesheet" href="css/home/responsive.css">
	    <!-- Custom CSS -->
	    <link rel="stylesheet" href="css/home/custom.css">

	    <!-- Dialogs Remodal https://github.com/VodkaBears/Remodal-->
	    <link rel="stylesheet" href="css/remodal/remodal.css">
		<link rel="stylesheet" href="css/remodal/remodal-default-theme.css">

	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->

    @show

    <style>

        .centered {
          position: fixed;
          top: 50%;
          left: 50%;
          margin-top: -50px;
          margin-left: -100px;
          z-index: 999999999 !Important;
        }

</style>

    <div id='loading' class="centered" style="display: none">
        <label id='loadingLabel' style="color:red;position:relative;font-weight: bold;"></label>
        <br>
        <img style='position:relative;' src="loading.gif" title="Loading" ></img>
    </div>

</head>
<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

	@section('body_section')
		<div id="bigMain">
		<div class="remodal" data-remodal-id="to_continue_generic_modal"
		  data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
		  <button data-remodal-action="close" class="remodal-close"></button>
		  <h1>Eeasy Retail Admin</h1>
		  <p>
		    ¿Segro que deseas continuar?
		  </p>
		  <br>
		  <button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>		 	
		  <button data-remodal-action="confirm" class="remodal-confirm" id="to_continue_generic_modal_ok">OK</button>
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
		<div class="remodal" data-remodal-id="invalid_email_sintax_modal">
			  <button data-remodal-action="close" class="remodal-close"></button>
			  <h1>Ups!</h1>
			  <p>
			    Algo no esta bien con el correo que ingresaste, porfavor revisalo antes de continuar
			  </p>
			  <br>
			  <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
			</div>						
    @show	

	@section('footer_section')

		<!-- Start Footer -->
		<footer class="footer-box">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="footer-company-name">Todos los derechos reservados. &copy; 2019 <a href="#">Easy Retail Admin</a> Diseñado por : <a href="https://www.google.com/">Easy Retail Admin</a></p>
					</div>
				</div>
			</div>
		</footer>
		<!-- End Footer -->

    @show		

    @section('custom_js_section')

    	<script>
    		
    		var IVA = 0.16;

    		function toCurency(value){
    			var newVal = "$" + (value).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    			return newVal;
    		}

    		function showLoading(){
		        $("#bigMain").css({"display":"none"});
		        $("#loading").css({"display":"block"});
		        $('#loadingLabel').text('Espere porfavor, estamos procesando ...');     
		    }

		    function hideLoading(){
		        $("#bigMain").css({"display":"block"});
		        $("#loading").css({"display":"none"});
		    }

    	</script>

	@show

    @section('js_section')

    	<!-- ALL JS FILES -->
		
		<script src="js/home/popper.min.js"></script>
		<script src="js/home/bootstrap.min.js"></script>
		<script src="js/remodal/remodal.min.js"></script> <!-- Dialogs Remodal -->
	    <!-- ALL PLUGINS -->
		<script src="js/home/jquery.magnific-popup.min.js"></script>
	    <script src="js/home/jquery.pogo-slider.min.js"></script> 
		<script src="js/home/slider-index.js"></script>
		<script src="js/home/smoothscroll.js"></script>
		<script src="js/home/form-validator.min.js"></script>
	    <script src="js/home/contact-form-script.js"></script>
	    <script src="js/home/custom.js"></script>

    @show		
   </div>
</body>
</html>