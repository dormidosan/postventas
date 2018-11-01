<div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../../dist/img/userm-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $_SESSION["G50_IT_USERDAT"][6] ?></h3>

              <p class="text-muted text-center"><?php echo $_SESSION["G50_IT_USERDAT"][7] ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Solicitudes en proceso</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                    <!--Si el tipo de usuario es agente, debe mostrar la cantidad de solicitudes que ha solvendado-->
                  <b>Solicitudes Completadas</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                    <!--Si el tipo de usuario es Agente, aqui debe mostrar los clientes asignados, de lo contrario --> 
                  <b>Clientes asignados</b> <a class="pull-right">13,287</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Editar Perfil</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Acerca de mi...</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Educacion</strong>

              <p class="text-muted">
                Texto extraido de las preferencias de cada perfil, campo nuevo referente a educacion
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Ubicacion</strong>

              <p class="text-muted">Texto extraido de las preferencias de cada perfil, campo nuevo referente a ubicacion</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Habilidades</strong>

              <p>
                <span class="label label-danger">Desarrollo</span>
                <span class="label label-success">Atencion al cliente</span>
                <span class="label label-info">Planeacion de viajes</span>
                <span class="label label-warning">Reservas</span>
                <span class="label label-primary">Seguimiento</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notas</strong>

              <p>Texto extraido de las preferenicas de cada perfil, campo referente a notas personales</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>