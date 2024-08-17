
<?php
session_start();
$name="Objetivos"; 
include('../shared/DbConfig.php');
require("../Data/DataAccess.php");
require('../Data/Objetive.php');
require('../Data/About.php');
$objetive=new Objetive($server,$dbname,$user,$password);
$classabout=new About($server,$user,$password,$dbname);
$objgenerales=$objetive-> GetObjectiveByType(1);
$objespecificos=$objetive-> GetObjectiveByType(2);
$empresa=$classabout->GetValueByname('Empresa')[0];
include('../shared/head.php');
?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Objetivos generales</h6>
     </div>
     <div class="card-body">
        <ul>
            <?php foreach($objgenerales as $item){?>
                <li><?=$item->descripcion ?></li>
            <?php }?>
        </ul>        
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Objetivos especificos</h6>
     </div>
     <div class="card-body">
        <ul>        
            <?php foreach($objespecificos as $item){?>
                <li><?=$item->descripcion ?></li>
            <?php }?>     
        </ul>
     </div>
</div>
<?php include('../shared/foot.php');?>







