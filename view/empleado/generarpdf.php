<section>
    <!-- START Page content-->
    <section class="main-content">

        <!-- START button group-->
        <!-- END button group-->
        <!-- start -->
        <a class="spotlight" href="./assets/sind/sindicalizadoslunvie.jpg"></a>
        <a class="spotlight" href="./assets/sind/sindicalizadoslunvierrevo.jpg"></a>
        <!-- end -->
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
                <?php if ($_SESSION['data']['Privilege'] == 'USER' || $_SESSION['data']['Privilege'] == 'SUPER' || $_SESSION['data']['Privilege'] == 'JEFE' || $_SESSION['data']['Privilege'] == 'GERENTE') : ?>
                    <div class="row">
                        <div data-toggle="play-animation" data-play="fadeInDown" data-offset="0" data-delay="500">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Acciones
                                        <a href="#" data-perform="panel-collapse" data-toggle="tooltip" title="" class="pull-right">
                                            <em class="fa fa-minus"></em>
                                        </a>
                                    </div>
                                    <div class="panel-body">
                                        <div class="centrar">
                                            
                                            <?php $flag = $this->solicitud->generarPdf($_REQUEST['id'], $_REQUEST['folio']); ?>
                                            <!-- Info button with label -->
                                            <a type="button" class="btn btn-labeled btn-info" href="libs/pdf.php?nombre=<?php echo $flag->nombre; ?>&nomina=<?php echo $flag->nomina; ?>&departamento=<?php echo $flag->departamento; ?>&motivo=<?php echo $flag->motivo; ?>&observaciones=<?php echo $flag->comentarios ?>&fechaInicio=<?php echo date("
                                            Y/m/d", strtotime($flag->inicio)); ?>&fechaFin=
                                            <?php echo date("Y/m/d", strtotime($flag->fin)); ?>&folio=
                                            <?php echo $flag->folio; ?>&area=
                                            <?php echo $flag->area; ?>&planta=
                                            <?php echo $flag->planta; ?>&regreso=
                                            <?php echo date("Y/m/d", strtotime($flag->regreso)); ?>&cantidad=
                                            <?php echo $flag->cantidad; ?>" target="_blank">
                                                <span class="btn-label"><i class="fa fa-print"></i>
                                                </span>Imprimir formato
                                            </a>
                                            <!-- Success button with label -->
                                            <a type="button" class="btn btn-labeled btn-success" href="?c=empleado">
                                                <span class="btn-label"><i class="fa fa-mail-forward"></i>
                                                </span>Ir a inicio</a>
                                        </div>
                                    </div>
                                    <div class="anuncio">*Recuerda que debes imprimir y entregar tu formato autorizado en RH</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END summary widgets-->
                <?php else : ?>
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
                                                <th>Fecha Planta</th>
                                                <th class="text-center">Antigüedad</th>
                                                <th class="text-center">Vac. año anterior</th>
                                                <th class="text-center">Vac. año actual</th>
                                                <th class="text-center">Vac. pendientes</th>
                                                <th>Vac. tomadas 2021</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Listado -->
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
                                                        <?php echo $r->disponibles + ($r->lastyear); ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo $r->usados; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-cog"></i></a>
                                                            <ul class="dropdown-menu pull-right text-left">
                                                                <li><a href="?c=empleado&a=crud&id=<?php echo $r->idempleado; ?>">Solicitar
                                                                        vacaciones</a></li>
                                                                <!-- <li class="divider"></li> -->
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