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
                                <h4 class="page-title">Crear nueva página</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);"><i
                                                class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Páginas</a></li>
                                    <li class="breadcrumb-item active">Crear nueva página</li>
                                </ol>
                            </div>
                        </div> <!-- end row -->
                    </div>
                    <!-- end page-title -->
                    <form id="newsForm" class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="mt-0 header-title">Crear nueva página</h4>
                                        <p class="text-muted mb-4">La página que crees aquí será visible en tu web.
                                            Puedes
                                            elegir el grupo de usuarios que puede ver esta página.</p>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="validationCustom01">Título de la página</label>
                                                    <input type="text" class="form-control" id="title" name="title"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            @if(! $pages->isEmpty())
                                                <div class="col-lg-4">
                                                    <label class="control-label">Página padre</label>
                                                    <select class="form-control select2">
                                                        <optgroup label="Páginas">
                                                            @foreach($pages as $page)
                                                                <option
                                                                    value="{{ $page->id }}">{{ $page->title }}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                    <span class="font-13 text-muted">Tu página heredará la ruta de esta.</span>
                                                </div>
                                            @endif

                                            <div class="col-lg-{{ ! $pages->isEmpty() ? '8' : '12' }}">
                                                <div class="form-group">
                                                    <label for="validationCustom03">Ruta (URL)</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"
                                                                  id="validationTooltipUsernamePrepend">{{ Request::getHost() }}/</span>
                                                        </div>
                                                        <input type="text" class="form-control" id="route" required>
                                                    </div>
                                                    <span class="font-13 text-muted">La url de tu nueva página.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="validationCustom03">Meta título</label>
                                                    <input type="text" class="form-control" id="meta_title"
                                                           name="meta_title" required>
                                                    <span class="font-13 text-muted">El título que aparecerá en google cuando busquen esta página. Aparece en la pestaña de tu navegador.</span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="validationCustom03">Meta descripción</label>
                                                    <input type="text" class="form-control" id="meta_description"
                                                           name="meta_description" required>
                                                    <span class="font-13 text-muted">La descripción que aparecerá en google cuando busquen esta página.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="control-label">¿A partir de qué rango se puede ver la
                                                        página?</label>

                                                    <select id="ddlCreditCardType" name="ddlCreditCardType"
                                                            class="form-control">
                                                        @foreach($permissions as $permission)
                                                            <option
                                                                value="{{ $permission->id }}">{{ $permission->rank_name }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Fecha de publicación</label>
                                                    <div>
                                                        <div class="input-group">
                                                            <input name="publish_date" type="text" class="form-control"
                                                                   placeholder="dd/mm/yyyy" id="publish_date"
                                                                   value="{{ \Carbon\Carbon::now() }}">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i
                                                                        class="mdi mdi-calendar"></i></span>
                                                            </div>
                                                        </div><!-- input-group -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">Activar página</h4>
                                        <p class="text-muted">Por defecto tu página estará activa.</p>

                                        <input type="checkbox" id="enabled" switch="success" checked="">
                                        <label for="enabled" data-on-label="Sí" data-off-label="No"></label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">Bloquear indexación de búsquedas</h4>
                                        <p class="text-muted mb-4">Para evitar que una página aparezca en la Búsqueda de
                                            Google.</p>

                                        <input type="checkbox" id="no-robots" switch="success">
                                        <label for="no-robots" data-on-label="Sí" data-off-label="No"></label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <input class="btn btn-primary" type="submit" value="Publicar nueva página">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- container-fluid -->
                <!-- content -->
            </div>
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
    <script src="{{ mix('/js/housekeeping/legacy/labs.js', '/vendor/duck-funk-core') }}"></script>

    <script>
        $(function () {
            $(".select2").select2();
            (new CreateNews('#newsForm', '{{ route('news.store') }}'))
        });
    </script>

@endsection
