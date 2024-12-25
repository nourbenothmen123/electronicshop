<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="Crush it Able - The most popular Admin Dashboard template and UI kit">
    <meta name="author" content="PuffinTheme, the theme designer">

    <link rel="icon" href="favicon.ico" type="image/x-icon" />

    <title>Electronic Shop</title>

    <!-- Bootstrap Core and Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap/css/bootstrap.min.css') }}" />

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin/plugins/datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin/plugins/datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">


    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/theme4.css') }}" id="stylesheet" />
    <style>
        .delete-icon .fa-trash {
            color: red;
        }

        .edit-icon .fa-pencil {
            color: blue;
        }
    </style>
</head>

<body class="font-opensans">

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader"></div>
    </div>

    <!-- Main Content -->
    <div id="main_content">

        <!-- Small Icon Top Menu -->
        @include('partials.header')
        <!-- Notification and Activity -->
        @include('partials.right-sidebar')

        <!-- User Detail -->
        @include('partials.user-detail')

        <!-- Main Menu -->
        @include('partials.left-sidebar')

        <!-- Main Body Part -->
        <div class="page">
            <!-- Body Header -->
            <div id="page_top" class="section-body">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="left">
                            <!-- Insert Left Header Content Here -->
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
            <!-- Alerts -->
            {{-- @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif --}}
            <!-- User Table -->
            <div class="section-body">
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Liste des promotions</h3>
                                </div>
                                <div class="card-body">
                                    {{-- <a href="{{ route('promotions.create') }}" class="btn btn-primary">Ajouter une
                                        nouvelle promotion</a>
                                    
                                    <a href="{{ route('promotions_categories') }}" id="addToTable"
                                        class="btn btn-primary mb-15" type="button">
                                        <i class="icon wb-plus" aria-hidden="true"></i>Afficher liste des promotions-catégories
                                    </a> --}}
                                    <a href="{{ route('promotions.create') }}" id="addToTable"
                                        class="btn btn-primary mb-15" type="button">
                                        <i class="icon wb-plus" aria-hidden="true"></i> Ajouter une
                                        nouvelle promotion
                                    </a>
                                    <a href="{{ route('promotions_categories') }}" id="addToTable"
                                        class="btn btn-primary mb-15" type="button">
                                        <i class="icon wb-plus" aria-hidden="true"></i> Afficher liste des
                                        promotions-catégories
                                    </a>
                                    <a href="{{ route('promotions_produits') }}" id="addToTable"
                                        class="btn btn-primary mb-15" type="button">
                                        <i class="icon wb-plus" aria-hidden="true"></i> Afficher liste des
                                        promotions-produits
                                    </a>
                                    <a href="{{ route('promotions_variations') }}" id="addToTable"
                                        class="btn btn-primary mb-15" type="button">
                                        <i class="icon wb-plus" aria-hidden="true"></i> Afficher liste des
                                        promotions-variations
                                    </a>
                                    <!-- Search Bar -->
                                    <form action="{{ route('promotion.search') }}" method="GET"
                                        class="col-sm-12 col-md-6">
                                        <br>
                                        <div id="addrowExample_filter" class="dataTables_filter">
                                            <label>Chercher : <input type="search" class="form-control" placeholder=""
                                                    aria-controls="addrowExample" name="search"></label>
                                        </div>
                                    </form>
                                    <!-- User Table -->
                                    <div class="table-responsive">
                                        <table class="table table-hover table-vcenter table-striped" cellspacing="0"
                                            id="addrowExample">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Nom promotion</th>
                                                    <th>Type promotion</th>

                                                    <th>Actions</th> <!-- Added missing th for Actions -->
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Nom promotion</th>
                                                    <th>Type promotion</th>

                                                    <th>Actions</th> <!-- Added missing th for Actions -->
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @foreach ($promotions as $promotion)
                                                    <tr class="gradeA">
                                                        <td>{{ $promotion->id }}</td>
                                                        <td>{{ $promotion->name_promo }}</td>
                                                        <td>{{ $promotion->type_promo }}</td>

                                                        <td class="actions">
                                                            <!-- Edit and Delete Buttons -->
                                                            <form method="POST"
                                                                action="{{ route('promotions.destroy', $promotion->id) }}">
                                                                <a href="/modifier-promo/{{ $promotion->id }}"
                                                                    class="btn btn-sm btn-icon on-default m-r-5 button-edit edit-icon"
                                                                    data-toggle="tooltip"
                                                                    data-original-title="Modifier">
                                                                    <i class="fa fa-pencil fa-lg"
                                                                        aria-hidden="true"></i>
                                                                </a>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-icon on-default button-remove delete-icon"
                                                                    data-toggle="tooltip"
                                                                    data-original-title="Supprimer">
                                                                    <i class="fa fa-trash fa-lg" aria-hidden="true"></i>
                                                                </button>
                                                                {{-- <!-- Details Button -->
                                                                <a href="{{ route('promotions.show', $promotion->id) }}"
                                                                    class="btn btn-sm btn-icon on-default m-r-5 button-view"
                                                                    data-toggle="tooltip"
                                                                    data-original-title="Voir les détails">
                                                                    <i class="fa fa-eye fa-lg" aria-hidden="true"></i>
                                                                </a> --}}
                                                            </form>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Pagination -->
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers"
                                            id="addrowExample_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled"
                                                    id="addrowExample_previous"><a href="#"
                                                        aria-controls="addrowExample" data-dt-idx="0" tabindex="0"
                                                        class="page-link">Précédent</a></li>
                                                <li class="paginate_button page-item active"><a href="#"
                                                        aria-controls="addrowExample" data-dt-idx="1" tabindex="0"
                                                        class="page-link">1</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="addrowExample" data-dt-idx="2" tabindex="0"
                                                        class="page-link">2</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="addrowExample" data-dt-idx="3" tabindex="0"
                                                        class="page-link">3</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="addrowExample" data-dt-idx="4" tabindex="0"
                                                        class="page-link">4</a></li>
                                                <li class="paginate_button page-item next" id="addrowExample_next"><a
                                                        href="#" aria-controls="addrowExample" data-dt-idx="5"
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
            <!-- Page Footer -->
            @include('partials.footer')
        </div>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="{{ asset('admin/bundles/lib.vendor.bundle.js') }}"></script>

    <!-- Plugin JS -->
    <script src="{{ asset('admin/bundles/dataTables.bundle.js') }}"></script>

    <!-- Core JS and Page JS -->
    <script src="{{ asset('admin/js/core.js') }}"></script>
    <script src="{{ asset('assets/js/table/datatable.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @if (session('success'))
    <script>
        Swal.fire({
            title: 'Succès',
            text: "{{ session('success') }}",
            icon: 'success',
            confirmButtonText: 'OK',
            confirmButtonColor: '#4682B4',
        });
    </script>
@endif
@if (session('error'))
    <script>
        Swal.fire({
            title: 'Erreur',
            text: "{{ session('error') }}",
            icon: 'error',
            confirmButtonText: 'OK',
            confirmButtonColor: '#4682B4',
        });
    </script>
@endif
</body>

</html>
