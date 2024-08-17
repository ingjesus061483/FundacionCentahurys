<?php
session_start();
include('../../shared/DbConfig.php');
require("../../Data/DataAccess.php");
require('../../Data/About.php');
require('../../Data/Contacto.php');
include('../controller/ContactController.php');
include('../../shared/head.php');
?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3"> 
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <form id="contact" autocomplete="off" action="<?=$url?>administracion/contact_us/index.php" enctype="multipart/form-data" method="post">                                     
                    <input type="hidden" name="id" value="<?= $id ?>" id="">
                    <div class="mb-3">
                        <label class="form-label" for="codigo">
                            Nombre        
                        </label>       
                        <input  name="nombre" class="form-control" id="nombre_contact" value="<?=$contact!=null?$contact->nombre:""?>" />                
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="codigo">
                            Valor
                        </label>
                        <textarea class="form-control" name="valor" id="valor_contact">
                        <?=$contact!=null?$contact->valor:""?>
                        </textarea>                                    
                    </div>                       
                    <input type="submit" name ="accion" value="Guardar"  class="btn btn-success"/>
                </form>
            </div>
            <div class="col-8">
                <div style="padding: 15px; width: 100%;    overflow: scroll;" >
                    <table id="dataTable" class="table">
                        <thead>
                            <th>id</th>
                            <th>Nombre</th>                                      
                            <th>Valor</th>                        
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php foreach($arrcontact as $item){?>
                            <tr>
                                <td> <?= $item->id ?></td>                          
                                <td> <?= $item->nombre ?></td>                                               
                                <td> <?= $item->valor ?></td>                                                        
                                <td>
                                    <form action="<?=$url?>administracion/contact_us" method="get">
                                        <input type="hidden" name="id" value="<?= $item->id ?>" id="">
                                        <button class="btn btn-warning" name ="editar" type="submit"> Editar</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="<?=$url?>administracion/contact_us" method="post">
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
