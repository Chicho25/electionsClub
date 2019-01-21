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
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->

    <link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css" />
        
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/pages/css/search.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" />
        <style>
              .votebg
              {
                  border:5px solid red !important;
                  border-radius: 5px !important;
              }
              .chkdts
              {
                  position: absolute !important;
                   top: -9999px !important;
                   left: -9999px !important;
                display: inline !important;
              }
              .voteparag .checker span
              {
                display:inline !important;
              }

          </style>
        <script type="text/javascript">
          function mostrar(id) {
              if (id == 1) {
                  $("#staff").show();
              }
              else
              {
                  $("#staff").hide();

              }

          }
          </script>
          <style type="text/css">
          #algo {display:none}
          @media print {
            #algo {display:block}
          }
          </style>
    </head>
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
                    <?php if(!isset($hideLeft)) { ?>
                    <div class="menu-toggler sidebar-toggler"> </div>
                    <?php } ?>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- BEGIN NOTIFICATION DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

                        <!-- END NOTIFICATION DROPDOWN -->
                        <!-- BEGIN INBOX DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

                        <!-- END INBOX DROPDOWN -->
                        <!-- BEGIN TODO DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

                        <!-- END TODO DROPDOWN -->
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <?php if(!isset($hideLeft)) { ?>
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="imagenes/nouser.png" />
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
                                    <a href="logout.php">
                                        <i class="icon-key"></i> Salir </a>
                                </li>
                            </ul>
                        </li>
                        <?php } ?>
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
            <?php
            if(!isset($hideLeft)) { ?>
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <?php include("menu_super_admin.php"); ?>
                <!-- END SIDEBAR -->
            </div>
            <?php } ?>
            <!-- END SIDEBAR -->
