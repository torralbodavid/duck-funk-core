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
                                <h4 class="page-title">Crear nueva noticia</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);"><i
                                                class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Noticias</a></li>
                                    <li class="breadcrumb-item active">Crear nueva noticia</li>
                                </ol>
                            </div>
                            <div class="col-sm-6">
                                <div class="float-right d-none d-md-block">
                                    <div class="dropdown">
                                        <button
                                            class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light"
                                            type="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="mdi mdi-settings mr-2"></i> Ajustes
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Guardar borrador</a>
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

                                    <h4 class="mt-0 header-title">Crear nueva noticia</h4>
                                    <p class="text-muted mb-4">Puedes publicar una nueva noticia desde aquí.</p>

                                    <form class="needs-validation" novalidate>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="validationCustom01">Título de la noticia</label>
                                                    <input type="text" class="form-control" id="title" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="validationCustom03">Subtítulo</label>
                                                    <input type="text" class="form-control" id="subtitle" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="elm1">Cuerpo de la noticia</label>
                                                    <textarea id="elm1" name="area"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <form class="needs-validation" novalidate>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">Imagen destacada</label>
                                                                <input class="animated jackInTheBox" type="file"
                                                                       name="filepond">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                        <button class="btn btn-primary" type="submit"><i
                                                class="mdi mdi-newspaper mr-2"></i> Publicar noticia
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div>
                <!-- container-fluid -->
                <!-- content -->

                <footer class="footer">
                    © 2019 Veltrix <span class="d-none d-sm-inline-block"> - Crafted with <i
                            class="mdi mdi-heart text-danger"></i> by Themesbrand</span>.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>
    </div>    <!-- END wrapper -->
@endsection

@section('scripts')
    <!-- Dependencies  -->
    <script src="{{ mix('/js/labs/dependencies/initial.min.js', '/vendor/duck-funk-core') }}"></script>
    <script src="{{ mix('/js/labs/dependencies/news.min.js', '/vendor/duck-funk-core') }}"></script>

    <!-- App js -->
    <script src="{{ mix('/js/housekeeping/app.js', '/vendor/duck-funk-core') }}"></script>
    <script src="{{ mix('/js/legacy/filepond.js', '/vendor/duck-funk-core') }}"></script>
@endsection
