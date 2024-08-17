<?php
session_start();
$name="Usuarios";
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
        <div class="row">
            <div class="col-4">
                <form id="usuario" autocomplete="off" action="<?=$url?>administracion/user/index.php" enctype="multipart/form-data" method="post">                                     
                    <input type="hidden" name="id" value="<?=$id?>" id="">
                    <div class="mb-3">
                        <label class="form-label" for="codigo">
                            Nombre        
                        </label>       
                        <input  name="nombre" class="form-control" id="nombre_usuario" value="<?=$us!=null?$us->nombre:""?>" />                
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="codigo">
                            apellido
                        </label>            
                        <input type="text" name="apellido" class="form-control" value="<?=$us!=null?$us->apellido:""?>" id="apellido_usuario">                        
                    </div>   
                    <div class="mb-3">
                        <label class="form-label" for="codigo">
                            Direccion
                        </label>            
                        <input type="text" name="direccion" class="form-control" value="<?=$us!=null?$us->direccion:""?>" id="direccion_usuario">                        
                    </div>   
                    <div class="mb-3">
                        <label class="form-label" for="codigo">
                            Telefono
                        </label>            
                        <input type="text" name="telefono" class="form-control" value="<?=$us!=null?$us->telefono:""?>" id="telefono_usuario">                        
                    </div>   
                    <div class="mb-3">
                        <label class="form-label" for="codigo">
                            email                        
                        </label>            
                        <input type="email" name="email" class="form-control" value="<?=$us!=null?$us->email:""?>" id="email_usuario">                        
                    </div>   
                    <div class="mb-3">
                        <label class="form-label" for="codigo">
                            Usuario
                        </label>            
                        <input type="text" name="user" class="form-control" value="<?=$us!=null?$us->user:""?>" id="user_usuario">                        
                    </div>   
                    <div class="mb-3">
                        <label class="form-label" for="codigo">
                            password
                        </label>            
                        <input type="password" name="password" class="form-control" value="<?=$us!=null?$us->password:""?>" id="password_usuario">                        
                    </div>   
                    <input type="submit" name ="accion" value="<?=$accion?>"  class="btn btn-success"/>
                </form>
            </div>
            <div class="col-8">
                <div style="padding: 15px; width: 100%;    overflow: scroll;" >
                    <table id="dataTable"  class="table">
                        <thead>
                            <th>id</th>
                            <th>Nombre</th>                                      
                            <th>Apellido</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Usuario</th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php foreach($arruser as $item){?>
                            <tr>
                                <td> <?= $item->id ?></td>                          
                                <td> <?= $item->nombre ?></td>                                               
                                <td> <?= $item->apellido ?></td>                            
                                <td> <?= $item->direccion ?></td>                            
                                <td> <?= $item->telefono ?></td>                            
                                <td> <?= $item->email ?></td>                            
                                <td> <?= $item->user ?></td>                            
                                <td>
                                    <form action="<?=$url?>administracion/user" method="get">
                                        <input type="hidden" name="id" value="<?= $item->id ?>" id="">
                                        <button class="btn btn-warning" name ="editar" type="submit"> Editar</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="<?=$url?>administracion/user" method="post">
                                        <input type="hidden" name="id" value="<?= $item->id ?>" id="">
                                        <input type="submit" name ="accion" value="Eliminar"  class="btn btn-danger" />
                                    </form>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>     
                </div>       
            </div>
        </div>
    </div>
</div>
<?php include('../../shared/foot.php');?>
