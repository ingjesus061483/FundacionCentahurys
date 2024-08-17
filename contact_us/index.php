
<?php
session_start();
$name="Contactanos"; 
include('../shared/DbConfig.php');
require("../Data/DataAccess.php");
require('../Data/About.php');
require('../Data/Contacto.php');
$classabout=new About($server,$user,$password,$dbname);
$classcontact=new Contacto($server,$user,$password,$dbname);
$arr=$classcontact->GetAll();
$empresa=$classabout->GetValueByname('Empresa')[0];
include('../shared/head.php');
?>
<div class="card shadow mb-4">    
    <div class="card-body">      
        <ul>
            <?php foreach($arr as $item){?>
            <li style ="list-style: none;"><i class="fa-brands fa-<?=$item->nombre?>"></i><?=$item->nombre?>:  &nbsp; <?=$item->valor?>  </li>
            <?php }?>         
        </ul>

    </div>
</div>
<?php include('../shared/foot.php');?>   