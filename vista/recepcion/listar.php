<?php include("../layouts/menu.php")?>
<div class="col-md-12">
    <a href="index.php?m=nuevo" class="btn btn-primary">NUEVO</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <td>ID</td>
                <td>DNI Cliente</td>
                <td>Nombre Cliente</td>
                <td>Apellidos Cliente</td>
                <td>Habitación</td>
                <td>Fecha Entrada</td>
                <td>Estado</td>
            </tr>
        </thead>
        <tbody>
            <?php
                if(!empty($dato)):
                    foreach($dato as $key => $value)
                        foreach($value as $v):?>
                        
                        <tr>
                            <td><?php echo $v['IdRecepcion'] ?></td>
                            <td><?php echo $v['DNICliente'] ?></td>
                            <td><?php echo $v['Nombre'] ?></td>            
                            <td><?php echo $v['Apellido'] ?></td>   
                            <td><?php echo $v['NumeroHabitacion'] ?></td>   
                            <td><?php echo $v['FechaEntrada'] ?></td>                                                                                                                                                      
                            <td><?php echo $v['Estado'] ?></td>
                            <td>
                                <a class="btn btn-success" href="index.php?m=editar&id=<?php echo $v['IdRecepcion']?>"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-danger" href="index.php?m=eliminar&id=<?php echo $v['IdRecepcion']?>" onclick="return confirm('¿Está seguro de eliminar el registro?'); false"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">NO HAY REGISTROS</td>
                    </tr>
                <?php endif ?>
        </tbody>
    </table>
</div>