@extends('templates.html_basic_template')

@section('meta_section')
    @parent    
@stop

@section('link_section')
    @parent    
@stop

@section('body_section')
    @parent    

	<!-- Start header -->
	<header class="top-header">		
		<nav class="navbar header-nav navbar-expand-lg">
            <div class="container">
				<a class="navbar-brand" href="#home"><img src="images/home/logo.png" alt="image"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
					<span></span>
					<span></span>
					<span></span>
				</button>
                <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                    <ul class="navbar-nav">
                        <li><a class="nav-link active" href="#home">Home</a></li>
                        <li><a class="nav-link" href="#about">Quieres somos</a></li>
                        <li><a class="nav-link" href="#story">Registrate</a></li>
                        <li><a class="nav-link" href="#contact">Contacto</a></li>
                        <li><a class="nav-link" id="downloadsMenu" style="cursor: pointer;">Descargas</a></li>
                        <li><a class="nav-link" href="<?php echo \Config::get('app_globals.server'); ?>/login">Iniciar Sesion</a></li>                        
                    </ul>
                </div>
            </div>
        </nav>        
	</header>
	<!-- End header -->

@stop

@section('footer_section')
    @parent    
@stop

@section('js_section')
    @parent 


    <script>        
            
            $(document).ready(function () {                             
                            
                $("#downloadsMenu").click(function(event){
                    window.location.href = "/download?download=false";
                });
            });

        </script>   
@stop