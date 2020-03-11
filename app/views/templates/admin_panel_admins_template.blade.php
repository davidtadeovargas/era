<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    @section('meta_section')

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    @show

    @section('link_section')

        <title>Panel de administradores</title>

        <!-- BOOTSTRAP STYLES-->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
           <!--CUSTOM BASIC STYLES-->
        <link href="assets/css/basic.css" rel="stylesheet" />
        <!--CUSTOM MAIN STYLES-->
        <link href="assets/css/custom.css" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

        <!-- Dialogs Remodal https://github.com/VodkaBears/Remodal-->
            <link rel="stylesheet" href="css/remodal/remodal.css">
            <link rel="stylesheet" href="css/remodal/remodal-default-theme.css">

        <link rel="shortcut icon" href="images/home/era.ico" type="image/x-icon">            



        
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
        <label id='loadingLabel' style="color:red;position:relative;"></label>
        <br>
        <img style='position:relative;' src="loading.gif" title="Loading" ></img>
    </div>

</head>
<body>

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
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0;background-color: black">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">EASY RETAIL ADMIN</a>
            </div>

            <div class="header-right">

                <a href="" class="btn btn-info" title="New Message"><b>30 </b><i class="fa fa-envelope-o fa-2x"></i></a>
                <a href="" class="btn btn-primary" title="New Task"><b>40 </b><i class="fa fa-bars fa-2x"></i></a>
                <a href="" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>

            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="" id="perfil" style="background-color: #ffff;cursor: pointer;padding: 30px">
                            <img src="<?php echo $model->perfilImage; ?>" class="img-thumbnail" style="width: 200px;height: 200px" />

                            <div class="row" style="color: black;">
                                <h2>Bienvenido</h2>
                            </div>
                            <div class="row">
                                <label><?php
                                    echo $model->User->name;
                                ?></label>
                            </div>
                            <div class="row">
                                <small>Ultimo Login : <?php echo $model->lastLogin; ?> </small>
                            </div>                            
                        </div>

                    </li>


                    <li>
                        <a class="active-menu" href="#" id="cerrarSessionMenu" style="background-color: #202020 !Important"><i class="fa fa-dashboard "></i>Cerrar Sesión</a>
                    </li>

                    <li style="display: <?php if($model->isAdmin) echo "block"; else echo "none"; ?>">
                        <a href=""><i class="fa fa-desktop "></i>Notificaciones Push <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="/push_notifications"><i class="fa fa-toggle-on"></i>Notificaciones Push</a>
                            </li>
                            <li>
                                <a href=""><i class="fa fa-bell "></i>Notifications</a>
                            </li>
                             <li>
                                <a href=""><i class="fa fa-circle-o "></i>Progressbars</a>
                            </li>
                             <li>
                                <a href=""><i class="fa fa-code "></i>Buttons</a>
                            </li>
                             <li>
                                <a href=""><i class="fa fa-bug "></i>Icons</a>
                            </li>
                             <li>
                                <a href=""><i class="fa fa-bug "></i>Wizard</a>
                            </li>
                             <li>
                                <a href=""><i class="fa fa-edit "></i>Typography</a>
                            </li>
                             <li>
                                <a href=""><i class="fa fa-eyedropper "></i>Grid</a>
                            </li>
                            
                           
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo $model->home; ?>"><i class="fa fa-flash "></i>HOME</a>
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-yelp "></i>Extra Pages <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href=""><i class="fa fa-coffee"></i>Invoice</a>
                            </li>
                            <li>
                                <a href=""><i class="fa fa-flash "></i>Pricing</a>
                            </li>
                             <li>
                                <a href=""><i class="fa fa-key "></i>Components</a>
                            </li>
                             <li>
                                <a href=""><i class="fa fa-send "></i>Social</a>
                            </li>
                            
                             <li>
                                <a href=""><i class="fa fa-recycle "></i>Messages & Tasks</a>
                            </li>
                            
                           
                        </ul>
                    </li>
                    <li>
                        <a href="shopping_cart"><i class="fa fa-flash "></i>Tienda</a>
                        
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-bicycle "></i>Forms <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                           
                             <li>
                                <a href=""><i class="fa fa-desktop "></i>Basic </a>
                            </li>
                             <li>
                                <a href=""><i class="fa fa-code "></i>Advance</a>
                            </li>
                             
                           
                        </ul>
                    </li>
                      <li>
                        <a href="revoque_activate_license"><i class="fa fa-anchor "></i>Revocación de Licencia</a>
                    </li>
                     <li style="display: <?php if($model->isAdmin) echo "block"; else echo "none"; ?>">
                        <a href="users_history"><i class="fa fa-bug "></i>Historia Usuarios</a>
                    </li>
                    <li>
                        <a href="/licenses"><i class="fa fa-sign-in "></i>Licencias</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap "></i>Multilevel Link <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="#"><i class="fa fa-bicycle "></i>Second Level Link</a>
                            </li>
                             <li>
                                <a href="#"><i class="fa fa-flask "></i>Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#"><i class="fa fa-plus "></i>Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-comments-o "></i>Third Level Link</a>
                                    </li>

                                </ul>

                            </li>
                        </ul>
                    </li>
                   
                    <li>
                        <a href=""><i class="fa fa-square-o "></i>Blank Page</a>
                    </li>
                </ul>

            </div>

        </nav>
    </div>

    <!-- /. WRAPPER  -->
    @show

    @section('js_section')

    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <script src="js/remodal/remodal.min.js"></script> <!-- Dialogs Remodal -->

    <script src="js/shopping_cart/minicart.js"></script>
    <script>
        function clearShoppingCart(){
            paypal.minicart.render();
            paypal.minicart.reset();
        }
    </script>

    @show

    @section('custom_js_section')

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
            $("#perfil").click(function(){
                window.location.href = "/perfil";
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

                        //Clear the shopping cart
                        clearShoppingCart();

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

</body>
</html>
