<?php

$classabout=new About($server,$user,$password,$dbname);
$accion="Guardar";
$us=null;
$classUser=new Usuario($server,$user,$password,$dbname);
$id=0;
if (isset($_GET["user"]))
{  
    $us=$classUser->GetUser($_GET["user"])[0];
    $id=$us->id; 
    $accion="Actualizar";   
}
if (isset($_GET["editar"]))
{
    $id=$_GET["id"];
    $us=$classUser->Find($id)[0];
    $accion="Actualizar";
}
if (isset($_POST["accion"]))
{
    $accion=$_POST["accion"];
    $id=$_POST["id"];
    switch($accion)
    {
        case "Guardar":            
        {   
            $classUser->Store($_POST);            
            header('Location:index.php');                           
            break;
        }
        case "Actualizar":            
        {
            $classUser->Update($id,$_POST);
            session_destroy();       
            header("Location:$url/administracion/login.php");          
            break;

        }
        case "Eliminar":{

            $classUser->Delete($id);
            header('Location:index.php');     
            break;
        }
    }    
}
/*if (!isset($_SESSION["usuario"]))
{
	header("Location:$url/administracion/login.php");
}*/

$arruser=$classUser->GetAll();
$empresa=$classabout->GetValueByname('Empresa')[0];