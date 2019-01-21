<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Sistema de elecciones</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="../assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="../assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="index.html">
                        <img src="imagenes/letras.png" alt="logo" class="logo-default" /> </a>
                    <div class="menu-toggler sidebar-toggler"> </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">

                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="../assets/layouts/layout/img/avatar3_small.jpg" />
                                <span class="username username-hide-on-mobile"> Usuario </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                              <!--  <li>
                                    <a href="page_user_profile_1.html">
                                        <i class="icon-user"></i> Mi Perfil </a>
                                </li>
                                <li>
                                    <a href="app_calendar.html">
                                        <i class="icon-calendar"></i> Elecciones </a>
                                </li>

                                <li class="divider"> </li> -->

                                <li>
                                    <a href="index.php">
                                        <i class="icon-key"></i> Salir </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                        <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

                        <!-- END QUICK SIDEBAR TOGGLER -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <?php include("menu_super_admin.php"); ?>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->



                              <!-- BEGIN CHART PORTLET-->
                              <div class="page-content-wrapper">
                                  <!-- BEGIN CONTENT BODY -->
                                  <div class="page-content">
                                      <!-- BEGIN PAGE HEAD-->
                                      <div class="page-head">
                                          <!-- BEGIN PAGE TITLE -->
                                          <div class="page-title">
                                              <h1>Reporte de elecciones
                                                  <small>Reporte de elecciones</small>
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

                                                      <h1 class="uppercase">Resultados de todos los candidatos</h1>
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
                                                  <p class="invoice-desc">6</p>
                                              </div>
                                              <div class="col-xs-3">
                                                  <h4 class="invoice-title uppercase">Fecha</h4>
                                                  <p class="invoice-desc">Nov 12, 2016</p>
                                              </div>
                                              <div class="col-xs-6">
                                                  <h4 class="invoice-title uppercase">Total de votos en la jornada</h4>
                                                  <p class="invoice-desc inv-address">8555</p>
                                              </div>
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
                                                                  <h3>Junta Direcctiva</h3>
                                                                  <?php for($i=0; $i<=7; $i++){ ?>
                                                                  <p>Candidato <?php echo $i+1; ?> Cantidad de votos obtenidos: <?php echo 200-($i*5); ?></p>
                                                                  <?php } ?>
                                                              </td>
                                                              <td class="text-center sbold"></td>
                                                              <td class="text-center sbold"></td>
                                                              <td class="text-center sbold"></td>
                                                          </tr>
                                                          <tr>
                                                              <td>
                                                                <h3>Junta de Admision</h3>
                                                                <?php for($i=0; $i<=49; $i++){ ?>
                                                                <p>Candidato <?php echo $i+1; ?> Cantidad de votos obtenidos: <?php echo 800-($i*5); ?></p>
                                                                <?php } ?>
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
                                                  <a class="btn btn-lg yellow-haze hidden-print uppercase print-btn" target="_blank" onclick="javascript:window.print();">Print</a>
                                              </div>
                                          </div>
                                      </div>
                                      <!-- END PAGE BASE CONTENT -->
                                  </div>
                                  <!-- END CONTENT BODY -->
                              </div>
                              <!-- END CHART PORTLET-->


          <!-- END CONTENT -->
          <!-- BEGIN QUICK SIDEBAR -->
          <a href="javascript:;" class="page-quick-sidebar-toggler">
              <i class="icon-login"></i>
          </a>

          <!-- END QUICK SIDEBAR -->
          </div>
          <!-- END CONTAINER -->
          <!-- BEGIN FOOTER -->
          <div class="page-footer">
              <div class="page-footer-inner"> 2016 &copy; Sistemas de Elecciones.
                  <a href="#" title="Purchase Metronic just for 27$ and get lifetime updates for free"
                  target="_blank">Club Union</a>
              </div>
              <div class="scroll-to-top">
                  <i class="icon-arrow-up"></i>
              </div>
          </div>
      <!-- END FOOTER -->
      <!--[if lt IE 9]>
      <script src="../assets/global/plugins/respond.min.js"></script>
      <script src="../assets/global/plugins/excanvas.min.js"></script>
      <![endif]-->
      <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
      <script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      <script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
      <script src="../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
      <script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
      <script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
      <script src="../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
      <script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
      <!-- END CORE PLUGINS -->
      <!-- BEGIN PAGE LEVEL PLUGINS -->

      <!-- END PAGE LEVEL PLUGINS -->
      <!-- BEGIN THEME GLOBAL SCRIPTS -->
      <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
      <!-- END THEME GLOBAL SCRIPTS -->
      <!-- BEGIN PAGE LEVEL SCRIPTS -->

      <!-- END PAGE LEVEL SCRIPTS -->
      <!-- BEGIN THEME LAYOUT SCRIPTS -->
      <script src="../assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
      <script src="../assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
      <script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
      <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>
