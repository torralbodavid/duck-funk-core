<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Perspectiva</li>
                <li>
                    <a href="{{ route('housekeeping') }}" class="waves-effect">
                        <i class="ion ion-ios-desktop"></i> <span> Tablero </span>
                    </a>
                </li>

                <li class="menu-title">CMS</li>

                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="ion ion-ios-paper"></i><span> Páginas <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                        <li><a href="{{ route('pages.create') }}">Nueva página</a></li>
                        <li><a href="email-read.html">Gestionar paginas</a></li>
                    </ul>
                </li>

                <li class="menu-title">Marketing</li>

                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="ion ion-ios-today"></i><span> Noticias <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                        <li><a href="{{ route('news.create') }}">Nueva noticia</a></li>
                        <li><a href="email-read.html">Gestionar noticias</a></li>
                    </ul>
                </li>

                <li class="menu-title">Desarrollador</li>

                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="ion ion-md-analytics"></i><span>Errores <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></span></a>
                    <ul class="submenu">
                        <li><a href="pages-login.html">Excepciones</a></li>
                        <li><a href="pages-login-2.html">Críticos</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="ion ion-md-apps"></i><span>Emulador <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></span></a>
                    <ul class="submenu">
                        <li><a href="pages-login.html">Ajustes</a></li>
                        <li><a href="pages-login-2.html">Textos</a></li>
                    </ul>
                </li>

            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
