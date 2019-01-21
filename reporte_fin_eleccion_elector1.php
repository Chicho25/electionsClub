<?php
ob_start();
$hideLeft = true;
include("include/config.php");
include("include/defs.php");

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
            { /*
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
                InsertRec("result", $arrVal); */
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

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script type="text/javascript">
        function imprimir() {
            if (window.print) {
                window.print();
            } else {
                alert("La función de impresion no esta soportada por su navegador.");
            }
        }
    </script>
    <script type="text/javascript">
        function redireccionar(){
          window.location="vote_process_end.php";
        }
        setTimeout ("redireccionar()", 0000); //tiempo expresado en milisegundos
    </script>
  </head>
  <body onload="imprimir();">
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
                    $char = 0;
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
  </body>
</html>
