<?php
if (!isset($_SESSION["usuario"]))
{
    header("Location:$url/administracion/login.php");
}
$name="Contactanos";
$contact=null;
$classabout=new About($server,$user,$password,$dbname);
$classcontact=new Contacto($server,$user,$password,$dbname);
$id=0;
$message="";
if (isset($_GET["editar"]))
{
    $id=$_GET["id"];
    $contact=$classcontact->Find($id)[0];
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
                    $classcontact->Store($_POST);            
                }
                else
                {
                    $classcontact->Update($id,$_POST);
                }
                break;
            }
            case "Eliminar":{
                $classcontact->Delete($id);
                break;
            }
        }
        header('Location:index.php');     
    }
    else{
        $message="Campo no valido";
    }
}
$arrcontact=$classcontact->GetAll();
$empresa=$classabout->GetValueByname('Empresa')[0];