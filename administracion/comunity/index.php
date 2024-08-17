<?php
// Comiendo de la sesión
session_start();
include('../../shared/DbConfig.php');
require("../../Data/DataAccess.php");
require('../../Data/Comunity.php');
require('../../Data/About.php');
include('../controller/ComunityController.php');
include('../../shared/head.php');
?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3"> 
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4">
        
                <div id="success" style="display:none;" class="alert alert-success">
                                                    
                </div>                                    
        
                <form id="comunity" autocomplete="off" action="<?=$url?>administracion/comunity/index.php" enctype="multipart/form-data" method="post">
                    <div class="mb-3">
                        <label class="form-label" for="codigo">
                            Subir Imagen           
                        </label>            
                        <input type="file" class="form-control" accept="image/*" name="img" id="img_comunity">        
                    </div>                    
                    <div class="mb-3">
                        <label class="form-label" for="codigo">
                            Fecha
                        </label>            
                        <input type="date"class="form-control" name="fecha" id="fecha_comunity">
                    </div>                    
                    <div class="mb-3">
                        <label class="form-label" for="codigo">
                            Descripcion        
                        </label>       
                        <textarea name="descripcion" class="form-control" id="descripcion_comunity"></textarea>                
                    </div>
                    <button type="submit" name ="enviar"  class="btn btn-success">guardar</button>
                </form>
            </div>
            <div class="col-8">
                <table id="dataTable"  class="table">
                    <thead>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>fecha</th>
                        <th>Descripcion</th>                 
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php foreach($arr as $item){?>
                        <tr>
                            <td> <?= $item->id ?></td>
                            <td> <img class="img-fluid" src="<?= $url.'img/'. $item->nombre ?>" width="50px" height="50px" alt=""></td>
                            <td> <?= $item->tipo ?></td>
                            <td> <?= $item->fecha ?></td>                   
                            <td> <?= $item->descripcion ?></td>                                        
                            <td></td>
                            <th></th>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>            
            </div>
        </div>
    </div>
</div>
    

<?php
include('../../shared/foot.php');
?>