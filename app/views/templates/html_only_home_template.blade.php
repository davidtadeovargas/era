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
				<a class="navbar-brand" href="index.html"><img src="images/home/logo.png" alt="image"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
					<span></span>
					<span></span>
					<span></span>
				</button>
                <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                    <ul class="navbar-nav">
                        <li><a class="nav-link active" href="http://localhost">Home</a></li>
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
@stop