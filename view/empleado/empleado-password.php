<!-- @format -->

<!-- START Main section-->
<section>
  <!-- START Page content-->
  <section class="main-content">
    <h3>
      <?php echo $empleado->idempleado != null ? $empleado->nombre : 'Gestión de
      contraseñas'; ?>
      <br />
      <small> <?php echo $empleado->departamento ?> </small>
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?c=empleado">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">
          <?php echo $empleado->idempleado != null ? $empleado->nombre :
            'Gestión de contraseñas'; ?>
        </li>
      </ol>
    </nav>
    <div class="row">
      <div class="col-lg-12">
        <!-- <img src="assets/images/logo.png" alt="logo" class="logocentro"> -->
        <!-- test -->
        <!-- START wrapper-->
        <div style="height: 100%; padding: 50px 0" class="row row-table">
          <div class="col-lg-4 col-md-6 col-sm-8 col-xs-12 align-middle">
            <!-- START panel-->
            <div data-toggle="play-animation" data-play="fadeInUp" data-offset="0" class="panel widget b0">
              <!-- <img src="app/img/code.jpg" class="img-responsive" /> -->
              <div class="panel-body">
                <h3 class="text-center">Hola</h3>
                <p class="text-center">
                  Cambia o asigna contraseña de acceso al sistema
                </p>
                <!-- <form role="form"> -->
                <div id="msg_error" class="alert alert-danger" role="alert" style="display: none"></div>
                <div class="form-group has-feedback">
                  <label for="exampleInputUser1">Usuario</label>
                  <select id="empcontrol" style="width: 100%" class="chosen-select">
                    <?php foreach ($this->model->listarEmpleados() as $r) : ?>
                      <option value="<?php echo $r->nomina ?>">
                        <?php echo $r->nomina . ' - ' . $r->nombre ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <form action="POST" class="form_update" id="form_update" enctype="multipart/form-data">
                  <div class="form-group has-feedback">
                    <label>Número de nómina</label>
                    <input type="text" id="usercontrol" placeholder="Ingresa tu número de nómina" class="form-control" required disabled />
                    <span class="fa fa-user form-control-feedback text-muted"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <div class="pull-right">
                      <a href="#" class="text-muted">
                        <small>Debe ser el número de nómina</small>
                      </a>
                    </div>
                    <label>Contraseña</label>
                    <input type="password" id="passcontrol" placeholder="Ingresa tu contraseña" class="form-control" required disabled />
                    <span class="fa fa-lock form-control-feedback text-muted"></span>
                  </div>
                  <div class="clearfix">
                    <!-- <div class="checkbox c-checkbox pull-left">
                        <label>
                           <input type="checkbox" value="">
                           <span class="fa fa-check"></span>Remember Me</label>
                     </div> -->
                    <div class="pull-right">
                      <!-- <button type="submit" class="btn btn-primary" >Enviar</button> -->
                      <button type="submit" class="btn btn-primary">Buscar</buttom>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- END panel-->
          </div>
        </div>
        <!-- END wrapper-->
      </div>
    </div>
  </section>
</section>