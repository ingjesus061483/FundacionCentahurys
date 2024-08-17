<?php
session_start();
$name="Comunidad";
include('../shared/DbConfig.php');
require("../Data/DataAccess.php");
require('../Data/Comunity.php');
require('../Data/About.php');
$classabout=new About($server,$user,$password,$dbname);
$empresa=$classabout->GetValueByname('Empresa')[0];
$comunity=new Comunity($server,$dbname,$user,$password);
$arr=$comunity->GetAll();
include('../shared/head.php');
?>
<div class="row">
<?php foreach($arr as $item){?>
  <div class="col-4">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?=$item->fecha ?></h6>
      </div>   
      <div class="card-body">
        <img class="img-fluid" src="<?= $url.'img/'. $item->nombre ?>" width="100px" height="100px" alt="">
      </div>
      <div class="card-footer">
        <?= $item->descripcion ?>
      </div>
    </div>
  </div>  
<?php }?>
</div>
<?php
include('../shared/foot.php');
?>