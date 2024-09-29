<?php
if (!isset($_SESSION["usuario"]))
{
	header("Location:$url/administracion/login.php");
}
$name="Comunidad";
$classabout=new About($server,$user,$password,$dbname);
$comunity=new Comunity($server,$dbname,$user,$password);
$comunity->path=$imgpath;
$success="";
if (isset($_POST["enviar"]))
{
    $comunity->store($_POST);   
}
$arr=$comunity->  GetAll();
$empresa=$classabout->GetValueByname('Empresa')[0];