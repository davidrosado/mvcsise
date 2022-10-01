<?php
$vista = 'PERSONA';
$titulo = "NUEVO";
date_default_timezone_set("America/Lima");
$fechaNow = date("Y-m-d");
?>
<div class="col-md-8">
    <h3><?php echo $titulo?></h3>

    <form action="" method="GET">
        <div class="mb-3">
            <label for="">Tipo de documento</label>
            <select id="selectTipoDocumento" class="form-control" name="TipoDocumento">
            </select required>
        </div>

        <div class="mb-3">
            <label for="">Documento</label>
            <input type="text" class="form-control" value="" name="Documento" required>
        </div>

        <div class="mb-3">
            <label for="">Nombre</label>
            <input type="text" class="form-control" value="" name="Nombre" required>
        </div>                

        <div class="mb-3">
            <label for="">Apellido</label>
            <input id="" type="text" class="form-control" value="" name="Apellido" required>
        </div>       

        <div class="mb-3">
            <label for="">Correo</label>
            <input id="" type="email" class="form-control" value="" name="Correo" required>
        </div>   

        
        <div class="mb-3">
            <label for="">Clave</label>
            <input id="" type="password" class="form-control" value="" name="Clave" required>
        </div>   

        <div class="mb-3">
            <label for="">Estado</label>
            <select id="selectEstado" class="form-control" name="estado">
            </select required>
        </div>

        <div class="mb-3">
            <label for="">Rol</label>
            <select id="selectRol" class="form-control" name="IdTipoPersona">
            </select required>
        </div>

        <div class="mb-3">
            <label for="">Fecha de Creación</label>
            <input type="date" id="currentDateTime"
            name="fecha" value="<?php echo $fechaNow;?>"
            min="<?php echo $fechaNow;?>" max="<?php echo $fechaNow;?>" class="form-control" required>
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