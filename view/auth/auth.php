<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie ie6 lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="ie ie7 lt-ie9 lt-ie8"        lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="ie ie8 lt-ie9"               lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="ie ie9"                      lang="en"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es" class="no-ie">
<!--<![endif]-->

<head>
   <!-- Meta-->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
   <meta name="description" content="Sistema de control de vacaciones">
   <meta name="keywords" content="">
   <meta name="author" content="EASuarez - Esteban Adrián Suárez Cortez">
   <title>Sistemas de Control de Vacaciones 1.6.18</title>
   <link rel="icon" type="image/vnd.microsoft.icon" href="assets/favicon.ico">
   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
   <!-- Bootstrap CSS-->
   <link rel="stylesheet" href="app/css/bootstrap.css">
   <!-- Vendor CSS-->
   <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="vendor/animo/animate+animo.css">
   <!-- App CSS-->
   <link rel="stylesheet" href="app/css/app.css">
   <!-- Modernizr JS Script-->
   <script src="vendor/modernizr/modernizr.js" type="application/javascript"></script>
   <!-- FastClick for mobiles-->
   <script src="vendor/fastclick/fastclick.js" type="application/javascript"></script>
</head>

<body>
   <!-- START wrapper-->
   <div style="height: 100%; padding: 50px 0; background-color: #2c3037" class="row row-table">
      <div class="col-lg-3 col-md-6 col-sm-8 col-xs-12 align-middle">
         <!-- START panel-->
         <div data-toggle="play-animation" data-play="fadeInUp" data-offset="0" class="panel panel-default panel-flat">
            <div class="img">
               <!-- <img src="../assets/avatar.svg" alt="Image" class="logo block-center img-rounded"> -->
               <img src="assets/calendar.png" alt="Image" class="logo block-center img-rounded">
            </div>
            <p class="text-center mb-lg">
               <strong>INICIAR SESIÓN PARA CONTINUAR.</strong>
            </p>
            <div class="panel-body">
               <form role="form" id="frmlogin" class="mb-lg">
                  <!-- <div class="text-right mb-sm"><a href="#" class="text-muted">Need to Signup?</a>
                  </div> -->
                  <!-- <div id="msg_error" class="alert alert-danger" role="alert" style="display: none"></div> -->
                  <div id="msg_error" role="alert" style="display: none" class="alert alert-danger alert-dismissable"></div>
                  <div class="form-group has-feedback">
                     <!-- id="exampleInputEmail1" -->
                     <input id="email" name="email" type="text" placeholder="N° Nomina" class="form-control">
                     <span class="fa fa-user form-control-feedback text-muted"></span>
                  </div>
                  <div class="form-group has-feedback">
                     <!-- id="exampleInputPassword1" -->
                     <input id="password" name="password" type="password" placeholder="Contraseña" class="form-control">
                     <span class="fa fa-lock form-control-feedback text-muted"></span>
                  </div>
                  <button name="iniciar" id="iniciar" type="submit" class="btn btn-block btn-primary">Entrar</button>
               </form>
            </div>
         </div>
         <!-- END panel-->
      </div>
   </div>
   <!-- END wrapper-->
   <!-- START Scripts-->
   <!-- Main vendor Scripts-->
   <script src="vendor/jquery/jquery.min.js"></script>
   <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
   <!-- Animo-->
   <script src="vendor/animo/animo.min.js"></script>
   <!-- Custom script for pages-->
   <script src="app/js/pages.js"></script>
   <!-- END Scripts-->
   <script src="app/js/auth.js"></script>
</body>

</html>