<?php
$vista = 'TIPO PERSONAS';
$titulo = 'EDITAR';
?>

<div class="col-md-8">
    <h3><?php echo $titulo?></h3>                
    <form action="" method="get">
        <?php
            //var_dump($dato);
            if(!empty($dato)):

                //$datoJson = json_encode($dato, JSON_PRETTY_PRINT);
                foreach($dato as $key => $v):
                    //foreach($value as $v):
                    ?>

                    <input type="hidden" value="<?php echo $v['IdTipoPersona'] ?>" name="id"> <br>
                    <div class="mb-3">
                        <label for="">DESCRIPCIÓN</label>
                        <input type="text" class="form-control" value="<?php echo $v['Descripcion'] ?>" name="descripcion" required>
                    </div>

                    <div class="mb-3">
                        <label for="">ESTADO</label>                                    
                        <select id="selectEstado" class="form-control" name="estado">
                        </select required>

                        <input id="valorEstado" type="hidden"class="form-control" value="<?php echo $v['Estado'] ?>" name="valorEstado" required>
                    </div>

                    <div class="mb-3">
                        <label for="">FECHA DE CREACIÓN</label>
                        <input type="date" id="currentDateTime"
                        name="fecha" value="<?php echo $v['FechaCreacion'] ?>"
                        min="<?php echo $v['FechaCreacion'] ?>" max="<?php echo $v['FechaCreacion'] ?>" class="form-control" required>          
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
    var estadoRegistro = document.getElementById('valorEstado').value      
    var selectEstado = document.getElementById('selectEstado')

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

    // SETEAR OPTION EN COMBOS
    for (var i = 0; i < selectEstado.options.length; i++) {
        if (selectEstado.options[i].text === estadoRegistro) {
            selectEstado.selectedIndex = i;
            break;
        }
    }
</script>