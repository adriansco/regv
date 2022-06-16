<!-- @format -->

<!-- START Main section-->
<section>
	<!-- START Page content-->
	<section class="main-content">
		<h3>
			<?php echo $empleado->idempleado != null ? $empleado->nombre : 'Nuevo Registro'; ?>
			<br />
			<small><?php echo $empleado->departamento ?></small>
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
						<form id="frm-alumno" name="frm-alumno" action="?c=empleado&a=guardarSolicitud" method="POST" enctype="multipart/form-data">
							<!-- target="_blank" -->
							<input type="hidden" name="id" value="<?php echo $empleado->idempleado; ?>" />
							<input type="hidden" name="nomina" value="<?php echo $empleado->nomina; ?>" />

							<div class="form-group">
								<label>Nombre</label>
								<input type="text" name="nombre" value="<?php echo $empleado->nombre; ?>" class="form-control form-control-rounded" placeholder="Ingrese su nombre" required disabled />
							</div>

							<div class="form-group">
								<label>Nomina</label>
								<input type="text" name="nomina" value="<?php print_r($empleado->nomina); ?>" class="form-control form-control-rounded" placeholder="Ingrese su número de nomina" required disabled />
							</div>

							<div class="form-group">
								<label>Departamento</label>
								<input type="text" name="departamento" value="<?php echo $empleado->departamento; ?>" class="form-control form-control-rounded" placeholder="Ingrese su departamento" required disabled />
							</div>
							<div class="form-group">
								<label>Fechas</label>
								<div id="mdp-demo"></div>
								<input type="hidden" id="altField" name="altField" class="form-control form-control-rounded" required>
								<!-- <input type="text" name="mdp-demo" class="form-control form-control-rounded" id="mdp-demo"/> -->
							</div>
							<label>Tipo de permiso</label>
							<fieldset>
								<div class="form-group">
									<div class="col-sm-12">
										<label class="radio-inline c-radio">
											<input id="inlineradio" type="radio" name="i-radio" value="Permiso con goce de sueldo." checked />
											<span class="fa fa-circle"></span>Permiso con goce de sueldo.
										</label>
										<label class="radio-inline c-radio">
											<input id="inlineradio" type="radio" name="i-radio" value="Permiso sin goce de sueldo." />
											<span class="fa fa-circle"></span>Permiso sin goce de sueldo.
										</label>
										<label class="radio-inline c-radio">
											<input id="inlineradio" type="radio" name="i-radio" value="Día a cuenta de vacaciones." />
											<span class="fa fa-circle"></span>Día a cuenta de vacaciones.
										</label>
										<!-- <label class="radio-inline c-radio">
											<input id="inlineradio" type="radio" name="i-radio" value="Falta" />
											<span class="fa fa-circle"></span>Falta.
										</label> -->
										<label class="radio-inline c-radio">
											<input id="inlineradio" type="radio" name="i-radio" value="Otros" />
											<span class="fa fa-circle"></span>Otros (especifique en observaciones).
										</label>
									</div>
								</div>
							</fieldset>

							<div class="form-group">
								<label for="exampleFormControlTextarea1">Observaciones:</label>
								<textarea class="form-control" id="exampleFormControlTextarea1" name="observaciones" rows="3"></textarea>
							</div>

							<hr />
							<div class="text-right">
								<input type="submit" name="uploadBtn" value="Generar solicitud" class="btn btn-primary" />
							</div>
						</form>
					</div>
				</div>
				<!-- END panel-->
			</div>
		</div>
	</section>
</section>