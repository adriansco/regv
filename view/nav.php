<!-- START Top Navbar-->
<nav role="navigation" class="navbar navbar-default navbar-top navbar-fixed-top">
  <!-- START navbar header-->
  <div class="navbar-header">
    <a href="#" class="navbar-brand">
      <div class="brand-logo">EMV</div>
      <div class="brand-logo-collapsed">EMV</div>
    </a>
  </div>
  <!-- END navbar header-->
  <!-- START Nav wrapper-->
  <div class="nav-wrapper">
    <!-- START Left navbar-->
    <!-- <ul class="nav navbar-nav">
      <li>
        <a href="#" data-toggle="aside">
          <em class="fa fa-align-left"></em>
        </a>
      </li>
      <li>
        <a href="#" data-toggle="navbar-search">
          <em class="fa fa-search"></em>
        </a>
      </li>
    </ul> -->
    <!-- END Left navbar-->
    <!-- START Right Navbar-->
    <ul class="nav navbar-nav navbar-right">
      <!-- START Alert menu-->
      <li class="dropdown dropdown-list">
        <!-- <a href="#" data-toggle="dropdown" data-play="bounceIn" class="dropdown-toggle">
          <em class="fa fa-bell"></em>
          <div class="label label-info">120</div>
        </a> -->
        <!-- START Dropdown menu-->
        <ul class="dropdown-menu">
          <li>
            <!-- START list group-->
            <div class="list-group">
              <!-- list item-->
              <a href="#" class="list-group-item">
                <div class="media">
                  <div class="pull-left">
                    <em class="fa fa-envelope-o fa-2x text-success"></em>
                  </div>
                  <div class="media-body clearfix">
                    <div class="media-heading">Unread messages</div>
                    <p class="m0">
                      <small>You have 10 unread messages</small>
                    </p>
                  </div>
                </div>
              </a>
              <!-- list item-->
              <a href="#" class="list-group-item">
                <div class="media">
                  <div class="pull-left">
                    <em class="fa fa-cog fa-2x"></em>
                  </div>
                  <div class="media-body clearfix">
                    <div class="media-heading">New settings</div>
                    <p class="m0">
                      <small>There are new settings available</small>
                    </p>
                  </div>
                </div>
              </a>
              <!-- list item-->
              <a href="#" class="list-group-item">
                <div class="media">
                  <div class="pull-left">
                    <em class="fa fa-fire fa-2x"></em>
                  </div>
                  <div class="media-body clearfix">
                    <div class="media-heading">Updates</div>
                    <p class="m0">
                      <small>There are <span class="text-primary">2</span>new
                        updates available</small>
                    </p>
                  </div>
                </div>
              </a>
              <!-- last list item -->
              <a href="#" class="list-group-item">
                <small>Unread notifications</small>
                <span class="badge">14</span>
              </a>
            </div>
            <!-- END list group-->
          </li>
        </ul>
        <!-- END Dropdown menu-->
      </li>
      <!-- END Alert menu-->
      <!-- START User menu-->
      <li><a href="?c=auth&a=Kill" title="Salir">Salir</a></li>
      <li class="dropdown">
        <a href="#" data-toggle="dropdown" data-play="bounceIn" class="dropdown-toggle">
          <em class="fa fa-user" title="Configuración"></em>
        </a>
        <!-- START Dropdown menu-->
        <ul class="dropdown-menu">
          <!-- <li>
            <div class="p">
              <p>Overall progress</p>
              <div class="progress progress-striped progress-xs m0">
                <div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%" class="progress-bar progress-bar-success">
                  <span class="sr-only">80% Complete</span>
                </div>
              </div>
            </div>
          </li> -->
          <li><a href="?c=empleado" title="Inicio">Inicio</a></li>
          <!-- <li><a href="?c=empleado&a=changePassword&id=<?php echo $_SESSION['data']['ID']; ?>" title="Cambiar contraseña">Cambiar contraseña</a></li> -->
          <li class="divider"></li>
          <!-- <li><a href="#">Profile</a>
                     </li>
                     <li><a href="#">Settings</a>
                     </li>
                     <li><a href="#">Notifications<div class="label label-info pull-right">5</div></a>
                     </li>
                     <li><a href="#">Messages<div class="label label-danger pull-right">10</div></a>
                     </li> -->
          <li><a href="?c=auth&a=Kill" title="Salir">Salir</a></li>
        </ul>
        <!-- END Dropdown menu-->
      </li>
      <!-- END User menu-->
      <!-- START Contacts button-->
      <li>
        <!-- <a href="#" data-toggle="offsidebar">
                     <em class="fa fa-align-right"></em>
                  </a> -->
      </li>
      <!-- END Contacts menu-->
    </ul>
    <!-- END Right Navbar-->
  </div>
  <!-- END Nav wrapper-->
  <!-- START Search form-->
  <form role="search" class="navbar-form">
    <div class="form-group has-feedback">
      <input type="text" placeholder="Type and hit Enter.." class="form-control" />
      <div data-toggle="navbar-search-dismiss" class="fa fa-times form-control-feedback"></div>
    </div>
    <button type="submit" class="hidden btn btn-default">Submit</button>
  </form>
  <!-- END Search form-->
</nav>
<!-- END Top Navbar-->
