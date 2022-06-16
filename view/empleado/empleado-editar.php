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
							<input type="hidden" name="nomina" value="<?php echo $empleado->nomina; ?>" />

							<div class="form-group">
								<label>Nombre</label>
								<input type="text" name="nombre" value="<?php echo $empleado->nombre; ?>" class="form-control form-control-rounded" placeholder="Ingrese su nombre" required disabled="" />
							</div>
							<div class="grid-container">
								<div class="item1">
									<label>Número de nómina</label>
									<input type="text" name="nomina" value="<?php print_r($empleado->nomina); ?>" class="form-control form-control-rounded" placeholder="Ingrese su número de nomina" required disabled="" />
								</div>
								<div class="item2">
									<label>Nómina</label>
									<!-- select -->
									<select name="account" class="form-control form-control-rounded" style="width:100%">
										<option>Option 1</option>
										<option>Option 2</option>
										<option>Option 3</option>
										<option>Option 4</option>
										<option selected="selected">3</option>
									</select>
									<!-- <input type="hidden" id="countcontrol" name="countcontrol"> -->
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
							<div class="grid-container">
								<div class="item1">
									<label>Área</label>
									<input type="text" name="area" value="<?php echo $empleado->area; ?>" class="form-control form-control-rounded" placeholder="Ingrese su departamento" required disabled="" />
								</div>
								<div class="item2">
									<label>Departamento</label>
									<input type="text" name="departamento" value="<?php echo $empleado->departamento; ?>" class="form-control form-control-rounded" placeholder="Ingrese su departamento" required disabled="" />
								</div>
							</div>
							<div class="grid-container">
								<div class="item1">
									<label>Fecha Planta</label>
									<!-- <input name="mdp-demo2" id="mdp-demo2" class="form-control form-control-rounded" > -->
									<!-- <input type="text" name="salida" id="salida" value="" class="form-control form-control-rounded"> -->
									<!-- <input type="text" name="planta"
										value="<?php echo $empleado->fecha_planta; ?>"
										class="form-control form-control-rounded" placeholder="Ingrese su departamento"
										required disabled="" /> -->
									<!-- <input type="date" value="<?php echo date("Y/m/d", strtotime($empleado->fecha_planta)); ?>"> -->
									<input type="text" name="fplanta" id="fplanta" value="<?php echo date("Y/m/d", strtotime($empleado->fecha_planta)); ?>" class="form-control form-control-rounded">

								</div>
								<div class="item2">
									<label>Contrato</label>
									<?php if ($empleado->fecha_planta == '1000-01-01' || $empleado->fecha_planta == '0000-00-00') : ?>
										<input type="text" name="eventual" id="eventual" value="Eventual" class="form-control form-control-rounded" disabled="">
									<?php else : ?>
										<input type="text" name="planta" id="planta" value="Planta" class="form-control form-control-rounded" disabled="">
									<?php endif ?>
								</div>
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