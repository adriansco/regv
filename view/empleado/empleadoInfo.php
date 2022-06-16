<!-- START widget-->
<div data-toggle="play-animation" data-play="fadeInLeft" data-offset="0" data-delay="500" href="#" class="media p mt0">
  <div class="pull-left">
    <img src="app/img/photo/<?php echo $_SESSION['data']['Nomina']; ?>.jpg" style="width: 100px; height: 100px" alt="Image" class="media-object img-circle" />
  </div>
  <div class="media-body">
    <div class="media-heading">
      <h3 class="mt0">Empleado</h3>
      <ul class="list-unstyled">
        <li class="mb-sm">
          <em class=""></em>Nómina:
          <b><?php echo $_SESSION['data']['Nomina']; ?></b>
        </li>
        <li class="mb-sm">
          <em class=""></em>Nombre:
          <b><?php echo $_SESSION['data']['Name']; ?></b>
        </li>
        <li class="mb-sm">
          <em class=""></em>Área:
          <b><?php echo $_SESSION['data']['Area']; ?></b>
        </li>
      </ul>
    </div>
  </div>
</div>
<!-- END widget-->