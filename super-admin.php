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
                          <div class="col-md-12">
                              <!-- BEGIN CHART PORTLET-->
                              <div class="portlet light bordered">
                                  <div class="portlet-title">
                                      <div class="caption">
                                          <i class="icon-bar-chart font-haze"></i>
                                          <span class="caption-subject bold uppercase font-haze" style="color:#ad864f;"> Resultados de las Elecciones</span>

                                      </div>
                                      <div class="tools">
                                          <a href="javascript:;" class="collapse"> </a>
                                          <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                          <a href="javascript:;" class="reload"> </a>
                                          <a href="javascript:;" class="fullscreen"> </a>
                                          <a href="javascript:;" class="remove"> </a>
                                      </div>
                                  </div>
                                  <div class="tiles" style="margin: 0 auto;">

                                    <h1 style="color:#ad864f;">Resultado Junta Directiva</h1>

                                    <div class="portlet-body">
                                        <div id="chart_candidate" class="chart" style="height: 400px;"> </div>

                                    </div>

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
                                                              			   rs.id_choice = ch.id_choice and ch.stat = 1)) DESC limit 20");
                                         $directiveChartData = "[";
                                          foreach ($arrCandidate as $key => $value) {
                                            $strQuery = "Select count(*) as totalFavor from result
                                                         inner join choice on choice.id_choice = result.id_choice
                                                         where id_candidate = ".$value['id_candidate']." and choice.stat = 1";
                                            $nResult = MySQLQuery($strQuery);
                                            $nCandidateVotes = mysql_fetch_array($nResult);
                                            $directiveChartData.="{country : '".$value['name']."', value : ".$nCandidateVotes['totalFavor']."},";
                                    ?>
                                      <div class="tile double bg-blue-madison">
                                          <div class="tile-body">
                                              <img src="<?php echo $value['image']; ?>" alt="">
                                              <h3><?php echo $value['name']; ?></h3>
                                              <p> Cantidad de votos: <samp style="color:red; font-size:20px;"><b><?php echo $nCandidateVotes['totalFavor']; ?></b></small> </p>
                                          </div>
                                          <div class="tile-object">
                                              <div class="name"> <?php echo $value['name']; ?> </div>
                                              <div class="number"> <?php echo date("d M Y", strtotime($value['date_registration']))?> </div>
                                          </div>
                                      </div>
                                      <?php }
                                        $directiveChartData = rtrim($directiveChartData, ',');
                                        $directiveChartData.= "]";

                                       ?>

                                    </div>

                                    <?php /*for($i=1; $i<=4; $i++){
                                      echo '<b>Candidato '.($i+1).'</b>Cantidad de votos a su favor:<b>'.(30-$i).'</b><br>';
                                    } */ ?>

                                    <h1 style="color:#ad864f;">Resultado Junta de Admision</h1>

                                    <div class="portlet-body">
                                        <div id="chart_candidate1" class="chart" style="height: 400px;"> </div>
                                    </div>

                                    <div class="tiles" style="margin: 0 auto;">

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
                                                              			   rs.id_choice = ch.id_choice and ch.stat = 1)) DESC limit 20");
                                        $admisionChartData = "[";
                                          foreach ($arrCandidate as $key => $value) {
                                            $strQuery = "Select count(*) as totalFavor from result
                                                         inner join choice on choice.id_choice = result.id_choice
                                                         where id_candidate = ".$value['id_candidate']." and choice.stat = 1";
                                            $nResult = MySQLQuery($strQuery);
                                            $nCandidateVotes = mysql_fetch_array($nResult);
                                            $admisionChartData.="{country : '".$value['name']."', litres : ".$nCandidateVotes['totalFavor']."},";
                                    ?>
                                        <div class="tile double bg-blue-madison">
                                            <div class="tile-body">
                                                <img src="<?php echo $value['image']; ?>" alt="">
                                              <h3><?php echo $value['name']; ?></h3>
                                              <p> Cantidad de votos: <samp style="color:red; font-size:20px;"><b><?php echo $nCandidateVotes['totalFavor']; ?></b></small> </p>
                                            </div>
                                            <div class="tile-object">
                                                <div class="name"> <?php echo $value['name']; ?> </div>
                                                <div class="number"> <?php echo date("d M Y", strtotime($value['date_registration']))?> </div>
                                            </div>
                                        </div>
                                        <?php }
                                        $admisionChartData = rtrim($admisionChartData, ',');
                                        $admisionChartData.= "]";
                                        ?>

                                      </div>
                                      <?php /* for($i=20; $i<=50; $i++){
                                        echo '<b>Candidato '.($i+1).' </b>Cantidad de votos a su favor: <b>'.(160-$i).'</b><br>';
                                      } */ ?>

                              </div>
                              <!-- END CHART PORTLET-->
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
          <!-- END CONTENT -->

  <?php include("footer_super_admin.php"); ?>
      <script type="text/javascript">
        var ChartsAmcharts=function() {
            var d=function() {
                var e=AmCharts.makeChart("chart_candidate", {
                    type:"pie", theme:"light", fontFamily:"Open Sans", color:"#888", dataProvider:<?php echo $directiveChartData?>, valueField:"value", titleField:"country", outlineAlpha:.4, depth3D:15, balloonText:"[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>", angle:30, exportConfig: {
                        menuItems:[ {
                            icon: "/lib/3/images/export.png", format: "png"
                        }
                        ]
                    }
                }
                );
                jQuery(".chart_candidate_chart_input").off().on("input change", function() {
                    var t=jQuery(this).data("property"), a=e, l=Number(this.value);
                    e.startDuration=0, "innerRadius"==t&&(l+="%"), a[t]=l, e.validateNow()
                }
                ),
                $("#chart_candidate").closest(".portlet").find(".fullscreen").click(function() {
                    e.invalidateSize()
                }
                )
            },
            i=function() {
            var e=AmCharts.makeChart("chart_candidate1", {
                type:"pie", theme:"light", fontFamily:"Open Sans", color:"#888", dataProvider:<?php echo $admisionChartData?>, valueField:"litres", titleField:"country", exportConfig: {
                    menuItems:[ {
                        icon: App.getGlobalPluginsPath()+"amcharts/amcharts/images/export.png", format: "png"
                    }
                    ]
                }
            }
            );
            $("#chart_candidate1").closest(".portlet").find(".fullscreen").click(function() {
                e.invalidateSize()
            }
            )
        }
            ;
            return {
                init:function() {
                    d(),
                    i()
                }
            }
        }

        ();
        jQuery(document).ready(function() {
            ChartsAmcharts.init()
        }

        );
      </script>
