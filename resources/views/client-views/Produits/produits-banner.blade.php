<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from portotheme.com/html/wolmart/shop-banner-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Mar 2024 11:41:34 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Electronic shop</title>

    <meta name="keywords" content="Marketplace ecommerce responsive HTML5 Template" />
    <meta name="description" content="Wolmart is powerful marketplace &amp; ecommerce responsive Html5 Template.">
    <meta name="author" content="D-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('client/assets/images/icons/favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">

    <!-- WebFont.js -->
    <script>
        WebFontConfig = {
            google: {
                families: ['Poppins:400,500,600,700']
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = 'assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <link rel="preload" href="{{ asset('client/assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2') }}"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="{{ asset('client/assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2') }}"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="{{ asset('client/assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2') }}"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="{{ asset('client/assets/fonts/wolmart87d5.woff?png09e') }}" as="font"
        type="font/woff" crossorigin="anonymous">

    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/vendor/animate/animate.min.css') }}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('client/assets/vendor/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/vendor/nouislider/nouislider.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('client/assets/vendor/magnific-popup/magnific-popup.min.css') }}">

    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/style.min.css') }}">
    <style>
        /* Enlarge the checkbox */
        .category-checkbox {
            transform: scale(1.5);
            /* Adjust the scale value as needed */
            margin-right: 0.5rem;
            /* Space between checkbox and label */

        }

        /* Change the label size */
        .category-label {
            font-size: 1.2rem;
            /* Adjust the font size as needed */
        }

        /* Add spacing between list items */
        .category-item {
            margin-bottom: 1rem;
            /* Adjust the margin value as needed */
        }

        .brand-item {
            margin-bottom: 1rem;
            /* Adjust the margin value as needed */
        }

        .brand-checkbox {
            transform: scale(1.5);
            /* Adjust the scale value as needed */
            margin-right: 0.5rem;
            /* Space between checkbox and label */

        }

        .description {
            text-decoration: underline;
            font-size:12px;
        }
    </style>
</head>

<body>
    <div class="page-wrapper">
        <h1 class="d-none">Electronic shop</h1>
        <!-- Start of Header -->
        @include('client-views.partials.header')
        <!-- End of Header -->


        <!-- Start of Main -->
        <main class="main">
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb bb-no">
                        <li><a href="{{ route('AccueilPage') }}">Accueil</a></li>
                        <li>Boutique</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of Page Content -->
            <div class="page-content">
                <div class="container">
                    <!-- Start of Shop Banner -->
                    <div class="shop-default-banner banner d-flex align-items-center mb-5 br-xs"
                        style="background-image: url(assets/images/shop/banner-produits-electronique.jpeg);">
                        <div class="banner-content">
                            <h4 class="banner-subtitle font-weight-bold">Accessories Collection</h4>
                            <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-normal">Smart Wrist
                                Watches</h3>
                            <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Discover
                                Now<i class="w-icon-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <!-- End of Shop Banner -->

                    {{-- <div class="shop-default-brands mb-5">
                        <div class="brands-swiper swiper-container swiper-theme "
                            data-swiper-options="{
                                'slidesPerView': 2,
                                'breakpoints': {
                                    '576': {
                                        'slidesPerView': 3
                                    },
                                    '768': {
                                        'slidesPerView': 4
                                    },
                                    '992': {
                                        'slidesPerView': 6
                                    },
                                    '1200': {
                                        'slidesPerView': 7
                                    }
                                },
                                'autoplay': {
                                    'delay': 4000,
                                    'disableOnInteraction': false
                                }
                            }">
                            <div class="swiper-wrapper row gutter-no cols-xl-7 cols-lg-6 cols-md-4 cols-sm-3 cols-2">
                                <div class="swiper-slide">
                                    <figure>
                                        <img src="assets/images/brands/category/1.png" alt="Brand" width="160"
                                            height="90" />
                                    </figure>
                                </div>
                                <div class="swiper-slide">
                                    <figure>
                                        <img src="assets/images/brands/category/2.png" alt="Brand" width="160"
                                            height="90" />
                                    </figure>
                                </div>
                                <div class="swiper-slide">
                                    <figure>
                                        <img src="assets/images/brands/category/3.png" alt="Brand" width="160"
                                            height="90" />
                                    </figure>
                                </div>
                                <div class="swiper-slide">
                                    <figure>
                                        <img src="assets/images/brands/category/4.png" alt="Brand" width="160"
                                            height="90" />
                                    </figure>
                                </div>
                                <div class="swiper-slide">
                                    <figure>
                                        <img src="assets/images/brands/category/5.png" alt="Brand" width="160"
                                            height="90" />
                                    </figure>
                                </div>
                                <div class="swiper-slide">
                                    <figure>
                                        <img src="assets/images/brands/category/6.png" alt="Brand" width="160"
                                            height="90" />
                                    </figure>
                                </div>
                                <div class="swiper-slide">
                                    <figure>
                                        <img src="assets/images/brands/category/7.png" alt="Brand" width="160"
                                            height="90" />
                                    </figure>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div> --}}
                    <!-- End of Shop Brands-->

                    <!-- Start of Shop Category -->
                    {{-- <div class="shop-default-category category-ellipse-section mb-6">
                        <div class="swiper-container swiper-theme shadow-swiper"
                            data-swiper-options="{
                            'spaceBetween': 20,
                            'slidesPerView': 2,
                            'breakpoints': {
                                '480': {
                                    'slidesPerView': 3
                                },
                                '576': {
                                    'slidesPerView': 4
                                },
                                '768': {
                                    'slidesPerView': 6
                                },
                                '992': {
                                    'slidesPerView': 7
                                },
                                '1200': {
                                    'slidesPerView': 8,
                                    'spaceBetween': 30
                                }
                            }
                        }">
                            <div
                                class="swiper-wrapper row gutter-lg cols-xl-8 cols-lg-7 cols-md-6 cols-sm-4 cols-xs-3 cols-2">
                                <div class="swiper-slide category-wrap">
                                    <div class="category category-ellipse">
                                        <figure class="category-media">
                                            <a href="shop-banner-sidebar.html">
                                                <img src="assets/images/categories/category-4.jpg" alt="Categroy"
                                                    width="190" height="190"
                                                    style="background-color: #5C92C0;" />
                                            </a>
                                        </figure>
                                        <div class="category-content">
                                            <h4 class="category-name">
                                                <a href="shop-banner-sidebar.html">Sports</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide category-wrap">
                                    <div class="category category-ellipse">
                                        <figure class="category-media">
                                            <a href="shop-banner-sidebar.html">
                                                <img src="assets/images/categories/category-5.jpg" alt="Categroy"
                                                    width="190" height="190"
                                                    style="background-color: #B8BDC1;" />
                                            </a>
                                        </figure>
                                        <div class="category-content">
                                            <h4 class="category-name">
                                                <a href="shop-banner-sidebar.html">Babies</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide category-wrap">
                                    <div class="category category-ellipse">
                                        <figure class="category-media">
                                            <a href="shop-banner-sidebar.html">
                                                <img src="assets/images/categories/category-6.jpg" alt="Categroy"
                                                    width="190" height="190"
                                                    style="background-color: #99C4CA;" />
                                            </a>
                                        </figure>
                                        <div class="category-content">
                                            <h4 class="category-name">
                                                <a href="shop-banner-sidebar.html">Sneakers</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide category-wrap">
                                    <div class="category category-ellipse">
                                        <figure class="category-media">
                                            <a href="shop-banner-sidebar.html">
                                                <img src="assets/images/categories/category-7.jpg" alt="Categroy"
                                                    width="190" height="190"
                                                    style="background-color: #4E5B63;" />
                                            </a>
                                        </figure>
                                        <div class="category-content">
                                            <h4 class="category-name">
                                                <a href="shop-banner-sidebar.html">Cameras</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide category-wrap">
                                    <div class="category category-ellipse">
                                        <figure class="category-media">
                                            <a href="shop-banner-sidebar.html">
                                                <img src="assets/images/categories/category-8.jpg" alt="Categroy"
                                                    width="190" height="190"
                                                    style="background-color: #D3E5EF;" />
                                            </a>
                                        </figure>
                                        <div class="category-content">
                                            <h4 class="category-name">
                                                <a href="shop-banner-sidebar.html">Games</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide category-wrap">
                                    <div class="category category-ellipse">
                                        <figure class="category-media">
                                            <a href="shop-banner-sidebar.html">
                                                <img src="assets/images/categories/category-9.jpg" alt="Categroy"
                                                    width="190" height="190"
                                                    style="background-color: #65737C;" />
                                            </a>
                                        </figure>
                                        <div class="category-content">
                                            <h4 class="category-name">
                                                <a href="shop-banner-sidebar.html">Kitchen</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide category-wrap">
                                    <div class="category category-ellipse">
                                        <figure class="category-media">
                                            <a href="shop-banner-sidebar.html">
                                                <img src="assets/images/categories/category-20.jpg" alt="Categroy"
                                                    width="190" height="190"
                                                    style="background-color: #E4E4E4;" />
                                            </a>
                                        </figure>
                                        <div class="category-content">
                                            <h4 class="category-name">
                                                <a href="shop-banner-sidebar.html">Watches</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide category-wrap">
                                    <div class="category category-ellipse">
                                        <figure class="category-media">
                                            <a href="shop-banner-sidebar.html">
                                                <img src="assets/images/categories/category-21.jpg" alt="Categroy"
                                                    width="190" height="190"
                                                    style="background-color: #D3D8DE;" />
                                            </a>
                                        </figure>
                                        <div class="category-content">
                                            <h4 class="category-name">
                                                <a href="shop-banner-sidebar.html">Clothes</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div> --}}
                    <!-- End of Shop Category -->

                    <!-- Start of Shop Content -->
                    <div class="shop-content row gutter-lg mb-10">
                        <!-- Start of Sidebar, Shop Sidebar -->
                        <aside class="sidebar shop-sidebar sticky-sidebar-wrapper sidebar-fixed">
                            <!-- Start of Sidebar Overlay -->
                            <div class="sidebar-overlay"></div>
                            <a class="sidebar-close" href="#"><i class="close-icon"></i></a>

                            <!-- Start of Sidebar Content -->
                            <div class="sidebar-content scrollable">
                                <!-- Start of Sticky Sidebar -->
                                <div class="sticky-sidebar">
                                    <div class="filter-actions">
                                        <label>Filtre :</label>
                                        <a href="#" class="btn btn-dark btn-link filter-clean">Nettoie tout</a>
                                    </div>
                                    <form id="filter-form" action="{{ route('filtrer-products') }}" method="GET">
                                        <div class="widget widget-collapsible">
                                            <h3 class="widget-title"><label>Tous les catégories</label></h3>
                                            <ul class="widget-body filter-items item-check mt-3">
                                                @foreach ($categoriesProduit as $categorie)
                                                    <li class="category-item">
                                                        <input type="checkbox" class="category-checkbox"
                                                            value="{{ $categorie->id }}" name="categories[]"
                                                            @if (in_array($categorie->id, request('categories', []))) checked @endif>
                                                        <label>{{ $categorie->name }}</label>
                                                    </li>
                                                @endforeach
                                            </ul>

                                        </div>
                                        <!-- End of Collapsible Widget -->
                                        <!-- Start of Collapsible Widget -->
                                        <div class="widget widget-collapsible">
                                            <h3 class="widget-title"><label>Marques</label></h3>
                                            <ul class="widget-body filter-items item-check mt-3">
                                                @foreach ($marques as $marque)
                                                    <li class="brand-item">
                                                        <input type="checkbox" class="brand-checkbox" name="brands[]"
                                                            value="{{ $marque->id }}"
                                                            @if (in_array($marque->id, request('brands', []))) checked @endif>
                                                        <label>{{ $marque->name }}</label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <!-- End of Collapsible Widget -->
                                    </form>
                                    <!-- Start of Collapsible Widget -->
                                    <!-- End of Collapsible Widget -->
                                </div>
                                <!-- End of Sidebar Content -->
                            </div>
                            <!-- End of Sidebar Content -->
                        </aside>
                        <!-- End of Shop Sidebar -->

                        <!-- Start of Shop Main Content -->
                        <div class="main-content">
                            <nav class="toolbox sticky-toolbox sticky-content fix-top">
                                <div class="toolbox-left">
                                    <a href="#"
                                        class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle 
                                        btn-icon-left"><i
                                            class="w-icon-category"></i><span>Filtres</span></a>
                                    <div class="toolbox-item toolbox-sort select-box text-dark">
                                        <label>Trier par :</label>
                                        <select name="orderby" class="form-control">
                                            <option value="default" selected="selected">Tri par défaut</option>
                                            <option value="popularity">Trier par popularité</option>
                                            <option value="rating">Trier par note moyenne</option>
                                            <option value="date">Trier par dernier</option>
                                            <option value="price-low">Trier par prix : du plus bas au plus élevé
                                            </option>
                                            <option value="price-high">Trier par prix : du haut au bas</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="toolbox-right">
                                    <div class="toolbox-item toolbox-show select-box">
                                        <select name="count" class="form-control">
                                            <option value="9">Afficher 9</option>
                                            <option value="12" selected="selected">Afficher 12</option>
                                            <option value="24">Afficher 24</option>
                                            <option value="36">Afficher 36</option>
                                        </select>
                                    </div>
                                    <div class="toolbox-item toolbox-layout">
                                        <a href="{{ route('shop-banner-sidebar') }}"
                                            class="icon-mode-grid btn-layout active">
                                            <i class="w-icon-grid"></i>
                                        </a>
                                        <a href="{{ route('produits-liste') }}" class="icon-mode-list btn-layout">
                                            <i class="w-icon-list"></i>
                                        </a>
                                    </div>
                                </div>
                            </nav>
                            <div class="product-wrapper row cols-md-3 cols-sm-2 cols-2">
                                @foreach ($produits as $prod)
                                    <div class="product-wrap">
                                        <div class="product text-center">
                                            <figure class="product-media">
                                                <a href="{{ route('product-variation', $prod->id) }}">
                                                    <img src="../../images/{{ $prod->image }}" alt="Product"
                                                        width="150" height="200" />
                                                </a>
                                                <div class="product-action-horizontal">
                                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                        title="Add to cart"></a>
                                                    <a href="#"
                                                        class="btn-product-icon btn-wishlist w-icon-heart"
                                                        title="Wishlist"></a>
                                                    {{-- <a href="#"
                                                        class="btn-product-icon btn-compare w-icon-compare"
                                                        title="Compare"></a> --}}
                                                    <a href="#"
                                                        class="btn-product-icon btn-quickview w-icon-search"
                                                        title="Quick View" data-id="{{ $prod->id }}"
                                                        data-name="{{ $prod->name }}"
                                                        data-category="{{ $prod->category ? $prod->category->name : 'Aucune' }}"
                                                        data-image="../../images/{{ $prod->image }}"
                                                        data-description="{{ $prod->description }}"
                                                        data-price="{{ $prod->variations->isNotEmpty() ? $prod->variations->min('prix'). ' TND' : '' }}"
                                                        @if ($prod->marque) data-imagemarque="../../images/{{ $prod->marque->image }}"
                                                        data-nommarque="{{ $prod->marque->name }}"
                                                    @else
                                                        data-nommarque="Aucune" @endif></a>
                                                </div>
                                            </figure>
                                            <div class="product-details">
                                                <div class="product-cat">
                                                    <a
                                                        href="shop-banner-sidebar.html">{{ $prod->category ? $prod->category->name : 'Aucune' }}</a>
                                                </div>
                                                <h3 class="product-name">
                                                    <a href="product-default.html">{{ $prod->name }}</a>
                                                </h3>
                                                {{-- <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 100%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <a href="product-default.html" class="rating-reviews">(3
                                                        reviews)</a>
                                                </div> --}}
                                                @if ($prod->variations->isNotEmpty())
                                                    <?php $minPrice = $prod->variations->min('prix'); ?>
                                                    <div class="product-pa-wrapper">
                                                        <div class="product-price">
                                                            {{ $minPrice }} TND
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="toolbox toolbox-pagination justify-content-between">
                                <p class="showing-info mb-2 mb-sm-0">
                                    Afficher<span>1-12 sur 60</span>Produits
                                </p>
                                <ul class="pagination">
                                    <li class="prev disabled">
                                        <a href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                            <i class="w-icon-long-arrow-left"></i>Précédent
                                        </a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="next">
                                        <a href="#" aria-label="Next">
                                            Suivant<i class="w-icon-long-arrow-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- End of Shop Main Content -->
                    </div>
                    <!-- End of Shop Content -->
                </div>
            </div>
            <!-- End of Page Content -->
        </main>
        <!-- End of Main -->

        @include('client-views.partials.footer')
        <!-- End of Footer -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Start of Sticky Footer -->
    @include('client-views.partials.sticky-footer')
    <!-- End of Sticky Footer -->

    <!-- Start of Scroll Top -->
    <a id="scroll-top" class="scroll-top" href="#top" title="Top" role="button"> <i
            class="w-icon-angle-up"></i> <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 70">
            <circle id="progress-indicator" fill="transparent" stroke="#000000" stroke-miterlimit="10"
                cx="35" cy="35" r="34" style="stroke-dasharray: 16.4198, 400;"></circle>
        </svg> </a>
    <!-- End of Scroll Top -->

    <!-- Start of Mobile Menu -->
    <div class="mobile-menu-wrapper">
        <div class="mobile-menu-overlay"></div>
        <!-- End of .mobile-menu-overlay -->

        <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
        <!-- End of .mobile-menu-close -->

        <div class="mobile-menu-container scrollable">
            <form action="#" method="get" class="input-wrapper">
                <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search"
                    required />
                <button class="btn btn-search" type="submit">
                    <i class="w-icon-search"></i>
                </button>
            </form>
            <!-- End of Search Form -->
            <div class="tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#main-menu" class="nav-link active">Main Menu</a>
                    </li>
                    <li class="nav-item">
                        <a href="#categories" class="nav-link">Categories</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="main-menu">
                    <ul class="mobile-menu">
                        <li><a href="demo1.html">Home</a></li>
                        <li>
                            <a href="shop-banner-sidebar.html">Shop</a>
                            <ul>
                                <li>
                                    <a href="#">Shop Pages</a>
                                    <ul>
                                        <li><a href="shop-banner-sidebar.html">Banner With Sidebar</a></li>
                                        <li><a href="shop-boxed-banner.html">Boxed Banner</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Full Width Banner</a></li>
                                        <li><a href="shop-horizontal-filter.html">Horizontal Filter<span
                                                    class="tip tip-hot">Hot</span></a></li>
                                        <li><a href="shop-off-canvas.html">Off Canvas Sidebar<span
                                                    class="tip tip-new">New</span></a></li>
                                        <li><a href="shop-infinite-scroll.html">Infinite Ajax Scroll</a></li>
                                        <li><a href="shop-right-sidebar.html">Right Sidebar</a></li>
                                        <li><a href="shop-both-sidebar.html">Both Sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Shop Layouts</a>
                                    <ul>
                                        <li><a href="shop-grid-3cols.html">3 Columns Mode</a></li>
                                        <li><a href="shop-grid-4cols.html">4 Columns Mode</a></li>
                                        <li><a href="shop-grid-5cols.html">5 Columns Mode</a></li>
                                        <li><a href="shop-grid-6cols.html">6 Columns Mode</a></li>
                                        <li><a href="shop-grid-7cols.html">7 Columns Mode</a></li>
                                        <li><a href="shop-grid-8cols.html">8 Columns Mode</a></li>
                                        <li><a href="shop-list.html">List Mode</a></li>
                                        <li><a href="shop-list-sidebar.html">List Mode With Sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Product Pages</a>
                                    <ul>
                                        <li><a href="product-variable.html">Variable Product</a></li>
                                        <li><a href="product-featured.html">Featured &amp; Sale</a></li>
                                        <li><a href="product-accordion.html">Data In Accordion</a></li>
                                        <li><a href="product-section.html">Data In Sections</a></li>
                                        <li><a href="product-swatch.html">Image Swatch</a></li>
                                        <li><a href="product-extended.html">Extended Info</a>
                                        </li>
                                        <li><a href="product-without-sidebar.html">Without Sidebar</a></li>
                                        <li><a href="product-video.html">360<sup>o</sup> &amp; Video<span
                                                    class="tip tip-new">New</span></a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Product Layouts</a>
                                    <ul>
                                        <li><a href="product-default.html">Default<span
                                                    class="tip tip-hot">Hot</span></a></li>
                                        <li><a href="product-vertical.html">Vertical Thumbs</a></li>
                                        <li><a href="product-grid.html">Grid Images</a></li>
                                        <li><a href="product-masonry.html">Masonry</a></li>
                                        <li><a href="product-gallery.html">Gallery</a></li>
                                        <li><a href="product-sticky-info.html">Sticky Info</a></li>
                                        <li><a href="product-sticky-thumb.html">Sticky Thumbs</a></li>
                                        <li><a href="product-sticky-both.html">Sticky Both</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="vendor-dokan-store.html">Vendor</a>
                            <ul>
                                <li>
                                    <a href="#">Store Listing</a>
                                    <ul>
                                        <li><a href="vendor-dokan-store-list.html">Store listing 1</a></li>
                                        <li><a href="vendor-wcfm-store-list.html">Store listing 2</a></li>
                                        <li><a href="vendor-wcmp-store-list.html">Store listing 3</a></li>
                                        <li><a href="vendor-wc-store-list.html">Store listing 4</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Vendor Store</a>
                                    <ul>
                                        <li><a href="vendor-dokan-store.html">Vendor Store 1</a></li>
                                        <li><a href="vendor-wcfm-store-product-grid.html">Vendor Store 2</a></li>
                                        <li><a href="vendor-wcmp-store-product-grid.html">Vendor Store 3</a></li>
                                        <li><a href="vendor-wc-store-product-grid.html">Vendor Store 4</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="blog.html">Blog</a>
                            <ul>
                                <li><a href="blog.html">Classic</a></li>
                                <li><a href="blog-listing.html">Listing</a></li>
                                <li>
                                    <a href="https://www.portotheme.com/html/wolmart/blog-grid.html">Grid</a>
                                    <ul>
                                        <li><a href="blog-grid-2cols.html">Grid 2 columns</a></li>
                                        <li><a href="blog-grid-3cols.html">Grid 3 columns</a></li>
                                        <li><a href="blog-grid-4cols.html">Grid 4 columns</a></li>
                                        <li><a href="blog-grid-sidebar.html">Grid sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Masonry</a>
                                    <ul>
                                        <li><a href="blog-masonry-2cols.html">Masonry 2 columns</a></li>
                                        <li><a href="blog-masonry-3cols.html">Masonry 3 columns</a></li>
                                        <li><a href="blog-masonry-4cols.html">Masonry 4 columns</a></li>
                                        <li><a href="blog-masonry-sidebar.html">Masonry sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Mask</a>
                                    <ul>
                                        <li><a href="blog-mask-grid.html">Blog mask grid</a></li>
                                        <li><a href="blog-mask-masonry.html">Blog mask masonry</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="post-single.html">Single Post</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="about-us.html">Pages</a>
                            <ul>

                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="become-a-vendor.html">Become A Vendor</a></li>
                                <li><a href="contact-us.html">Contact Us</a></li>
                                <li><a href="login.html">Login</a></li>
                                <li><a href="faq.html">FAQs</a></li>
                                <li><a href="error-404.html">Error 404</a></li>
                                <li><a href="coming-soon.html">Coming Soon</a></li>
                                <li><a href="wishlist.html">Wishlist</a></li>
                                <li><a href="cart.html">Cart</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="my-account.html">My Account</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="elements.html">Elements</a>
                            <ul>
                                <li><a href="element-products.html">Products</a></li>
                                <li><a href="element-titles.html">Titles</a></li>
                                <li><a href="element-typography.html">Typography</a></li>
                                <li><a href="element-categories.html">Product Category</a></li>
                                <li><a href="element-buttons.html">Buttons</a></li>
                                <li><a href="element-accordions.html">Accordions</a></li>
                                <li><a href="element-alerts.html">Alert &amp; Notification</a></li>
                                <li><a href="element-tabs.html">Tabs</a></li>
                                <li><a href="element-testimonials.html">Testimonials</a></li>
                                <li><a href="element-blog-posts.html">Blog Posts</a></li>
                                <li><a href="element-instagrams.html">Instagrams</a></li>
                                <li><a href="element-cta.html">Call to Action</a></li>
                                <li><a href="element-vendors.html">Vendors</a></li>
                                <li><a href="element-icon-boxes.html">Icon Boxes</a></li>
                                <li><a href="element-icons.html">Icons</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane" id="categories">
                    <ul class="mobile-menu">
                        <li>
                            <a href="shop-fullwidth-banner.html">
                                <i class="w-icon-tshirt2"></i>Fashion
                            </a>
                            <ul>
                                <li>
                                    <a href="#">Women</a>
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">New Arrivals</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Best Sellers</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Trending</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Clothing</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Shoes</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Bags</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Accessories</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Jewlery &
                                                Watches</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Sale</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Men</a>
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">New Arrivals</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Best Sellers</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Trending</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Clothing</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Shoes</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Bags</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Accessories</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Jewlery &
                                                Watches</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="shop-fullwidth-banner.html">
                                <i class="w-icon-home"></i>Home & Garden
                            </a>
                            <ul>
                                <li>
                                    <a href="#">Bedroom</a>
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">Beds, Frames &
                                                Bases</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Dressers</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Nightstands</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Kid's Beds &
                                                Headboards</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Armoires</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Living Room</a>
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">Coffee Tables</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Chairs</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Tables</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Futons & Sofa
                                                Beds</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Cabinets &
                                                Chests</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Office</a>
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">Office Chairs</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Desks</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Bookcases</a></li>
                                        <li><a href="shop-fullwidth-banner.html">File Cabinets</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Breakroom
                                                Tables</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Kitchen & Dining</a>
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">Dining Sets</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Kitchen Storage
                                                Cabinets</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Bashers Racks</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Dining Chairs</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Dining Room
                                                Tables</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Bar Stools</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="shop-fullwidth-banner.html">
                                <i class="w-icon-electronics"></i>Electronics
                            </a>
                            <ul>
                                <li>
                                    <a href="#">Laptops &amp; Computers</a>
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">Desktop
                                                Computers</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Monitors</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Laptops</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Hard Drives &amp;
                                                Storage</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Computer
                                                Accessories</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">TV &amp; Video</a>
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">TVs</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Home Audio
                                                Speakers</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Projectors</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Media Streaming
                                                Devices</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Digital Cameras</a>
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">Digital SLR
                                                Cameras</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Sports & Action
                                                Cameras</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Camera Lenses</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Photo Printer</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Digital Memory
                                                Cards</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Cell Phones</a>
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">Carrier Phones</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Unlocked Phones</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Phone & Cellphone
                                                Cases</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Cellphone
                                                Chargers</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="shop-fullwidth-banner.html">
                                <i class="w-icon-furniture"></i>Furniture
                            </a>
                            <ul>
                                <li>
                                    <a href="#">Furniture</a>
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">Sofas & Couches</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Armchairs</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Bed Frames</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Beside Tables</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Dressing Tables</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Lighting</a>
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">Light Bulbs</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Lamps</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Celling Lights</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Wall Lights</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Bathroom
                                                Lighting</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Home Accessories</a>
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">Decorative
                                                Accessories</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Candals &
                                                Holders</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Home Fragrance</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Mirrors</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Clocks</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Garden & Outdoors</a>
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">Garden
                                                Furniture</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Lawn Mowers</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Pressure
                                                Washers</a></li>
                                        <li><a href="shop-fullwidth-banner.html">All Garden
                                                Tools</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Outdoor Dining</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="shop-fullwidth-banner.html">
                                <i class="w-icon-heartbeat"></i>Healthy & Beauty
                            </a>
                        </li>
                        <li>
                            <a href="shop-fullwidth-banner.html">
                                <i class="w-icon-gift"></i>Gift Ideas
                            </a>
                        </li>
                        <li>
                            <a href="shop-fullwidth-banner.html">
                                <i class="w-icon-gamepad"></i>Toy & Games
                            </a>
                        </li>
                        <li>
                            <a href="shop-fullwidth-banner.html">
                                <i class="w-icon-ice-cream"></i>Cooking
                            </a>
                        </li>
                        <li>
                            <a href="shop-fullwidth-banner.html">
                                <i class="w-icon-ios"></i>Smart Phones
                            </a>
                        </li>
                        <li>
                            <a href="shop-fullwidth-banner.html">
                                <i class="w-icon-camera"></i>Cameras & Photo
                            </a>
                        </li>
                        <li>
                            <a href="shop-fullwidth-banner.html">
                                <i class="w-icon-ruby"></i>Accessories
                            </a>
                        </li>
                        <li>
                            <a href="shop-banner-sidebar.html"
                                class="font-weight-bold text-primary text-uppercase ls-25">
                                View All Categories<i class="w-icon-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Mobile Menu -->

    <!-- Start of Quick View -->
    
    <div class="product product-single product-popup">
        <div class="row gutter-lg">
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="product-gallery product-gallery-sticky">
                    <div class="swiper-container product-single-swiper swiper-theme nav-inner">
                        <div class="swiper-wrapper row cols-1 gutter-no">
                            <div class="swiper-slide">
                                <figure class="product-image">
                                    <img src="assets/images/products/popup/1-440x494.jpg"
                                        data-zoom-image="assets/images/products/popup/1-800x900.jpg"
                                        alt="Water Boil Black Utensil" width="800" height="900">
                                </figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="product-image">
                                    <img src="assets/images/products/popup/2-440x494.jpg"
                                        data-zoom-image="assets/images/products/popup/2-800x900.jpg"
                                        alt="Water Boil Black Utensil" width="800" height="900">
                                </figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="product-image">
                                    <img src="assets/images/products/popup/3-440x494.jpg"
                                        data-zoom-image="assets/images/products/popup/3-800x900.jpg"
                                        alt="Water Boil Black Utensil" width="800" height="900">
                                </figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="product-image">
                                    <img src="assets/images/products/popup/4-440x494.jpg"
                                        data-zoom-image="assets/images/products/popup/4-800x900.jpg"
                                        alt="Water Boil Black Utensil" width="800" height="900">
                                </figure>
                            </div>
                        </div>
                        <button class="swiper-button-next"></button>
                        <button class="swiper-button-prev"></button>
                    </div>
                    <div class="product-thumbs-wrap swiper-container"
                        data-swiper-options="{
                        'navigation': {
                            'nextEl': '.swiper-button-next',
                            'prevEl': '.swiper-button-prev'
                        }
                    }">
                        <div class="product-thumbs swiper-wrapper row cols-4 gutter-sm">
                            <div class="product-thumb swiper-slide">
                                <img src="assets/images/products/popup/1-103x116.jpg" alt="Product Thumb"
                                    width="103" height="116">
                            </div>
                            <div class="product-thumb swiper-slide">
                                <img src="assets/images/products/popup/2-103x116.jpg" alt="Product Thumb"
                                    width="103" height="116">
                            </div>
                            <div class="product-thumb swiper-slide">
                                <img src="assets/images/products/popup/3-103x116.jpg" alt="Product Thumb"
                                    width="103" height="116">
                            </div>
                            <div class="product-thumb swiper-slide">
                                <img src="assets/images/products/popup/4-103x116.jpg" alt="Product Thumb"
                                    width="103" height="116">
                            </div>
                        </div>
                        <button class="swiper-button-next"></button>
                        <button class="swiper-button-prev"></button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 overflow-hidden p-relative">
                <div class="product-details scrollable pl-0">
                    <h2 class="product-title">Electronics Black Wrist Watch</h2>
                    <div class="product-bm-wrapper">
                        <figure class="brand">
                            <img src="assets/images/products/brand/brand-1.jpg" alt="Brand" width="80"
                                height="10" />
                        </figure>
                        <div class="product-meta">
                            <div class="product-categories">
                                Categorie:
                                <span class="product-category"><a href="#">Electronics</a></span>
                            </div>
                            <div class="product-sku">
                                Marque<span>MS46891340</span>
                            </div>
                        </div>

                    </div>

                    <hr class="product-divider">

                    <div class="product-price">$40.00</div>

                    {{-- <div class="ratings-container">
                        <div class="ratings-full">
                            <span class="ratings" style="width: 80%;"></span>
                            <span class="tooltiptext tooltip-top"></span>
                        </div>
                        <a href="#" class="rating-reviews">(3 Reviews)</a>
                    </div> --}}
                    <div>
                        <p class="description">Description</p>
                    </div>
                    <div class="product-short-desc">
                        <ul class="list-type-check list-style-none">
                            <p>Ultrices eros in cursus turpis massa cursus mattis.</p>
                        </ul>
                    </div>

                    <hr class="product-divider">

                    {{-- <div class="product-form product-variation-form product-color-swatch">
                        <label>Color:</label>
                        <div class="d-flex align-items-center product-variations">
                            <a href="#" class="color" style="background-color: #ffcc01"></a>
                            <a href="#" class="color" style="background-color: #ca6d00;"></a>
                            <a href="#" class="color" style="background-color: #1c93cb;"></a>
                            <a href="#" class="color" style="background-color: #ccc;"></a>
                            <a href="#" class="color" style="background-color: #333;"></a>
                        </div>
                    </div> --}}
                    {{-- <div class="product-form product-variation-form product-size-swatch">
                        <label class="mb-1">Size:</label>
                        <div class="flex-wrap d-flex align-items-center product-variations">
                            <a href="#" class="size">Small</a>
                            <a href="#" class="size">Medium</a>
                            <a href="#" class="size">Large</a>
                            <a href="#" class="size">Extra Large</a>
                        </div>
                        <a href="#" class="product-variation-clean">Clean All</a>
                    </div> --}}

                    {{-- <div class="product-variation-price">
                        <span></span>
                    </div> --}}

                    {{-- <div class="product-form">
                        <div class="product-qty-form">
                            <div class="input-group">
                                <input class="quantity form-control" type="number" min="1" max="10000000">
                                <button class="quantity-plus w-icon-plus"></button>
                                <button class="quantity-minus w-icon-minus"></button>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-cart">
                            <i class="w-icon-cart"></i>
                            <span>Add to Cart</span>
                        </button>
                    </div> --}}

                    {{-- <div class="social-links-wrapper">
                        <div class="social-links">
                            <div class="social-icons social-no-color border-thin">
                                <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                <a href="#" class="social-icon social-pinterest fab fa-pinterest-p"></a>
                                <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                                <a href="#" class="social-icon social-youtube fab fa-linkedin-in"></a>
                            </div>
                        </div>
                        <span class="divider d-xs-show"></span>
                        <div class="product-link-wrapper d-flex">
                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"><span></span></a>
                            <a href="#"
                                class="btn-product-icon btn-compare btn-icon-left w-icon-compare"><span></span></a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- End of Quick view -->

    <!-- Plugin JS File -->
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('client/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('client/assets/vendor/sticky/sticky.js') }}"></script>
    <script src="{{ asset('client/assets/vendor/jquery.plugin/jquery.plugin.min.js') }}"></script>
    <script src="{{ asset('client/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('client/assets/vendor/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('client/assets/vendor/jquery.countdown/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('client/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('client/assets/vendor/zoom/jquery.zoom.js') }}"></script>
    <script src="{{ asset('client/assets/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('client/assets/js/main.min.js') }}"></script>
    {{-- <script src="{{ asset('client/header/js/main.js') }}"></script> --}}
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const categoryCheckboxes = document.querySelectorAll('.category-checkbox');
        
            categoryCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const selectedCategories = Array.from(categoryCheckboxes)
                        .filter(checkbox => checkbox.checked)
                        .map(checkbox => checkbox.value);
        
                    fetchProducts(selectedCategories);
                });
            });
        
            function fetchProducts(categories) {
                fetch(`/filter-products?categories=${categories.join(',')}`)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('product-results').innerHTML = data;
                    });
            }
        });
        </script> --}}
    <script>
        document.querySelectorAll('.brand-checkbox, .category-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                //submit the form automatically when a checkbox is checked or unchecked
                document.getElementById('filter-form').submit();
            });
        });
    </script>
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.btn-quickview').forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();

                    // Récupérer les détails du produit depuis les attributs de données
                    var id = this.dataset.id;
                    var name = this.dataset.name;
                    var category = this.dataset.category;
                    var image = this.dataset.image;
                    var price = this.dataset.price;
                    var description = this.dataset.description;
                    var nommarque = this.dataset.nommarque;
                    var imagemarque = this.dataset.imagemarque;

                    // Remplir les détails de la popup
                    document.querySelector('.product-popup .product-title').textContent = name;
                    document.querySelector('.product-popup .product-category a').textContent =
                        category;
                    document.querySelector('.product-popup .product-gallery .product-image img')
                        .src = image;
                    document.querySelector('.product-popup .product-price').textContent = price;
                    document.querySelector('.product-popup .product-short-desc').textContent =
                        description;
                    document.querySelector('.product-popup .product-sku').textContent = nommarque;
                    document.querySelector('.product-popup .product-details .brand img').src =
                        imagemarque;





                    // Afficher la popup
                    document.querySelector('.product-popup').style.display = 'block';
                });
            });

            // Fermer la popup
            document.querySelector('.product-popup .close').addEventListener('click', function() {
                document.querySelector('.product-popup').style.display = 'none';
            });
        });
    </script> --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Vérifier que les éléments .btn-quickview existent
            var quickviewButtons = document.querySelectorAll('.btn-quickview');
            if (quickviewButtons.length > 0) {
                quickviewButtons.forEach(function(button) {
                    button.addEventListener('click', function(event) {
                        event.preventDefault();
    
                        // Récupérer les détails du produit depuis les attributs de données
                        var id = this.dataset.id;
                        var name = this.dataset.name;
                        var category = this.dataset.category;
                        var image = this.dataset.image;
                        var price = this.dataset.price;
                        var description = this.dataset.description;
                        var nommarque = this.dataset.nommarque;
                        var imagemarque = this.dataset.imagemarque;
    
                        // Remplir les détails de la popup
                        var productPopup = document.querySelector('.product-popup');
                        if (productPopup) {
                            productPopup.querySelector('.product-title').textContent = name;
                            productPopup.querySelector('.product-category a').textContent = category;
                            productPopup.querySelector('.product-gallery .product-image img').src = image;
                            productPopup.querySelector('.product-price').textContent = price;
                            productPopup.querySelector('.product-short-desc').textContent = description;
                            productPopup.querySelector('.product-sku').textContent = nommarque;
                            productPopup.querySelector('.brand img').src = imagemarque;
    
                            // Afficher la popup
                            productPopup.style.display = 'block';
                        }
                    });
                });
            }
    
            // Vérifier que l'élément .product-popup .close existe
            var closeButton = document.querySelector('.product-popup .close');
            if (closeButton) {
                closeButton.addEventListener('click', function() {
                    var productPopup = document.querySelector('.product-popup');
                    if (productPopup) {
                        productPopup.style.display = 'none';
                    }
                });
            }
        });
    </script>
    


</body>


<!-- Mirrored from portotheme.com/html/wolmart/shop-banner-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Mar 2024 11:41:42 GMT -->

</html>
