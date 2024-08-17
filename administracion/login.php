<?php
session_start();
include('../shared/DbConfig.php');
require('../Data/DataAccess.php');
require('../Data/Usuario.php');
include('controller/logincontroller.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Administracion - <?=$name?></title>
    <!-- Custom fonts for this template-->
    <link href="<?=$url?>sb-admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=$url?>sb-admin/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="<?=$url?>sb-admin/img/login.ico" />             
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                <img src="<?=$url?>sb-admin/img/fundacioncentahury.jpg" width="400" heigth="400" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><?=$name?></h1>
                                    </div>                                   
                                    <div id ="error" style="display:none" class="alert alert-danger">                                         
                                    </div>                                                                        
                                    <form  action="<?=$url?>administracion/login.php"  id ="login" method="post" autocomplete="off" class="user">
                                        <div class="form-group">
                                            <input type="text" name="user" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <input type="submit" name= "accion" value="Login" class="btn btn-primary btn-user btn-block" />                                            
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=$url?>sb-admin/vendor/jquery/jquery.min.js"></script>
    <script src="<?=$url?>sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=$url?>sb-admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=$url?>sb-admin/js/sb-admin-2.min.js"></script>
    <script>
        var message="<?=$message?>";
        if(message!="")
        {
            $( "#error" ).text( message).show().fadeOut( 3000 );
        }
        $("#login").on( "submit", function( event ) {
          if ($("#exampleInputEmail").val() === "" ) 
          {           
                $( "#error" ).text( "Usuario no valido" ).show().fadeOut( 3000 );
                event.preventDefault();
          }
          if ($("#exampleInputPassword").val() === "" ) 
          {
            $( "#error" ).text( "password no valida" ).show().fadeOut( 3000 );
                event.preventDefault();
          }
          
          //$( "span" ).text( "Not valid!" ).show().fadeOut( 1000 );
    });
    </script>
</body>

</html>