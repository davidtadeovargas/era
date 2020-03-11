@extends('templates.admin_panel_admins_template')

@section('meta_section')
    @parent

    <title>ERA Carrito de Compras</title>

    <!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

@stop

@section('link_section')
    @parent


    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //for-mobile-apps -->
	<!--<link href="css/shopping_cart/bootstrap.css" rel="stylesheet" type="text/css" media="all" />-->
	<link href="css/shopping_cart/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome icons -->
	<link href="css/shopping_cart/font-awesoe.css" rel="stylesheet" type="text/css" media="all" /> 
	<!-- //font-awesome icons -->
	<!-- js -->
	<script src="js/shopping_cart/jquery-1.11.1.min.js"></script>
	<!-- //js -->
	<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="js/shopping_cart/move-top.js"></script>
	<script type="text/javascript" src="js/shopping_cart/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {

			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>

@stop

@section('body_section')
    @parent

<!-- header -->
	
<!-- script-for sticky-nav -->
	<script>
	$(document).ready(function() {
		 var navoffeset=$(".agileits_header").offset().top;
		 $(window).scroll(function(){
			var scrollpos=$(window).scrollTop(); 
			if(scrollpos >=navoffeset){
				$(".agileits_header").addClass("fixed");
			}else{
				$(".agileits_header").removeClass("fixed");
			}
		 });
		 
	});
	</script>
<!-- //script-for sticky-nav -->
	
<!-- //header -->
<!-- products-breadcrumb -->	
<!-- //products-breadcrumb -->
<!-- banner -->
<div id="page-wrapper">
            <div id="page-inner">

            	<div class="row" style="text-align: center;">
            		<br><br><h1>Mi tienda</h1><BR>
            	</div>
            	<div class="banner">
		<div class="w3l_banner_nav_right">			
			<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_sub">				
				<h2>Licencias</h2>
				<div class="w3ls_w3l_banner_nav_right_grid1 row">
					<?php 

						//Loop all the products to render them						
						$x = 1;
						foreach($model->products as $Product){

							
							echo '<div class="col-sm-3" style="margin-bottom:30px">
								<div class="hover14 column">
								<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
									<div class="agile_top_brand_left_grid_pos">
										<img src="images/shopping_cart/offer.png" alt=" " class="img-responsive" />
									</div>
									<div class="agile_top_brand_left_grid1">
										<figure>
											<div class="snipcart-item block">
												<div class="snipcart-thumb">
													<a href="single.html"><img src="images/home/logo.png" alt=" " class="img-responsive" /></a>
													<p>'.$Product->description.'</p>
													<h4>$'.number_format($Product->price, 2).' <span>$10.00</span></h4>
												</div>
												<div class="snipcart-details">
													<form action="#" method="post">
														<fieldset>
															<input type="hidden" name="cmd" value="_cart" />
															<input type="hidden" name="add" value="1" />
															<input type="hidden" name="business" value=" " />
															<input type="hidden" name="item_name" value="'.$Product->code." | ".$Product->description.'" />
															<input type="hidden" name="amount" value="'.$Product->price.'" />
															<input type="hidden" name="discount_amount" value="0" />
															<input type="hidden" name="currency_code" value="MXN" />
															<input type="hidden" name="return" value=" " />
															<input type="hidden" name="cancel_return" value=" " />
															<input type="submit" style="cursor: pointer;" name="submit" value="Agregar al carrito" class="button" />
														</fieldset>
													</form>
												</div>
											</div>
										</figure>
									</div>
								</div>
								</div>
							</div>';

							if($x==4){
								echo "<h2>Timbres</h2><br>";
							}
							else if($x==8){
								echo "<h2>Revocación</h2><br>";
							}
							$x =$x + 1;
						}

						echo '<div class="clearfix"></div><br>';						

					?>
						</div>						
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	
            </div>
</div>
<!-- //banner -->
@stop

@section('footer_section')
	@parent    
@stop

@section('js_section')
    @parent    
@stop

@section('custom_js_section')
    @parent

    <!-- Bootstrap Core JavaScript -->
<!--<script src="js/shopping_cart/bootstrap.min.js"></script>-->
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/			
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<script src="js/shopping_cart/minicart.js"></script>
<script>

		//Show the cart
		paypal.minicart.render();
		
		paypal.minicart.cart.on('add', function (evt) {

			//Add the data property in the item
		});

		paypal.minicart.cart.on('checkout', function (evt) {

			// cancel default behavior
			evt.preventDefault();

			//Get all the items in array
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			//Create the json model
			var ShoppingCartDataModel = [];			

			//Create the individual item for the json based on each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');

				var quantity = items[i].get('quantity');
				var description = items[i].get('item_name');
				var price = items[i].get('amount');				

				console.log("quantity " + quantity);
				console.log("description: " + description);
				console.log("price: " + price);

				var tokens = String(description).split("|");
				var code = tokens[0];
				description = tokens[1];

				console.log("Item " + i);
				console.log("code: " + code);
				console.log("description: " + description);
				console.log("price: " + price);

				//Create the model and append it to the json object				
				var ProductModel = {};
				ProductModel["code"] = code;
				ProductModel["description"] = description;
				ProductModel["price"] = price;
				
				ShoppingCartDataModel.push(ProductModel);
			}

			//Create the totals
			var ShoppingCartTotalsDataModel = {subtotal:this.subtotal(),taxes:this.subtotal(),total:this.subtotal()};

			//Log to console the totals
			console.log("Totals");
			console.log(JSON.stringify(ShoppingCartTotalsDataModel));

			//Log to console the items of the cart
			console.log("Items");
			console.log(JSON.stringify(ShoppingCartDataModel));

			//Save the items info for the payment page
			localStorage.setItem("ShoppingCartDataModel", JSON.stringify(ShoppingCartDataModel));
			localStorage.setItem("ShoppingCartTotalsDataModel", JSON.stringify(ShoppingCartTotalsDataModel));

			//Redirect to the payment page
			window.location.href = "buy_license";
		});

	</script>

@stop