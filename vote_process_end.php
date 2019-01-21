  <?php
  ob_start();
  $hideLeft = true;
  include("include/config.php");
  include("include/defs.php");
  include("header_super_admin.php");
  $loggdUType = current_user_type();

  if($loggdUType == 1)
  {

  }
  else
  {
    header("location:logout.php");
    exit;
  }

  $getElection = RecCount("choice", "stat = 1");
  $getNumberTable = GetRecord("`table`", "id_user = ".$_SESSION['USER_ID']);
  $nVoteStart = RecCount("voter_stat", "number_table = ".$getNumberTable['number_table']." and number_control = ".$_SESSION['USER_CONTROLVAL']." and stat = 4");
  $nVoteEnd = RecCount("voter_stat", "number_table = ".$getNumberTable['number_table']." and number_control = ".$_SESSION['USER_CONTROLVAL']." and stat = 6");

  if($getElection > 0)
  {

    if($nVoteStart > 0)
    {
      $arrVStat = array("stat" => 6);
      UpdateRec("voter_stat", "number_table = ".$getNumberTable['number_table']." and number_control = ".$_SESSION['USER_CONTROLVAL'], $arrVStat);
    }
  }
  if(count($_POST) > 0 && $getElection > 0)
  {
      $getRec = GetRecord("choice", "stat = 1");
      $ifCandidate = 1;
      foreach ($_POST as $key => $value) {
        $expId = explode("candidate", $key);
        if(count($expId) > 1)
        {
          $ifCandidate = 2;
          $id  = $expId[1];
          $candidateId = $_POST['hdncand-'.$id];
          $arrVal =  array(
                            'number_control' => $_SESSION['USER_CONTROLVAL'],
                            'id_kind_meeting' => 1,
                            'id_candidate' => $candidateId,
                            'stat' => 4,
                            'id_choice' => $getRec['id_choice'],
                            'id_table' => $getNumberTable['number_table'],
                          );
          if($nVoteEnd == 0)
            InsertRec("result", $arrVal);
        }
      }

      if($ifCandidate == 1)
      {
          foreach ($_POST as $key => $value)
          {

              if($value > 0)
              {
                $candidateId = $value;
                $arrVal =  array(
                            'number_control' => $_SESSION['USER_CONTROLVAL'],
                            'id_kind_meeting' => 1,
                            'id_candidate' => $candidateId,
                            'stat' => 7,
                            'id_choice' => $getRec['id_choice'],
                            'id_table' => $getNumberTable['number_table'],
                          );
                if($nVoteEnd == 0)
                  InsertRec("result", $arrVal);
              }

          }
      }
  }

  ?>

           <!-- BEGIN CONTENT -->

                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->
                    <div class="search-page search-content-2" style="margin-top:20px;">
                    <div class="row">
                            <div class="col-md-12">
                                <div class="search-container ">

                                          <div class="portlet light bordered">
                                              <div class="portlet-title">
                                                  <div class="caption">
                                                      <h1 style="color:#ad864f;">Fin del proceso de votacion</h1>
                                                  </div>

                                              </div>

                                              <div class="portlet-body">
                                                  <div class="tiles">
                                                    <div class="tile-body" style="width:600px; left:50%; margin-left:-300px; position:relative; text-align: center;">

                                                        <h1> Gracias por participar en las elecciones  del Club Unión.</h1>

                                                        <form class="" action="logout.php" method="post">
                                                          <button class="btn uppercase bold" type="submit" style="background-color:#ad864f; color:#FFF; width:300px;">Volver a la página de inicio</button>
                                                          <!-- Cambios para el numero de control -->
                                                          <!-- Se pasaran dos parametros para llevar un numero consecutivo semi automatico en control -->
                                                          <?php /* <input type="hidden" name="control" value="<?php echo $_SESSION['USER_CONTROLVAL']; ?>">
                                                          <input type="hidden" name="mesa" value="<?php echo $getNumberTable['number_table']; ?>"> */ ?>
                                                          <!-- modificacion del archivo logout, destruyendo las sessiones -->
                                                          <?php
                                                          	/* session_start();
                                                          	session_destroy(); */
                                                          ?>
                                                          <!-- Fin de cambios -->
                                                        </form>

                                                      </div>


                                                  </div>

                                              </div>

                                          </div>
                                          </form>
                                      <!-- END CONTENT BODY -->
                                  <!-- fin -->
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
          <!-- END CONTENT -->

  <?php include("footer_super_admin.php"); ?>
  <?php /* agregado 01/04/2017 */ ?>
  <?php header('Location: logout.php'); ?>
