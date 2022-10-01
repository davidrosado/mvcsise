<?php
$vista = 'LOGIN';
$titulo = '';
?>
<div class="col-md-12">
    <?php
        if(!empty($dato)):
            foreach($dato as $key => $v): ?>
                <div><?php echo $v['IdPersona'] ?> </div>
                <div><?php echo $v['Correo'] ?> </div>
                <div><?php echo $v['Clave'] ?> </div>
        <?php endforeach ?>
    <?php else: ?>
        <div>NO SE ACCEDIÓ</div>
    <?php endif ?>
</div>