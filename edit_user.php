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
    if(isset($_POST['submitUser']) && $_GET['id'] > 0)
    {
        $username = $_POST['name'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $kuser = $_POST['kindUser'];

        if($username != "" && $password != "" && $cpassword != "" && $kuser != "")
        {
          $ifUserExist = RecCount("users", "user_name = '".$username."' and id_kind_user = ".$kuser." and id_user != ".$_GET['id']);
          if($ifUserExist > 0)
          {
            $message = '<div class="alert alert-danger">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>User already exist!</strong>
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
                              "id_kind_user" => $kuser
                             );
              UpdateRec("users", "id_user = ".$_GET['id'], $arrVal);

              if($_GET['id'] > 0)
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
                                          $getUser = GetRecord("users", "id_user = ".$_GET['id']) ;
                                          $getTableNumber = GetRecord("`table`", "id_user = ".$_GET['id']) ;
                                          $tableNumber = (isset($getTableNumber['number_table'])) ? $getTableNumber['number_table'] : '';
                                    ?>  
                                    <!-- BEGIN FORM-->
                                    <form data-toggle="validator" role="form" action="edit_user.php?id=<?php echo $_GET['id']?>" method="post" enctype="multipart/form-data">

                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="control-label">Nombre de usuario</label>
                                                <input type="text" class="form-control" value="<?php echo $getUser['user_name']?>" name="name" placeholder="Nombre de usuario" required>
                                                <!--<span class="help-block"> A block of help text. </span>-->
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Password</label>
                                                <input type="password" name="password" value="<?php echo $getUser['password']?>" class="form-control" placeholder="Password" required>
                                                <!--<span class="help-block"> A block of help text. </span>-->
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Repetir el password</label>
                                                <input type="password" name="cpassword" value="<?php echo $getUser['password']?>" class="form-control" placeholder="Repetir password" required>
                                                <!--<span class="help-block"> A block of help text. </span>-->
                                            </div>
                                            <?php
                                              //$dispNon = ($getUser['id_kind_user'] == 1) ? 'disabled' : '';
                                            ?>
                                            <div class="form-group">
                                                <label class="control-label">Tipo de usuario</label>
                                                <div class="input-group">

                                                    <select class="form-control"  name="kindUser" required="required" onChange="mostrar(this.value);">
                                                      <option value="">Seleccionar tipo de usuario</option>
                                                      <?PHP
                                                      $arrKindMeetings = GetRecords("Select * from kind_user");
                                                      foreach ($arrKindMeetings as $key => $value) {
                                                        $kinId = $value['id_kind_user'];
                                                        $kinDesc = $value['description'];
                                                        $mType = ($getUser['id_kind_user'] ==  $kinId) ? 'selected' : '';
                                                      ?>
                                                      <option value="<?php echo $kinId?>" <?php echo $mType?>><?php echo $kinDesc?></option>
                                                      <?php
                                                  }
                                                      ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                              $dispNon = ($getUser['id_kind_user'] == 1) ? 'block' : 'none';
                                            ?>
                                            <div class="form-group" id="staff" style="display: <?php echo $dispNon?>;">
                                                <label class="control-label">Numero de mesa</label>
                                                <div class="input-group">
                                                    <input type="number" name="tablenumber" required="required" class="form-control" value="<?php echo $tableNumber?>" placeholder="Numero de mesa">
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
          
