<?php
    ob_start();
    session_start();
    include("include/config.php");
    include("include/defs.php");
    // it will never let you open index(login) page if session is set
     if(isset($_SESSION['USER_ID']) && $_SESSION['USER_ID'] !="")
     {
          $loggdUType =current_user_type();
          if($loggdUType == 1)
            header("Location: vote_for_directive.php");
          else if($loggdUType == 2)
            header("Location: cpanel_election_system.php");
          else
            header("Location: super-admin.php");
          exit;
     }


    $errMSG="";


     if( isset($_POST['btn-login']) ) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $usertype = $_POST['usertype'];
        $controlval = $_POST['controlval'];
        $username = strip_tags(trim($username));
        $password = strip_tags(trim($password));

        $getElection = RecCount("choice", "stat = 1");

        if($getElection == 0 && $usertype == 1)
            $errMSG = '<div class="alert alert-danger"><a href="#" class="close" style="color:#000;" data-dismiss="alert">&times;</a><strong>Election not started now...!</strong></div>';
        else
        {
            if($usertype == 1 && $controlval == "")
            {
                $errMSG = '<div class="alert alert-danger"><a href="#" class="close" style="color:#000;" data-dismiss="alert">&times;</a><strong>Control number required!</strong></div>';
            }
            else
            {
                if(RecCount("users", "user_name = '".$username."' and password = '".$password."' and id_kind_user = ".$usertype))
                {

                    $row = GetRecord("users", "user_name = '".$username."' and password = '".$password."' and id_kind_user = ".$usertype);
                    $getNumberTable = GetRecord("`table`", "id_user = ".$row['id_user']);
                    $nVoteStart = 0;
                    if(isset($getNumberTable['number_table']) && $usertype == 1)
                    {
                        $nVoteStart = RecCount("voter_stat", "number_table = ".$getNumberTable['number_table']." and number_control = ".$controlval." and stat = 6");
                        $nVoteStart1 = RecCount("voter_stat", "number_table = ".$getNumberTable['number_table']." and number_control = ".$controlval);

                        if($nVoteStart1 == 0 && $row['stat'] == 1)
                        {
                            $arrVStat = array("number_control" => $controlval, "number_table" => $getNumberTable['number_table'], "stat" => 3);
                            InsertRec("voter_stat", $arrVStat);
                        }
                    }
                    if($nVoteStart > 0)
                        $errMSG = '<div class="alert alert-danger"><a href="#" class="close" style="color:#000;" data-dismiss="alert">&times;</a><strong>Already emit vote...!</strong></div>';
                    else
                    {
                        if($row['stat'] == 1)
                        {
                            $_SESSION['USER_ID'] = $row['id_user'];
                            $_SESSION['USER_NAME'] = $row['user_name'];
                            $_SESSION['USER_TYPE'] = $row['id_kind_user'];
                            $_SESSION['USER_CONTROLVAL'] = $controlval;
                            if($usertype == 1)
                                header("Location: vote_for_directive.php");
                            else if($usertype == 2)
                                header("Location: cpanel_election_system.php");
                            else
                                header("Location: super-admin.php");
                        }else
                      $errMSG = '<div class="alert alert-danger"><a href="#" class="close" style="color:#000;" data-dismiss="alert">&times;</a><strong>Inactive Account...!</strong></div>';
                    }
                }
                else
                  $errMSG = '<div class="alert alert-danger"><a href="#" class="close" style="color:#000;" data-dismiss="alert">&times;</a><strong>Invalid Email or Password, Try again...!</strong></div>';
            }
        }
     }
?>
<?php /* ################ Modificacion del dia 12/02/2016 ################# */ ?>
<?php if(isset($_POST['mesa'])){

        function obtener_numero_control_consecutivo($mesa){
          $sql = "select max(number_control) as numero_max from result where id_table ='".$mesa."'";
          $nResult = MySQLQuery($sql);
          $nRows = mysql_fetch_array($nResult);
          $numero = $nRows['numero_max'];

          return $numero;

        }

        $numero_control = obtener_numero_control_consecutivo($_POST['mesa']);

        $_SESSION['numero_control'] = $numero_control;

} ?>

<?php	function generarCodigo($longitud) {

		$key = '';
		 $pattern = '1234567890';
		 $max = strlen($pattern)-1;
		 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
		 return $key;
	}?>

<?php /* ################################################################## */ ?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" style="background-color:#000;">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Sistema de Votaciones</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="assets/pages/css/login.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" />
        <style media="screen">
          a{
            direction: none;
            color: white;
          }
        </style>

        <script type="text/javascript">

            function showNumberControl(id) {
              if (id == 1) {
                  $("#controlval").show();
              }
              else
              {
                  $("#controlval").hide();

              }

          }

        </script>
      </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo" style="background-color:#000;">
            <a href="index.php">
                <img src="imagenes/logo.png" alt="" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->


        <div class="row">
            <div class="col-sm-9 col-xs-12" style="margin-left:160PX;">
                <?php echo $errMSG ?>
            </div>
            <div class="col-sm-12 col-xs-12">
              <div class="content">
                <form class="" action="index.php" method="post" id="frmStaff">
                    <input type="hidden" name="usertype" value="1">
                    <h3 class="form-title font" style="color:#ad864f;">Usuario</h3>
                    <label class="control-label visible-ie8 visible-ie9">Usuario</label>
                    <input class="form-control form-control-solid placeholder-no-fix" required="required" type="text" autocomplete="off" placeholder="Usuario" name="username" />
                    <br>
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control form-control-solid placeholder-no-fix" required="required" type="password" autocomplete="off" placeholder="Password" name="password" />
                    <br>
                    <label class="control-label visible-ie8 visible-ie9">Control</label>
                    <input class="form-control form-control-solid placeholder-no-fix" readonly type="hidden" autocomplete="off" placeholder="Control" name="controlval" id="controlval" value="<?php /* if(isset($_SESSION['numero_control'])){echo $_SESSION['numero_control']+1;}else{echo '1';}*/
                    echo generarCodigo(7); ?>" />

                    <br>
                    <label class="control-label visible-ie8 visible-ie9">Usuario tipo</label>
                    <select class="form-control" name="usertype" required="required" onChange="showNumberControl(this.value);">
                        <option value="1">Staff</option>
                        <option value="2">Administrador</option>
                        <option value="3">Super</option>
                    </select>
                    <br>
                    <div class="form-actions">
                        <button type="submit" form="frmStaff" name="btn-login" class="btn uppercase" style="background-color:#ad864f; color:white; width:100%;">Ingresar</button>
                    </div>
                </form>
              </div>
            </div>





          </div>


        <div class="copyright"> 2016 © Sistema de votaciones Clun Unión </div>
        <!--[if lt IE 9]>
        <script src="assets/global/plugins/respond.min.js"></script>
        <script src="assets/global/plugins/excanvas.min.js"></script>
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/pages/scripts/login.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>
