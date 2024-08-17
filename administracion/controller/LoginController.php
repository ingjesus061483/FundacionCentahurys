<?php
$name="Login";
$usuario= new Usuario($server,$user,$password,$dbname );
$message="";
if(isset($_POST["accion"]))
{
    $accion=$_POST["accion"]; 
    switch($accion){
        case"Login":
        {
            $us= $usuario->login($_POST);            
            if(count($us)>0)            
            {                
                $_SESSION["usuario"]=serialize($us[0]);
                header('Location:index.php');
            }
            else            
            {
                $message="Usuario o contraseña invalida";
            }
            break;
        }
        case"Logout":           
        {        
            session_destroy(); 
            break;
        }
    }
}
if (isset($_SESSION["usuario"]))
{
   // exit();
    header("Location:$url/administracion/index.php");
}