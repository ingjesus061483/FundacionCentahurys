<?php
session_start();
$name="Cambio de contraseña";
include('../../shared/DbConfig.php');
require("../../Data/DataAccess.php");
require('../../Data/Usuario.php');
require('../../Data/About.php');
include('../Controller/UserController.php');
include('../../shared/head.php');
?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3"> 
    </div>
    <div class="card-body">
        <form autocomplete="off" action="<?=$url?>administracion/user/changepassword.php" enctype="multipart/form-data" method="post">                                                 
            <input type="hidden" name="id" value="<?= $id ?>" id="">            
            <input type="hidden" name="nombre" class="form-control" id="" value="<?=$us!=null?$us->nombre:""?>" />                            
            <input type="hidden" name="apellido" class="form-control" value="<?=$us!=null?$us->apellido:""?>" id="">            
            <input type="hidden" name="direccion" class="form-control" value="<?=$us!=null?$us->direccion:""?>" id="">            
            <input type="hidden" name="telefono" class="form-control" value="<?=$us!=null?$us->telefono:""?>" id="">            
            <input type="hidden" name="email" class="form-control" value="<?=$us!=null?$us->email:""?>" id="">            
            <div class="mb-3">                
                <label class="form-label" for="codigo">                    
                    Usuario                
                </label>                
                <input type="text" name="user" class="form-control" value="<?=$us!=null?$us->user:""?>" id="">                        
            </div>               
            <div class="mb-3">               
                <label class="form-label" for="codigo">                    
                    password
                </label>
                <input type="password" name="password" class="form-control" value="<?=$us!=null?$us->password:""?>" id="">                        
            </div>   
            <div class="mb-3">
                <label class="form-label" for="codigo">
                    password
                </label>            
                <input type="password" name="confirmpassword" class="form-control" value="<?=$us!=null?$us->password:""?>" id="">                        
            </div>   
            <input type="submit" name ="accion" value="<?=$accion?>"  class="btn btn-success"/>
        </form>                        
    </div>
</div>
<?php include('../../shared/foot.php');?>
