<section>
    <!-- START Page content-->
    <section class="main-content">
        <!-- <a type="button" class="btn btn-labeled btn-primary pull-right" href="?c=empleado&a=Crud">
            <span class="btn-label"><i class="fa fa-plus-circle"></i> </span>Añadir artículo
        </a> -->
        <h3>
            Histórico
            <br />
            <small>Solicitudes</small>
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
                        <small>Gráfica</small>
                    </div>
                    <div class="panel-body">
                        <!-- start -->
                        <div class="panel-collapse">
                            <div class="panel-body">
                                <div style="height: 250px;" data-source="server/chart-data.php?type=line&val=50" class="chart-line flot-chart"></div>
                            </div>
                        </div>
                        <!-- end -->
                    </div>
                </div>
            </div>
            <!-- END DATATABLE 2 -->