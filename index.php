<?php
session_start();
$name="Inicio";
include('shared/DbConfig.php');
require("Data/DataAccess.php");
require('Data/About.php');
$classabout=new About($server,$user,$password,$dbname);
$empresa=$classabout->GetValueByname('Empresa')[0];
include('shared/head.php');
?>
<div class="jumbotron">
    <h1 class="display-4">Bienvenido a la fundacion centahurys</h1>
    <br>
    <img src="<?=$url?>sb-admin/img/fundacioncentahury.jpg" class="img-thumbnail" height="100" alt="">
    <p class="lead"></p>    
    <hr class="my-4">
    <p></p>
</div>

<?php
include('shared/foot.php');
?>