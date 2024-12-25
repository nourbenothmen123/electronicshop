<!DOCTYPE html>
    <html lang="en">


    <!-- Mirrored from portotheme.com/html/wolmart/product-default.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Mar 2024 11:40:58 GMT -->
    <!-- Added by HTTrack -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

        <title>Electronic shop</title>

        <meta name="keywords" content="Marketplace ecommerce responsive HTML5 Template" />
        <meta name="description" content="Wolmart is powerful marketplace &amp; ecommerce responsive Html5 Template.">
        <meta name="author" content="D-THEMES">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.all.min.js"></script>

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('client/assets/images/icons/favicon.png') }}">
        <style>
            .active-variation {
                border: 2px solid #336699;
                border-radius: 3px;
                /* Couleur de la bordure bleue pour l'état actif */
            }
        </style>


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

        <!-- Plugin CSS -->
        <link rel="stylesheet" type="text/css"
            href="{{ asset('client/assets/vendor/magnific-popup/magnific-popup.min.css') }}">
        <link rel="stylesheet" href="{{ asset('client/assets/vendor/swiper/swiper-bundle.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/vendor/photoswipe/photoswipe.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('client/assets/vendor/photoswipe/default-skin/default-skin.min.css') }}">
        <!-- Swiper's CSS -->
        <link rel="stylesheet" href="{{ asset('client/assets/vendor/swiper/swiper-bundle.min.css') }}">

        <!-- Default CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/style.min.css') }}">
    </head>

    <body>
        <div class="page-wrapper">
            <!-- Start of Header -->
            @include('client-views.partials.header')
            <!-- End of Header -->


            <!-- Start of Main -->
            <main class="main mb-10 pb-1">
                <!-- Start of Breadcrumb -->
                <nav class="breadcrumb-nav container">
                    <ul class="breadcrumb bb-no">
                        <li><a href="{{ route('AccueilPage') }}">Accueil</a></li>
                        <li>Produits</li>
                    </ul>
                    <ul class="product-nav list-style-none">
                        <li class="product-nav-prev">
                            <a href="#">
                                <i class="w-icon-angle-left"></i>
                            </a>
                            <span class="product-nav-popup">
                                <img src="assets/images/products/product-nav-prev.jpg" alt="Product" width="110"
                                    height="110" />
                                <span class="product-name">Soft Sound Maker</span>
                            </span>
                        </li>
                        <li class="product-nav-next">
                            <a href="#">
                                <i class="w-icon-angle-right"></i>
                            </a>
                            <span class="product-nav-popup">
                                <img src="assets/images/products/product-nav-next.jpg" alt="Product" width="110"
                                    height="110" />
                                <span class="product-name">Fabulous Sound Speaker</span>
                            </span>
                        </li>
                    </ul>
                </nav>
                <!-- End of Breadcrumb -->

                <!-- Start of Page Content -->
                <div class="page-content">
                    <div class="container">
                        <div class="row gutter-lg">
                            <div class="main-content">
                                <div class="product product-single row">
                                    <div class="col-md-6 mb-6">
                                        <div class="product-gallery product-gallery-sticky">
                                            <div class="swiper-container product-single-swiper swiper-theme nav-inner"
                                                data-swiper-options="{
                                                'navigation': {
                                                    'nextEl': '.swiper-button-next',
                                                    'prevEl': '.swiper-button-prev'
                                                }
                                            }">
                                                <div class="swiper-wrapper row cols-1 gutter-no">
                                                    <div class="swiper-slide">
                                                        <figure class="product-image">
                                                            <img src="" data-zoom-image=""
                                                                alt="" width="800"
                                                                height="900" id="product-image">
                                                        </figure>
                                                    </div>
                                                    {{-- <div class="swiper-slide">
                                                        <figure class="product-image">
                                                            <img src="" data-zoom-image=""
                                                                alt="Electronics Black Wrist Watch" width="488"
                                                                height="549" id="product-image">
                                                        </figure>
                                                    </div> --}}
                                                    {{-- <div class="swiper-slide">
                                                        <figure class="product-image">
                                                            <img src="" data-zoom-image=""
                                                                alt="Electronics Black Wrist Watch" width="800"
                                                                height="900" id="product-img">
                                                        </figure>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <figure class="product-image">
                                                            <img src="" data-zoom-image=""
                                                                alt="Electronics Black Wrist Watch" width="800"
                                                                height="900" id="product-img">
                                                        </figure>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <figure class="product-image">
                                                            <img src="" data-zoom-image=""
                                                                alt="Electronics Black Wrist Watch" width="800"
                                                                height="900" id="product-img">
                                                        </figure>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <figure class="product-image">
                                                            <img src="" data-zoom-image=""
                                                                alt="Electronics Black Wrist Watch" width="800"
                                                                height="900" id="product-img">
                                                        </figure>
                                                    </div> --}}
                                                </div>
                                                <button class="swiper-button-next"></button>
                                                <button class="swiper-button-prev"></button>
                                                <a href="#" class="product-gallery-btn product-image-full"><i
                                                        class="w-icon-zoom"></i></a>
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
                                                        <img src="../../images/{{ $produit->image }}" alt="Product Thumb"
                                                            width="800" height="900">
                                                    </div>
                                                    <div class="product-thumb swiper-slide">
                                                        <img src="../../images/{{ $produit->image }}" alt="Product Thumb"
                                                            width="800" height="900">
                                                    </div>
                                                    <div class="product-thumb swiper-slide">
                                                        <img src="../../images/{{ $produit->image }}" alt="Product Thumb"
                                                            width="800" height="900">
                                                    </div>
                                                    <div class="product-thumb swiper-slide">
                                                        <img src="../../images/{{ $produit->image }}" alt="Product Thumb"
                                                            width="800" height="900">
                                                    </div>
                                                    <div class="product-thumb swiper-slide">
                                                        <img src="../../images/{{ $produit->image }}" alt="Product Thumb"
                                                            width="800" height="900">
                                                    </div>
                                                    <div class="product-thumb swiper-slide">
                                                        <img src="../../images/{{ $produit->image }}" alt="Product Thumb"
                                                            width="800" height="900">
                                                    </div>
                                                </div>
                                                <button class="swiper-button-next"></button>
                                                <button class="swiper-button-prev"></button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- product_default.blade.php -->
                                    <div class="col-md-6 mb-4 mb-md-6">
    <div class="product-details" data-sticky-options="{'minWidth': 767}">
        <h1 class="product-title" value=""></h1>
        <div class="product-bm-wrapper">
            @if ($produit->marque)
                <figure class="brand">
                    <img src="{{ asset('images/' . $produit->marque->image) }}" alt="Brand" width="50" height="58" />
                </figure>
            @endif
            <div class="product-meta">
                <div class="product-categories">
                    <strong>Catégorie:</strong>
                    <span class="product-category"><a href="#">{{ $produit->category ? $produit->category->name : 'Aucune' }}</a></span>
                </div>
                <div class="product-sku">
                    <strong>Marque:</strong>
                    <span>{{ $produit->marque ? $produit->marque->name : 'Aucune' }}</span>
                </div>
            </div>
        </div>

        <hr class="product-divider">
        <strong>
            <h4 class="variation-price" value=""></h4>
        </strong>
        <hr class="product-divider">
        <div class="product-form product-variation-form product-size-swatch">
            <label class="mb-1"></label>
            <div class="d-flex flex-wrap justify-content-start align-items-center">
                @foreach ($productVariations as $key => $productVariation)
                    <div class="flex-wrap d-flex align-items-center product-variations variation-item @if ($key === 0) default-variation active-variation @endif"
                        data-variation-id="{{ $productVariation->id }}"
                        data-name="{{ $productVariation->name }}"
                        data-price="{{ $productVariation->prix }}"
                        data-image="{{ $productVariation->variation_image }}">
                        @php
                            $variationAttributes = '';
                        @endphp
                        @foreach ($productVariation->valeurAttributes as $valeurAttribute)
                            @if ($loop->first)
                                @php
                                    $variationAttributes .= "<strong>{$valeurAttribute->attribute->name}</strong>: {$valeurAttribute->valeur}";
                                @endphp
                            @else
                                @php
                                    $variationAttributes .= "<br><span style='line-height: 1.8;'><strong>{$valeurAttribute->attribute->name}</strong>: {$valeurAttribute->valeur}</span>";
                                @endphp
                            @endif
                        @endforeach
                        <a href="#" class="size" style="text-align: left;">
                            {!! $variationAttributes !!}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <form id="addToCartForm" action="{{ route('cart.add') }}" method="POST">
            @csrf
            <input type="hidden" name="variation_id" id="variationIdInput">
            <button type="button" class="btn btn-primary btn-cart" id="addToCartButton">
                <i class="w-icon-cart"></i>
                <span>Ajouter au panier</span>
            </button>
        </form>
        <script>

        document.addEventListener("DOMContentLoaded", function() {
    const addToCartButton = document.getElementById('addToCartButton');
    const variationIdInput = document.getElementById('variationIdInput');
    const variationItems = document.querySelectorAll('.variation-item');
    const cartCountElement = document.querySelector('.cart-count');

    // Update variation ID when a variation is selected
    variationItems.forEach(function(variationItem) {
        variationItem.addEventListener('click', function() {
            const variationId = variationItem.getAttribute('data-variation-id');
            variationIdInput.value = variationId;

            // Add active class to the selected variation
            variationItems.forEach(item => item.classList.remove('active-variation'));
            variationItem.classList.add('active-variation');
        });
    });

    // Add event listener to the "Add to Cart" button
    addToCartButton.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default form submission

        const selectedVariation = document.querySelector('.variation-item.active-variation');
        if (!selectedVariation) {
            Swal.fire({
                icon: 'error',
                title: 'Sélectionnez une variation',
                text: 'Vous devez choisir une variation avant d\'ajouter au panier.',
                confirmButtonText: 'OK'
            });
            return; // Stop further execution
        }

        const variationId = selectedVariation.getAttribute('data-variation-id');
        const productName = selectedVariation.getAttribute('data-name');
        const productPrice = selectedVariation.getAttribute('data-price');
        const productImage = selectedVariation.getAttribute('data-image');
        const productAttributes = selectedVariation.getAttribute('data-attributes');

        fetch('{{ route("cart.add") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                variation_id: variationId,
                name: productName,
                price: productPrice,
                image: productImage,
                attributes: productAttributes
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                let cartCount = parseInt(cartCountElement.textContent) || 0;
                cartCount++;
                cartCountElement.textContent = cartCount;

                Swal.fire({
                    title: 'Produit ajouté au panier!',
                    html: `<strong>${productName}</strong> a été ajouté avec succès au panier.`,
                    icon: 'success',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false,
                    allowEscapeKey: false
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: 'Une erreur s\'est produite lors de l\'ajout du produit au panier.',
                    confirmButtonText: 'OK'
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Erreur',
                text: 'Une erreur s\'est produite lors de l\'ajout du produit au panier.',
                confirmButtonText: 'OK'
            });
        });
    });
});
</script>

    </div>
</div>


                                </div>
                                <!-- End of Main Content -->
                                <!-- End of Sidebar -->
                            </div>
                        </div>
                    </div>
                    <!-- End of Page Content -->
            </main>
            <!-- End of Main -->

            <!-- Start of Footer -->
            @include('client-views.partials.footer')
            <!-- End of Footer -->
        </div>
        <!-- End of Page Wrapper -->

        <!-- Start of Sticky Footer -->
        <div class="sticky-footer sticky-content fix-bottom">
            <a href="demo1.html" class="sticky-link active">
                <i class="w-icon-home"></i>
                <p>Home</p>
            </a>
            <a href="shop-banner-sidebar.html" class="sticky-link">
                <i class="w-icon-category"></i>
                <p>Shop</p>
            </a>
            <a href="my-account.html" class="sticky-link">
                <i class="w-icon-account"></i>
                <p>Account</p>
            </a>
            <div class="cart-dropdown dir-up">
                <a href="cart.html" class="sticky-link">
                    <i class="w-icon-cart"></i>
                    <p>Cart</p>
                </a>
                <div class="dropdown-box">
                    <div class="products">
                        <div class="product product-cart">
                            <div class="product-detail">
                                <h3 class="product-name">
                                    <a href="product-default.html">Beige knitted elas<br>tic
                                        runner shoes</a>
                                </h3>
                                <div class="price-box">
                                    <span class="product-quantity">1</span>
                                    <span class="product-price">$25.68</span>
                                </div>
                            </div>
                            <figure class="product-media">
                                <a href="#">
                                    <img src="assets/images/cart/product-1.jpg" alt="product" height="84"
                                        width="94" />
                                </a>
                            </figure>
                            <button class="btn btn-link btn-close" aria-label="button">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>

                        <div class="product product-cart">
                            <div class="product-detail">
                                <h3 class="product-name">
                                    <a href="https://www.portotheme.com/html/wolmart/product.html">Blue utility
                                        pina<br>fore
                                        denim dress</a>
                                </h3>
                                <div class="price-box">
                                    <span class="product-quantity">1</span>
                                    <span class="product-price">$32.99</span>
                                </div>
                            </div>
                            <figure class="product-media">
                                <a href="#">
                                    <img src="assets/images/cart/product-2.jpg" alt="product" width="84"
                                        height="94" />
                                </a>
                            </figure>
                            <button class="btn btn-link btn-close" aria-label="button">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <div class="cart-total">
                        <label>Subtotal:</label>
                        <span class="price">$58.67</span>
                    </div>

                </div>
                <!-- End of Dropdown Box -->
            </div>

            <div class="header-search hs-toggle dir-up">
                <a href="#" class="search-toggle sticky-link">
                    <i class="w-icon-search"></i>
                    <p>Search</p>
                </a>
                <form action="#" class="input-wrapper">
                    <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search"
                        required />
                    <button class="btn btn-search" type="submit">
                        <i class="w-icon-search"></i>
                    </button>
                </form>
            </div>
        </div>

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

        <!-- Root element of PhotoSwipe. Must have class pswp -->
        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

            <!-- Background of PhotoSwipe. It's a separate element as animating opacity is faster than rgba(). -->
            <div class="pswp__bg"></div>

            <!-- Slides wrapper with overflow:hidden. -->
            <div class="pswp__scroll-wrap">

                <!-- Container that holds slides.
    PhotoSwipe keeps only 3 of them in the DOM to save memory.
    Don't modify these 3 pswp__item elements, data is added later on. -->
                <div class="pswp__container">
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                </div>

                <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                
            </div>
        </div>
        <!-- End of PhotoSwipe -->

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
                                <img src="assets/images/products/brand/brand-1.jpg" alt="Brand" width="102"
                                    height="48" />
                            </figure>
                            <div class="product-meta">
                                <div class="product-categories">
                                    Category:
                                    <span class="product-category"><a href="#">Electronics</a></span>
                                </div>
                                <div class="product-sku">
                                    SKU: <span>MS46891340</span>
                                </div>
                            </div>
                        </div>

                        <hr class="product-divider">

                        <div class="product-price">$40.00</div>

                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width: 80%;"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="#" class="rating-reviews">(3 Reviews)</a>
                        </div>

                        <div class="product-short-desc">
                            <ul class="list-type-check list-style-none">
                                <li>Ultrices eros in cursus turpis massa cursus mattis.</li>
                                <li>Volutpat ac tincidunt vitae semper quis lectus.</li>
                                <li>Aliquam id diam maecenas ultricies mi eget mauris.</li>
                            </ul>
                        </div>

                        <hr class="product-divider">

                        <div class="product-form product-variation-form product-color-swatch">
                            <label>Color:</label>
                            <div class="d-flex align-items-center product-variations">
                                <a href="#" class="color" style="background-color: #ffcc01"></a>
                                <a href="#" class="color" style="background-color: #ca6d00;"></a>
                                <a href="#" class="color" style="background-color: #1c93cb;"></a>
                                <a href="#" class="color" style="background-color: #ccc;"></a>
                                <a href="#" class="color" style="background-color: #333;"></a>
                            </div>
                        </div>
                        <div class="product-form product-variation-form product-size-swatch">
                            <label class="mb-1">Size:</label>
                            <div class="flex-wrap d-flex align-items-center product-variations">
                                <a href="#" class="size">Small</a>
                                <a href="#" class="size">Medium</a>
                                <a href="#" class="size">Large</a>
                                <a href="#" class="size">Extra Large</a>
                            </div>
                            <a href="#" class="product-variation-clean">Clean All</a>
                        </div>

                        {{-- <div class="variation-price" value="">

                        </div> --}}

                        <div class="product-form">
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
                        </div>

                        <div class="social-links-wrapper">
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
                        </div>
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
        <script src="{{ asset('client/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('client/assets/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('client/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('client/assets/vendor/zoom/jquery.zoom.js') }}"></script>
        <script src="{{ asset('client/assets/vendor/photoswipe/photoswipe.js') }}"></script>
        <script src="{{ asset('client/assets/vendor/photoswipe/photoswipe-ui-default.js') }}"></script>

        <!-- Swiper JS -->
        <script src="{{ asset('client/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

        <!-- Main JS File -->
        <script src="{{ asset('client/assets/js/main.min.js') }}"></script>
        <script>
            // Capturer le clic sur le div de variation
            document.querySelectorAll('.product-variations').forEach(item => {
                item.addEventListener('click', event => {
                    // Mettre à jour le contenu de product-title et product-price avec les données de la variation cliquée
                    document.querySelector('.product-title').textContent = item.dataset.name;
                    document.querySelector('.variation-price').textContent = item.dataset.price + " TND";
                    document.querySelector('.product-image').image = item.dataset.image;
                });
            });
        </script>


        {{-- <script>
            document.addEventListener("DOMContentLoaded", function() {
                const variationItems = document.querySelectorAll('.variation-item');

                variationItems.forEach(item => {
                    item.addEventListener('click', function() {
                        const imageSrc = item.getAttribute('data-image');
                        const productImage = document.querySelector('.product-img img');
                        productImage.setAttribute('src', imageSrc);
                        productImage.setAttribute('data-zoom-image',
                        imageSrc); // Optionnel si vous utilisez un effet de zoom
                    });
                });
            });
        </script> --}}
        <script>
            // Récupérer l'élément de l'image principale
            let productImage = document.getElementById('product-image');

            // Récupérer tous les éléments de variation
            let variationItems = document.querySelectorAll('.variation-item');

            // Pour chaque élément de variation, ajouter un gestionnaire d'événement clic
            variationItems.forEach(variationItem => {
                variationItem.addEventListener('click', function() {
                    // Récupérer l'image de la variation sélectionnée
                    let variationImage = this.getAttribute('data-image');

                    // Mettre à jour l'attribut src de l'image principale
                    productImage.setAttribute('src', "../../images/" + variationImage);
                    productImage.setAttribute('data-zoom-image',"../../images/" + variationImage); // Optionnel si vous utilisez un effet de zoom
                });
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Récupérer le premier élément de variation et le cliquer
                let defaultVariation = document.querySelector('.default-variation');
                if (defaultVariation) {
                    defaultVariation.click(); // Simuler un clic sur la première variation
                }
            });
        </script>
        {{-- <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Récupérer tous les éléments de variation
                let variationItems = document.querySelectorAll('.variation-item');
        
                // Ajouter un gestionnaire d'événement clic à chaque élément de variation
                variationItems.forEach(variationItem => {
                    variationItem.addEventListener('click', function() {
                        // Supprimer la classe active-variation de tous les autres éléments
                        variationItems.forEach(item => {
                            item.classList.remove('active-variation');
                        });
        
                        // Ajouter la classe active-variation à l'élément cliqué
                        this.classList.add('active-variation');
                    });
                });
            });
        </script> --}}
        {{-- <script>
            // Récupérer tous les éléments de variation
            let variationItems = document.querySelectorAll('.variation-item');

            // Pour chaque élément de variation, ajouter un gestionnaire d'événement clic
            variationItems.forEach(variationItem => {
                variationItem.addEventListener('click', function() {
                    // Retirer la classe active-variation de tous les éléments
                    variationItems.forEach(item => {
                        item.classList.remove('active-variation');
                    });

                    // Ajouter la classe active-variation à l'élément cliqué
                    this.classList.add('active-variation');
                });
            });
        </script> --}}
        {{-- <script>
            // Récupérer tous les éléments de variation
            let variationItems = document.querySelectorAll('.variation-item');

            // Pour chaque élément de variation, ajouter un gestionnaire d'événement clic
            variationItems.forEach(variationItem => {
                variationItem.addEventListener('click', function() {
                    // Retirer la classe active-variation de tous les éléments
                    variationItems.forEach(item => {
                        item.classList.remove('active-variation');
                    });

                    // Ajouter la classe active-variation à l'élément cliqué
                    this.classList.add('active-variation');
                });
            });
        </script> --}}
    </body>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Récupérer tous les éléments de variation
            let variationItems = document.querySelectorAll('.variation-item');

            // Pour chaque élément de variation, ajouter un gestionnaire d'événement clic
            variationItems.forEach(variationItem => {
                variationItem.addEventListener('click', function() {
                    // Retirer la classe active-variation de tous les éléments
                    variationItems.forEach(item => {
                        item.classList.remove('active-variation');
                    });

                    // Ajouter la classe active-variation à l'élément cliqué
                    this.classList.add('active-variation');
                });
            });
        });
    </script>


    <!-- Mirrored from portotheme.com/html/wolmart/product-default.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Mar 2024 11:41:18 GMT -->

    </html>
