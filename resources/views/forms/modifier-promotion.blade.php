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
    <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/plugins/multi-select/css/multi-select.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/dropify/css/dropify.min.css') }}">

    <!-- Core css -->
    <link rel="stylesheet" href="{{ asset('admin/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/theme4.css') }}" id="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                            <h1 class="page-title">Modifier une promotion</h1>
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
                                <div class="card-body">
                                    <form action="{{ route('modifier_promotion_traitement') }}" method="post">
                                        @csrf
                                        <input type="text" name="id" style="display:none;"
                                        value="{{ $promotion->id }}">
                                        <div class="form-group">
                                            <label class="form-label">Nom promotion</label>
                                            <input type="text" class="form-control" name="name_promo"
                                                value="{{ $promotion->name_promo }}">
                                        </div>
                                        @error('name_promo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <label class="form-label">Type promotion</label>
                                        <div class="form-group">
                                            <div class="custom-controls-stacked">
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        name="type_promo[]"
                                                        value="Categorie"{{ in_array('Catégorie', $promotion->type_promo) ? ' checked' : '' }}
                                                        id="categoryCheck">
                                                    <span class="custom-control-label">Catégorie</span>
                                                </label>
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        name="type_promo[]"
                                                        value="Produit"{{ in_array('Produit', $promotion->type_promo) ? ' checked' : '' }}
                                                        id="productCheck">
                                                    <span class="custom-control-label">Produit</span>
                                                </label>
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        name="type_promo[]"
                                                        value="Variation"{{ in_array('Variation', $promotion->type_promo) ? ' checked' : '' }}
                                                        id="variationCheck">
                                                    <span class="custom-control-label">Variation</span>
                                                </label>

                                            </div>
                                        </div>
                                        <div class="form-group multiselect_div d-none" id="categorySelect">
                                            <label><strong>Choisissez des catégories</strong></label>
                                            <select id="category-multiselect" name="categories[]"
                                                class="multiselect multiselect-custom" multiple="multiple">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $promotion->categories->contains('id', $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group multiselect_div d-none" id="productSelect">
                                            <label><strong>Choisissez des produits</strong></label>
                                            <select id="product-multiselect" name="products[]"
                                                class="multiselect multiselect-custom" multiple="multiple">
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}" {{ $promotion->products->contains('id', $product->id) ? 'selected' : '' }}>{{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group multiselect_div d-none" id="variationSelect">
                                            <label><strong>Choisissez des variations</strong></label>
                                            <select id="variation-multiselect" name="variations[]"
                                                class="multiselect multiselect-custom" multiple="multiple">
                                                @foreach ($variations as $variation)
                                                    <option value="{{ $variation->id }}" {{ $promotion->variations->contains('id', $variation->id) ? 'selected' : '' }}>{{ $variation->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Pourcentage promotion</label>
                                            <input type="text" class="form-control" name="pourcentage_promo"
                                                placeholder="Pourcentage de réduction"
                                                value="{{ $promotion->pourcentage_promo }}">
                                            @error('pourcentage_promo')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <label class="form-label">Date début promotion</label>
                                        <div class="input-group mb-3">
                                            <input type="date" class="form-control" name="date_deb_promo"
                                                value="{{ $promotion->date_deb_promo }}">
                                            @error('date_deb_promo')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Date fin promotion</label>
                                            <input type="date" class="form-control" name="date_fin_promo"
                                                value="{{ $promotion->date_fin_promo }}">
                                            @error('date_fin_promo')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <div class="d-flex justify-content-center" style="margin-bottom:20px;">
                                                <button type="submit" class="btn text-white bg-green"
                                                    style="width:150px"><i
                                                        class="fe fe-check mr-2"></i><strong>Modifier</strong></button>
                                            </div>

                                        </div>

                                    </form>
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
    <script src="{{ asset('admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
    <script src="{{ asset('admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
    <script src="{{ asset('admin/plugins/multi-select/js/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script>
    <script src="{{ asset('admin/plugins/dropify/js/dropify.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcBawfuhrpDqHTH6xQvTF4ktpyP09x721453kbb5rW2R74w6x8cl2tQp1q4j74" crossorigin="anonymous"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- Start core js and page js -->
    <script src="{{ asset('admin/js/core.js') }}"></script>
    <script src="{{ asset('assets/js/form/form-advanced.js') }}"></script>
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const categoryCheck = document.getElementById('categoryCheck');
            const productCheck = document.getElementById('productCheck');
            const variationCheck = document.getElementById('variationCheck');

            const categorySelect = document.getElementById('categorySelect');
            const productSelect = document.getElementById('productSelect');
            const variationSelect = document.getElementById('variationSelect');

            categoryCheck.addEventListener('change', function() {
                if (categoryCheck.checked) {
                    categorySelect.classList.remove('d-none');
                } else {
                    categorySelect.classList.add('d-none');
                }
            });

            productCheck.addEventListener('change', function() {
                if (productCheck.checked) {
                    productSelect.classList.remove('d-none');
                } else {
                    productSelect.classList.add('d-none');
                }
            });
            // productCheck.addEventListener('change', function() {
            //     if (productCheck.checked) {
            //         productSelect.classList.remove('d-none');
            //         $('#multiselect4-filter').multiselect(
            //         'rebuild'); // Réinitialiser et reconstruire le multiselect
            //     } else {
            //         productSelect.classList.add('d-none');
            //     }
            // });
            // productCheck.addEventListener('change', function() {
            //     if (productCheck.checked) {
            //         productSelect.classList.remove('d-none');
            //         $('#multiselect4-filter').multiSelect(); // Initialiser le multiselect
            //     } else {
            //         productSelect.classList.add('d-none');
            //     }
            // });

            variationCheck.addEventListener('change', function() {
                if (variationCheck.checked) {
                    variationSelect.classList.remove('d-none');
                } else {
                    variationSelect.classList.add('d-none');
                }
            });

        });
    </script> --}}
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const categoryCheck = document.getElementById('categoryCheck');
            const productCheck = document.getElementById('productCheck');
            const variationCheck = document.getElementById('variationCheck');

            const categorySelect = document.getElementById('categorySelect');
            const productSelect = document.getElementById('productSelect');
            const variationSelect = document.getElementById('variationSelect');

            categoryCheck.addEventListener('change', function() {
                if (categoryCheck.checked) {
                    categorySelect.classList.remove('d-none');
                    $('#category-multiselect').multiselect('rebuild');
                } else {
                    categorySelect.classList.add('d-none');
                }
            });

            productCheck.addEventListener('change', function() {
                if (productCheck.checked) {
                    productSelect.classList.remove('d-none');
                    $('#product-multiselect').multiselect('rebuild');
                } else {
                    productSelect.classList.add('d-none');
                }
            });

            variationCheck.addEventListener('change', function() {
                if (variationCheck.checked) {
                    variationSelect.classList.remove('d-none');
                    $('#variation-multiselect').multiselect('rebuild');
                } else {
                    variationSelect.classList.add('d-none');
                }
            });

            // Initialiser le multiselect pour chaque select
            $('#category-multiselect').multiselect();
            $('#product-multiselect').multiselect();
            $('#variation-multiselect').multiselect();
        });
    </script> --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const categoryCheck = document.getElementById('categoryCheck');
            const productCheck = document.getElementById('productCheck');
            const variationCheck = document.getElementById('variationCheck');

            const categorySelect = document.getElementById('categorySelect');
            const productSelect = document.getElementById('productSelect');
            const variationSelect = document.getElementById('variationSelect');

            // Fonction pour gérer l'affichage du multiselect en fonction de l'état de la checkbox
            function handleCheckboxChange(checkbox, selectElement, multiselectId) {
                if (checkbox.checked) {
                    selectElement.classList.remove('d-none');
                    $(`#${multiselectId}`).multiselect('rebuild');
                } else {
                    selectElement.classList.add('d-none');
                }
            }

            // Vérification initiale de l'état des cases à cocher
            handleCheckboxChange(categoryCheck, categorySelect, 'category-multiselect');
            handleCheckboxChange(productCheck, productSelect, 'product-multiselect');
            handleCheckboxChange(variationCheck, variationSelect, 'variation-multiselect');

            // Ajout des écouteurs d'événements pour gérer les changements
            categoryCheck.addEventListener('change', function() {
                handleCheckboxChange(categoryCheck, categorySelect, 'category-multiselect');
            });

            productCheck.addEventListener('change', function() {
                handleCheckboxChange(productCheck, productSelect, 'product-multiselect');
            });

            variationCheck.addEventListener('change', function() {
                handleCheckboxChange(variationCheck, variationSelect, 'variation-multiselect');
            });

            // Initialiser le multiselect pour chaque select
            $('#category-multiselect').multiselect();
            $('#product-multiselect').multiselect();
            $('#variation-multiselect').multiselect();
        });
    </script>



</body>

</html>
