<?php
$vista = 'TIPO PERSONAS';
$titulo = 'LISTAR';
?>
<div class="col-md-12">
    <a href="index.php?m=nuevo" class="btn btn-primary">NUEVO</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <td>ID</td>
                <td>DESCRIPCIÓN</td>
                <td>ESTADO</td>  
                <td>FECHA DE CREACIÓN</td> 
            </tr>
        </thead>
        <tbody>
            <?php
                if(!empty($dato)):
                    foreach($dato as $key => $v):
                        ?>
                        <tr>
                            <td><?php echo $v['IdTipoPersona'] ?> </td>
                            <td><?php echo $v['Descripcion'] ?> </td>
                            <td><?php echo $v['Estado'] ?> </td>
                            <td><?php echo $v['FechaCreacion'] ?> </td>
                            <td>
                                <a class="btn btn-success" href="index.php?m=editar&id=<?php echo $v['IdTipoPersona']?>">EDITAR</a>
                                <a class="btn btn-danger" href="index.php?m=eliminar&id=<?php echo $v['IdTipoPersona']?>" onclick="return confirm('¿Está seguro de eliminar el registro?'); false">ELIMINAR</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">NO HAY REGISTROS</td>
                    </tr>
                <?php endif ?>
        </tbody>
    </table>
</div>