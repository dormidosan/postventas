<!DOCTYPE html>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Perfiles</a></li>
        <li class="active">Perfil de usuario</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="box">
    <div class="box-header">
        <div class="col-sm-5">
            <h3 class="box-title">Listado de Perfiles Registrados para el cliente:</h3>
        </div>
        <div class="col-sm-6">
            <!--
                ESTO SE TIENE QUE POPULAR DESDE LA TABLA DE CLIENTES
                EN CADA CAMBIO DEL SELECT, DEBE CARGAR LOS PERFILES 
                DE ESTE CLIENTE EN LA TABLA DE ABAJO
            -->
            <select class="form-control">
                <option>Cliente 1</option>
                <option>Cliente 2</option>
                <option>Cliente 3</option>
                <option>cliente 4</option>
                <option>Cliente 5</option>
            </select>             
        </div>

      
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Rendering engine</th>
          <th>Browser</th>
          <th>Platform(s)</th>
          <th>Engine version</th>
          <th>CSS grade</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>Trident</td>
          <td>Internet
            Explorer 4.0
          </td>
          <td>Win 95+</td>
          <td> 4</td>
          <td>X</td>
        </tr>
        <tr>
          <td>Trident</td>
          <td>Internet
            Explorer 5.0
          </td>
          <td>Win 95+</td>
          <td>5</td>
          <td>C</td>
        </tr>
        <tr>
          <td>Trident</td>
          <td>Internet
            Explorer 5.5
          </td>
          <td>Win 95+</td>
          <td>5.5</td>
          <td>A</td>
        </tr>
        <tr>
          <td>Trident</td>
          <td>Internet
            Explorer 6
          </td>
          <td>Win 98+</td>
          <td>6</td>
          <td>A</td>
        </tr>
        <tr>
          <td>Other browsers</td>
          <td>All others</td>
          <td>-</td>
          <td>-</td>
          <td>U</td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
          <th>Rendering engine</th>
          <th>Browser</th>
          <th>Platform(s)</th>
          <th>Engine version</th>
          <th>CSS grade</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>        
        
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../../dist/img/userm-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center">NOMBRE</h3>

              <p class="text-muted text-center">CARGO</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Nacionalidad</b> <a class="pull-right">El Salvador</a>
                </li>
                <li class="list-group-item">
                  <b>Residencia</b> <a class="pull-right">El Salvador</a>
                </li>
                <li class="list-group-item">
                  <b>Pasaporte</b> <a class="pull-right">A029852364</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Editar Perfil</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!--
          
          POR EL MOMENTO ESTE BLOQUE "ABOUT ME" NO SE VA A USAR
          
          -->
          <!-- About Me Box -->
<!--          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
             /.box-header 
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
             /.box-body 
          </div>-->
          <!-- /.box -->
          
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Perfil</a></li>
              <li><a href="#timeline" data-toggle="tab">Comentarios</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  
                </form>  
                  

                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <!--<img class="img-circle img-bordered-sm" src="../../dist/img/userm-128x128.jpg" alt="User Image">-->
                        <!--<span class="username">-->
                          <br>
                          <a href="#">Multimedia asociada al perfil</a>
                          <!--<a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>-->
                        <!--</span>-->
                    <!--<span class="description">Posted 5 photos - 5 days ago</span>-->
                  </div>
                  <!-- /.user-block -->
                  <div class="row margin-bottom">
                    <div class="col-sm-6">
                      <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="col-sm-6">
                          <img class="img-responsive" src="../../dist/img/photo2.png" alt="Photo">
                          <br>
                          <img class="img-responsive" src="../../dist/img/photo3.jpg" alt="Photo">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                          <img class="img-responsive" src="../../dist/img/photo4.jpg" alt="Photo">
                          <br>
                          <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

<!--                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li>
                  </ul>

                  <input class="form-control input-sm" type="text" placeholder="Type a comment">-->
                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-red">
                          10 Sep. 2018
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-comments bg-purple"></i>

                    <div class="timeline-item">
<!--                      <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>-->

                      <h3 class="timeline-header"><a href="#">PostVenta</a> Comento este perfil</h3>

                      <div class="timeline-body">
                        Pasajero solicito cambio de asiento
                        de pasillo a ventana y comida vegetariana
                      </div>
                      
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li class="time-label">
                        <span class="bg-red">
                          12 Sep. 2018
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-comments bg-purple"></i>

                    <div class="timeline-item">
                      <!--<span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>-->

                      <h3 class="timeline-header"><a href="#">PostVenta</a> Comento este perfil</h3>

                      <div class="timeline-body">
                        Se envio prechequeo a asistente por peticion
                        del pasajero
                        
                      </div>
                      
                    </div>
                  </li>
                  <!-- END timeline item -->
                  
                  
                  <!-- timeline item -->
                  <li class="time-label">
                        <span class="bg-red">
                          17 Sep. 2018
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-comments bg-purple"></i>

                    <div class="timeline-item">
                      <!--<span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>-->

                      <h3 class="timeline-header"><a href="#">PostVenta</a> Comento este perfil</h3>

                      <div class="timeline-body">
                        Pasajero solicito actualizacion de viajero frecuente
                        AV #q48723847
                        
                      </div>
                      
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                  
                </ul>
<!--                <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li>
                </ul>
                -->
                <form role="form">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Insertar comentario</label>
                      <input class="form-control input-sm" type="text" placeholder="Type a comment">
                    </div>
                    
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Guardar Comentario</button>
                  </div>
                </form>
                
                
                
                
              </div>
              <!-- /.tab-pane -->

              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

