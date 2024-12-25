<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="Crush it Able The most popular Admin Dashboard template and ui kit">
    <meta name="author" content="PuffinTheme the theme designer">

    <link rel="icon" href="favicon.ico" type="image/x-icon" />

    <title>Electronic shop</title>

    <!-- Bootstrap Core and vandor -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap/css/bootstrap.min.css') }}" />

    <!-- Plugins css -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin/plugins/datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin/plugins/datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
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

        .custom-badge {
            font-size: 0.8em;
            /* Ajuster la taille de la police */
            padding: 0.5em;
            /* Ajuster le padding */
            border-radius: 0.3em;
            /* Ajuster les coins arrondis */
            color: white;
            margin: 0.15em;
            /* Ajouter de l'espace autour des badges */
        }
    </style>
    <!-- Core css -->
    <link rel="stylesheet" href="../admin/css/main.css" />
    <link rel="stylesheet" href="../admin/css/theme4.css" id="stylesheet" />
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
                            <h1 class="page-title">Liste des promotions sur des catégories</h1>
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
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"></h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div
                                            class="col-sm-12 col-md-6 d-flex justify-content-between align-items-center">
                                            <form action="{{ route('promotions_categories') }}" method="GET"
                                                class="d-flex align-items-center">
                                                <div id="addrowExample_filter" class="dataTables_filter mr-2">
                                                    <label><strong>Nom promotion:<input type="search"
                                                                class="form-control" placeholder=""
                                                                aria-controls="addrowExample" name="chercherPromotion"
                                                                value="{{ $chercherPromotion }}"></strong></label>
                                                </div>
                                                <div id="addrowExample_filter" class="dataTables_filter mr-2">
                                                    <label><strong>Nom catégorie:<input type="search"
                                                                class="form-control" aria-controls="addrowExample"
                                                                name="chercherCatégorie"
                                                                value="{{ $chercherCatégorie }}"></strong></label>
                                                </div>
                                                <button type="submit" class="btn btn-icon btn-primary"
                                                    style="margin-top:10px;"><i class="fe fe-search"></i></button>
                                            </form>
                                        </div>
                                        <form action="{{ route('promotions_categories') }}" method="GET"
                                            class="d-flex align-items-center">
                                            <div id="addrowExample_filter" class="dataTables_filter mr-2">
                                                <label><strong>Date début
                                                        <input type="date" class="form-control"
                                                            aria-controls="addrowExample" name="dateDebut"
                                                            value="{{ $dateDebut }}">
                                                    </strong></label>
                                            </div>
                                            <div id="addrowExample_filter" class="dataTables_filter mr-2">
                                                <label><strong>Date fin:
                                                        <input type="date" class="form-control"
                                                            aria-controls="addrowExample" name="dateFin"
                                                            value="{{ $dateFin }}">
                                                    </strong></label>
                                            </div>
                                            {{-- <button type="submit" class="btn btn-primary">Chercher</button> --}}
                                            <button type="submit" class="btn btn-icon btn-primary"
                                                style="margin-top:10px;"><i class="fe fe-search"></i></button>

                                        </form>
                                    </div>
                                    <div class="col-sm-12 col-md-6" style="margin-left:1000px">
                                        <div class="dataTables_length" id="addrowExample_length"><label>Afficher
                                                <select id="entriesSelect" name="addrowExample_length"
                                                    aria-controls="addrowExample" class="form-control">
                                                    <option value=""></option>
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select></label></div>
                                    </div>
                                    <br/>
                                    <div class="table-responsive">

                                        <table class="table table-hover table-vcenter table-striped" cellspacing="0"
                                            id="addrowExample">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Nom promotion</th>
                                                    <th>Catégorie associé</th>
                                                    <th>Pourcentage</th>
                                                    <th>Date début</th>
                                                    <th>Date fin</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Nom promotion</th>
                                                    <th>Catégorie associé</th>
                                                    <th>Pourcentage</th>
                                                    <th>Date début</th>
                                                    <th>Date fin</th>
                                                    
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @foreach ($promotions as $promo)
                                                @foreach ($promo->categories as $categorie)
                                                    <tr class="gradeA">
                                                        <td>
                                                            {{ $categorie->pivot->id }}
                                                        </td>
                                                        <td>
                                                            {{ $promo->name_promo }}
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-info custom-badge">{{ $categorie->name }}</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="badge badge-warning custom-badge">{{ $promo->pourcentage_promo }} %</span>
                                                        </td>
                                                        <td> {{ $promo->date_deb_promo }}</td>
                                                        <td> {{ $promo->date_fin_promo }}</td>
                                                        {{-- <td class="actions">
                                                            <a href=""
                                                                class="btn btn-sm btn-icon on-default m-r-5 button-edit edit-icon"
                                                                data-toggle="tooltip" data-original-title="Modifier"><i
                                                                    class="fa fa-pencil fa-lg"
                                                                    aria-hidden="true"></i></a>
                                                            <button type="submit"
                                                                class="btn btn-sm btn-icon on-default button-remove delete-icon"
                                                                data-toggle="tooltip" data-original-title="Supprimer">
                                                                <i class="fa fa-trash fa-lg" aria-hidden="true"></i>
                                                            </button>
                                                            <form method="POST" action="">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </td> --}}
                                                    </tr>
                                                @endforeach
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="dataTables_info" id="addrowExample_info" role="status"
                                                aria-live="polite">Afficher de 1 à {{ $promo->count() }}
                                                sur {{ $totalPromotions }} promotions catégories</div>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    {{-- <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Voulez-vous supprimer la valeur de attribut de cette variation?',
                text: ' ',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4682B4',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, supprimer',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script> --}}
</body>

</html>
