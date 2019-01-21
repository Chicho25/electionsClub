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

    $message = "";

    $getElection = RecCount("choice", "stat = 1");

    if($getElection > 0)
    {
        MySQLQuery("delete from voter_stat");
        UpdateRec("choice", "stat=1", array("date_hour_end" => date("Y-m-d"), "stat" => 2));
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
                                                    <h3>Elección</h3>
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
                                        <li class="search-item clearfix">
                                            <div class="search-content">
                                                <div class="row">
                                                    <form action="start_election.php" method="post">
                                                        <div class="tile-body" style="width:600px; left:50%; margin-left:-300px; position:relative; text-align:center;">
                                                          <h3>Al reiniciar el proceso de elección no se perderán los datos de la elección recién culminada o elecciones pasadas, los resultados de dichas elecciones estarán guardados en un histórico en la base de datos.</h3>
                                                        </div>
                                                        <div class="tile-body" style="width:300px; left:50%; margin-left:-150px; position:relative;">

                                                          <button class="btn uppercase bold" type="submit" style="background-color:#ad864f; color:#FFF; width:300px;">Reiniciar proceso de elecciones</button>
                                                        </div>
                                                    </form>
                                                </div>
                                        </li>

                                    </ul>
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
