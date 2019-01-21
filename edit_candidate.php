  <?php 

    ob_start();
    include("include/config.php"); 
    include("include/defs.php"); 
    $loggdUType = current_user_type();
    include("header_super_admin.php"); 

    if($loggdUType == 1)
    {
        header("location:logout.php"); 
        exit; 
    }
    $message = "";
    if(isset($_POST['submitCandidate']) && $_GET['id'] > 0)
    {
        $cname = $_POST['cname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $kmeeting = $_POST['kindMeetings'];

        if($cname != "" && $lname != "" && $email != "" && $kmeeting != "")
        {
          $arrVal = array(
                          "name" => $cname,
                          "last_name" => $lname,
                          "email" => $email,
                          "id_meeting" => $kmeeting
                         );
          UpdateRec("candidates", "id_candidate=".$_GET['id'], $arrVal);
          if($_GET['id'] > 0)
          {
              
              if(isset($_FILES['photo']) && $_FILES['photo']['tmp_name'] != "")
              {
                  $target_dir = "imagenes/";
                  $target_file = $target_dir . basename($_FILES["photo"]["name"]);
                  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                  $filename = $target_dir . $_GET['id'].".".$imageFileType;
                  $filenameThumb = $target_dir . $_GET['id']."_thumb.".$imageFileType;
                  if (move_uploaded_file($_FILES["photo"]["tmp_name"], $filename)) 
                  {
                      makeThumbnails($target_dir, $imageFileType, $_GET['id']);
                      UpdateRec("candidates", "id_candidate = ".$_GET['id'], array("image" => $filenameThumb));
                      $message = '<div class="alert alert-success">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong>
                      </div>';
                  }
                  else
                  {
                    $message = '<div class="alert alert-danger">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Error!</strong>
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
                                        <i class="fa fa-user-plus"></i>Registro de candidato </div>
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
                                           $getCandidate = GetRecord("candidates", "id_candidate = ".$_GET['id']) ;
                                    ?>  
                                    <!-- BEGIN FORM-->
                                    <form data-toggle="validator" role="form" action="edit_candidate.php?id=<?php echo $_GET['id']?>" method="post" enctype="multipart/form-data">

                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="control-label">Nombre</label>
                                                <input type="text" name="cname" value="<?php echo $getCandidate['name']?>" class="form-control" placeholder="Nombre" required>
                                                <!--<span class="help-block"> A block of help text. </span>-->
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Apellido</label>
                                                <input type="text" value="<?php echo $getCandidate['last_name']?>"  class="form-control" name="lname" placeholder="Apellido" required>
                                                <!--<span class="help-block"> A block of help text. </span>-->
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Email</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </span>
                                                    <input type="email" name="email" value="<?php echo $getCandidate['email']?>"  class="form-control" placeholder="Email" required> </div>
                                            </div>
                                            <div class="form-group">
                                                
                                                <div style="width:204px;
                                                            height:154px;
                                                            background-color: #cccccc;
                                                            border: solid 2px gray;
                                                            margin: 5px;">
                                                    <img id="img" src="<?php echo $getCandidate['image']?>" style='width:200px; height:150px;' " alt="your image" />
                                                </div>
                                                <script type="text/javascript">
                                                 
                                                </script>
                                                <label class="btn yellow btn-file">
                                                  Cargar Foto <input type="file" name="photo" style="display: none;" onchange="readURL(this);">
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label caption"><b>Tipo de Eleccion a participar</b></label>
                                                <div class="input-icon right">
                                                </div>
                                            </div>
                                            <?php
                                              $arrKindMeetings = GetRecords("Select * from kind_meeting");
                                              foreach ($arrKindMeetings as $key => $value) {
                                                $kinId = $value['id_kind_meeting'];
                                                $kinDesc = $value['description'];
                                                $mType = ($getCandidate['id_meeting'] ==  $kinId) ? 'checked' : '';
                                              ?>
                                                  <div class="form-group">
                                                      <label class="control-label">Junta <?php echo $kinDesc;?>
                                                      <input type="radio" <?php echo $mType?> name="kindMeetings" value="<?php echo $kinId?>" class="form-control " required> </label>
                                                  </div>
                                              <?php  
                                              }
                                            ?>
                                            
                                        </div>
                                        <div class="form-actions">
                                            <div class="btn-set pull-left">


                                            </div>
                                            <div class="btn-set pull-right">
                                                <button type="submit" name="submitCandidate" class="btn yellow">Enviar</button>
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

    function shwoURL(input)
    {
      $('#img').show().attr('src', input);
    }
                                                    

  </script>
  <?php include("footer_super_admin.php"); ?>          
          
