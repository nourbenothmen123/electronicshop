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


    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/theme4.css') }}" id="stylesheet" />
    <style>
        .custom-badge {
            font-size: 0.8em; /* Ajuster la taille de la police */
            padding: 0.5em;/* Ajuster le padding */
            border-radius: 0.5em; /* Ajuster les coins arrondis */
            color: white;
            margin: 0.15em; /* Ajouter de l'espace autour des badges */
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
                            <h3 class="page-title">Détails de la promotion</h3>
                        </div>
                        @auth
                            <form action="{{ route('logout') }}" method="POST">
                                <div class="right">
                                    <div class="notification d-flex">
                                        @csrf
                                        <button type="submit" class="btn btn-facebook"><i
                                                class="fa fa-power-off mr-2"></i>Se déconnecter</button>
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
                                    <h3 class="card-title">Détails de la promotion</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-hover table-striped ">
                                        <tr>
                                            <th>ID</th>
                                            <td>{{ $promotion->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nom de la promotion</th>
                                            <td>{{ $promotion->name_promo }}</td>
                                        </tr>
                                        <tr>
                                            <th>Type de promotion</th>
                                            <td><span class="badge badge-success custom-badge">{{ $promotion->type_promo }}</span></td>
                                        </tr>
                                        <tr>
                                            <th>Pourcentage de promotion</th>
                                            <td><span class="badge badge-warning custom-badge">{{ $promotion->pourcentage_promo }} %</span></td>
                                        </tr>
                                        <tr>
                                            <th>Catégories associées:</th>
                                            <td>
                                                @foreach ($promotion->categories as $category)
                                                    {{ $category->name }}
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Variations associées:</th>
                                            <td>
                                                @foreach ($promotion->variations as $variation)
                                                    <span class="badge badge-info custom-badge">{{ $variation->name }}</span>
                                                @endforeach
                                            </br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Produits associées:</th>
                                            <td>
                                                @foreach ($promotion->products as $product)
                                                <span class="badge badge-secondary custom-badge">{{ $product->name }}</span>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Date de début de la promotion</th>
                                            <td>{{ $promotion->date_deb_promo }}</td>
                                        </tr>
                                        <tr>
                                            <th>Date de fin de la promotion</th>
                                            <td>{{ $promotion->date_fin_promo }}</td>
                                        </tr>
                                    </table>
                                    <a href="{{ route('promotion') }}" class="btn btn-primary">Retour à la liste des
                                        promotions</a>
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

    <!-- Core JS and Page JS -->
    <script src="{{ asset('admin/js/core.js') }}"></script>
</body>

</html>
