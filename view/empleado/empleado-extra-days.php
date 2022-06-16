<section>
    <!-- START Page content-->
    <section class="main-content">
        <?php $hoy = date("m-d"); ?>
        <!-- start emp. info -->
        <!-- <-?php require_once 'view/empleado/empleadoInfo.php'; ?> -->
        <!--  end emp. info-->
        <?php
        if (isset($_SESSION['message']) && $_SESSION['message']) {
            echo ('<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>' . $_SESSION['message'] . '</strong></div>');
            unset($_SESSION['message']);
        }
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
                                <div class="text-center">
                                    <span class="txt-info">Simbología</span>
                                    <ul class="list-inline">
                                        <li class="txt-sub-info"><span class="tooltip-us fa fa-times-circle times"><span class="tooltiptext">Día disfrutado.</span></span> Día disfrutado.</li>
                                        <li class="txt-sub-info"><span class="tooltip-us fa fa-check-circle check"><span class="tooltiptext">Día por disfrutar.</span></span> Día por disfrutar.</li>
                                        <li class="txt-sub-info"><span class="tooltip-us fa fa-exclamation-circle warning-ico"><span class="tooltiptext">N/A.</span></span> N/A.</li>
                                        <li class="txt-sub-info"><span class="tooltip-us fa fa-info-circle info-ico"><span class="tooltiptext">Info. días festivos.</span></span> Info. días festivos.</li>
                                    </ul>
                                    <h4>Nota:
                                        <small>Para saber más, debes poner el puntero del ratón sobre el icono de interés.</small>
                                    </h4>
                                </div>
                                <table id="datatable1" class="table table-striped table-hover" style="width: 100%">
                                    <thead>
                                        <tr class="headt">
                                            <th class="text-center"># nómina​</th>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Departamento</th>
                                            <th class="text-center">1° ene</th>
                                            <th class="text-center">05-feb <span class="tooltip-us fa fa-info-circle"><span class="tooltiptext">A cambio por el primer lunes de febrero.</span></span></th>
                                            <th class="text-center">21-mar <span class="tooltip-us fa fa-info-circle"><span class="tooltiptext">A cambio del tercer lunes de marzo.</span></span></th>
                                            <th class="text-center">Juev. Sto.</th>
                                            <th class="text-center">Vier. Sto.</th>
                                            <th class="text-center">1° may</th>
                                            <th class="text-center">10-may</th>
                                            <th class="text-center">16-sep</th>
                                            <th class="text-center">20-nov <span class="tooltip-us fa fa-info-circle"><span class="tooltiptext">A cambio del tercer lunes de noviembre.</span></span></th>
                                            <th class="text-center">01-dic <span class="tooltip-us fa fa-info-circle"><span class="tooltiptext">De cada seis años por el cambio de poder ejecutivo federal.</span></span></th>
                                            <th class="text-center">25-dic</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Listado de empleados -->
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
                                                <td class="text-center">
                                                    <?php $resultado = $hoy > '01-01' ? (print $this->validarExtraDay($r->idempleado, 10)) : 'falso'; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php $hoy > '02-05' ? (print $this->validarExtraDay($r->idempleado, 1)) : ''; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php $hoy > '03-21' ? (print $this->validarExtraDay($r->idempleado, 2)) : ''; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php $hoy > '04-14' ? (print $this->validarExtraDay($r->idempleado, 3)) : ''; ?>
                                                </td>
                                                <!-- end antiquity -->
                                                <td class="text-center">
                                                    <?php $hoy > '04-15' ? (print $this->validarExtraDay($r->idempleado, 4)) : ''; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php $hoy > '05-01' ? (print $this->validarExtraDay($r->idempleado, 5)) : ''; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php $hoy > '05-10' ? (print $this->validarExtraDay($r->idempleado, 6)) : ''; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php $hoy > '09-16' ? (print $this->validarExtraDay($r->idempleado, 7)) : ''; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php $hoy > '10-20' ? (print $this->validarExtraDay($r->idempleado, 8)) : ''; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php $hoy > '12-01' ? (print $this->validarExtraDay($r->idempleado, 11)) : ''; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php $hoy > '12-25' ? (print $this->validarExtraDay($r->idempleado, 9)) : ''; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php if ($_SESSION['data']['Privilege'] == 'ADMIN') : ?>
                                                        <div class="btn-group">
                                                            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-cog"></i></a>
                                                            <ul class="dropdown-menu pull-right text-left">
                                                                <!-- Por el momento se agregará de manera manual cargando los días con el Excel que envía Beto. -->
                                                                <!-- <li>
                                                                    <a href="?c=empleado&a=addExtraDay&id=<-?php echo $r->idempleado; ?>">Agregar día adicional</a>
                                                                </li> -->
                                                                <li>
                                                                    <a href="" data-id="<?php echo $r->idempleado; ?>" data-test="<?php echo $this->findById($r->idempleado); ?>" data-toggle="modal" data-target="#myModal" class="editbtn">Aprobar día adicional</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    <?php endif ?>
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
</section>
<!-- END Main wrapper-->
<!-- START modal-->
<form id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
                <h4 id="myModalLabel" class="modal-title">Días adicionales del empleado</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nombre:</label>
                    <input type="text" id="ctrl-empleado" class="form-control form-control-rounded">
                </div>
                <div class="form-group">
                    <label>Días festivos con los que cuenta</label>
                    <select id="slt-dias" name="slt-dias" class="form-control form-control-rounded m-b"></select>
                </div>
                <div id="div-entrada" class="form-group">
                    <!-- class="control-label" -->
                    <label>*Fecha en que lo tomara</label>
                    <input type="text" name="entrada" id="entrada" value="" class="form-control form-control-rounded" required>
                </div>
                <div id="div-comm" class="form-group">
                    <label for="exampleFormControlTextarea1">*Observaciones:</label>
                    <textarea class="form-control" maxlength="155" id="exampleFormControlTextarea1" name="observaciones" rows="3" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Cerrar</button>
                <button type="button" id="btn-aprobar" class="btn btn-primary btn-register">Aprobar día</button>
            </div>
        </div>
    </div>
</form>
<!-- END modal-->