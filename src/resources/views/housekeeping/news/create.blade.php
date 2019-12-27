@extends('housekeeping::layouts.master')

@section('content')
    <!-- Begin page -->
    <div id="wrapper">

    @include('housekeeping::partials.top-bar')
    @include('housekeeping::partials.left-menu')

    <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <h4 class="page-title">Form Editors</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);"><i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Forms</a></li>
                                    <li class="breadcrumb-item active">Form Editors</li>
                                </ol>
                            </div>
                            <div class="col-sm-6">
                                <div class="float-right d-none d-md-block">
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-settings mr-2"></i> Settings
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end row -->
                    </div>
                    <!-- end page-title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="mt-0 header-title">Tinymce wysihtml5</h4>
                                    <p class="text-muted mb-4">Bootstrap-wysihtml5 is a javascript
                                        plugin that makes it easy to create simple, beautiful wysiwyg editors
                                        with the help of wysihtml5 and Twitter Bootstrap.</p>

                                    <form method="post">
                                        <textarea id="elm1" name="area"></textarea>
                                    </form>

                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div>
                <!-- container-fluid -->
            <!-- content -->

            <footer class="footer">
                © 2019 Veltrix <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</span>.
            </footer>

        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->
@endsection

@section('scripts')
    <!-- Dependencies  -->
    <script src="{{ mix('/js/labs/dependencies/initial.min.js', '/vendor/duck-funk-core') }}"></script>
    <script src="{{ mix('/js/labs/dependencies/news.min.js', '/vendor/duck-funk-core') }}"></script>

    <!-- App js -->
    <script src="{{ mix('/js/housekeeping/app.js', '/vendor/duck-funk-core') }}"></script>
@endsection
