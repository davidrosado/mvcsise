<?php
$vista = 'HABITACIONES';
$titulo = 'LISTAR';
?>
<div class="col-md-12">
    <a href="index.php?m=nuevo" class="btn btn-primary">NUEVO</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <td>NRO</td>
                <td>DETALLE</td>
                <td>PRECIO</td>
                <td>CONDICIÓN</td>
                <td>PISO</td>  
                <td>CATEGORÍA</td>                             
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
                            <td><?php echo $v['Numero'] ?> </td>
                            <td><?php echo $v['Detalle'] ?> </td>
                            <td><?php echo $v['Precio'] ?> </td>            
                            <td><?php echo $v['DescripcionEstado'] ?> </td>   
                            <td><?php echo $v['DescripcionPiso'] ?> </td>   
                            <td><?php echo $v['DescripcionCategoria'] ?> </td>                                                                                                                                                       
                            <td><?php echo $v['IdEstado'] ?> </td>
                            <td><?php echo $v['FechaCreacion'] ?> </td>
                            <td>
                                <a class="btn btn-success" href="index.php?m=editar&id=<?php echo $v['IdHabitacion']?>">EDITAR</a>
                                <a class="btn btn-danger" href="index.php?m=eliminar&id=<?php echo $v['IdHabitacion']?>" onclick="return confirm('¿Está seguro de eliminar el registro?'); false">ELIMINAR</a>
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