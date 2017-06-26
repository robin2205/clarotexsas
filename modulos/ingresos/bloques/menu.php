<?php
@$mod=$_GET["mod"];
echo"
    <div id='title-breadcrumb-option-demo' class='page-title-breadcrumb'>
        <div class='page-header pull-left'>
            <div class='page-title' id='titulo_modulo'>
                ".$mod."
            </div>
        </div>
        <ol class='breadcrumb page-breadcrumb pull-right'>
            <li><i class='fa fa-home'></i>&nbsp;<a href='modulos.php?name=clarotex'>Inicio</a>&nbsp;&nbsp;<i class='fa fa-angle-right'></i>&nbsp;&nbsp;</li>
            <li class='hidden'><a href='#'></a>&nbsp;&nbsp;<i class='fa fa-angle-right'></i>&nbsp;&nbsp;</li>
            <li class='active'><i class='fa fa-sign-in'></i>&nbsp;<a href='modulos.php?name=".$_GET["name"]."'>Ingresos</a></li>
            <li class='active'><a href='#'></a>&nbsp;&nbsp;<i class='fa fa-angle-right'></i>&nbsp;&nbsp;</li>
            <li class='active'>&nbsp;<span id='ModuloActual'>".$mod."</span></li>
        </ol>
        <div class='clearfix'></div>
    </div>";
?>