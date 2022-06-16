<section>
    <!-- START Page content-->
    <section class="main-content">
        <!-- <a type="button" class="btn btn-labeled btn-primary pull-right" href="?c=empleado&a=Crud">
            <span class="btn-label"><i class="fa fa-plus-circle"></i> </span>Añadir artículo
        </a> -->
        <h3>
            Reportes
            <br />
            <!-- <small>Hola
                <-?php echo $_SESSION['data']['Name']; ?>
            </small> -->
        </h3>

        <!-- <?php if (isset($_SESSION['message']) && $_SESSION['message']): ?>
        <div data-toggle="notify" data-onload
            data-message="&lt;b&gt;¡ <?php echo $_SESSION['message']; ?> !&lt;/b&gt; <br>"
            data-options='{"status":"success", "pos":"top-right"}' class="hidden-xs"></div>
        <?php unset($_SESSION['message']);?>
        <?php else: ?>
        <div data-toggle="notify" data-onload data-message="&lt;b&gt;¡ <?php echo 'Sin mensajes' ?> !&lt;/b&gt; <br>"
            data-options='{"status":"success", "pos":"top-right"}' class="hidden-xs"></div>
        <?php endif?> -->
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
        <!-- START DATATABLE 2 -->
        <div class="row">
               <div class="col-lg-12">
                  <div class="panel panel-default">
                     <div class="panel-heading">Tabla |
                        <small>Reportes</small>
                     </div>
                     <div class="panel-body">
                        <table id="datatable2" class="table table-striped table-hover">
                           <thead>
                              <tr>
                                <th style="background-color: #3498db;">id</th>
                                <th style="background-color: #3498db;">Nombre</th>
                                <th style="background-color: #3498db;">Antigüedad</th>
                                <th style="background-color: #3498db;">Nomina</th>
                                <th class="text-center" style="background-color: #3498db;">Enero</th>
                                <th style="background-color: #3498db;">Sol. Enero.</th>
                                <th class="text-center" style="background-color: #3498db;">Febrero</th>
                                <th style="background-color: #3498db;">Sol. Feb.</th>
                                <th class="text-center" style="background-color: #3498db;">Marzo</th>
                                <th style="background-color: #3498db;">Sol. Mar.</th>
                                <th class="text-center" style="background-color: #3498db;">Abril</th>
                                <th style="background-color: #3498db;">Sol. Abr.</th>
                                <th class="text-center" style="background-color: #3498db;">Mayo</th>
                                <th style="background-color: #3498db;">Sol. May.</th>
                                <th class="text-center" style="background-color: #3498db;">Junio</th>
                                <th style="background-color: #3498db;">Sol. Jun.</th>
                                <th class="text-center" style="background-color: #3498db;">Julio</th>
                                <th style="background-color: #3498db;">Sol. Jul.</th>
                                <th class="text-center" style="background-color: #3498db;">Agosto</th>
                                <th style="background-color: #3498db;">Sol. Ago.</th>
                                <th class="text-center" style="background-color: #3498db;">Septiembre</th>
                                <th style="background-color: #3498db;">Sol. Sep.</th>
                                <th class="text-center" style="background-color: #3498db;">Octubre</th>
                                <th style="background-color: #3498db;">Sol. Oct.</th>
                                <th class="text-center" style="background-color: #3498db;">Noviembre</th>
                                <th style="background-color: #3498db;">Sol. Nov.</th>
                                <th class="text-center" style="background-color: #3498db;">Diciembre</th>
                                <th style="background-color: #3498db;">Sol. Dic.</th>
                              </tr>
                           </thead>
                           <tbody>
                           <?php if ($_SESSION['data']['Privilege'] == 'ADMIN'): ?>
                                <!-- listar -->
                                <?php foreach ($this->model->genReport() as $r): ?>
                                <tr>
                                    <td>
                                        <?php echo $r->id; ?>
                                    </td>
                                    <td>
                                        <?php echo $r->nombre; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $r->ant; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $r->nomina; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $r->Ene; ?>
                                    </td>
                                    <td>
                                        <?php echo $r->renero; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $r->Feb; ?>
                                    </td>
                                    <td>
                                        <?php echo $r->rfeb; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $r->Mar; ?>
                                    </td>
                                    <!-- PDF Init -->
                                    <td>
                                        <?php echo $r->rmar; ?>
                                    </td>
                                    <!-- PDF End -->
                                    <td class="text-center">
                                        <?php echo $r->Abr; ?>
                                    </td>
                                    <td>
                                        <?php echo $r->rabr; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $r->May; ?>
                                    </td>
                                    <td>
                                        <?php echo $r->rmay; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $r->Jun; ?>
                                    </td>
                                    <td>
                                        <?php echo $r->rjun; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $r->Jul; ?>
                                    </td>
                                    <td>
                                        <?php echo $r->rjul; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $r->Ago; ?>
                                    </td>
                                    <td>
                                        <?php echo $r->rago; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $r->Sep; ?>
                                    </td>
                                    <td>
                                        <?php echo $r->rsep; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $r->Oct; ?>
                                    </td>
                                    <td>
                                        <?php echo $r->roct; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $r->Nov; ?>
                                    </td>
                                    <td>
                                        <?php echo $r->rnov; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $r->Dic; ?>
                                    </td>
                                    <td>
                                        <?php echo $r->rdic; ?>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            <?php endif?>
                            <!-- Tener en cuenta la cantidad de columnas -->
                              <!-- <tfoot>
                                <th><input type="text" name="filter_id" placeholder="Filtrar id" class="form-control input-sm datatable_input_col_search"></th>
                                <th><input type="text" name="filter_department" placeholder="Filtrar departamento" class="form-control input-sm datatable_input_col_search"></th>
                                <th><input type="text" name="filter_date_ini" placeholder="Filtrar fecha inicio" class="form-control input-sm datatable_input_col_search"></th>
                                <th><input type="text" name="filter_date_end" placeholder="Filtrar fecha fin" class="form-control input-sm datatable_input_col_search"></th>
                                <th><input type="text" name="filter_ticket" placeholder="Filtrar folio" class="form-control input-sm datatable_input_col_search"></th>
                                <th><input type="text" name="filter_days" placeholder="Filtrar días" class="form-control input-sm datatable_input_col_search"></th>
                                <th><input type="text" name="filter_date_ret" placeholder="Filtrar fecha de reincorporación" class="form-control input-sm datatable_input_col_search"></th>
                                <th><input type="text" name="filter_status" placeholder="Filtrar estado" class="form-control input-sm datatable_input_col_search"></th>
                                <th></th>
                                <th></th>
                                <th></th>
                              </tfoot> -->
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <!-- END DATATABLE 2 -->