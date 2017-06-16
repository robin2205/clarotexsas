<?php
@$nombre=$_COOKIE["nombreusuario"];
?>
<!--BEGIN TOPBAR-->
<div id="header-topbar-option-demo" class="page-header-topbar">
    <nav id="topbar" role="navigation" style="margin-bottom: 0;" data-step="3" class="navbar navbar-default navbar-static-top">
    <div class="navbar-header">
        <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
        </button>
        <a id="logo" href="modulos.php?name=clarotex" class="navbar-brand"><img src="images/logoletras.png" style="width:100%;height:35px;margin-top:-5px;"></a>
    </div>
    <div class="topbar-main"><a id="menu-toggle" href="#" class="hidden-xs"><i class="fa fa-bars"></i></a>
        <form id="topbar-search" action="" method="" class="hidden-sm hidden-xs">
            <div class="input-icon right text-white"><a href="#"><i class="fa fa-search"></i></a><input type="text" placeholder="Buscar..." class="form-control text-white"/></div>
        </form>
        <div class="news-update-box hidden-xs"><span class="text-uppercase mrm pull-left text-white">News:</span>
            <ul id="news-update" class="ticker list-unstyled">
                <li>Bienvenidos al Sistema de Inventarios de Clarotex S.A.S</li>
                <li>Aquí encontrará toda la información relacionada con los inventarios de Insumos, Telas y otros pertenecientes a Clarotex S.A.S</li>
            </ul>
        </div>
        <ul class="nav navbar navbar-top-links navbar-right mbn">
            <!-- <li class="dropdown"><a data-hover="dropdown" href="#" class="dropdown-toggle"><i class="fa fa-bell fa-fw"></i><span class="badge badge-green">3</span></a>

            </li>
            <li class="dropdown"><a data-hover="dropdown" href="#" class="dropdown-toggle"><i class="fa fa-envelope fa-fw"></i><span class="badge badge-orange">7</span></a>

            </li>
            <li class="dropdown"><a data-hover="dropdown" href="#" class="dropdown-toggle"><i class="fa fa-tasks fa-fw"></i><span class="badge badge-yellow">8</span></a>

            </li> -->
            <li class="dropdown topbar-user"><a data-hover="dropdown" href="#" class="dropdown-toggle"><img src="images/avatar/48.jpg" alt="" class="img-responsive img-circle"/>&nbsp;<span class="hidden-xs"><?php echo $nombre;?></span>&nbsp;<span class="caret"></span></a>
                <ul class="dropdown-menu dropdown-user pull-right">
                    <li><a href="#"><i class="fa fa-user"></i>Perfil</a></li>
                    <!-- <li><a href="#"><i class="fa fa-calendar"></i>My Calendar</a></li>
                    <li><a href="#"><i class="fa fa-envelope"></i>My Inbox<span class="badge badge-danger">3</span></a></li>
                    <li><a href="#"><i class="fa fa-tasks"></i>My Tasks<span class="badge badge-success">7</span></a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="fa fa-lock"></i>Lock Screen</a></li> -->
                    <li><a href="exit.php"><i class="fa fa-key"></i>Salir</a></li>
                </ul>
            </li>
            <!-- <li id="topbar-chat" class="hidden-xs"><a href="javascript:void(0)" data-step="4" data-intro="&lt;b&gt;Form chat&lt;/b&gt; keep you connecting with other coworker" data-position="left" class="btn-chat"><i class="fa fa-comments"></i><span class="badge badge-info">3</span></a></li> -->
        </ul>
    </div>
</nav>
    <!--BEGIN MODAL CONFIG PORTLET-->
    <div id="modal-config" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">
                        &times;</button>
                    <h4 class="modal-title">
                        Modal title</h4>
                </div>
                <div class="modal-body">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eleifend et nisl eget
                        porta. Curabitur elementum sem molestie nisl varius, eget tempus odio molestie.
                        Nunc vehicula sem arcu, eu pulvinar neque cursus ac. Aliquam ultricies lobortis
                        magna et aliquam. Vestibulum egestas eu urna sed ultricies. Nullam pulvinar dolor
                        vitae quam dictum condimentum. Integer a sodales elit, eu pulvinar leo. Nunc nec
                        aliquam nisi, a mollis neque. Ut vel felis quis tellus hendrerit placerat. Vivamus
                        vel nisl non magna feugiat dignissim sed ut nibh. Nulla elementum, est a pretium
                        hendrerit, arcu risus luctus augue, mattis aliquet orci ligula eget massa. Sed ut
                        ultricies felis.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">
                        Close</button>
                    <button type="button" class="btn btn-primary">
                        Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!--END MODAL CONFIG PORTLET-->
</div>
<!--END TOPBAR-->
