<!-- START aside-->
<aside class="aside">
    <!-- START Sidebar (left)-->
    <nav class="sidebar">
        <ul class="nav">
            <?php if ($_SESSION['data']['Privilege'] == 'USER' || $_SESSION['data']['Privilege'] == 'SUPER' || $_SESSION['data']['Privilege'] == 'JEFE' || $_SESSION['data']['Privilege'] == 'GERENTE') : ?>
                <li>
                    <a href="?c=empleado" title="Inicio" class="has-submenu">
                        <i class="fa fa-home fa-2x" aria-hidden="true"></i>
                    </a>
                </li>
            <?php else : ?>
                <!-- START Menu-->
                <li class="active">
                    <a href="#" title="Empleados" data-toggle="collapse-next" class="has-submenu">
                        <i class="fa fa-home fa-2x" aria-hidden="true"></i>
                        <span class="item-text">Empleados</span>
                    </a>
                    <!-- START SubMenu item-->
                    <ul class="nav collapse in">
                        <li>
                            <a href="?c=empleado" title="Default" data-toggle="" class="no-submenu">
                                <span class="item-text">Inicio</span>
                            </a>
                        </li>
                    </ul>
                    <!-- END SubMenu item-->
                </li>
            <?php endif ?>
            <li>
                <!-- &id= $_SESSION[id] -->
                <?php if ($_SESSION['data']['Privilege'] == 'USER' || $_SESSION['data']['Privilege'] == 'SUPER' || $_SESSION['data']['Privilege'] == 'JEFE' || $_SESSION['data']['Privilege'] == 'GERENTE') : ?>
                    <a href="?c=solicitud" title="Solicitudes" class="has-submenu">
                        <i class="fa fa-file-text fa-2x" aria-hidden="true"></i>
                        <!-- <span class="item-text">Solicitudes</span> -->
                    </a>
                <?php else : ?>
                    <!-- START SubMenu item-->
                    <a href="#" title="Solicitudes" data-toggle="collapse-next" class="has-submenu">
                        <i class="fa fa-file-text fa-2x" aria-hidden="true"></i>
                        <span class="item-text">Solicitudes</span>
                    </a>
                    <ul class="nav collapse">
                        <li>
                            <a href="?c=solicitud" title="Solicitudes" data-toggle="" class="no-submenu">
                                <span class="item-text">Solicitudes</span>
                            </a>
                            <?php if ($_SESSION['data']['Privilege'] == 'ADMIN') : ?>
                                <a href="?c=solicitud&a=pendingRequests" title="Solicitudes no aprobadas" data-toggle="" class="no-submenu">
                                    <span class="item-text">Solicitudes no aprobadas</span>
                                </a>
                            <?php endif ?>
                        </li>
                    </ul>
                    <!-- END SubMenu item-->
                <?php endif ?>
            </li>
            <?php if ($_SESSION['data']['Privilege'] == 'SUPER') : ?>
                <li>
                    <a href="?c=empleado&a=listarSupervisor" title="Empleados" class="has-submenu">
                        <i class="fa fa-users fa-2x" aria-hidden="true"></i>
                    </a>
                </li>
            <?php endif ?>
            <?php if ($_SESSION['data']['Privilege'] == 'ADMIN') : ?>
                <li>
                    <a href="#" title="Gestión de usuarios" data-toggle="collapse-next" class="has-submenu">
                        <em class="fa  fa-gears"></em><!-- fa-clipboard -->
                        <span class="item-text">Gestión de contraseñas</span>
                    </a>
                    <!-- START SubMenu item-->
                    <ul class="nav collapse ">
                        <li>
                            <a href="?c=empleado&a=changePassword" title="Gestión de usuarios" data-toggle="" class="no-submenu">
                                <span class="item-text">Asignar/Cambiar Contraseña</span>
                            </a>
                        </li>
                        <!-- <li>
                        <a href="#" title="#" data-toggle="" class="no-submenu">
                           <span class="item-text">#</span>
                        </a>
                     </li> -->
                    </ul>
                    <!-- END SubMenu item-->
                </li>
            <?php endif ?>
            <!-- END Update-->
            <?php if ($_SESSION['data']['Privilege'] == 'ADMIN') : ?>
                <li>
                    <a href="#" title="Reportes" data-toggle="collapse-next" class="has-submenu">
                        <em class="fa  fa-folder-open"></em><!-- fa-clipboard -->
                        <span class="item-text">Reportes</span>
                    </a>
                    <!-- START SubMenu item-->
                    <ul class="nav collapse ">
                        <li>
                            <a href="?c=solicitud&a=genReport" title="Reportes" data-toggle="" class="no-submenu">
                                <span class="item-text">Generar reporte</span>
                            </a>
                        </li>
                        <li>
                            <a href="?c=solicitud&a=viewChart" title="Reportes" data-toggle="" class="no-submenu">
                                <span class="item-text">Chart</span>
                            </a>
                        </li>
                        <!-- <li>
                        <a href="#" title="#" data-toggle="" class="no-submenu">
                           <span class="item-text">#</span>
                        </a>
                     </li> -->
                    </ul>
                    <!-- END SubMenu item-->
                </li>
            <?php endif ?>
            <!-- END Repo-->
            <!-- Sidebar footer    -->
            <li class="nav-footer">
                <div class="nav-footer-divider"></div>
                <a href="?c=auth&a=Kill" title="Salir" class="has-submenu">
                    <em class="fa fa-sign-out"></em>
                    <span class="">Salir</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- END Sidebar (left)-->
</aside>
<!-- End aside-->