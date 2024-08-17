<?php
session_start();
include('../../shared/DbConfig.php');
require("../../Data/DataAccess.php");
require('../../Data/Objetive.php');
require('../../Data/ObjetiveType.php');
require('../../Data/About.php');
include('../controller/ObjetiveController.php');
include('../../shared/head.php');
?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3"> 
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <form autocomplete="off" id="objetive" action="<?=$url?>administracion/objetives/index.php" enctype="multipart/form-data" method="post">                                     
                    <input type="hidden" name="id" value="<?= $id ?>" id="">
                    <div class="mb-3">
                        <label class="form-label" for="codigo">
                            Descripcion        
                        </label>       
                        <textarea name="descripcion" class="form-control" id="descripcion_objetive" height="500" >
                        <?=$objetive!=null?$objetive->descripcion:""?>
                        </textarea>                
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="codigo">
                            Tipo de objetivo
                        </label>            
                        <select class="form-control" name="tipo_id" id="tipo_objective">
                            <option value="">Seleccione una opcion</option>
                            <?php foreach($objetive_types as $item){?>
                                <option value="<?=$item->id?>" <?=$objetive!=null?$objetive->tipo_id==$item->id?'selected':'':''?>><?=$item->nombre?></option>
                            <?php } ?>

                        </select>
                    </div>   
                    <input type="submit" name ="accion" value="Guardar"  class="btn btn-success"/>
                </form>
            </div>
            <div class="col-8">
                <table id="dataTable"  class="table">
                    <thead>
                        <th>id</th>
                        <th>Descripcion</th>                                      
                        <th>Tipo</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php foreach($objetives as $item){?>
                        <tr>
                            <td> <?= $item->id ?></td>                          
                            <td> <?= $item->descripcion ?></td>                                               
                            <td> <?= $item->tipo ?></td>                            
                            <td>
                                <form action="<?=$url?>administracion/objetives" method="get">
                                    <input type="hidden" name="id" value="<?= $item->id ?>" id="">
                                    <button class="btn btn-warning" name ="editar" type="submit"> Editar</button>
                                </form>
                            </td>
                            <td>
                                <form action="<?=$url?>administracion/objetives" method="post">
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
<?php include('../../shared/foot.php');?>
