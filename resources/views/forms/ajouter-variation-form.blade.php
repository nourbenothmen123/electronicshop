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
    <link rel="stylesheet" href="{{ asset('admin/plugins/dropify/css/dropify.min.css') }}">


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
                            <h1 class="page-title">Ajouter une variation</h1>
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
                            <form action="{{ route('variations.create') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card">
                                    <div class="card-header">
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-left" style="margin-left:192px">
                                            <strong><label class="form-label">Nom
                                                </label></strong>
                                        </div>
                                        <div class="form-group d-flex justify-content-center">
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="nomvariation"
                                                    placeholder='entrer le nom de votre variation'>
                                            </div>
                                        </div>
                                        @error('nomvariation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="d-flex justify-content-left" style="margin-left:192px">
                                            <strong><label class="form-label">Prix
                                                </label></strong>
                                        </div>
                                        <div class="form-group d-flex justify-content-center">
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="prix"
                                                    placeholder='entrer le prix'>
                                            </div>
                                        </div>

                                        @error('prix')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="d-flex justify-content-left" style="margin-left:192px">
                                            <strong><label class="form-label">Quantité en stock
                                                </label></strong>
                                        </div>
                                        <div class="form-group d-flex justify-content-center">
                                            <div class="col-md-8">
                                            <input type="text" class="form-control" name="quantité_en_stock"
                                                placeholder='entrer la quantité en stock'>
                                            </div>
                                        </div>
                                        @error('quantité_en_stock')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <div class="form-group d-flex justify-content-center">
                                            <div class="col-md-8">
                                                <select class="custom-select form-control" name="id_produit">
                                                    <option>Sélectionner le produit</option>
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id }}">
                                                            {{ $product->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex justify-content-left" style="margin-left:415px">
                                            <strong><label style="font-size:16px">Image variation
                                                </label></strong>
                                        </div>

                                        <div class="form-group">
                                            <div class="row clearfix row-deck justify-content-center">
                                                <div class="">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h3 class="card-title">
                                                                <small></small>
                                                            </h3>
                                                        </div>
                                                        <div class="card-body">
                                                            <input type="file" class="dropify-fr"
                                                                name="image_variation">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center" style="margin-bottom:20px;">
                                            <button type="submit" class="btn text-white bg-green"
                                                style="width:150px"><i
                                                    class="fe fe-check mr-2"></i><strong>Ajouter</strong></button>
                                        </div>
                                    </div>

                            </form>
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
    <script src="{{ asset('admin/bundles/selectize.bundle.js') }}"></script>

    <!-- Start core js and page js -->
    <script src="{{ asset('admin/js/core.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/selectize.js') }}"></script>
    <script src="{{ asset('admin/plugins/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/js/form/form-advanced.js') }}"></script>

</body>

</html>
