<?php
if (!isset($_SESSION["usuario"]))
{
    header("Location:$url/administracion/login.php");
}
$name="Acerca de";
$about=null;
$classabout=new About($server,$user,$password,$dbname);
$id=0;
$message="";
if (isset($_GET["editar"]))
{
    $id=$_GET["id"];
    $about=$classabout->Find($id)[0];
}

if (isset($_POST["accion"]))
{
    $accion=$_POST["accion"];   
    $id=$_POST["id"];
    $valor=trim($_POST["valor"]);
    if($valor!="")    
    {
        switch($accion)
        {
            case "Guardar":{
                if($id==0)
                {
                    $classabout->Store($_POST);            
                }
                else
                {
                    $classabout->Update($id,$_POST);
                }
                break;
            }
            case "Eliminar":{
                $classabout->Delete($id);
                break;
            }
        }
        header('Location:index.php');     
    }
    else{
        $message="Campo no valido";
    }
}
$arrabout=$classabout->GetAll();
$empresa=$classabout->GetValueByname('Empresa')[0];