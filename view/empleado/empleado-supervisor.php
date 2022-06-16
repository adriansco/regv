<section>
    <!-- START Page content-->
    <section class="main-content">
        <?php if (
            $_SESSION['data']['Privilege'] == 'USER' || $_SESSION['data']['Privilege'] == 'SUPER' || $_SESSION['data']['Privilege'] == 'JEFE'
            || $_SESSION['data']['Privilege'] == 'GERENTE'
        ) : ?>
            <a type="button" class="btn btn-labeled btn-purple pull-right" href="?c=empleado&a=crud&id=<?php echo $_SESSION['data']['ID']; ?>">
                <span class="btn-label"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </span>Solicitar Vacaciones
            </a>
        <?php elseif ($_SESSION['data']['Privilege'] == 'ADMIN') : ?>
            <!-- <a type="button" class="btn btn-labeled btn-primary pull-right" 
                href="?c=empleado&a=crudEmpleado">
               <span class="btn-label"><i class="fa fa-plus"></i>
               </span>Añadir empleado</a> -->
        <?php endif ?>
        <!-- START button group-->
        <div style="margin-bottom: 5px;" class="pull-right btn-group">
            <button type="button" class="btn btn-success"> <i class="fa fa-calendar" aria-hidden="true"></i>    Ver calendario año actual</button>
            <button type="button" data-toggle="dropdown" class="btn btn-success dropdown-toggle">
                <span class="caret"></span>
            </button>
            <ul role="menu" class="dropdown-menu">
                <li><a class="spotlight" href="./assets/gallery/administrativos.jpg">Administrativos</a>
                </li>
                <li><a class="spotlight" href="./assets/sind/sindicalizadoslunjue.jpg">Sindicalizados</a>
                </li>
            </ul>
        </div>
        <!-- END button group-->
        <!-- start -->
        <a class="spotlight" href="./assets/sind/sindicalizadoslunvie.jpg"></a>
        <a class="spotlight" href="./assets/sind/sindicalizadosdesfazado.jpg"></a>
        <a class="spotlight" href="./assets/sind/sindicalizadosmiersab.jpg"></a>
        <!-- end -->
        <!-- start emp. info -->
        <?php require_once 'view/empleado/empleadoInfo.php'; ?>
        <!--  end emp. info-->
        <?php
        if (isset($_SESSION['message']) && $_SESSION['message']) {
            echo ('<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>' . $_SESSION['message'] . '</strong></div>');
            unset($_SESSION['message']);
        }
        $tmp = $this->solicitud->detallesEmpleadoId($_SESSION['data']['ID']);
        ?>

        <div class="row">
            <!-- START dashboard main content-->
            <div class="col-md-12">
                <!-- ADMIN -->
                <!-- START DATATABLE 1 -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Tabla |
                                <small>Empleados</small>
                            </div>
                            <div class="panel-body">
                                <table id="datatable1" class="table table-striped table-hover">
                                    <thead>
                                        <tr class="headt">
                                            <th class="sort-numeric">Num. nómina​</th>
                                            <th>Nombre</th>
                                            <th class="sort-alpha">Departamento</th>
                                            <th class="sort-alpha">Tipo</th>
                                            <th>Fecha Planta</th>
                                            <th class="text-center">Antigüedad</th>
                                            <th class="text-center">Vac. año anterior</th>
                                            <th class="text-center">Vac. año actual</th>
                                            <th class="text-center">Vac. tomadas año actual</th>
                                            <th class="text-center">Vac. pendientes</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Listado de proveedoress por usuarios -->
                                        <?php foreach ($this->model->listarEmpleadosSupervisor() as $r) : ?>
                                            <tr>
                                                <td>
                                                    <?php echo $r->nomina; ?>
                                                </td>
                                                <td>
                                                    <?php echo $r->nombre; ?>
                                                </td>
                                                <td>
                                                    <?php echo $r->departamento; ?>
                                                </td>
                                                <td>
                                                    <?php echo $r->tipo; ?>
                                                </td>
                                                <!-- init val date -->
                                                <td>
                                                    <?php echo $this->validarFechaPlanta($r->fecha_planta); ?>
                                                </td>
                                                <!-- end val date -->
                                                <!-- init antiquity -->
                                                <td class="text-center">
                                                    <?php echo $this->antiguedadEmpleado($r->fecha_planta); ?>
                                                </td>
                                                <!-- end antiquity -->
                                                <td class="text-center">
                                                    <?php echo $r->lastyear; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $r->current_year; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $r->usados; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $r->disponibles; ?>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-cog"></i></a>
                                                        <ul class="dropdown-menu pull-right text-left">
                                                            <li>
                                                                <a href="?c=empleado&a=crud&id=<?php echo $r->idempleado; ?>">Solicitar vacaciones</a>
                                                            </li>
                                                            <!-- <li>
                                                                <a href="?c=empleado&a=extraDays&id=<?php echo $r->idempleado; ?>">Ver días extra</a>
                                                            </li> -->
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END DATATABLE 1 -->
            </div>
            <!-- END dashboard main content-->
        </div>
    </section>
    <!-- END Page content-->
</section>
<!-- END Main section-->