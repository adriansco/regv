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
						<form id="frmRequest" name="frmRequest" action="?c=empleado&a=guardarSolicitud" method="POST" enctype="multipart/form-data">
							<!-- target="_blank" -->
							<input type="hidden" name="id" id="id" value="<?php echo $empleado->idempleado; ?>" />
							<input type="hidden" name="nomina" value="<?php echo $empleado->nomina; ?>" />

							<div class="form-group">
								<label>Nombre</label>
								<input type="text" name="nombre" value="<?php echo $empleado->nombre; ?>" class="form-control form-control-rounded" placeholder="Ingrese su nombre" required disabled="" />
							</div>
							<div class="grid-container">
								<div class="item1">
									<label>Nomina</label>
									<input type="text" name="nomina" value="<?php print_r($empleado->nomina); ?>" class="form-control form-control-rounded" placeholder="Ingrese su número de nomina" required disabled="" />
								</div>
								<div class="item2">
									<label>Departamento</label>
									<input type="text" name="departamento" value="<?php echo $empleado->departamento; ?>" class="form-control form-control-rounded" placeholder="Ingrese su departamento" required disabled="" />
								</div>
								<div class="item3 ">
									<div id="divInicio" class="form-group">
										<label>Fecha Inicio</label>
										<input type="text" name="entrada" id="entrada" value="" class="form-control form-control-rounded" required>
										<span id="msgOne" class="error-custom onta">Este valor es obligatorio.</span>
									</div>
								</div>

								<div class="item4 ">
									<div id="divFin" class="form-group">
										<label>Fecha Fin</label>
										<input type="text" name="salida" id="salida" value="" class="form-control form-control-rounded" required>
										<span id="msgTwo" class="error-custom onta">Este valor es obligatorio.</span>
									</div>
								</div>

								<div class="item5 ">
									<div id="divDias" class="form-group">
										<label>Días</label>
										<input type="text" onkeypress='return validaNumericos(event)' id="countd" name="countd" class="form-control form-control-rounded" required>
										<span id="msgThree" class="error-custom onta">Este valor es obligatorio.</span>
									</div>
								</div>

								<div class="item6 ">
									<div id="divRein" class="form-group">
										<label>Fecha de reincorporación</label>
										<!-- <input name="mdp-demo3" id="mdp-demo3" class="form-control form-control-rounded"> -->
										<input type="text" name="regreso" id="regreso" value="" class="form-control form-control-rounded" required>
										<span id="msgFour" class="error-custom onta">Este valor es obligatorio.</span>
									</div>
								</div>
								<!-- https://es.stackoverflow.com/questions/199629/obtener-2-input-con-mismo-name -->
								<!-- https://www.amazon.com.mx/BY-MEXICO-LLAVERO-XOLO/dp/B0814C1P3V/ref=sr_1_33?__mk_es_MX=%C3%85M%C3%85%C5%BD%C3%95%C3%91&crid=RM9MKWXAQSQ8&dchild=1&keywords=llaveros+para+hombre+elegante&qid=1613585596&sprefix=llaveros+para+hombre+%2Caps%2C243&sr=8-33 -->
							</div>
							<div class="form-group">
								<label for="exampleFormControlTextarea1">Observaciones:</label>
								<textarea class="form-control" maxlength="85" id="exampleFormControlTextarea1" name="observaciones" rows="3"></textarea>
							</div>
							<hr />
							<div class="text-right">
								<!-- <input type="submit" name="uploadBtn" value="Generar solicitud" class="btn btn-primary" /> -->
								<button onclick="submitAction(this)" type="button" id="btnSubmit" name="btnSubmit" class="btn btn-primary">Generar solicitud</button>
							</div>
						</form>
					</div>
				</div>
				<!-- END panel-->
			</div>
		</div>
	</section>
</section>

<script type="text/javascript">
	function submitAction(boton) {
		var fechaInicio = document.getElementById("divInicio"),
			salida = document.getElementById("divFin"),
			countd = document.getElementById("divDias"),
			permission = document.getElementById("divRein"),
			msgOne = document.getElementById('msgOne'),
			msgTwo = document.getElementById('msgTwo'),
			msgThree = document.getElementById('msgThree'),
			msgFour = document.getElementById('msgFour');
		boton.innerText = "Enviando...";
		boton.disabled = true;
		/* Captura de errores (Si se puede mejorar mejóralo) */
		if ($("#entrada").val().length == 0) {
			fechaInicio.classList.add("has-error");
			boton.innerText = "Generar solicitud";
			msgOne.classList.remove("onta");
			boton.disabled = false;
		} else {
			fechaInicio.classList.remove("has-error");
			msgOne.classList.add("onta");
		}
		if ($("#salida").val().length == 0) {
			salida.classList.add("has-error");
			boton.innerText = "Generar solicitud";
			msgTwo.classList.remove("onta");
			boton.disabled = false;
		} else {
			salida.classList.remove("has-error");
			msgTwo.classList.add("onta");
		}
		if ($("#countd").val().length == 0) {
			countd.classList.add("has-error");
			boton.innerText = "Generar solicitud";
			msgThree.classList.remove("onta");
			boton.disabled = false;
		} else {
			countd.classList.remove("has-error");
			msgThree.classList.add("onta");
		}
		if ($("#regreso").val().length == 0) {
			permission.classList.add("has-error");
			boton.innerText = "Generar solicitud";
			msgFour.classList.remove("onta");
			boton.disabled = false;
		} else {
			permission.classList.remove("has-error");
			msgFour.classList.add("onta");
		}
		/* OTRO IF >:V */
		if ($("#regreso").val().length != 0 && $("#countd").val().length != 0 && $("#salida").val().length != 0 && $("#entrada").val().length != 0) {
			boton.disabled = true;
			boton.innerText = "Enviando...";
			document.frmRequest.submit();
		}
	}
</script>