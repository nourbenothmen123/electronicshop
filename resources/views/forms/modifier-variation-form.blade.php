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
                            <h1 class="page-title">Modifier une variation</h1>
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
                            <form action="{{ route('modifier_variation_traitement') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card">
                                    <div class="card-header">
                                    </div>
                                    <input type="text" name="id" style="display:none;"
                                        value="{{ $variations->id }}">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-left" style="margin-left:192px">
                                            <strong><label class="form-label">Nom variation
                                                </label></strong>
                                        </div>
                                        <div class="form-group d-flex justify-content-center">
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="nomvariation"
                                                    placeholder='entrer le nom de variation'
                                                    value="{{ $variations->name }}">
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
                                                    placeholder='entrer le prix' value="{{ $variations->prix }}">
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
                                                    placeholder='entrer la quantité en stock'
                                                    value="{{ $variations->quantity_stock }}">
                                            </div>
                                        </div>
                                        @error('quantité_en_stock')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <div class="form-group d-flex justify-content-center">
                                            <div class="col-md-8">
                                                <select class="custom-select form-control" name="id_produit"
                                                    data-attribute-url="{{ route('fetch_category_attributes') }}">
                                                    <option>Sélectionner le nom du produit</option>
                                                    @foreach ($products as $prod)
                                                        <option value="{{ $prod->id }}"
                                                            @if ($prod->id == $variations->product_id) selected @endif>
                                                            {{ $prod->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex justify-content-left" style="margin-left:415px">
                                            <strong><label style="font-size:16px">Image variation
                                                </label></strong>
                                        </div>
                                        <div>
                                            <div class="row clearfix row-deck justify-content-center">
                                                <div class="">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <input type="file" class="dropify-fr"
                                                                name="image_variation"
                                                                data-default-file="{{ asset('images/' . $variations->variation_image) }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div id="category-attributes-container">

                                            @foreach ($categoryAttributes as $attribute)
                                                <div class="form-group">
                                                    <label class="form-label">{{ $attribute->name }}</label>
                                                    <input type="text" class="form-control"
                                                        name="attributes[{{ $attribute->id }}][valeur]"
                                                        value="{{ $valeurAttributes->firstWhere('attribut_id', $attribute->id)->valeur ?? '' }}">
                                                </div>
                                                </br>
                                            @endforeach

                                        </div> --}}
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
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const productSelect = document.querySelector('select[name="id_produit"]');
            const attributesContainer = document.getElementById('category-attributes-container');
            productSelect.addEventListener('change', function() {
                const productId = this.value;
                const url = this.dataset.attributeUrl;

                if (productId) {
                    fetch(`${url}?product_id=${productId}`)
                        .then(response => response.json())
                        .then(data => {
                            // Clear previous attributes
                            attributesContainer.innerHTML = '';

                            if (data.attributes) {
                                data.attributes.forEach(attribute => {
                                    //     const attributeHtml = `
                                // <div class="form-group">
                                //     <input type="hidden" name="attributes[${attribute.id}][id_attribute]" value="${attribute.id}">
                                //     <input type="hidden" name="attributes[${attribute.id}][id_variation]" value="{{ $variations->id }}">
                                //     <label class="form-label">${attribute.name}</label>
                                //     <input type="text" class="form-control" name="attributes[${attribute.id}][valeur]" placeholder='entrer la valeur'>
                                // </div>`;
                                    const attributeHtml = `
                                    <div class="form-group">
                                        <label class="form-label">${attribute.name}</label>
                                        <input type="text" class="form-control" name="attributes[${attribute.id}][valeur]" value="$valeurAttribut->valeur">
                                    </div>`;
                                    attributesContainer.insertAdjacentHTML('beforeend',
                                        attributeHtml);
                                });
                            }
                        })
                        .catch(error => console.error('Error fetching attributes:', error));
                } else {
                    // Clear attributes if no product is selected
                    attributesContainer.innerHTML = '';
                }
            });
        });
    </script> --}}
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const productSelect = document.querySelector('select[name="id_produit"]');
            const attributesContainer = document.getElementById('category-attributes-container');
            const variationId = document.querySelector('input[name="id"]').value;

            productSelect.addEventListener('change', function() {
                const productId = this.value;
                const url = this.dataset.attributeUrl;

                if (productId) {
                    fetch(`${url}?product_id=${productId}&variation_id=${variationId}`)
                        .then(response => response.json())
                        .then(data => {
                            attributesContainer.innerHTML = '';

                            if (data.attributes) {
                                data.attributes.forEach(attribute => {
                                    const attributeValue = data.valeurAttributes.find(val => val
                                        .attribut_id === attribute.id)?.valeur || '';
                                    const attributeHtml = `
                                        <div class="form-group">
                                            <label class="form-label">${attribute.name}</label>
                                            <input type="text" class="form-control" name="attributes[${attribute.id}][valeur]" value="${attributeValue}" placeholder="entrer la valeur">
                                        </div>`;
                                    attributesContainer.insertAdjacentHTML('beforeend',
                                        attributeHtml);
                                });
                            }
                        })
                        .catch(error => console.error('Error fetching attributes:', error));
                } else {
                    attributesContainer.innerHTML = '';
                }
            });

            if (productSelect.value) {
                const event = new Event('change');
                productSelect.dispatchEvent(event);
            }
        });
    </script> --}}
</body>

</html>
