<div class="header-bg">
    <!-- Navigation Bar-->
    <header id="topnav">
        <div class="topbar-main">
            <div class="container-fluid">

                <!-- Logo container-->
                <div class="logo">
                    <a href="index.html" class="logo">
                        <img src="assets/images/logo-sm.png" alt="" class="logo-small">
                        <img src="assets/images/logo-light.png" alt="" class="logo-large">
                    </a>
                </div>
                <!-- End Logo container-->

                <div class="menu-extras topbar-custom">

                    <ul class="navbar-right list-inline float-right mb-0">

                        @auth
                            <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                                <form role="search" class="app-search">
                                    <div class="form-group mb-0">
                                        <input type="text" class="form-control" placeholder="Search..">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </li>
                        @endauth

                        <!-- full screen -->
                        <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                            <a class="nav-link" href="#" id="btn-fullscreen">
                                <i class="retro-mid retro-mid-zoomin"></i>
                            </a>
                        </li>

                        @auth
                        <!-- notification -->
                            <li class="dropdown notification-list list-inline-item">
                                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#"
                                   role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <i class="retro-mid retro-mid-v20_b2"></i>
                                    <span class="badge badge-pill badge-danger noti-icon-badge">3</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                                    <!-- item-->
                                    <h6 class="dropdown-item-text">
                                        Notifications (258)
                                    </h6>
                                    <div class="slimscroll notification-item-list">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                            <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i>
                                            </div>
                                            <p class="notify-details">Your order is placed<span class="text-muted">Dummy text of the printing and typesetting industry.</span>
                                            </p>
                                        </a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-warning"><i
                                                    class="mdi mdi-message-text-outline"></i>
                                            </div>
                                            <p class="notify-details">New Message received<span class="text-muted">You have 87 unread messages</span>
                                            </p>
                                        </a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-info"><i class="mdi mdi-glass-cocktail"></i>
                                            </div>
                                            <p class="notify-details">Your item is shipped<span class="text-muted">It is a long established fact that a reader will</span>
                                            </p>
                                        </a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-primary"><i class="mdi mdi-cart-outline"></i>
                                            </div>
                                            <p class="notify-details">Your order is placed<span class="text-muted">Dummy text of the printing and typesetting industry.</span>
                                            </p>
                                        </a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-danger"><i
                                                    class="mdi mdi-message-text-outline"></i>
                                            </div>
                                            <p class="notify-details">New Message received<span class="text-muted">You have 87 unread messages</span>
                                            </p>
                                        </a>
                                    </div>
                                    <!-- All-->
                                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                                        View all <i class="fi-arrow-right"></i>
                                    </a>
                                </div>
                            </li>

                            <li class="dropdown notification-list list-inline-item">
                                <div class="dropdown notification-list nav-pro-img">
                                    <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown"
                                       href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        <img
                                            src="{{ config('duck-funk.hotel') }}habbo-imaging/avatarimage?figure={{ core()->user()->look }}&direction=3&head_direction=4&gesture=sml&action=&size=n&headonly=1"
                                            alt="user" class="rounded-circle">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                        <!-- item-->
                                        <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle"></i> Perfil</a>
                                        <a class="dropdown-item" href="{{ core()->page('settings') }}"><i class="mdi mdi-account-circle"></i> Ajustes</a>
                                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"><i class="mdi mdi-power text-danger"></i> Logout</a>
                                    </div>
                                </div>
                            </li>
                        @endauth


                        <li class="menu-item list-inline-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>

                    </ul>
                </div>
                <!-- end menu-extras -->

                <div class="clearfix"></div>

            </div> <!-- end container -->
        </div>
        <!-- end topbar-main -->


        <!-- MENU Start -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu">

                        @if(menu()->getBySlug('community') !== null)
                            @foreach(menu()->getBySlug('community')->items as $item)
                                <li class="has-submenu">
                                    <a href="{{ $item->page->route }}"><i class="ion ion-md-speedometer"></i>{{ $item->page->title }}</a>
                                </li>
                            @endforeach()
                        @endif


                        <li class="has-submenu">
                            <a href="#"><i class="ion ion-md-help-buoy"></i>UI Elements <i
                                    class="mdi mdi-chevron-down mdi-drop"></i></a>
                            <ul class="submenu megamenu">
                                <li>
                                    <ul>
                                        <li><a href="ui-alerts.html">Alerts</a></li>
                                        <li><a href="ui-buttons.html">Buttons</a></li>
                                        <li><a href="ui-cards.html">Cards</a></li>
                                        <li><a href="ui-carousel.html">Carousel</a></li>
                                        <li><a href="ui-general.html">General UI</a></li>
                                        <li><a href="ui-grid.html">Grid</a></li>
                                        <li><a href="ui-images.html">Images</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <ul>
                                        <li><a href="ui-lightbox.html">Lightbox</a></li>
                                        <li><a href="ui-modals.html">Modals</a></li>
                                        <li><a href="ui-rangeslider.html">Range Slider</a></li>
                                        <li><a href="ui-sweet-alert.html">Sweet-Alert</a></li>
                                        <li><a href="ui-tabs-accordions.html">Tabs & Accordions</a></li>
                                        <li><a href="ui-typography.html">Typography</a></li>

                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="has-submenu">
                            <a href="#"><i class="ion ion-md-grid"></i>Apps <i
                                    class="mdi mdi-chevron-down mdi-drop"></i></a>
                            <ul class="submenu">
                                <li class="has-submenu">
                                    <a href="#">Email</a>
                                    <ul class="submenu">
                                        <li><a href="email-inbox.html">Inbox</a></li>
                                        <li><a href="email-read.html">Email Read</a></li>
                                        <li><a href="email-compose.html">Email Compose</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="calendar.html">Calendar</a>
                                </li>

                                <li class="has-submenu">
                                    <a href="#">Ecommerce</a>
                                    <ul class="submenu">
                                        <li><a href="ecommerce-products.html">Products</a></li>
                                        <li><a href="ecommerce-products-list.html">Products List</a></li>
                                        <li><a href="ecommerce-order-history.html">Order History</a></li>
                                        <li><a href="ecommerce-customers.html">Customers</a></li>
                                        <li><a href="ecommerce-product-edit.html">Product Edit</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="projects.html">Projects</a>
                                </li>

                                <li class="has-submenu">
                                    <a href="#">Layouts</a>
                                    <ul class="submenu">
                                        <li><a href="layouts-header-dark.html">Header Dark</a></li>
                                        <li><a href="layouts-topbar-light.html">Topbar Light</a></li>
                                        <li><a href="layouts-width.html">Layout width</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </li>

                    </ul>
                    <!-- End navigation menu -->
                </div> <!-- end #navigation -->
            </div> <!-- end container -->
        </div> <!-- end navbar-custom -->
    </header>
    <!-- End Navigation Bar-->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            @auth
                                <h4 class="page-title">{{ core()->user()->username }}</h4>
                            @endauth
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);"><i
                                            class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Extra Pages </a></li>
                                <li class="breadcrumb-item active">Blank Page</li>
                            </ol>
                        </div>
                        <div class="col-sm-6">
                            <div class="float-right d-none d-md-block">
                                <div class="dropdown">
                                    <a href="{{ core()->page('hotel') }}" class="btn btn-danger arrow-none waves-effect waves-light">
                                        <i class="retro retro-mid-hotel-button-medium-icon"></i> Entra en el hotel
                                    </a>
                                </div>
                            </div>
                        </div> <!-- end col-->
                    </div> <!-- end row-->
                </div>
                <!-- end page title -->
            </div> <!-- end col -->
        </div> <!-- end row-->
    </div>
</div>
