@extends('templates.login_basic_template')

@section('meta_section')
    @parent

    <title>Token</title>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.conekta.io/js/latest/conekta.js"></script>

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

	
			


			
			<!-- Start  Login -->
			<div id="login" class="contact-box">
				<div class="container">
					<h1>Genera tu token de compra</h1>
					<div class="row">						
						<form id="card-form">
  <span class="card-errors"></span>
  <div>
    <label>
      <span>Nombre del tarjetahabiente</span><div class="clearfix"></div>
      <input type="text" size="20" data-conekta="card[name]">
    </label>
  </div>
  <div>
    <label>
      <span>Número de tarjeta de crédito</span><div class="clearfix"></div>
      <input type="text" size="20" data-conekta="card[number]">
    </label>
  </div>
  <div>
    <label>
      <span>CVC</span><div class="clearfix"></div>
      <input type="text" size="4" data-conekta="card[cvc]">
    </label>
  </div>
  <div>
    <label>
      <span>Fecha de expiración (MM/AAAA)</span>
      <input type="text" size="2" data-conekta="card[exp_month]">
    </label>
    <span>/</span>
    <input type="text" size="4" data-conekta="card[exp_year]">
  </div>
  <button type="submit">Crear token</button>
</form>
					</div>					
				</div>
			</div>
			<!-- End Login -->

		

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
	     $form.append($('<input type="text" style="width:100%" name="conektaTokenId" id="conektaTokenId">').val(token.id));
	    
	    $form.find("button").prop("disabled", false);	    

	    alert("El token ahora esta visible aun lado del botón de Crear Token, tiene durabilidad de una hora. Pasada la hora vuelve a generarlo nuevamente.");
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
    
@stop