<?php
  ob_start();
  include("include/config.php");
  include("include/defs.php");
  $loggdUType = current_user_type();
  include("header_super_admin.php");



  if($loggdUType == 3)
  {
  }
  else
  {
      header("location:logout.php");
      exit;
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
                                            <h1>Reporte de elecciones

                                            </h1>
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

                                                    <h1 class="uppercase">Resultados de las elecciones</h1>
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
                                        <div class="row invoice-cust-add">
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
                                        </div>
                                        <h2>Votos por mesa</h2>
                                        <div class="row invoice-cust-add">
                                        <?php
                                          $arrCandidate = GetRecords("select
                                                                      number_table,
                                                                      (select count(number_table)
                                                                       from
                                                                       voter_stat
                                                                       where
                                                                       voter_stat.number_table = `table`.number_table) as contar
                                                                      from
                                                                      `table`");
                                          /*while($l[]=$arrCandidate->fetch_array());*/

                                          foreach ($arrCandidate as $key => $value) {
                                          echo '<div class="col-xs-1">
                                                 <h4 class="invoice-title uppercase"> Mesa '.$value['number_table'].'</h4>
                                                 <p class="invoice-desc">'.$value['contar'].'</p>
                                                 </div>';
                                         }  ?>
                                        </div>
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

                                                                <table style="border-collapse: separate; border-spacing: 15px;">
                                                                        <tr>
                                                                            <td colspan="4"><h3>Junta Direcctiva</h3></td>
                                                                        </tr>

                                                                <?php

                                                                  $arrCandidate = GetRecords("select *, ((select sum(1)
                                                                                                   from
                                                                                                   result rs, choice ch
                                                                                                   where
                                                                                                   candidates.id_candidate = rs.id_candidate
                                                                                                   and
                                                                                                   rs.id_choice = ch.id_choice and ch.stat = 1)) as suma_votos
                                                                                       from candidates where id_meeting = 2
                                                                                       order by
                                                                                       ((select sum(1)
                                                                                         from result rs, choice ch
                                                                                         where
                                                                                         candidates.id_candidate = rs.id_candidate
                                                                                         and
                                                                                         rs.id_choice = ch.id_choice and ch.stat = 1)) DESC");

                                                                  foreach ($arrCandidate as $key => $value) {

                                                                  $cantidad = $value['suma_votos'];
                                                                  if($cantidad == '' || is_null($cantidad) == true){
                                                                    continue;
                                                                    /*$cantidad = 0;*/
                                                                  }
                                                                  echo '<tr>
                                                                          <td class="">'.$value['name'].'</td>
                                                                          <td class=""><b>'.$value['last_name'].'</b></td>
                                                                          <td class="">Cantidad de votos obtenidos: </td>
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

                                                              <table style="border-collapse: separate; border-spacing: 15px;">
                                                                      <tr>
                                                                          <td colspan="4"><h3>Junta de Admision</h3></td>
                                                                      </tr>
                                                              <?php
                                                              $arrCandidate = GetRecords("select *, ((select sum(1)
                                                                                               from
                                                                                               result rs, choice ch
                                                                                               where
                                                                                               candidates.id_candidate = rs.id_candidate
                                                                                               and
                                                                                               rs.id_choice = ch.id_choice and ch.stat = 1)) as suma_votos
                                                                                           from candidates where id_meeting = 1
                                                                                           order by
                                                                                           ((select sum(1)
                                                                                             from result rs, choice ch
                                                                                             where
                                                                                             candidates.id_candidate = rs.id_candidate
                                                                                             and
                                                                                             rs.id_choice = ch.id_choice and ch.stat = 1)) DESC");
                                                                
								$char = 0;

								foreach ($arrCandidate as $key => $value) {

                                                                $cantidad = $value['suma_votos'];
                                                                if($cantidad == '' || is_null($cantidad) == true){
                                                                  continue;
                                                                  /*$cantidad = 0;*/
                                                                }
                                                                $char += 1;
                                                                echo '<tr>
                                                                        <td class="">'.$value['name'].'</td>
                                                                        <td class=""><b>'.$value['last_name'].'</b></td>
                                                                        <td class="">Cantidad de votos obtenidos: </td>
                                                                        <td class=""><b>'.$cantidad.'</b></td>
                                                                      </tr>';
                                                                if($char == 20){ echo '<tr>
                                                                                        <td class="" colspan="4">
                                                                                          ______________________________________________________________<HR>
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
                                                <a class="btn btn-lg yellow-haze hidden-print uppercase print-btn" href="reporte_fin_eleccion1.php">Imprimir</a>
                                                <!--<a href="restart_election.php" class="btn btn-lg yellow-haze hidden-print uppercase print-btn"  >Continuar</a>-->
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
