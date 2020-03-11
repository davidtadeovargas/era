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
                <a class="navbar-brand" href="/"><img src="images/home/logo.png" alt="image"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                    <ul class="navbar-nav" style="border:none;">
                        <li><a style="border:none" class="nav-link active" href="/">Home</a></li>
                        <li><a style="border:none" class="nav-link" href="/shopping_cart">Compra de licencia</a></li>
                        <li><a style="border:none" class="nav-link" href="/revoque_activate_license">Revocación</a></li>
                        <li><a style="border:none;" class="nav-link" href="#" id="cerrarSessionMenu">Cerrar Sesión</a></li>  
                        <div id="closeSessionLoading" class="loader">
                            <img src="images/loading.gif"></img>
                        </div>
                        <li><div class="product_list_header">  
                                <form action="#" method="post" class="last">
                                    <fieldset>
                                        <input type="hidden" name="cmd" value="_cart" />
                                        <input type="hidden" name="display" value="1" />
                                        <input type="submit" name="submit" style="cursor: pointer;" value="Ver Tu Carrito" class="button" />
                                    </fieldset>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>        
    </header>

    <div class="remodal" data-remodal-id="cerrar_session_modal"
          data-remodal-options="hashTracking: false, closeOnOutsideClick: false, closeOnConfirm: true">   
          <h1>Easy Retail Admin</h1>
          <p>
            ¿Seguro que deseas cerrar sesión?
          </p>
          <br>
          <button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
          <button data-remodal-action="confirm" class="remodal-confirm" id="cerrar_session_modal_ok">OK</button>
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

            $("#cerrarSessionMenu").click(function(){

                event.preventDefault(); // cancel default behavior

                /**
                 * Ask the user if close session or not
                 */
                var inst = $('[data-remodal-id=cerrar_session_modal]').remodal();
                inst.open();
            });

            //Event for the registration ok button
            $("#cerrar_session_modal_ok").click(function(){
                
                //Create the json model for ajax
                var CloseSessionRequestModal =  { token:"sdsal1129399458ddkskdklsklds0939"};
                console.log(CloseSessionRequestModal);

                //Send the ajax
                $.ajax({
                    type: "POST",
                    url: "/close_session",
                    async:true,
                    dataType: "json",
                    contentType: 'application/json',
                    data: JSON.stringify(CloseSessionRequestModal),
                    beforeSend: function(){
                        $('#closeSessionLoading').css("visibility", "visible");
                        $('#closeSessionLoading').css("display", "block");
                      },
                    success: function (data) {

                        //var json = JSON.parse(data);
                        console.log("success from ajax: " + data);

                        //Redirect to main home page
                        window.location.href = "/";
                    },
                    error: function (data) {
                        console.log('Error:', data);

                        //Show error modal dialog
                        var inst = $('[data-remodal-id=error_ajax_modal]').remodal();
                        inst.open();
                    },
                    complete: function(){
                        $('#closeSessionLoading').css("visibility", "hidden");
                        $('#closeSessionLoading').css("display", "none");
                      }
                });
            });
        });        

    </script>
@stop