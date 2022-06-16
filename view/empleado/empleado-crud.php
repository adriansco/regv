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
						<form id="frm-alumno" name="frm-alumno" action="?c=empleado&a=guardarSolicitud" method="POST" enctype="multipart/form-data">
							<!-- target="_blank" -->
							<input type="hidden" name="id" id="id" value="<?php echo $empleado->idempleado; ?>" />

							<div class="form-group">
								<label>Nombre</label>
								<input type="text" name="nombre" value="<?php echo $empleado->nombre; ?>" class="form-control form-control-rounded" placeholder="Ingrese su nombre" required />
							</div>
							<div class="grid-container">
								<div class="item1">
									<label>Nomina</label>
									<input type="text" name="nomina" value="<?php print_r($empleado->nomina); ?>" class="form-control form-control-rounded" placeholder="Ingrese su número de nomina" required />
								</div>
								<div class="item2">
									<label>Departamento</label>
									<input type="text" name="departamento" value="<?php echo $empleado->departamento; ?>" class="form-control form-control-rounded" placeholder="Ingrese su departamento" required />
								</div>
								<div class="item3 ">
									<label>Fecha Inicio</label>
									<input name="mdp-demo" id="mdp-demo" class="form-control form-control-rounded">
								</div>

								<div class="item4 ">
									<label>Fecha Fin</label>
									<input name="mdp-demo2" id="mdp-demo2" class="form-control form-control-rounded">
								</div>

								<div class="item5 ">
									<label>Días</label>
									<input id="countd" name="countd" class="form-control form-control-rounded">
									<!-- <input type="hidden" id="countcontrol" name="countcontrol"> -->
								</div>
								<div class="item6 ">
									<label>Fecha de reincorporación</label>
									<input name="mdp-demo3" id="mdp-demo3" class="form-control form-control-rounded">
								</div>
								<!-- https://es.stackoverflow.com/questions/199629/obtener-2-input-con-mismo-name -->
								<!-- https://www.amazon.com.mx/BY-MEXICO-LLAVERO-XOLO/dp/B0814C1P3V/ref=sr_1_33?__mk_es_MX=%C3%85M%C3%85%C5%BD%C3%95%C3%91&crid=RM9MKWXAQSQ8&dchild=1&keywords=llaveros+para+hombre+elegante&qid=1613585596&sprefix=llaveros+para+hombre+%2Caps%2C243&sr=8-33 -->
								<!-- <div data-pick-date="false" class="datetimepicker input-group date mb-lg">
                                 <input type="text" class="form-control">
                                 <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                 </span>
                              </div> -->
							</div>
							<div class="form-group">
								<label for="exampleFormControlTextarea1">Observaciones:</label>
								<textarea class="form-control" maxlength="85" id="exampleFormControlTextarea1" name="observaciones" rows="3"></textarea>
							</div>
							<hr />
							<div class="text-right">
								<input type="submit" name="uploadBtn" id="uploadBtn" value="Generar solicitud" class="btn btn-primary" />
								<!-- <input type="button" value="Enviar" onclick="this.disabled=true; this.value=’Enviando...’; this.form.submit()" /> -->
							</div>
						</form>
					</div>
				</div>
				<!-- END panel-->
			</div>
		</div>
	</section>
</section>