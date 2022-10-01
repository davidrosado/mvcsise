<?php
$vista = 'LOGIN';
$titulo = '';
require_once("config.php");
?>

<div class="col-md-8">
    <form class="px-5 py-5" action="<?php echo urlpersona?>" method="POST">
        <!-- Email input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Correo electrónico</label>                        
            <input type="email" id="form2Example1" class="form-control" name="email" required />
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example2">Password</label>                        
            <input type="password" id="form2Example2" class="form-control" name="pass" required/>
        </div>

        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">
            <div class="col d-flex justify-content-center">
                <!-- Checkbox -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                    <label class="form-check-label" for="form2Example31">Recordar</label>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Ingresar</button>
            <?php /*<input type="hidden" name="m" value="ingresar22"> */?>
        </div>      
    </form>
</div>