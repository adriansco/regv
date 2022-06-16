<section>
    <!-- START Page content-->
    <section class="main-content">
        <!-- <a type="button" class="btn btn-labeled btn-primary pull-right" href="?c=empleado&a=Crud">
            <span class="btn-label"><i class="fa fa-plus-circle"></i> </span>Añadir artículo
        </a> -->
        <h3>
            Solicitudes
            <br />
            <!-- <small>Hola
                <-?php echo $_SESSION['data']['Name']; ?>
            </small> -->
        </h3>

        <?php if (isset($_SESSION['message']) && $_SESSION['message']) : ?>
            <!-- <div data-toggle="notify" data-onload data-message="&lt;b&gt;¡ <?php echo $_SESSION['message']; ?> !&lt;/b&gt; <br>"
            data-options='{"status":"success", "pos":"top-right"}' class="hidden-xs"></div>
        <--?php unset($_SESSION['message']);?> -->
            <?php echo ('<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>' . $_SESSION['message'] . '</strong></div>');
            unset($_SESSION['message']);
            ?>

        <?php else : ?>
            <!-- <div data-toggle="notify" data-onload data-message="&lt;b&gt;¡ <?php echo 'Sin mensajes' ?> !&lt;/b&gt; <br>"
            data-options='{"status":"success", "pos":"top-right"}' class="hidden-xs"></div> -->
        <?php endif ?>
        <!-- init alert -->

        <!-- end alert -->
        <!-- <img src="assets/images/logo.png" alt="logo" class="logocentro">
        <h1 class="page-header">Proveedores EMV</h1>
        <a class="btn btn-primary pull-right" href="?c=proveedor&a=Crud">Agregar</a>
        <br><br><br>-->
        <?php
        if (isset($_SESSION['message']) && $_SESSION['message']) {
            /* printf('<div id="msg_error" class="alert alert-danger" role="alert" style="display: none"></div>'); */
            echo ('<div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>' . $_SESSION['message'] . '</strong></div>');
            /* printf('<b>%s</b>', $_SESSION['message']); */
            unset($_SESSION['message']);
        }
        ?>

        <div class="row">
            <!-- START dashboard main content-->
            <div class="col-md-12">
                <!-- START DATATABLE 1 -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Tabla |
                                <small>Solicitudes</small>
                            </div>
                            <div class="panel-body">
                                <table id="datatable3" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th style="background-color: #3498db;">Num. nómina</th>
                                            <th style="background-color: #3498db;">Nombre</th>
                                            <th style="background-color: #3498db;">Departamento</th>
                                            <th style="background-color: #3498db;" class="sort-numeric">Fecha inicio</th>
                                            <th style="background-color: #3498db;" class="sort-numeric">Fecha fin</th>
                                            <th style="background-color: #3498db;" class="sort-alpha">Folio</th>
                                            <th style="background-color: #3498db;">Días</th>
                                            <th style="background-color: #3498db;" class="sort-alpha">Fecha de reincorporación</th>
                                            <th style="background-color: #3498db;">Estado</th>
                                            <th style="background-color: #3498db;">Imprimir</th>
                                            <th style="background-color: #3498db;">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($_SESSION['data']['Privilege'] == 'ADMIN') : ?>
                                            <!-- listar -->
                                            <?php foreach ($this->model->detalleSolicitud() as $r) : ?>
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
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-cog"></i></a>
                                                            <?php if ($r->status == 1) : ?>
                                                                <ul class="dropdown-menu pull-right text-left">
                                                                    <li class="disabled">
                                                                        <a href="#">Aprobar</a>
                                                                    </li>
                                                                    <li class="divider"></li>
                                                                    <li>
                                                                        <a href="?c=solicitud&a=anularSolicitud&id=<?php echo $r->idempleado; ?>&cantidad=<?php echo $r->cantidad; ?>&idsolicitud=<?php echo $r->idsolicitud; ?>">Anular</a>
                                                                    </li>
                                                                </ul>
                                                            <?php else : ?>
                                                                <ul class="dropdown-menu pull-right text-left">
                                                                    <li><a href="?c=solicitud&a=aprobarSolicitud&id=<?php echo $r->idempleado; ?>&cantidad=<?php echo $r->cantidad; ?>&idsolicitud=<?php echo $r->idsolicitud; ?>">Aprobar</a>
                                                                    </li>
                                                                    <li><a href="?c=solicitud&a=eliminarSolicitud&id=<?php echo $r->idsolicitud; ?>" onclick="return confirm('¿Seguro que quieres cancelar la solicitud?, esta acción no se puede revertir');">Eliminar</a>
                                                                    </li>
                                                                    <li><a href="?c=solicitud&a=cancelarSolicitud&id=<?php echo $r->idsolicitud; ?>">Cancelar</a>
                                                                    </li>
                                                                    <li class="divider"></li>
                                                                    <li class="disabled"><a href="#">Anular</a></li>
                                                                </ul>
                                                            <?php endif ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <!-- listar -->
                                            <?php foreach ($this->model->detalleSolicitudId($_SESSION['data']['ID']) as $r) : ?>
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
                                                    <td></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END DATATABLE 1 -->

                <!-- SSIDE -->
                <!-- <table id="example" class="table">
                    <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>City</th>
                        <th>Options</th>
                    </thead>
                    <tbody>
                    </tbody>
                </table> -->
                <!-- SSIDE -->
            </div>
            <!-- END dashboard main content-->

        </div>
    </section>
    <!-- END Page content-->
</section>
<!-- END Main section-->