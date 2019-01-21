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
          if($kuser == 1 && $_POST['tablenumber'] == "")
          {
              $message = '<div class="alert alert-danger">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>El número de la tabla no debe estar vacío!</strong>
                  </div>';
          }
          else
          {
              $ifUserExist = RecCount("users", "user_name = '".$username."' and id_kind_user = ".$kuser);
              if($ifUserExist > 0)
              {
                $message = '<div class="alert alert-danger">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Usuario ya existente!</strong>
                  </div>';
              }
              else if($password != $cpassword)
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
                    if($kuser == 1)
                    {
                      $arrVal = array("id_user" => $nRec, "number_table" => $_POST['tablenumber']);

                      InsertRec("`table`", $arrVal);
                    }
                    $message = '<div class="alert alert-success">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Usuario Creado!</strong>
                          </div>';
                  }
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
                                        <i class="fa fa-user-plus"></i>Registro de usuario </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="reload"> </a>
                                        <a href="javascript:;" class="remove"> </a>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <?php
                                          if($message !="")
                                              echo $message;
                                    ?>
                                    <!-- BEGIN FORM-->
                                    <form data-toggle="validator" role="form" action="create_user.php" method="post" enctype="multipart/form-data">

                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="control-label">Nombre de usuario</label>
                                                <input type="text" class="form-control" name="name" placeholder="Nombre de usuario" required>
                                                <!--<span class="help-block"> A block of help text. </span>-->
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Password</label>
                                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                                                <!--<span class="help-block"> A block of help text. </span>-->
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Repetir el password</label>
                                                <input type="password" name="cpassword" class="form-control" placeholder="Repetir password" required>
                                                <!--<span class="help-block"> A block of help text. </span>-->
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Tipo de usuario</label>
                                                <div class="input-group">

                                                    <select class="form-control" name="kindUser" required="required" onChange="mostrar(this.value);">
                                                      <option value="">Seleccionar tipo de usuario</option>
                                                      <?PHP
                                                      $arrKindMeetings = GetRecords("Select * from kind_user");
                                                      foreach ($arrKindMeetings as $key => $value) {
                                                        $kinId = $value['id_kind_user'];
                                                        $kinDesc = $value['description'];
                                                      ?>
                                                      <option value="<?php echo $kinId?>"><?php echo $kinDesc?></option>
                                                      <?php
                                                  }
                                                      ?>
                                                    </select>
                                                  </div>
                                            </div>
                                            <div class="form-group" id="staff" style="display: none;">
                                                <label class="control-label">Numero de mesa</label>
                                                <div class="input-group">
                                                    <input type="number" value="1"  name="tablenumber"  class="form-control" placeholder="Numero de mesa">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-table"></i>
                                                    </span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-actions">
                                            <div class="btn-set pull-left">


                                            </div>
                                            <div class="btn-set pull-right">
                                                <button type="submit" name="submitUser" class="btn yellow">Enviar</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
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
