<?php
echo"
<!--BEGIN TITLE & BREADCRUMB PAGE-->
<div id='title-breadcrumb-option-demo' class='page-title-breadcrumb'>
    <div class='page-header pull-left'>
        <div class='page-title'>
            Clarotex S.A.S</div>
    </div>
    <ol class='breadcrumb page-breadcrumb pull-right'>
        <li><i class='fa fa-home'></i>&nbsp;<a href='modulos.php?name=clarotex'>Inicio</a>&nbsp;&nbsp;<i class='fa fa-angle-right'></i>&nbsp;&nbsp;</li>
        <li class='hidden'><a href='#'></a>&nbsp;&nbsp;<i class='fa fa-angle-right'></i>&nbsp;&nbsp;</li>
        <li class='active'><i class='fa fa-desktop'></i>&nbsp;<a href='modulos.php?name=".$_GET["name"]."&mod=maestros'>Maestros</a></li>
    </ol>
    <div class='clearfix'>
    </div>
</div>
<!--END TITLE & BREADCRUMB PAGE-->
";
?>