<?php
session_start();
$name="Acerca de"; 
include('../shared/DbConfig.php');
require("../Data/DataAccess.php");
require('../Data/About.php');
$classabout=new About($server,$user,$password,$dbname);
$mision=$classabout->GetValueByname('Mision')[0];
$vision=$classabout->GetValueByname('Vision')[0];
$empresa=$classabout->GetValueByname('Empresa')[0];
include('../shared/head.php');
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Misión</h6>
    </div>
    <div class="card-body">
       <?= $mision->valor?>    
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Visión</h6>
    </div>
    <div class="card-body">
        <?= $vision->valor?>        
    </div>
</div>
<?php include('../shared/foot.php');?>

