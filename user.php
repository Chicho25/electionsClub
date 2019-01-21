  <?php 

    ob_start();
    include("include/config.php"); 
    include("include/defs.php"); 
    $loggdUType = current_user_type();
    include("header_super_admin.php"); 

    if($loggdUType != 3)
    {
        header("location:logout.php"); 
        exit; 
    }

    $message = "";
    if(isset($_POST['submitUser']))
    {
        $username = $_POST['name'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $kuser = $_POST['kindUser'];

        if($username != "" && $password != "" && $cpassword != "" && $kuser != "")
        {
          if($password != $cpassword)
          {
            $message = '<div class="alert alert-danger">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Password error!</strong>
              </div>';
          }
          else
          {
              $arrVal = array(
                              "user_name" => $username,
                              "password" => $password,
                              "id_kind_user" => $kuser,
                              "stat" => 1
                             );
              $nRec = InsertRec("users", $arrVal);

              if($nRec > 0)
              {
                $message = '<div class="alert alert-success">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong>
                      </div>';
              }
          }
        }
    }
  ?>
          
           <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->
                    <div class="theme-panel hidden-xs hidden-sm">

                    </div>
                    <div class="row">
                        <div class="col-md-12">

                          <div class="portlet box yellow">
                              <div class="portlet-title">
                                  <div class="caption">
                                      <i class="fa fa-cogs"></i>Todos los usuarios del sistema </div>
                                  <div class="tools">
                                      <a href="javascript:;" class="collapse"> </a>
                                      <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                      <a href="javascript:;" class="reload"> </a>
                                      <a href="javascript:;" class="remove"> </a>
                                  </div>
                              </div>
                              <div class="portlet-body">
                                  <div class="table-responsive">
                                      <table class="table table-striped table-bordered table-hover">
                                          <thead>
                                              <tr>
                                                  <th> # </th>
                                                  <th> Nombre de usuario </th>
                                                  <th> Tipo de usuario </th>
                                                  <th> Mesa </th>
                                                  <th> Status </th>
                                                  <th> Editar </th>

                                              </tr>
                                          </thead>
                                          <tbody>
                                              <?php 
                                                $arrUser = GetRecords("SELECT users.*, stat.description, kind_user.description as usertype FROM users
                                                                       inner join kind_user on kind_user.id_kind_user = users.id_kind_user
                                                                       inner join stat on stat.id_stat = users.stat
                                                                        order by user_name");
                                                $i=1;
                                                foreach ($arrUser as $key => $value) {
                                                  $candidatStatus = ($value['stat'] == 1) ? 'checked' : '';
                                                ?> 
                                              <tr> 
                                                  <td> <?php echo $i?> </td>
                                                  <td> <?php echo $value['user_name']?> </td>
                                                  <td> <?php echo $value['usertype']?> </td>
                                                  <td> - </td>
                                                  <td> <?php echo $value['description']?> </td>
                                                  <td> <button type="button" onclick="window.location='edit_user.php?id=<?php echo $value['id_user']?>';" class="btn yellow btn-outline">Editar</button> </td>

                                              </tr>
                                              <?php
                                                $i++;
                                              }
                                              ?>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>

                        </div>
                    </div>
                  </div>
                </div>    
          <!-- END CONTENT -->
  <script type="text/javascript">
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img').show().attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
  </script>
  <?php include("footer_super_admin.php"); ?>          
          
