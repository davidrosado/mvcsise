<div class="col-md-12 mb-3">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
                <?php /*<a class="navbar-brand" href="http://localhost/SISE/sistema-hotel-v1">HOME</a> */?>
                <?php /*<a class="navbar-brand" href="https://nnp.obr.mybluehost.me/DAVID/sistema-hotel-v1">HOME</a>                 */?>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownGestion" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    GESTIÓN
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownGestion">
                                    <li><a class="dropdown-item" href="<?php echo urlrecepcion?>">RECEPCIÓN</a></li>
                                    <li><a class="dropdown-item" href="<?php echo urlrecepcion?>">SALIDA</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAdministrar" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    MANTENIMIENTO
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownAdministrar">
                                    <li><a class="dropdown-item" href="<?php echo urlhabitacion?>">HABITACIONES</a></li>
                                    <li><a class="dropdown-item" href="<?php echo urlcategoriahabitacion?>">CATEGORÍA HABITACIÓN</a></li>
                                    <li><a class="dropdown-item" href="<?php echo urlestadohabitacion?>">ESTADO HABITACIÓN</a></li>
                                    <li><a class="dropdown-item" href="<?php echo urlpisohabitacion?>">PISO HABITACIÓN</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="<?php echo urlestadorecepcion?>">ESTADO RECEPCIÓN</a></li>
                                    <?php /*<li><a class="dropdown-item" href="<?php echo urlestadoventa?>">ESTADO VENTA</a></li> */?>
                                </ul>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPersonas" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    PERSONA
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownPersonas">
                                    <li><a class="dropdown-item" href="<?php echo urlpersona?>">PERSONAS</a></li>
                                    <li><a class="dropdown-item" href="<?php echo urltipopersona?>">ROLES</a></li>
                                    <li><a class="dropdown-item" href="<?php echo urltipodocumento?>">TIPO DE DOCUMENTO</a></li>
                                </ul>                                
                            </li>                        
                        </ul>
                </div>
        </div>
    </nav>
</div>      