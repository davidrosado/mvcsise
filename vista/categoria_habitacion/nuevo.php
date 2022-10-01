<?php
$vista = 'CATEGORÍA HABITACION';
$titulo = "NUEVO";
date_default_timezone_set("America/Lima");
$fechaNow = date("Y-m-d");
//var_dump($datoEstado);
?>
<div class="col-md-8">
    <h3><?php echo $titulo?></h3>

    <form action="" method="GET">
        <div class="mb-3">
            <label for="">DESCRIPCIÓN</label>
            <input type="text" class="form-control" value="" name="descripcion" required>
        </div>

        <div class="mb-3">
            <label for="">ESTADO</label>                                    
            <select id="selectEstado" class="form-control" name="estado">
            </select required>

            <input id="valorEstado" type="hidden"class="form-control" value="" name="valorEstado" required>
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

</script>