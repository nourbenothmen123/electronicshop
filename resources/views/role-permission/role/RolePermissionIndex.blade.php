<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="Crush it Able The most popular Admin Dashboard template and ui kit">
    <meta name="author" content="PuffinTheme the theme designer">

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />

    <title>Electronic shop</title>

    <!-- Bootstrap Core and vandor -->
    <link rel="stylesheet" href="{{ 'admin/plugins/bootstrap/css/bootstrap.min.css' }}" />

    <!-- Plugins css -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin/plugins/datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin/plugins/datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
    <style>
        td.details-control {
            background: url('../admin/images/details_open.png') no-repeat center center;
            cursor: pointer;
        }

        tr.shown td.details-control {
            background: url('../admin/images/details_close.png') no-repeat center center;
        }
        .delete-icon .fa-trash {
            color: red;
        }
        .edit-icon .fa-pencil {
            color: blue;
        }
    </style>
    <!-- Core css -->
    <link rel="stylesheet" href="{{ asset('admin/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/theme4.css') }}" id="stylesheet" />
</head>

<body class="font-opensans">

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
        </div>
    </div>

    <!-- Start main html -->
    <div id="main_content">

        <!-- Small icon top menu -->
        @include('partials.header')
        <!-- Notification and  Activity-->
        @include('partials.right-sidebar')

        <!-- start User detail -->
        @include('partials.user-detail')

        <!-- start Main menu -->
        @include('partials.left-sidebar')

        <!-- start main body part-->
        <div class="page">

            <!-- start body header -->
            <div id="page_top" class="section-body">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="left">
                            <h1 class="page-title">Liste des rôles-permissions</h1>
                        </div>
                        @auth
                            <form action="{{ route('logout') }}" method="POST">
                                <div class="right">
                                    <div class="notification d-flex">
                                        @csrf
                                        <button type="submit" class="btn btn-facebook"><i
                                                class="fa fa-power-off mr-2"></i>Se déconnecter
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
            <div class="section-body">
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            @if (session()->has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"></h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_length" id="addrowExample_length"><label>Afficher
                                                    <select id="entriesSelect" name="addrowExample_length"
                                                        aria-controls="addrowExample" class="form-control">
                                                        <option value=""></option>
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select>entrées</label></div>
                                        </div>
                                        <form action="{{ route('liste-rôle-permission') }}" method="GET"
                                            class="col-sm-12 col-md-6">
                                            <div id="addrowExample_filter" class="dataTables_filter">
                                                <label>Rôle:<input type="search" class="form-control" placeholder=""
                                                        aria-controls="addrowExample" name="searchRole"
                                                        value="{{ $searchRole }}"></label>
                                            </div>
                                            <div id="addrowExample_filter" class="dataTables_filter">
                                                <label>Permission:<input type="search" class="form-control"
                                                        placeholder="" aria-controls="addrowExample"
                                                        name="searchPermission"
                                                        value="{{ $searchPermission }}"></label>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </form>
                                    </div>
                                    <div class="table-responsive">

                                        <table class="table table-hover table-vcenter table-striped" cellspacing="0"
                                            id="addrowExample">
                                            <thead>
                                                <tr>
                                                    <th>Nom rôle</th>
                                                    <th>Nom permission</th>

                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Nom rôle</th>
                                                    <th>Nom permission</th>

                                                </tr>
                                            </tfoot>

                                            <tbody>
                                                @foreach ($rolespermissions as $rolepermission)
                                                    <tr class="gradeA">
                                                        <td>
                                                            @if ($role = App\Models\Role::find($rolepermission->role_id))
                                                                {{ $role->name }}
                                                            @else
                                                                Aucune variation associé
                                                            @endif
                                                        </td>

                                                        <td>
                                                            @if ($permission = App\Models\Permission::find($rolepermission->permission_id))
                                                                {{ $permission->name }}
                                                            @else
                                                                Aucun attribut associé
                                                            @endif
                                                        </td>


                                                    </tr>
                                                @endforeach
                                            </tbody>


                                        </table>

                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="dataTables_info" id="addrowExample_info" role="status"
                                                aria-live="polite">Afficher de 1 à sur entrées</div>
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="dataTables_paginate paging_simple_numbers"
                                                id="addrowExample_paginate">
                                                <ul class="pagination">
                                                    <li class="paginate_button page-item previous disabled"
                                                        id="addrowExample_previous"><a href="#"
                                                            aria-controls="addrowExample" data-dt-idx="0"
                                                            tabindex="0" class="page-link">Précédent</a></li>
                                                    <li class="paginate_button page-item active"><a href="#"
                                                            aria-controls="addrowExample" data-dt-idx="1"
                                                            tabindex="0" class="page-link">1</a></li>
                                                    <li class="paginate_button page-item "><a href="#"
                                                            aria-controls="addrowExample" data-dt-idx="2"
                                                            tabindex="0" class="page-link">2</a></li>
                                                    <li class="paginate_button page-item "><a href="#"
                                                            aria-controls="addrowExample" data-dt-idx="3"
                                                            tabindex="0" class="page-link">3</a></li>
                                                    <li class="paginate_button page-item "><a href="#"
                                                            aria-controls="addrowExample" data-dt-idx="4"
                                                            tabindex="0" class="page-link">4</a></li>
                                                    <li class="paginate_button page-item next"
                                                        id="addrowExample_next"><a href="#"
                                                            aria-controls="addrowExample" data-dt-idx="5"
                                                            tabindex="0" class="page-link">Suivant</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Start page footer -->
            @include('partials.footer')
        </div>
    </div>

    <!-- jQuery and bootstrtap js -->
    <script src="{{ asset('admin/bundles/lib.vendor.bundle.js') }}"></script>

    <!-- start plugin js file  -->
    <script src="{{ asset('admin/bundles/dataTables.bundle.js') }}"></script>

    <!-- Start core js and page js -->
    <script src="{{ asset('admin/js/core.js') }}"></script>
    <script src="{{ asset('assets/js/table/datatable.js') }}"></script>
    <script>
        document.getElementById('entriesSelect').addEventListener('change', function() {
            var selectedValue = this.value;
            var currentUrl = window.location.href;

            // Ajoutez le paramètre 'entries' à l'URL actuelle
            var newUrl = currentUrl + (currentUrl.indexOf('?') !== -1 ? '&' : '?') + 'entries=' + selectedValue;

            // Rediriger vers la nouvelle URL
            window.location.href = newUrl;
        });
    </script>
</body>

</html>
