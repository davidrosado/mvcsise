<?php
$vista = 'PERSONA';
$titulo = 'LISTAR';
?>
<div class="col-md-12">
    <a href="index.php?m=nuevo" class="btn btn-primary">NUEVO</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <td>ID</td>
                <td>Tipo</td>
                <td>Nro</td>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Correo</td>
                <?php /*<td>Clave</td> */?>
                <td>Rol</td>
                <td>Estado</td>
                <td>Fecha Creación</td>
            </tr>
        </thead>
        <tbody>
            <?php

                //var_dump($dato);
                if(!empty($dato)):

                    //$datoJson = json_encode($dato, JSON_PRETTY_PRINT);
                    foreach($dato as $key => $value):
                        //foreach($value as $v):
                        ?>
                        <tr>
                            <td>
                            <?php echo $value['IdPersona'] ?></td>
                            <td><?php echo $value['DescripcionTipoDocumento'] ?></td>
                            <td><?php echo $value['Documento'] ?></td>
                            <td><?php echo $value['Nombre'] ?></td>
                            <td><?php echo $value['Apellido'] ?></td>
                            <td><?php echo $value['Correo'] ?></td>
                            <td><?php echo $value['DescripcionTipoPersona'] ?></td>
                            <td><?php echo $value['DescripcionEstado'] ?></td>
                            <td><?php echo $value['FechaCreacion'] ?> </td>
                            <td>
                                <a class="btn btn-success" href="index.php?m=editar&id=<?php echo $value['IdPersona']?>"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-danger" href="index.php?m=eliminar&id=<?php echo $value['IdPersona']?>" onclick="return confirm('¿Está seguro de eliminar el registro?'); false"><i class="fas fa-trash-alt"></i></a>
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