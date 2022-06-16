<!-- @format -->

<!-- START Main section-->
<section>
    <!-- START Page content-->
    <section class="main-content">
        <h3>
            <?php echo $empleado->idempleado != null ? $empleado->nombre : 'Nuevo Registro'; ?>
            <br />
            <small>
                <?php echo $empleado->departamento ?>
            </small>
            <?php
            /* echo "<input name='num' id='num' type='button' value='Click' onClick='MiFuncionJS();' /><br>"; */
            /* echo "<input type='text' name='num' step='1' id='num' value=''  size='20'/>"; */
            ?>
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="?c=empleado">Empleados</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php echo $empleado->idempleado != null ? $empleado->nombre : 'Nuevo
					Registro'; ?>
                </li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-lg-12">
                <!-- <img src="assets/images/logo.png" alt="logo" class="logocentro"> -->
                <!-- START panel-->
                <div class="panel panel-default">
                    <div class="panel-heading">Datos</div>
                    <div class="panel-body">
                        <form id="frm-alumno" name="frm-alumno" action="?c=empleado&a=storeExtraDay" method="POST" enctype="multipart/form-data">
                            <!-- target="_blank" -->
                            <input type="hidden" name="id" id="id" value="<?php echo $empleado->idempleado; ?>" />
                            <input type="hidden" name="nomina" value="<?php echo $empleado->nomina; ?>" />

                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="nombre" value="<?php echo $empleado->nombre; ?>" class="form-control form-control-rounded" placeholder="Ingrese su nombre" required disabled="" />
                            </div>
                            <div class="grid-container-two">
                                <div class="item7">
                                    <label>Nomina</label>
                                    <input type="text" name="nomina" value="<?php print_r($empleado->nomina); ?>" class="form-control form-control-rounded" placeholder="Ingrese su número de nomina" required disabled="" />
                                </div>
                                <div class="item8">
                                    <label>Departamento</label>
                                    <input type="text" name="departamento" value="<?php echo $empleado->departamento; ?>" class="form-control form-control-rounded" placeholder="Ingrese su departamento" required disabled="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Día festivo</label>
                                <select name="festivo" id="festivo" class="form-control form-control-rounded" required>
                                    <option value="">selecciona una opcion</option>
                                    <?php foreach ($festivos as $item) : ?>
                                        <option value="<?php echo $item->id; ?>"> <?php echo $item->name; ?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Observaciones:</label>
                                <textarea class="form-control" maxlength="155" id="exampleFormControlTextarea1" name="observaciones" rows="3"></textarea>
                            </div>
                            <hr />
                            <div class="text-right">
                                <input type="submit" name="uploadBtn" value="Guardar" class="btn btn-primary" />
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END panel-->
            </div>
        </div>
    </section>
</section>