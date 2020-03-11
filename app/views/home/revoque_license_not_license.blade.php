@extends('templates.admin_panel_admins_template')

@section('meta_section')
    @parent

    <title>Revocación/Activación licencia ERA</title>

@stop

@section('link_section')
    @parent    
@stop

@section('body_section')
    @parent

    <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
            	<div class="remodal-bg">
            		<div class="row" style="text-align: center">
                	<h1>Revocación/Activación de Licencia</h1><br><br>
				</div>
					<br>
					<div class="gallery-box">
						<div class="container-fluid">
							<div class="row" style="text-align: center;">
								<div class="col-lg-12">
									<div class="title-box">
										<label>Tienes que hacer la compra de tu licencia primeramente para poder usar esta sección</label>
									</div>					
								</div>					
				            	<div class="col-md-4">
								</div>
								<div class="col-md-4">
								</div>					
								</div>
							</div>				
						</div>
					</div>
				</div>		
            </div>
        </div>				

@stop

@section('footer_section')
	@parent    
@stop

@section('js_section')
    @parent    
@stop