<?php
$vista = 'PERSONA';
$titulo = 'EDITAR';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<?php include("../layouts/menu.php")?>
<div class="col-md-8">
    <h3><?php echo $titulo?></h3>                
    <form action="" method="get">
        <?php
        /*var_dump($datoTipoDocumento);
        var_dump($datoEstado);
        var_dump($datoTipoPersona);
        /*$datoTipoDocumento   =   $persona->mostrarTipoDocumento("tipo_documento","1");
        $datoEstado       =   $persona->mostrarEstado("estado","1");    
        $datoTipoPersona  =   $persona->mostrarRol("tipo_persona","1");*/

        if(!empty($dato)):
            //var_dump($dato);
            foreach($dato as $key => $value)
                foreach($value as $v):?>

                    <input type="hidden" value="<?php echo $v['IdPersona'] ?>" name="id"> <br>

                    <div class="mb-3">
                        <label for="">Tipo de documento</label>
                        <select id="selectTipoDocumento" class="form-control" name="TipoDocumento">
                        </select required>
                        <input id="valorTipoDocumento" type="hidden" class="form-control" value="<?php echo $v['DescripcionTipoDocumento'] ?>" name="valorTipoDocumento" required>
                    </div>

                    <div class="mb-3">
                        <label for="">Documento</label>
                        <input type="text" class="form-control" value="<?php echo $v['Documento'] ?>" name="Documento" required>
                    </div>

                    <div class="mb-3">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" value="<?php echo $v['Nombre'] ?>" name="Nombre" required>
                    </div>                

                    <div class="mb-3">
                        <label for="">Apellido</label>
                        <input id="" type="text" class="form-control" value="<?php echo $v['Apellido'] ?>" name="Apellido" required>
                    </div>       

                    <div class="mb-3">
                        <label for="">Correo</label>
                        <input id="" type="email" class="form-control" value="<?php echo $v['Correo'] ?>" name="Correo" required>
                    </div>   

                    
                    <div class="mb-3">
                        <label for="">Clave</label>
                        <input id="" type="hidden" class="form-control" value="<?php echo $v['Clave'] ?>" name="Clave" required>
                    </div>   

                    <div class="mb-3">
                        <label for="">Estado</label>
                        <select id="selectEstado" class="form-control" name="estado">
                        </select required>
                        <input id="valorEstado" type="hidden"class="form-control" value="<?php echo $v['DescripcionEstado'] ?>" name="valorEstado" required>
                    </div>

                    <div class="mb-3">
                        <label for="">Rol</label>
                        <select id="selectRol" class="form-control" name="IdTipoPersona">
                        </select required>
                        <input id="valorRol" type="hidden"class="form-control" value="<?php echo $v['DescripcionTipoPersona'] ?>" name="valorRol" required>
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
                    
            <?php endforeach; ?>
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
        foreach($datoTipoDocumento as $k => $values)
            foreach($values as $vars):?>
                var option = new Option('<?php echo $vars['Descripcion'] ?>','<?php echo $vars['IdTipoDocumento'] ?>');
                selectTipoDocumento.appendChild(option);
            <?php endforeach; ?>
    <?php else: ?>
        <h3>NO HAY REGISTROS</h3>
    <?php endif ?>

    <?php
    if(!empty($datoEstado)):
        foreach($datoEstado as $k => $values)
            foreach($values as $vars):?>
                var option = new Option('<?php echo $vars['Descripcion'] ?>','<?php echo $vars['IdEstado'] ?>');
                selectEstado.appendChild(option);
            <?php endforeach; ?>
    <?php else: ?>
        <h3>NO HAY REGISTROS</h3>
    <?php endif ?>

    <?php
    if(!empty($datoTipoPersona)):
        foreach($datoTipoPersona as $k => $values)
            foreach($values as $vars):?>
                var option = new Option('<?php echo $vars['Descripcion'] ?>','<?php echo $vars['IdTipoPersona'] ?>');
                selectRol.appendChild(option);
            <?php endforeach; ?>
    <?php else: ?>
        <h3>NO HAY REGISTROS</h3>
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

    /*
    function detectChange(selectOS) {
        let campoRol= document.getElementById('valorRol')
        campoRol = selectOS.value
    }    

    function detectChange2(selectOS2) {
        let campoEstado = document.getElementById('valorEstado')
        campoEstado.value = selectOS2.value
    }    

    function detectChange3(selectOS3) {
        let campoTipoDocumento= document.getElementById('valorTipoDocumento')
        campoTipoDocumento = selectOS3.value
    }*/    


</script>

<?php
require_once("../layouts/footer.php");