@extends('templates.admin_panel_admins_template')

@section('meta_section')
    @parent

    <title>Bienvenido a tu panel ERA</title>

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

	
	<!-- End header -->

	<!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">                

                <div class="row">                    
						<div class="col-lg-12 col-sm-12 col-xs-12">
						  <div class="contact-block">
							<form id="loginForm">
							  <div class="title-box">
									<h2>Bienvenido a Easy Retail Admin!</h2>
									<p>Tu sistema inteligente</p>
								</div>					
							</form>
						  </div>
						</div>
					</div>
            </div>
            <!-- /. PAGE INNER  -->
@stop

@section('footer_section')
	@parent    
@stop

@section('js_section')
    @parent    
@stop