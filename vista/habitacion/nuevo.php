<?php
$vista = 'HABITACIONES';
$titulo = "NUEVO";
date_default_timezone_set("America/Lima");
$fechaNow = date("Y-m-d");
?>
<div class="col-md-8">
    <h3><?php echo $titulo?></h3>

    <form action="" method="GET">
        <div class="mb-3">
            <label for="">Número</label>
            <input type="text" class="form-control" value="" name="numero" required>
        </div>

        <div class="mb-3">
            <label for="">Detalle</label>
            <textarea id="detalle" class="form-control" value="" name="detalle" required></textarea>
        </div>

        <div class="mb-3">
            <label for="">Precio</label>
            <input type="text" class="form-control" value="" name="precio" required>
        </div>                

        <div class="mb-3">
            <label for="">Condición</label>
            <select id="selectCondicion" class="form-control" name="selectCondicion" required>
            </select>
            <input id="datoCondicion" type="hidden" class="form-control" value="" name="datoCondicion" required>
        </div>       

        <div class="mb-3">
            <label for="">Piso</label>
            <select id="selectPiso" name="selectPiso" class="form-control"></select>
            <input id="datoPiso" type="hidden" class="form-control" value="" name="datoPiso" required>
        </div>          

        <div class="mb-3">
            <label for="">Categoría</label>
            <select id="selectCategoria" name="selectCategoria" class="form-control"></select>
            <input id="datoCategoria" type="hidden" class="form-control" value="" name="datoCategoria" required>
        </div>                                 

        <div class="mb-3">
            <label for="">Estado</label>
            <select id="selectEstado" class="form-control" name="selectEstado">
            </select required>
            <input id="datoEstado" type="hidden"class="form-control" value="" name="datoEstado" required>
        </div>

        <div class="mb-3">
            <label for="">FECHA DE CREACIÓN</label>
            <input type="date" id="currentDateTime"
            name="fecha" value="<?php echo $fechaNow;?>"
            min="<?php echo $fechaNow;?>" max="2022-12-31" class="form-control" required>
        </div>

        <div class="mb-3">
            <input type="submit" class="btn btn-primary" name="btn" value="GUARDAR">
            <input type="hidden" name="m" value="guardar">
        </div>
    </form>

    <div class="botones">
        <a href="index.php" class="btn btn-secondary">Volver al listado</a>
    </div>
                    
</div>

<script>
    var selectTipoDocumento = document.getElementById('selectTipoDocumento')          
    var selectEstado = document.getElementById('selectEstado')
    var selectRol = document.getElementById('selectRol')

    <?php
    //CARGAR DATA EN COMBOS
    if(!empty($datoTipoDocumento)):
        foreach($datoTipoDocumento as $key => $vars):
            ?>
            var option = new Option('<?php echo $vars['Descripcion'] ?>','<?php echo $vars['IdTipoDocumento'] ?>');
            selectTipoDocumento.appendChild(option);
        <?php endforeach ?>
    <?php else: ?>
        <tr>
            <td colspan="3">NO HAY REGISTROS</td>
        </tr>
    <?php endif ?>

    <?php
    if(!empty($datoEstado)):
        foreach($datoEstado as $key => $vars):
            ?>
            var option = new Option('<?php echo $vars['Descripcion'] ?>','<?php echo $vars['IdEstado'] ?>');
            selectEstado.appendChild(option);
        <?php endforeach ?>
    <?php else: ?>
        <tr>
            <td colspan="3">NO HAY REGISTROS</td>
        </tr>
    <?php endif ?>

    <?php
    if(!empty($datoTipoPersona)):
        foreach($datoTipoPersona as $key => $vars):
            ?>
            var option = new Option('<?php echo $vars['Descripcion'] ?>','<?php echo $vars['IdTipoPersona'] ?>');
            selectRol.appendChild(option);
        <?php endforeach ?>
    <?php else: ?>
        <tr>
            <td colspan="3">NO HAY REGISTROS</td>
        </tr>
    <?php endif ?>    
</script>

<script>                     
    var selectCondicion = document.getElementById('selectCondicion')          
    var selectPiso = document.getElementById('selectPiso')
    var selectCategoria = document.getElementById('selectCategoria')
    var selectEstado = document.getElementById('selectEstado')

    <?php
//CARGAR DATA EN COMBOS
if(!empty($datoCondicion)):
    foreach($datoCondicion as $key => $vars):
        ?>
        var option = new Option('<?php echo $vars['Descripcion'] ?>','<?php echo $vars['IdEstadoHabitacion'] ?>');
        selectCondicion.appendChild(option);
    <?php endforeach ?>
<?php else: ?>
    <tr>
        <td colspan="3">NO HAY REGISTROS</td>
    </tr>
<?php endif ?>

<?php
if(!empty($datoEstado)):
    //var_dump($datoEstado);        
    foreach($datoEstado as $key => $vars):
        ?>
        var option = new Option('<?php echo $vars['Descripcion'] ?>','<?php echo $vars['IdEstado'] ?>');
        selectEstado.appendChild(option);
    <?php endforeach ?>
<?php else: ?>
    <tr>
        <td colspan="3">NO HAY REGISTROS</td>
    </tr>
<?php endif ?>

<?php
if(!empty($datoCategoria)):
    //var_dump($datoCategoria);         
    foreach($datoCategoria as $key => $vars):
        ?>
        var option = new Option('<?php echo $vars['Descripcion'] ?>','<?php echo $vars['IdCategoria'] ?>');
        selectCategoria.appendChild(option);
    <?php endforeach ?>
<?php else: ?>
    <tr>
        <td colspan="3">NO HAY REGISTROS</td>
    </tr>
<?php endif ?>   

<?php
if(!empty($datoPiso)):
    //var_dump($datoPiso);
    foreach($datoPiso as $key => $vars):
        ?>
        var option = new Option('<?php echo $vars['Descripcion'] ?>','<?php echo $vars['IdPiso'] ?>');
        selectPiso.appendChild(option);
    <?php endforeach ?>
<?php else: ?>
    <tr>
        <td colspan="3">NO HAY REGISTROS</td>
    </tr>
<?php endif ?>       
</script>