  <?php 
    ob_start();
    include("include/config.php"); 
    include("include/defs.php"); 
    $loggdUType = current_user_type();
    include("header_super_admin.php"); 

    if(!is_user_logged_in())
    {
      header("location:logout.php"); 
      exit;
    }
    
    if($loggdUType == 1)
    {
        header("location:logout.php"); 
        exit; 
    }
    $message = "";
    
    if(isset($_POST) && count($_POST) > 0)
    {
      foreach ($_POST as $key => $value) {
        $expId = explode("-", $key);
        $id = $expId[1];
        
        if(isset($_POST['actcandidate-'.$id]) && $_POST['actcandidate-'.$id] == "on")
          $stat = 1;  
        else
          $stat = 2; 

        UpdateRec("candidates", "id_candidate = ".$id, array("stat" => $stat));
      }
    }

    if(isset($_GET['id']) && $_GET['id'] > 0)
    {
        $getCandidate = GetRecord("candidates", "id_candidate = ".$_GET['id']);
        unlink($getCandidate['image']);
        DeleteRec("candidates", "id_candidate = ".$_GET['id']);
    }
  ?>
           <script type="text/javascript">
             function viewCandidate(name, lname, email, image, type)
             {
                var fullname = name + ' '+lname;
                $('#model-name').html(fullname);
                $('#model-email').html(email);
                $('#model-image').attr("src",image);
                $('#model-meeting').html(type);
             }
           </script>
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
                          <div class="col-md-12 col-sm-12">
                              <div class="portlet light bordered">
                                  <div class="portlet-title tabbable-line">
                                      <div class="caption">
                                          <i class="icon-bubbles font-yellow"></i>
                                          <span class="caption-subject font-yellow bold uppercase" style="color:yellow;">Postulantes</span>
                                      </div>
                                      <ul class="nav nav-tabs">
                                          <li class="active">
                                              <a href="#portlet_comments_1" data-toggle="tab"> Admision  </a>
                                          </li>
                                          <li>
                                              <a href="#portlet_comments_2" data-toggle="tab"> Directiva </a>
                                          </li>
                                      </ul>
                                  </div>
                                  <div class="portlet-body">
                                      <div class="tab-content">
                                          <div class="tab-pane active" id="portlet_comments_1">
                                              <!-- BEGIN: Comments -->
                                              <form id="frmadmission"  role="form" action="candidate.php" method="post">
                                              
                                              <div class="mt-comments">
                                                  <?php 
                                                  $arrCandidate = GetRecords("SELECT * FROM candidates where id_meeting = 1");
                                                  foreach ($arrCandidate as $key => $value) {
                                                    $candidatStatus = ($value['stat'] == 1) ? 'checked' : '';
                                                  //for($i=0;$i<=19;$i++){ ?>
                                                  <input type="hidden" name="candidate-<?php echo $value['id_candidate']?>" value=''>
                                                  <div class="mt-comment">
                                                      <div class="mt-comment-img">
                                                          <img src="<?php echo $value['image']; ?>" alt="" width="40"> </div>
                                                      <div class="mt-comment-body">
                                                          <div class="mt-comment-info">
                                                              <span class="mt-comment-author"><?php echo $value['name']; ?></span>
                                                              <span class="mt-comment-date"><?php echo $value['date_registration']; ?></span>
                                                          </div>
                                                          <!--<div class="mt-comment-text"> Descripcion del postulante. </div>-->
                                                          <div class="mt-comment-details">
                                                              <span class="mt-comment-status mt-comment-status-rejected">
                                                                <input type="checkbox" name="actcandidate-<?php echo $value['id_candidate']?>" <?php echo $candidatStatus?> class="make-switch"  data-on-color="warning" data-off-color="danger">
                                                              </span>
                                                              <ul class="mt-comment-actions">
                                                                  <li>
                                                                      <a href="edit_candidate.php?id=<?php echo $value['id_candidate']?>">Editar</a>
                                                                  </li>
                                                                  <li>
                                                                      <a onclick='viewCandidate("<?php echo $value['name']?>", "<?php echo $value['last_name']?>", "<?php echo $value['email']?>", "<?php echo $value['image']?>", "Junta Directiva")' data-target="#full-width" data-toggle="modal">Ver</a>
                                                                  </li>
                                                                  <!--<li>
                                                                      <a href="#">Borrar</a>
                                                                  </li>-->
                                                              </ul>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <?php } ?>
                                                  <div class="tile-body" style="width:300px; left:50%; margin-left:-150px; position:relative;">

                                                    <button class="btn uppercase bold" form="frmadmission" type="submit"  style="background-color:#ad864f; color:#FFF; width:300px;">Guardar cambios</button>


                                                  </div>
                                              </div>
                                              <!-- END: Comments -->
                                              </form>
                                          </div>
                                          <div class="tab-pane" id="portlet_comments_2">
                                              <!-- BEGIN: Comments -->
                                              <form id="frmdirective"  role="form" action="candidate.php" method="post">
                                              <div class="mt-comments">
                                                  <?php
                                                  $arrCandidate = GetRecords("SELECT * FROM candidates where id_meeting = 2");
                                                  foreach ($arrCandidate as $key => $value) {
                                                    $candidatStatus = ($value['stat'] == 1) ? 'checked' : '';
                                                  //for($i=0;$i<=19;$i++){ ?>
                                                    <input type="hidden" name="candidate-<?php echo $value['id_candidate']?>" value=''>
                                                  <div class="mt-comment">
                                                      <div class="mt-comment-img">
                                                          <img src="<?php echo $value['image']; ?>" alt="" width="40"> </div>
                                                      <div class="mt-comment-body">
                                                          <div class="mt-comment-info">
                                                              <span class="mt-comment-author"><?php echo $value['name']; ?></span>
                                                              <span class="mt-comment-date"><?php echo $value['date_registration']; ?></span>
                                                          </div>
                                                          <!--<div class="mt-comment-text"> Descripcion del postulante. </div>-->
                                                        <div class="mt-comment-details">
                                                            <span class="mt-comment-status mt-comment-status-rejected">
                                                              <input type="checkbox" name="actcandidate-<?php echo $value['id_candidate']?>" <?php echo $candidatStatus?> class="make-switch"  data-on-color="warning" data-off-color="danger">
                                                            </span>
                                                            <ul class="mt-comment-actions">
                                                                <li>
                                                                    <a href="edit_candidate.php?id=<?php echo $value['id_candidate']?>">Editar</a>
                                                                </li>
                                                                <li>
                                                                    <a onclick='viewCandidate("<?php echo $value['name']?>", "<?php echo $value['last_name']?>", "<?php echo $value['email']?>", "<?php echo $value['image']?>", "Junta Directiva")' data-target="#full-width" data-toggle="modal">Ver</a>
                                                                </li>
                                                                
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                              </div>
                                              <!-- END: Comments -->
                                              <div class="tile-body" style="width:300px; left:50%; margin-left:-150px; position:relative;">

                                                    <button class="btn uppercase bold" type="submit"  form="frmdirective" style="background-color:#ad864f; color:#FFF; width:300px;">Guardar cambios</button>


                                              </div>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                                  <div id="full-width" class="modal container fade" tabindex="-1">
                                      <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                          <h4 class="modal-title">Candidate VER</h4>
                                      </div>
                                      <div class="modal-body">
                                        <div class="portlet-body">
                                            <div class="col-sm-2">
                                                <img id="model-image" src="">
                                            </div>  
                                            <div class="col-sm-4" style="margin-top:-22px">
                                                <div class="title">
                                                  <h2 class="font-yellow" id="model-name"></h>
                                                </div>
                                                <div class="control-label" id="model-email">
                                                  
                                                </div>  
                                                <div class="control-label" id="model-meeting">
                                                  
                                                </div>  
                                                <div style="height:100px;">
                                            </div>
                                            </div>

                                        </div>
                                      </div>
                                     
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
          
