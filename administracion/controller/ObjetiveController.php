<?php
if (!isset($_SESSION["usuario"]))
{
	header("Location:$url/administracion/login.php");
}
$name="Objetivos";
$classabout=new About($server,$user,$password,$dbname);

$objetive=null;
$classobjetive=new Objetive($server,$dbname,$user,$password);
$objetive_type=new ObjetiveType($server,$dbname,$user,$password);
$objetive_types=$objetive_type->GetAll();
$id=0;
$message="";
if (isset($_GET["editar"]))
{
    $id=$_GET["id"];
    $objetive=$classobjetive->Find($id)[0];

}
if (isset($_POST["accion"]))
{
    $accion=$_POST["accion"];
    $id=$_POST["id"];
    $descripcion=trim($_POST["descripcion"]);
    if($descripcion!="")
    {
        switch($accion)
        {
            case "Guardar":{
                if($id==0)
                {
                    $classobjetive->Store($_POST);            
                }
                else
                {
                    $classobjetive->Update($id,$_POST);
                }
                break;
            }
            case "Eliminar":{
                $classobjetive->Delete($id);
                break;
            }
        }
        header('Location:index.php');     
    }
    else{
        $message="Campo no valido";
    }
}
$objetives=$classobjetive->GetAll();
$empresa=$classabout->GetValueByname('Empresa')[0];