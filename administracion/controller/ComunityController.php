<?php
if (!isset($_SESSION["usuario"]))
{
	header("Location:$url/administracion/login.php");
}
$name="Comunidad";
$classabout=new About($server,$user,$password,$dbname);
$comunity=new Comunity($server,$dbname,$user,$password);
$success="";
if (isset($_POST["enviar"]))
{
    //    print_r($_FILES);
    $comunity->getFile();
    $comunity->store($_POST);
    $comunity->MakeDirectory($imgpath);
    $comunity->UploadFile($imgpath,$success);
}
$arr=$comunity->  GetAll();
$empresa=$classabout->GetValueByname('Empresa')[0];