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
                            <h1 class="page-title">Ajouter une nouvelle catégorie</h1>
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
                            <form action="{{ route('categories.create') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title"></h3>
                                    </div>
                                    <div class="card-body">
                                        {{-- <div class="form-group">
                                            <div class="form-label"></div>
                                            <div class="custom-switches-stacked">
                                                <label class="custom-switch">
                                                    <input type="radio" name="option" value="1"
                                                        class="custom-switch-input" checked>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Ajouter une sous
                                                        catégorie</span>
                                                </label>
                                                <label class="custom-switch">
                                                    <input type="radio" name="option" value="2"
                                                        class="custom-switch-input">
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Ajouter une catégorie
                                                        parente</span>
                                                </label>
                                            </div>
                                        </div> --}}
                                        <div class="d-flex justify-content-left" style="margin-left:192px">
                                            <strong><label class="form-label">Nom
                                            </label></strong>
                                        </div>
                                        <div class="form-group d-flex justify-content-center">
                                            {{-- <label class="form-label ">Nom</label> --}}
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="nomcategorie"
                                                    placeholder='entrer le nom de votre catégorie' required>
                                            </div>
                                        </div>
                                        @error('nomcategorie')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="d-flex justify-content-left" style="margin-left:192px">
                                            <strong><label class="form-label">Description
                                            </label></strong>
                                        </div>

                                        <div class="form-group d-flex justify-content-center ">
                                            {{-- <label class="form-label">Description</label> --}}
                                            <div class="col-md-8">
                                                <textarea class="form-control" name="description" aria-label="With textarea"
                                                    placeholder='entrer la description de votre catégorie' required></textarea>
                                            </div>
                                        </div>

                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="form-group d-flex justify-content-center">
                                            <div class="col-md-8">
                                            
                                                <select class="custom-select form-control" name="parent_Id" 
                                                    id="parentCategorySelect" required>
                                                    <option>Selectionner la catégorie parente</option>
                                                    @foreach ($categories as $categorie)
                                                        <option value={{ $categorie->id }}>{{ $categorie->name }}
                                                        </option>
                                                    @endforeach
                                                    <option value={{ null }}>Aucun</option>
                                                </select>
                                            </div>
                                            
                                        </div>
                                        <div class="form-group d-flex justify-content-left" style="margin-left:415px">
                                            <strong><label style="font-size:16px">Image catégorie
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
                                                                name="image_categorie" required>
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

    <!-- Custom script to enable/disable select based on radio button -->
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const radioButton = document.querySelectorAll('input[name="option"]');
            const select = document.getElementById('parentCategorySelect');

            radioButton.forEach(function(radio) {
                radio.addEventListener('change', function() {
                    if (this.value === '1') {
                        select.disabled = false;
                    } else {
                        select.disabled = true;
                    }
                });
            });
        });
    </script> --}}
</body>

</html>
