<?php
$vista = 'HABITACIONES';
$titulo = 'EDITAR';
?>

<div class="col-md-8">
    <h3><?php echo $titulo?></h3>                
    <form action="" method="get">
        <?php
            if(!empty($dato)):
                //var_dump($dato);
                //var_dump($datoCondicion); 
                foreach($dato as $key => $v):
                    ?>
                    <input type="hidden" value="<?php echo $v['IdHabitacion'] ?>" name="id"> <br>
                    <div class="mb-3">
                        <label for="">Número</label>
                        <input type="text" class="form-control" value="<?php echo $v['Numero'] ?>" name="numero" required>
                    </div>

                    <div class="mb-3">
                        <label for="">Detalle</label>
                        <textarea id="detalle" class="form-control" name="detalle" required><?php echo $v['Detalle'] ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="">Precio</label>
                        <input type="text" class="form-control" value="<?php echo $v['Precio'] ?>" name="precio" required>
                    </div>                

                    <div class="mb-3">
                        <label for="">Condición</label>
                        <select id="selectCondicion" class="form-control" name="selectCondicion" required>
                        </select>
                        <input id="datoCondicion" type="hidden" class="form-control" value="<?php echo $v['DescripcionEstado'] ?>" name="datoCondicion" required>
                    </div>       

                    <div class="mb-3">
                        <label for="">Piso</label>
                        <select id="selectPiso" name="selectPiso" class="form-control"></select>
                        <input id="datoPiso" type="hidden" class="form-control" value="<?php echo $v['DescripcionPiso'] ?>" name="datoPiso" required>
                    </div>          

                    <div class="mb-3">
                        <label for="">Categoría</label>
                        <select id="selectCategoria" name="selectCategoria" class="form-control"></select>
                        <input id="datoCategoria" type="hidden" class="form-control" value="<?php echo $v['DescripcionCategoria'] ?>" name="datoCategoria" required>
                    </div>                                 

                    <div class="mb-3">
                        <label for="">Estado</label>
                        <select id="selectEstado" class="form-control" name="selectEstado">
                        </select required>
                        <input id="datoEstado" type="hidden"class="form-control" value="<?php echo $v['IdEstado'] ?>" name="datoEstado" required>
                    </div>

                    <div class="mb-3">
                        <label for="">Fecha de creación</label>
                        <input type="date" id="currentDateTime"
                        name="fecha" value="<?php echo $v['FechaCreacion'] ?>"
                        min="<?php echo $v['FechaCreacion'] ?>" max="2022-12-31" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary" name="btn" value="ACTUALIZAR"> <br>
                        <input type="hidden" name="m" value="actualizar">                                
                    </div>
                <?php endforeach ?>
            <?php else: ?>
            <h3>NO HAY REGISTROS</h3>
        <?php endif ?>
    </form>

    <div class="botones">
        <a href="index.php" class="btn btn-secondary">Volver al listado</a>
    </div>
</div>


<script>      
    var datoCondicion = document.getElementById('datoCondicion').value
    var datoPiso = document.getElementById('datoPiso').value
    var datoCategoria = document.getElementById('datoCategoria').value 
    var datoEstado = document.getElementById('datoEstado').value     

    console.log(datoCondicion);
    console.log(datoPiso)
    console.log(datoCategoria)
    console.log(datoEstado)
                
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

    // SETEAR OPTION EN COMBOS
    for (var i = 0; i < selectCondicion.options.length; i++) {
        if (selectCondicion.options[i].text === datoCondicion) {
            selectCondicion.selectedIndex = i;
            break;
        }            
    }

    for (var i = 0; i < selectPiso.options.length; i++) {
        if (selectPiso.options[i].text === datoPiso) {
            selectPiso.selectedIndex = i;
            break;
        }            
    }

    for (var i = 0; i < selectCategoria.options.length; i++) {
        if (selectCategoria.options[i].text === datoCategoria) {
            selectCategoria.selectedIndex = i;
            break;
        }            
    }

    for (var i = 0; i < selectEstado.options.length; i++) {
        if (selectEstado.options[i].text === datoEstado) {
            selectEstado.selectedIndex = i;
            break;
        }            
    }
</script>