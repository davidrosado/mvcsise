<?php
$vista = 'PERSONA';
$titulo = 'EDITAR';
?>

<div class="col-md-8">
    <h3><?php echo $titulo?></h3>                
    <form action="" method="get">
        <?php
            if(!empty($dato)):
                foreach($dato as $key => $value):
                    ?>

                <input type="hidden" value="<?php echo $value['IdPersona'] ?>" name="id"> <br>

                <div class="mb-3">
                    <label for="">Tipo de documento</label>
                    <select id="selectTipoDocumento" class="form-control" name="TipoDocumento">
                    </select required>
                    <input id="valorTipoDocumento" type="hidden" class="form-control" value="<?php echo $value['DescripcionTipoDocumento'] ?>" name="valorTipoDocumento" required>
                </div>

                <div class="mb-3">
                    <label for="">Documento</label>
                    <input type="text" class="form-control" value="<?php echo $value['Documento'] ?>" name="Documento" required>
                </div>

                <div class="mb-3">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" value="<?php echo $value['Nombre'] ?>" name="Nombre" required>
                </div>                

                <div class="mb-3">
                    <label for="">Apellido</label>
                    <input id="" type="text" class="form-control" value="<?php echo $value['Apellido'] ?>" name="Apellido" required>
                </div>       

                <div class="mb-3">
                    <label for="">Correo</label>
                    <input id="" type="email" class="form-control" value="<?php echo $value['Correo'] ?>" name="Correo" required>
                </div>   

                <div class="mb-3">
                    <label for="">Estado</label>
                    <select id="selectEstado" class="form-control" name="estado">
                    </select required>
                    <input id="valorEstado" type="hidden"class="form-control" value="<?php echo $value['DescripcionEstado'] ?>" name="valorEstado" required>
                </div>

                <div class="mb-3">
                    <label for="">Rol</label>
                    <select id="selectRol" class="form-control" name="IdTipoPersona">
                    </select required>
                    <input id="valorRol" type="hidden"class="form-control" value="<?php echo $value['DescripcionTipoPersona'] ?>" name="valorRol" required>
                </div>


                <div class="mb-3">
                    <label for="">Fecha de creación</label>
                    <input type="date" id="currentDateTime"
                    name="fecha" value="<?php echo $value['FechaCreacion'] ?>"
                    min="<?php echo $value['FechaCreacion'] ?>" max="2022-12-31" class="form-control" required>
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

    var tipoDocumentoRegistro = document.getElementById('valorTipoDocumento').value
    var estadoRegistro = document.getElementById('valorEstado').value
    var rolRegistro = document.getElementById('valorRol').value 

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

    // SETEAR OPTION EN COMBOS
    for (var i = 0; i < selectTipoDocumento.options.length; i++) {
        if (selectTipoDocumento.options[i].text === tipoDocumentoRegistro) {
            selectTipoDocumento.selectedIndex = i;
            break;
        }            
    }

    for (var i = 0; i < selectEstado.options.length; i++) {
        if (selectEstado.options[i].text === estadoRegistro) {
            selectEstado.selectedIndex = i;
            break;
        }
    }

    for (var i = 0; i < selectRol.options.length; i++) {    
        if (selectRol.options[i].text === rolRegistro) {
            selectRol.selectedIndex = i;
            break;
        }    
    }

</script>