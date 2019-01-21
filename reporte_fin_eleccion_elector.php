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

  // $strQuery = "Select sum(number_table) as nooftables from voter_stat
  //              where number_control IN
  //               (
  //                 select distinct number_control from result
  //                 inner join choice on choice.id_choice = result.id_choice
  //                 where choice.stat = 1
  //               )
  //              ";
  $strQuery = "Select count(*) as nooftables from users
               where id_kind_user = 1 and stat = 1
               ";
  $nResult = MySQLQuery($strQuery);
  $nRecNumberOfTable = mysql_fetch_array($nResult);
  $nooftables = $nRecNumberOfTable['nooftables'];

  $getElection = GetRecord("choice", "stat = 1");
  $strQuery = "select count(*) as contar from voter_stat";
  $nResult = MySQLQuery($strQuery);
  $nRecTotDeVotes = mysql_fetch_array($nResult);
  $nTotDeVotes = $nRecTotDeVotes['contar'];
?>

         <!-- BEGIN CONTENT -->
          <div class="page-content-wrapper">
                                <!-- BEGIN CONTENT BODY -->
                                <div class="page-content">
                                    <!-- BEGIN PAGE HEAD-->
                                    <div class="page-head">
                                        <!-- BEGIN PAGE TITLE -->
                                        <div class="page-title">
                                            <!--<h1>Reporte de elecciones

                                            </h1>-->
                                        </div>
                                        <!-- END PAGE TITLE -->
                                        <!-- BEGIN PAGE TOOLBAR -->
                                        <div class="page-toolbar">

                                            <!-- BEGIN THEME PANEL -->

                                            <!-- END THEME PANEL -->
                                        </div>
                                        <!-- END PAGE TOOLBAR -->
                                    </div>
                                    <!-- END PAGE HEAD-->
                                    <!-- BEGIN PAGE BREADCRUMB -->

                                    <!-- END PAGE BREADCRUMB -->
                                    <!-- BEGIN PAGE BASE CONTENT -->
                                    <div class="invoice-content-2 bordered">
                                        <div class="row invoice-head">
                                            <div class="col-md-7 col-xs-6">
                                                <div class="invoice-logo">

                                                    <h3 class="uppercase">Imprimir</h3>
                                                </div>
                                            </div>
                                            <!--<div class="col-md-5 col-xs-6">
                                                <div class="company-address">
                                                    <span class="bold uppercase">Metronic Inc.</span>
                                                    <br/> 25, Lorem Lis Street, Orange C
                                                    <br/> California, US
                                                    <br/>
                                                    <span class="bold">T</span> 1800 123 456
                                                    <br/>
                                                    <span class="bold">E</span> support@keenthemes.com
                                                    <br/>
                                                    <span class="bold">W</span> www.keenthemes.com </div>
                                            </div>-->
                                        </div>
                                        <?php /* ?><div class="row invoice-cust-add">
                                            <div class="col-xs-3">
                                                <h4 class="invoice-title uppercase">Mesas habilitadas</h4>
                                                <p class="invoice-desc"><?php echo $nooftables ?></p>
                                            </div>
                                            <div class="col-xs-3">
                                                <h4 class="invoice-title uppercase">Fecha</h4>
                                                <p class="invoice-desc"><?php echo date("M d, Y")?></p>
                                            </div>
                                            <div class="col-xs-6">
                                                <h4 class="invoice-title uppercase">Total de votos en la jornada</h4>
                                                <p class="invoice-desc inv-address"><?php echo $nTotDeVotes?></p>
                                            </div>
                                        </div><?php */ ?>
                                        <div class="row invoice-body">
                                            <div class="col-xs-12 table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th class="invoice-title uppercase"></th>
                                                            <th class="invoice-title uppercase text-center"></th>
                                                            <th class="invoice-title uppercase text-center"></th>
                                                            <th class="invoice-title uppercase text-center"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>

                                                                <table style="border-collapse: separate; border-spacing: 15px;" id="algo">
                                                                        <tr>
                                                                            <td colspan="4"><h3>Junta Direcctiva </h3></td>
                                                                        </tr>

                                                                <?php

                                                                  $arrCandidate = GetRecords("select
                                                                                              c.name,
                                                                                              c.last_name,
                                                                                              (select sum(1) from result rr where rr.id_candidate = r.id_candidate and number_control = '".$_SESSION["USER_CONTROLVAL"]."' and id_table = '".$getNumberTable['number_table']."') as suma_votos
                                                                                              from
                                                                                              candidates c left join result r on c.id_candidate = r.id_candidate
                                                                                              where
                                                                                              c.id_meeting = 2
                                                                                              group by
                                                                                              c.name,
                                                                                              c.last_name,
                                                                                              (select sum(1) from result rr where rr.id_candidate = r.id_candidate and number_control = '".$_SESSION["USER_CONTROLVAL"]."' and id_table = '".$getNumberTable['number_table']."')
                                                                                              order by
                                                                                              (select sum(1) from result rr where rr.id_candidate = r.id_candidate and number_control = '".$_SESSION["USER_CONTROLVAL"]."' and id_table = '".$getNumberTable['number_table']."') desc");

                                                                  foreach ($arrCandidate as $key => $value) {

                                                                  $cantidad = $value['suma_votos'];
                                                                  if($cantidad == '' || is_null($cantidad) == true){
                                                                    $cantidad = 0;
                                                                  }
                                                                  if($cantidad == 0){
                                                                    continue;
                                                                  }
                                                                  echo '<tr>
                                                                          <td class="">'.$value['name'].'</td>
                                                                          <td class=""><b>'.$value['last_name'].'</b></td>
                                                                          <td class="">Voto: </td>
                                                                          <td class=""><b>'.$cantidad.'</b></td>
                                                                        </tr>';
                                                                 }  ?>
                                                               </table>



                                                            </td>
                                                            <td class="text-center sbold"></td>
                                                            <td class="text-center sbold"></td>
                                                            <td class="text-center sbold"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>

                                                              <table style="border-collapse: separate; border-spacing: 15px;" id="algo">
                                                                      <tr>
                                                                          <td colspan="4"><h3>Junta de Admision</h3></td>
                                                                      </tr>
                                                              <?php
                                                              $arrCandidate = GetRecords("select
                                                                                          c.name,
                                                                                          c.last_name,
                                                                                          (select sum(1) from result rr where rr.id_candidate = r.id_candidate and number_control = '".$_SESSION["USER_CONTROLVAL"]."' and id_table = '".$getNumberTable['number_table']."') as suma_votos
                                                                                          from
                                                                                          candidates c left join result r on c.id_candidate = r.id_candidate
                                                                                          where
                                                                                          c.id_meeting = 1
                                                                                          group by
                                                                                          c.name,
                                                                                          c.last_name,
                                                                                          (select sum(1) from result rr where rr.id_candidate = r.id_candidate and number_control = '".$_SESSION["USER_CONTROLVAL"]."' and id_table = '".$getNumberTable['number_table']."')
                                                                                          order by
                                                                                          (select sum(1) from result rr where rr.id_candidate = r.id_candidate and number_control = '".$_SESSION["USER_CONTROLVAL"]."' and id_table = '".$getNumberTable['number_table']."') desc");
                                                                foreach ($arrCandidate as $key => $value) {

                                                                $cantidad = $value['suma_votos'];
                                                                if($cantidad == '' || is_null($cantidad) == true){
                                                                  $cantidad = 0;
                                                                }
                                                                if($cantidad == 0){
                                                                  continue;
                                                                }
                                                                $char += 1;
                                                                echo '<tr>
                                                                        <td class="">'.$value['name'].'</td>
                                                                        <td class=""><b>'.$value['last_name'].'</b></td>
                                                                        <td class="">Voto: </td>
                                                                        <td class=""><b>'.$cantidad.'</b></td>
                                                                      </tr>';
                                                                if($char == 20){ echo '<tr>
                                                                                        <td class="" colspan="4">
                                                                                          <div style="font-size:30px;">________________________________</div><HR>
                                                                                        </td>
                                                                                      </tr>';}
                                                              } ?>
                                                            </table>
                                                            </td>
                                                            <td class="text-center sbold"></td>
                                                            <td class="text-center sbold"></td>
                                                            <td class="text-center sbold"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!--<div class="row invoice-subtotal">
                                            <div class="col-xs-3">
                                                <h2 class="invoice-title uppercase">Subtotal</h2>
                                                <p class="invoice-desc">23,800$</p>
                                            </div>
                                            <div class="col-xs-3">
                                                <h2 class="invoice-title uppercase">Tax (0%)</h2>
                                                <p class="invoice-desc">0$</p>
                                            </div>
                                            <div class="col-xs-6">
                                                <h2 class="invoice-title uppercase">Total</h2>
                                                <p class="invoice-desc grand-total">23,800$</p>
                                            </div>
                                        </div>-->
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <a class="btn btn-lg yellow-haze hidden-print uppercase print-btn" target="_blank" onclick="javascript:window.print();" >Imprimir</a>
                                                <a href="vote_process_end.php" class="btn btn-lg yellow-haze hidden-print uppercase print-btn"  >Continuar</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END PAGE BASE CONTENT -->
                                </div>
                                <!-- END CONTENT BODY -->
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
