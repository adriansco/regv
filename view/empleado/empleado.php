<section>
    <!-- START Page content-->
    <section class="main-content">
        <div>
            <?php switch ($_SESSION['data']['Privilege']):
                case 'ADMIN': ?>
                    <a type="button" class="btn btn-labeled btn-info pull-right" href="?c=empleado&a=extraDays">
                        <span class="btn-label"><i class="fa fa-exclamation"></i>
                        </span>Días adicionales</a>
                    <?php break; ?>
                <?php
                case 'SUPER': ?>
                    <a type="button" class="btn btn-labeled btn-purple pull-right" href="?c=empleado&a=crud&id=<?php echo $_SESSION['data']['ID']; ?>">
                        <span class="btn-label"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </span>Solicitar Vacaciones</a>
                    <a type="button" class="btn btn-labeled btn-info pull-right" href="?c=empleado&a=extraDays">
                        <span class="btn-label"><i class="fa fa-exclamation"></i>
                        </span>Días adicionales</a>
                    <?php break; ?>
                <?php
                default: ?>
                    <a type="button" class="btn btn-labeled btn-purple pull-right" href="?c=empleado&a=crud&id=<?php echo $_SESSION['data']['ID']; ?>">
                        <span class="btn-label"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </span>Solicitar Vacaciones</a>
                    <?php break; ?>
            <?php endswitch; ?>
        </div>

        <!-- <a type="button" class="spotlight btn btn-labeled btn-green pull-right" href="./assets/gallery/administrativos.jpg" data-description="Calendario vacaciones empleados administrativos.">
            <span class="btn-label"><i class="fa fa-plus-circle"></i> </span>Ver calendario 2021
        </a> -->
        <!-- START GALLERY-->
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
        <a class="spotlight" href="./assets/sind/sindicalizadoslunvie.jpg"></a>
        <a class="spotlight" href="./assets/sind/sindicalizadosdesfazado.jpg"></a>
        <a class="spotlight" href="./assets/sind/sindicalizadosmiersab.jpg"></a>
        <!-- END GALLERY-->

        <!-- start info -->
        <?php require_once 'view/empleado/empleadoInfo.php'; ?>
        <!--  end info-->
        <!-- init alert -->
        <!-- <div data-toggle="notify" data-onload
            data-message="&lt;b&gt;¡Nuevas actualizaciones disponibles!&lt;/b&gt; <br>¡No olvides revisarlas!"
            data-options='{"status":"success", "pos":"top-right"}' class="hidden-xs"></div> -->
        <!-- end alert -->
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
                <!-- START summary widgets-->
                <?php if ($_SESSION['data']['Privilege'] == 'ADMIN') : ?>
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
                                            <?php foreach ($this->model->listarEmpleados() as $r) : ?>
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
                                                            <a href="?c=empleado&a=editEmpleado&id=<?php echo $r->idempleado; ?>">Editar</a>
                                                        </li> -->
                                                                <li class="divider"></li>
                                                                <li>
                                                                    <a href="?c=empleado&a=bajaEmpleado&id=<?php echo $r->idempleado; ?>">Dar de baja</a>
                                                                </li>
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
                    <!-- END ADMIN -->
                <?php elseif ($_SESSION['data']['Privilege'] == 'JEFE') : ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- init first part -->
                            <div class="panel panel-default">
                                <div class="panel-heading">Desglose de días
                                    <a href="#" data-perform="panel-collapse" data-toggle="tooltip" title="" class="pull-right">
                                        <em class="fa fa-minus"></em>
                                    </a>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Días pendientes año anterior</th>
                                                    <th class="text-center">Días de vacaciones año actual</th>
                                                    <th class="text-center">Días programados por calendario año actual</th>
                                                    <th class="text-center">Días disfrutados</th>
                                                    <th style="background-color: #f6504d;" class="text-center">Días
                                                        pendientes por disfrutar</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center general">
                                                <tr>
                                                    <td>
                                                        <?php echo $tmp->lastyear; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $tmp->current_year; ?>
                                                    </td>
                                                    <td>6</td>
                                                    <td>
                                                        <?php echo $tmp->tomados; ?>
                                                    </td>
                                                    <td>
                                                        <?php $total = $tmp->disponibles; ?>
                                                        <?php if ($total > 0) : ?>
                                                            <span class="have">
                                                                <?php echo $total; ?>
                                                            </span>
                                                        <?php else : ?>
                                                            <span class="donthave">
                                                                <?php echo $total; ?>
                                                            </span>
                                                        <?php endif ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="anuncio">**Nota: Los días programados por calendario <span class="deco">NO</span> están
                                    descontados en tus días pendientes por disfrutar.</div>
                            </div>
                            <!-- end first part -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Tabla |
                                    <small>Empleados</small>
                                </div>
                                <div class="panel-body">
                                    <table id="datatable4" class="table table-striped table-hover">
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
                                            <?php foreach ($this->model->listarSuper() as $r) : ?>
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
                                                                <li class="divider"></li>
                                                                <li>
                                                                    <a href="?c=empleado&a=bajaEmpleado&id=<?php echo $r->idempleado; ?>">Dar de baja</a>
                                                                </li>
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
                    <!-- END super -->
                <?php elseif ($_SESSION['data']['Privilege'] == 'GERENTE') : ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- init first part -->
                            <div class="panel panel-default">
                                <div class="panel-heading">Desglose de días
                                    <a href="#" data-perform="panel-collapse" data-toggle="tooltip" title="" class="pull-right">
                                        <em class="fa fa-minus"></em>
                                    </a>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Días pendientes año anterior</th>
                                                    <th class="text-center">Días de vacaciones año actual</th>
                                                    <th class="text-center">Días programados por calendario año actual</th>
                                                    <th class="text-center">Días disfrutados</th>
                                                    <th style="background-color: #f6504d;" class="text-center">Días
                                                        pendientes por disfrutar</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center general">
                                                <tr>
                                                    <td>
                                                        <?php echo $tmp->lastyear; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $tmp->current_year; ?>
                                                    </td>
                                                    <td>6</td>
                                                    <td>
                                                        <?php echo $tmp->tomados; ?>
                                                    </td>
                                                    <td>
                                                        <?php $total = $tmp->disponibles; ?>
                                                        <?php if ($total > 0) : ?>
                                                            <span class="have">
                                                                <?php echo $total; ?>
                                                            </span>
                                                        <?php else : ?>
                                                            <span class="donthave">
                                                                <?php echo $total; ?>
                                                            </span>
                                                        <?php endif ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="anuncio">**Nota: Los días programados por calendario <span class="deco">NO</span> están
                                    descontados en tus días pendientes por disfrutar.</div>
                            </div>
                            <!-- end first part -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Tabla |
                                    <small>Empleados</small>
                                </div>
                                <div class="panel-body">
                                    <table id="datatable4" class="table table-striped table-hover">
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
                                            <?php foreach ($this->model->listarManager() as $r) : ?>
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
                                                                <li class="divider"></li>
                                                                <li>
                                                                    <a href="?c=empleado&a=bajaEmpleado&id=<?php echo $r->idempleado; ?>">Dar de baja</a>
                                                                </li>
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
                    <!-- END GERENTE -->
                <?php else : ?>
                    <!-- USER -->
                    <div class="row">
                        <div data-toggle="play-animation" data-play="fadeInDown" data-offset="0" data-delay="500">
                            <div class="col-lg-12">
                                <!-- init first part -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">Desglose de días
                                        <a href="#" data-perform="panel-collapse" data-toggle="tooltip" title="" class="pull-right">
                                            <em class="fa fa-minus"></em>
                                        </a>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Días pendientes año anterior</th>
                                                        <th class="text-center">Días de vacaciones año actual</th>
                                                        <th class="text-center">Días programados por calendario año actual</th>
                                                        <th class="text-center">Días disfrutados</th>
                                                        <th style="background-color: #f6504d;" class="text-center">Días
                                                            pendientes por disfrutar</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center general">
                                                    <tr>
                                                        <td>
                                                            <?php echo $tmp->lastyear; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $tmp->current_year; ?>
                                                        </td>
                                                        <td>6</td>
                                                        <td>
                                                            <?php echo $tmp->tomados; ?>
                                                        </td>
                                                        <td>
                                                            <?php $total = $tmp->disponibles; ?>
                                                            <?php if ($total > 0) : ?>
                                                                <span class="have">
                                                                    <?php echo $total; ?>
                                                                </span>
                                                            <?php else : ?>
                                                                <span class="donthave">
                                                                    <?php echo $total; ?>
                                                                </span>
                                                            <?php endif ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="anuncio">**Nota: Los días programados por calendario <span class="deco">NO</span> están
                                        descontados en tus días pendientes por disfrutar.</div>
                                </div>
                                <!-- end first part -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">Historial de solicitudes
                                        <a href="#" data-perform="panel-collapse" data-toggle="tooltip" title="" class="pull-right">
                                            <em class="fa fa-minus"></em>
                                        </a>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table id="datatable3" class="table table-hover table-bordered">
                                                <thead>
                                                    <tr class="headt">
                                                        <th>Nombre</th>
                                                        <th>Departamento</th>
                                                        <th class="sort-numeric">Fecha
                                                            inicio</th>
                                                        <th class="sort-numeric">Fecha
                                                            fin</th>
                                                        <th class="sort-alpha">Folio</th>
                                                        <th>Días</th>
                                                        <th class="sort-alpha">Fecha de
                                                            reincorporación</th>
                                                        <th>Estado</th>
                                                        <th>Imprimir</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($this->solicitud->detalleSolicitudId($_SESSION['data']['ID']) as $r) : ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $r->nombre; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $r->departamento; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo date("Y/m/d", strtotime($r->inicio)); ?>
                                                            </td>
                                                            <td>
                                                                <?php echo date("Y/m/d", strtotime($r->fin)); ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $r->folio; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $r->cantidad; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo date("Y/m/d", strtotime($r->regreso)); ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <?php if ($r->status == '1') : ?>
                                                                    <div class="label label-success">Aceptado</div>
                                                                <?php elseif ($r->status == '0') : ?>
                                                                    <div class="label label-warning">Por validar</div>
                                                                    <a href="?c=solicitud&a=cancelarSolicitud&id=<?php echo $r->idsolicitud; ?>" class="btn btn-danger btn-xs" onclick="return confirm('¿Seguro que quieres cancelar la solicitud?, esta acción no se puede revertir');">Cancelar</a>
                                                                <?php elseif ($r->status == '2') : ?>
                                                                    <div class="label label-danger">Cancelado</div>
                                                                <?php endif ?>
                                                            </td>
                                                            <?php if ($r->status != '2') : ?>
                                                                <!-- PDF Init -->
                                                                <td class="text-center"><a class="fa fa-print" href="libs/pdf.php?nombre=<?php echo $r->nombre; ?>&nomina=<?php echo $r->nomina; ?>&departamento=<?php echo $r->departamento; ?>&motivo=<?php echo $r->motivo; ?>&observaciones=<?php echo $r->comentarios ?>&fechaInicio=<?php echo date("
                                                        Y/m/d", strtotime($r->inicio)); ?>&fechaFin=
                                                        <?php echo date("Y/m/d", strtotime($r->fin)); ?>&folio=
                                                        <?php echo $r->folio; ?>&area=
                                                        <?php echo $r->area; ?>&planta=
                                                        <?php echo $r->planta; ?>&regreso=
                                                        <?php echo date("Y/m/d", strtotime($r->regreso)); ?>&cantidad=
                                                        <?php echo $r->cantidad; ?>" target="_blank"></td>
                                                                <!-- PDF End -->
                                                            <?php else : ?>
                                                                <td></td>
                                                            <?php endif ?>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END summary widgets-->
                    <!-- END USER -->
                <?php endif ?>
                <!-- START chart-->
                <!-- <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-collapse">
                                <div class="panel-body">
                                    <div style="height: 350px" data-source="server/chart-data.php?type=area"
                                        class="chart-area flot-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- END chart-->
            </div>
            <!-- END dashboard main content-->
        </div>
    </section>
    <!-- END Page content-->
</section>
<!-- END Main section-->