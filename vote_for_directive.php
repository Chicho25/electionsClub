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
  $nVoteStart = RecCount("voter_stat", "number_table = ".$getNumberTable['number_table']." and number_control = ".$_SESSION['USER_CONTROLVAL']." and stat > 3");

  if($getElection > 0)
  {

    if($nVoteStart > 0)
    {
      header("location:vote_for_admision.php");
      exit;
    }
  }
  ?>

  <script type="text/javascript">
     function selectCandidate(id)
    {


      $('#candidate'+id).click();
      //return;
      //e.stopPropagation();
      //e.preventDefault();

    }

    function showVotBg(clk, id)
    {
     if(clk == true)
     {
        $('#tile-cand-'+id).addClass('votebg');
     }
     else
        $('#tile-cand-'+id).removeClass('votebg');
    }
    function updateModel()
    {
      var totCandidates = $('.totalCandidates').val();
      var html = '<h1>Junta Directiva</h1>';
      var ifSelecteCandidate = 0;
      for(var i=1; i<=totCandidates; i++)
      {
        if($('#candidate'+i).is(':checked') == true)
        {
          var cname = $('#hdncandname-'+i).val();
          html+=cname+'<br>';
          ifSelecteCandidate++;
        }
      }
      if(ifSelecteCandidate > 1)
      {
        $('#btnContinue').show();
        $('.modal-body .portlet-body .tiles').html(html);
        /*alert("Maximum limit for Junta Directive candidate is 1");
        $('#btnContinue').hide();*/
      }
      else
        $('#btnContinue').show();
        $('.modal-body .portlet-body .tiles').html(html);
    }
  </script>
           <!-- BEGIN CONTENT -->

                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->
                    <div class="search-page search-content-2" style="margin-top:20px;">
                    <div class="row">
                            <div class="col-md-12">
                                <div class="search-container ">
                                          <form class="" action="vote_for_admision.php" method="post" id="frmForm">
                                          <div class="portlet light bordered">
                                              <div class="portlet-title">
                                                  <div class="caption">
                                                      <?php $nCandidate = RecCount("candidates", "id_meeting = 2 and stat = 1")?>
                                                      <h1 style="color:#ad864f;">Junta Directiva</h1>
                                                      <span class="caption-subject font-sharp sbold" style="color:#ad864f;">Papeleta de votación. Marque su(s) candidato(s) haciendo click sobre la foto..... </span>

                                                      <span> Cantidad de candidatos: <?php echo $nCandidate?></samp>
                                                  </div>

                                              </div>

                                              <div class="portlet-body">
                                                  <div class="tiles">
                                                    <?php
                                                      $arrCandidate = GetRecords("SELECT * FROM candidates where id_meeting = 2 and stat = 1 order by name");
                                                      $i = 1;
                                                      $cnt=0;
                                                      foreach ($arrCandidate as $key => $value) {
                                                        $id = $value['id_candidate'];
                                                        ?>
                                                        <input type="hidden" name="hdncand-<?php echo $i;?>" value="<?php echo $id?>">
                                                        <input type="hidden" id="hdncandname-<?php echo $i;?>" value="<?php echo $value['name']." ".$value['last_name']?>">
                                                      <div class="tile double bg-blue-madison" style="z-index:10" id="tile-cand-<?php echo $i?>" onclick="selectCandidate(<?php echo $i?>)" ondblclick="this.preventDefault();">
                                                          <div class="tile-body">
                                                              <img src="<?php echo $value['image']; ?>" alt="">
                                                              <h3><?php echo $value['name']; ?></h3>
                                                              <p style="padding-top:5px;" class="voteparag">
                                                                <input type='checkbox' class="chkdts" onclick="showVotBg(this.checked, <?php echo $i;?>)" name="candidate<?php echo $i;?>" id="candidate<?php echo $i;?>" >
                                                              </p>
                                                          </div>
                                                          <div class="tile-object">
                                                              <div class="name"> <?php echo $value['last_name']?> </div>
                                                              <div class="number"> <?php echo date("d M Y", strtotime($value['date_registration']))?> </div>
                                                          </div>
                                                      </div>
                                                      <?php
                                                        $i++;
                                                        $cnt++;
                                                      } ?>
                                                      <input type='hidden' value="<?php echo $cnt?>" class="totalCandidates">
                                                      <div class="tile-body" style="width:300px; left:50%; margin-left:-150px; position:relative; height:100px;">

                                                        <button class="btn uppercase bold" type="submit" onclick='updateModel()' data-target="#full-width" data-toggle="modal" style="background-color:#ad864f; color:#FFF; width:300px;">Votar</button>


                                                      </div>


                                                  </div>
                                                  </form>
                                              </div>
                                              <div id="full-width" class="modal container fade" tabindex="-1">
                                                  <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                      <h4 class="modal-title">Validar selección</h4>
                                                  </div>
                                                  <div class="modal-body">
                                                    <div class="portlet-body">
                                                        <div class="tiles">

                                                          </div>
                                                          <h3 style="color:red;">Si desea modificar su voto, presione Volver. Para seguir con la votación, presione Continuar.</h3>
                                                    </div>
                                                  </div>
                                                  <div class="modal-footer">

                                                        <button type="button" data-dismiss="modal" class="btn btn-outline dark">Volver </button>
                                                        <button type="submit" id="btnContinue" form="frmForm" onclick="this.form.submit()" class="btn yellow">Continuar</button>


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
