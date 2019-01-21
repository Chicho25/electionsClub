  <?php
    ob_start();
    include("include/config.php");
    include("include/defs.php");
    $loggdUType = current_user_type();
    include("headrecarga.php");

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
    else
    {

    }

    $message = "";
    $election = false;
    if(isset($_POST['electionStart']))
    {
        $getElection = GetRecord("choice", "stat = 1");
        if(isset($getElection['id_choice']))
            $election = true;
        else
        {
            $arrVal = array(
                              "date_hour_star" => date("Y-m-d"),
                              "stat"    => 1
                           );
            InsertRec("choice", $arrVal);
        }

    }

  ?>

           <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->
                    <div class="search-page search-content-2" style="margin-top:20px;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="search-container ">
                                    <ul>
                                        <li class="search-item-header">
                                            <div class="row">
                                                <div class="col-sm-9 col-xs-8">
                                                    <h3>Panel de control del sistema de Elecciones</h3>
                                                </div>
                                                <div class="col-sm-3 col-xs-4">
                                                    <div class="form-group">
                                                        <!--<select class="bs-select form-control">
                                                            <option>Seleccionar</option>
                                                            <option>Junta directiva</option>
                                                            <option>Junta de admision</option>
                                                        </select>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="">
                                          <div style="width:400px; left:50%; margin-left:-200px; position:relative; font-size:40px; text-align:center; margin-top:20px;">
                                            Cantidad de votos hasta el momento :
                                          </div>
                                          <div class="tile-body" style="width:300px; left:50%; margin-left:-150px; position:relative; font-size:350px; text-align:center;">

                                            <?php
                                              $getElection = GetRecord("choice", "stat = 1");
                                              if(isset($getElection['id_choice']))
                                              {
                                                $strQuery = "select count(*) as contar from voter_stat where stat = 6";
                                                $nResult = MySQLQuery($strQuery);
                                                $getTotVotes = mysql_fetch_array($nResult);
                                                $nTotVotes = $getTotVotes['contar'];
                                                echo $nTotVotes;
                                              }
                                              else
                                                echo "00";
                                            ?>
                                          </div>
                                          <?php
                                          if($loggdUType == 3){
                                          ?>
                                          <form class="" action="reporte_fin_eleccion.php" method="post">
                                            <div class="tile-body" style="width:300px; left:50%; margin-left:-150px; position:relative;">
                                              <button class="btn uppercase bold" type="submit" style="background-color:#ad864f; color:#FFF; width:300px;">Finalizar Elecciones</button>
                                            </div>
                                          </form>

                                          <?php }?>
                                    </div>

                                    <?php /* <div id="full-width" class="modal container fade" tabindex="-1">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title">Resultados</h4>
                                        </div>
                                        <div class="modal-body">
                                          <div class="portlet-body">
                                              <div class="tiles">

                                                <h1>Junta Directiva</h1>
                                                <?php
                                                $arrCandidate = GetRecords("SELECT * FROM candidates where id_meeting = 2 and stat = 1");
                                                  foreach ($arrCandidate as $key => $value) {
                                                  $strQuery = "Select count(*) as totalFavor from result
                                                               inner join choice on choice.id_choice = result.id_choice
                                                               where id_candidate = ".$value['id_candidate']." and choice.stat = 1";
                                                  $nResult = MySQLQuery($strQuery);
                                                  $nCandidateVotes = mysql_fetch_array($nResult);

                                                  echo '<b>'.$value['name'].' '.$value['last_name'].'</b> cantidad de votos a su favor: <b>'.$nCandidateVotes['totalFavor'].'</b><br>';
                                                } ?>

                                                </div>
                                                <h1>Junta de Admisión</h1>
                                                <?php
                                                $arrCandidate = GetRecords("SELECT * FROM candidates where id_meeting = 1 and stat = 1");
                                                  foreach ($arrCandidate as $key => $value) {
                                                  $strQuery = "Select count(*) as totalFavor from result
                                                               inner join choice on choice.id_choice = result.id_choice
                                                               where id_candidate = ".$value['id_candidate']." and choice.stat = 1";
                                                  $nResult = MySQLQuery($strQuery);
                                                  $nCandidateVotes = mysql_fetch_array($nResult);

                                                  echo '<b>'.$value['name'].' '.$value['last_name'].'</b> cantidad de votos a su favor: <b>'.$nCandidateVotes['totalFavor'].'</b><br>';
                                                } ?>
                                          </div>
                                        </div>
                                        <div class="modal-footer">

                                            <form class="" action="restart_election.php" method="post">
                                              <button type="submit" onclick="javascript:window.print();" class="btn yellow">Imprimir resultados</button>
                                            </form>

                                        </div>
                                    </div> */ ?>
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
