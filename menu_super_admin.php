<?php
    //ob_start();
    //$loggdUType = current_user_type();


?>
<div class="page-sidebar navbar-collapse collapse">

    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
        <li class="sidebar-toggler-wrapper hide">
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <div class="sidebar-toggler"> </div>
            <!-- END SIDEBAR TOGGLER BUTTON -->
        </li>
        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
        <li class="sidebar-search-wrapper">
        </li>
        <li class="heading">
            <h3 class="uppercase">Menu</h3>
        </li>
        <?php
        if($loggdUType == 3)
        {
        ?>
        <li class="nav-item start ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-home"></i>
                <span class="title">Resultados</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item start ">
                    <a href="super-admin.php" class="nav-link ">
                        <i class="icon-bar-chart"></i>
                        <span class="title">Ver Resultados</span>
                    </a>
                </li>
            </ul>
        </li>
        <?php
        }
        ?>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-layers"></i>
                <span class="title">Elección</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="start_election.php" class="nav-link ">
                        <span class="title">Iniciar Elección</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-hand-pointer-o"></i>
                <span class="title">Candidatos</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="register_candidate.php" class="nav-link ">
                        <span class="title">Registrar Candidato</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="candidate.php" class="nav-link ">
                        <span class="title">Editar Candidato</span>
                    </a>
                </li>

            </ul>
        </li>
        <?php
        if($loggdUType == 3)
        {
        ?>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-user"></i>
                <span class="title">Usuarios del sistema</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="create_user.php" class="nav-link ">
                        <span class="title">Registrar Usuario</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="user.php" class="nav-link ">
                        <span class="title">Editar Usuario</span>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-file-text-o"></i>
                <span class="title">Reportes</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="report1.php" class="nav-link ">
                        <span class="title">Reporte de resultado de votaciones</span>
                    </a>
                </li>

            </ul>
        </li>
        <?php
        }
        ?>
    </ul>
    <!-- END SIDEBAR MENU -->
    <!-- END SIDEBAR MENU -->
</div>
