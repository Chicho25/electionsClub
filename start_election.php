  <?php
    ob_start();
    include("include/config.php");
    include("include/defs.php");
    $loggdUType = current_user_type();
    include("header_super_admin.php");



    if($loggdUType == 3)
    {
    }
    else if($loggdUType == 2)
    {
        header("location:cpanel_election_system.php");
        exit;
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
        header("location:cpanel_election_system.php");
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
                                                    <form action="cpanel_election_system.php" method="post">
                                                        <div class="tile-body" style="width:300px; left:50%; margin-left:-150px; position:relative;">
                                                          <button class="btn uppercase bold" type="submit" name="electionStart"  style="background-color:#ad864f; color:#FFF; width:300px;">Iniciar Elecciones</button>
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
