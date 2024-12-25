<!DOCTYPE html>
            <html lang="en">


            <!-- Mirrored from portotheme.com/html/wolmart/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Mar 2024 11:41:18 GMT -->
            <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

                <title>Wolmart eCommmerce Marketplace HTML Template</title>

                <meta name="keywords" content="Marketplace ecommerce responsive HTML5 Template" />
                <meta name="description" content="Wolmart is powerful marketplace &amp; ecommerce responsive Html5 Template.">
                <meta name="author" content="D-THEMES">

                <!-- Favicon -->
                <link rel="icon" type="image/png" href="assets/images/icons/favicon.png">

                <!-- WebFont.js -->
                <script>
                    WebFontConfig = {
                        google: { families: ['Poppins:400,500,600,700'] }
                    };
                    ( function ( d ) {
                        var wf = d.createElement( 'script' ), s = d.scripts[0];
                        wf.src = 'assets/js/webfont.js';
                        wf.async = true;
                        s.parentNode.insertBefore( wf, s );
                    } )( document );
                </script>

                <link rel="preload" href="assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2" as="font" type="font/woff2"
                    crossorigin="anonymous">
                <link rel="preload" href="assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2" as="font" type="font/woff2"
                    crossorigin="anonymous">
                <link rel="preload" href="assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2" as="font" type="font/woff2"
                        crossorigin="anonymous">
                <link rel="preload" href="assets/fonts/wolmart87d5.woff?png09e" as="font" type="font/woff" crossorigin="anonymous">

                <!-- Vendor CSS -->
                <link rel="stylesheet" type="text/css" href="assets/vendor/fontawesome-free/css/all.min.css">

                <!-- Plugin CSS -->
                <link rel="stylesheet" type="text/css" href="assets/vendor/magnific-popup/magnific-popup.min.css">

                <!-- Default CSS -->
                <link rel="stylesheet" type="text/css" href="assets/css/style.min.css">
            </head>

            <body>
                <div class="page-wrapper">
                    <h1 class="d-none">Wolmart - Responsive Marketplace HTML Template</h1>
                    <!-- Start of Header -->
                    @include('client-views.partials.header')
                    <!-- End of Header -->

                    <!-- Start of Main -->
                    <main class="main cart">
                        <!-- Start of Breadcrumb -->
                        <nav class="breadcrumb-nav">
                            <div class="container">
                                <ul class="breadcrumb shop-breadcrumb bb-no">
                                    <li class="active"><a href="{{ route('panier') }}">Panier</a></li>
                                    <li><a href="{{ route('checkout') }}">Vérifier caisse</a></li>
                                    <li><a href="{{ route('commande') }}">Commande terminée</a></li>
                                </ul>
                            </div>
                        </nav>
                        <!-- End of Breadcrumb -->

                        <!-- Start of PageContent -->
                        <div class="page-content">
                <div class="container">
                    <div class="row gutter-lg mb-10">
                        <div class="col-lg-8 pr-lg-4 mb-6">
                            <form id="cartForm" action="{{ route('cart.update') }}" method="POST">
                                @csrf
                                <table class="shop-table cart-table">
                                    <thead>
                                        <tr>
                                            <th class="product-name"><span>Produit</span></th>
                                            <th></th>
                                            <th></th>
                                            <th class="product-price"><span>Prix</span></th>
                                            <th class="product-quantity"><span>Quantité</span></th>
                                            <th class="product-subtotal"><span>Total</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(session('cart'))
                                            @foreach(session('cart') as $id => $details)
                                                <tr data-id="{{ $id }}">
                                                    <td class="product-thumbnail">
                                                        <div class="p-relative">
                                                            <a href="#">
                                                                <figure>
                                                                    <img src="{{ asset($details['image']) }}" alt="product" width="300" height="338">
                                                                </figure>
                                                            </a>
                                                            <button type="button" class="btn btn-close" data-id="{{ $id }}"><i class="fas fa-times"></i></button>
                                                        </div>
                                                    </td>
                                                    <th></th>
                                                    <td class="product-name">
                                                        <a href="#">{{ $details['name'] }}</a>
                                                    </td>
                                                    <td class="product-price"><span class="amount">{{ $details['price'] }} DT</span></td>
                                                    <td class="product-quantity">
                                                        <div class="input-group">
                                                            <input class="quantity form-control" type="number" min="1" max="100000" data-id="{{ $id }}" value="{{ $details['quantity'] }}">
                                                            <button type="button" class="quantity-plus w-icon-plus" data-id="{{ $id }}"></button>
                                                            <button type="button" class="quantity-minus w-icon-minus" data-id="{{ $id }}"></button>
                                                        </div>
                                                    </td>
                                                    <td class="product-subtotal">
                                                        <span class="amount">{{ $details['price'] * $details['quantity'] }} DT</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="6">Votre panier est vide.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>

                                <div class="cart-action mb-6">
                                    <a href="{{ route('product_default') }}" class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i class="w-icon-long-arrow-left"></i>Continuer vos achats</a>
                                    <button type="button" class="btn btn-rounded btn-default btn-clear" id="clearCart">Nettoie panier</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-4 sticky-sidebar-wrapper">
                            <div class="sticky-sidebar">
                                <div class="cart-summary mb-4">
                                    <h3 class="cart-title text-uppercase">Cart Totals</h3>
                                    <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                        <label class="ls-25">Subtotal</label>
                                        <span id="cartSubtotal">
                                            {{ session('cart') ? array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, session('cart'))) : 0 }} DT
                                        </span>
                                    </div>

                                    <hr class="divider">

                                    <ul class="shipping-methods mb-2">
                                        <li>
                                            <label class="shipping-title text-dark font-weight-bold">Shipping</label>
                                        </li>
                                        <li>
                                            <div class="custom-radio">
                                                <input type="radio" id="free-shipping" class="custom-control-input" name="shipping">
                                                <label for="free-shipping" class="custom-control-label color-dark">Free Shipping</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-radio">
                                                <input type="radio" id="local-pickup" class="custom-control-input" name="shipping">
                                                <label for="local-pickup" class="custom-control-label color-dark">Local Pickup</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-radio">
                                                <input type="radio" id="flat-rate" class="custom-control-input" name="shipping">
                                                <label for="flat-rate" class="custom-control-label color-dark">Flat rate: 5.00 DT</label>
                                            </div>
                                        </li>
                                    </ul>

                                    <div class="shipping-calculator">
                                        <p class="shipping-destination lh-1">Shipping to <strong>CA</strong>.</p>

                                        <form class="shipping-calculator-form">
                                            <div class="form-group">
                                                <div class="select-box">
                                                    <select name="country" class="form-control form-control-md">
                                                        <option value="default" selected="selected">Tunisie</option>
                                                        <option value="ts">Morocco</option>
                                                        <option value="ts">Algerie</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="select-box">
                                                    <select name="state" class="form-control form-control-md">
                                                        <option value="default" selected="selected">California</option>
                                                        <option value="ohaio">Ohaio</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control form-control-md" type="text" name="town-city" placeholder="Town / City">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control form-control-md" type="text" name="zipcode" placeholder="ZIP">
                                            </div>
                                            <button type="submit" class="btn btn-dark btn-outline btn-rounded">Update Totals</button>
                                        </form>
                                    </div>

                                    <hr class="divider mb-6">
                                    <div class="order-total d-flex justify-content-between align-items-center">
                                        <label>Total</label>
                                        <span class="ls-50" id="cartTotal">
                                            {{ session('cart') ? array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, session('cart'))) : 0 }} DT
                                        </span>
                                    </div>
                                    <a href="#" id="proceed-to-checkout" class="btn btn-block btn-dark btn-icon-right btn-rounded btn-checkout">
    Proceed to checkout
    <i class="w-icon-long-arrow-right"></i>
</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                        <!-- End of PageContent -->
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
                                            <a href="https://www.portotheme.com/html/wolmart/product.html">Blue utility pina<br>fore
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

                            <div class="cart-action">
                                <a href="cart.html" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                                <a href="checkout.html" class="btn btn-primary  btn-rounded">Checkout</a>
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
                            <input type="text" class="form-control" name="search" autocomplete="off"
                                placeholder="Search" required />
                            <button class="btn btn-search" type="submit">
                                <i class="w-icon-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <!-- End of Sticky Footer -->
                
                <!-- Start of Scroll Top -->
                <a id="scroll-top" class="scroll-top" href="#top" title="Top" role="button"> <i class="w-icon-angle-up"></i> <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 70"> <circle id="progress-indicator" fill="transparent" stroke="#000000" stroke-miterlimit="10" cx="35" cy="35" r="34" style="stroke-dasharray: 16.4198, 400;"></circle> </svg> </a>
                <!-- End of Scroll Top -->

                <!-- Start of Mobile Menu -->
                <div class="mobile-menu-wrapper">
                    <div class="mobile-menu-overlay"></div>
                    <!-- End of .mobile-menu-overlay -->

                    <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
                    <!-- End of .mobile-menu-close -->

                    <div class="mobile-menu-container scrollable">
                        <form action="#" method="get" class="input-wrapper">
                            <input type="text" class="form-control" name="search" autocomplete="off"
                                placeholder="Search" required />
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
                                                    <li><a href="shop-horizontal-filter.html">Horizontal Filter<span class="tip tip-hot">Hot</span></a></li>
                                                    <li><a href="shop-off-canvas.html">Off Canvas Sidebar<span class="tip tip-new">New</span></a></li>
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
                                                    <li><a href="product-video.html">360<sup>o</sup> &amp; Video<span class="tip tip-new">New</span></a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Product Layouts</a>
                                                <ul>
                                                    <li><a href="product-default.html">Default<span class="tip tip-hot">Hot</span></a></li>
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
                                        <a href="shop-banner-sidebar.html" class="font-weight-bold text-primary text-uppercase ls-25">
                                            View All Categories<i class="w-icon-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            


                <!-- Plugin JS File -->
                <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/vendor/jquery/jquery.min.js"></script>
                <script src="assets/vendor/sticky/sticky.js"></script>
                <script src="assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
                <script src="assets/js/main.min.js"></script>
                <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const csrfToken = document.querySelector('input[name="_token"]').value;

                    // Handle quantity change
                    document.querySelectorAll('.quantity-plus, .quantity-minus').forEach(button => {
                        button.addEventListener('click', function() {
                            const id = this.getAttribute('data-id');
                            const input = document.querySelector(`input[data-id="${id}"]`);
                            let quantity = parseInt(input.value);

                            if (this.classList.contains('quantity-plus')) {
                                quantity++;
                            } else if (this.classList.contains('quantity-minus')) {
                                quantity = quantity > 1 ? quantity - 1 : 1;
                            }

                            input.value = quantity;
                            updateCart(id, quantity);
                        });
                    });

                    // Handle direct input change
                    document.querySelectorAll('.quantity').forEach(input => {
                        input.addEventListener('change', function() {
                            const id = this.getAttribute('data-id');
                            const quantity = parseInt(this.value);
                            updateCart(id, quantity);
                        });
                    });

                    // Handle remove item from cart
                    document.querySelectorAll('.btn-close').forEach(button => {
                        button.addEventListener('click', function() {
                            const id = this.getAttribute('data-id');
                            removeFromCart(id);
                        });
                    });

                    // Handle clear cart
                    document.getElementById('clearCart').addEventListener('click', function() {
                        clearCart();
                    });

                    // Function to update cart with AJAX
                    function updateCart(id, quantity) {
                        fetch('{{ route("cart.update") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken
                            },
                            body: JSON.stringify({
                                quantities: { [id]: quantity }
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                const subtotalElement = document.querySelector(`tr[data-id="${id}"] .product-subtotal .amount`);
                                subtotalElement.textContent = data.itemTotal + ' DT';

                                document.getElementById('cartSubtotal').textContent = data.cartSubtotal + ' DT';
                                document.getElementById('cartTotal').textContent = data.cartTotal + ' DT';
                            }
                        });
                    }

                    // Function to remove item from cart with AJAX
                    function removeFromCart(id) {
                        fetch('{{ route("cart.remove") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken
                            },
                            body: JSON.stringify({ id: id })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                const row = document.querySelector(`tr[data-id="${id}"]`);
                                row.remove();

                                const cartSubtotal = Array.from(document.querySelectorAll('.product-subtotal .amount'))
                                    .reduce((total, element) => total + parseFloat(element.textContent), 0);

                                document.getElementById('cartSubtotal').textContent = cartSubtotal + ' DT';
                                document.getElementById('cartTotal').textContent = cartSubtotal + ' DT';
                            }
                        });
                    }

                    // Function to clear the cart
                    function clearCart() {
                        fetch('{{ route("cart.clear") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                document.querySelectorAll('tbody tr[data-id]').forEach(row => row.remove());
                                document.getElementById('cartSubtotal').textContent = '0 DT';
                                document.getElementById('cartTotal').textContent = '0 DT';
                            }
                        });
                    }

                    // Function to update the cart form
                    function updateCartForm() {
                        const quantities = {};
                        document.querySelectorAll('.quantity').forEach(input => {
                            quantities[input.getAttribute('data-id')] = input.value;
                        });

                        fetch('{{ route("cart.update") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken
                            },
                            body: JSON.stringify({
                                quantities: quantities
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                document.querySelectorAll('tr[data-id]').forEach(row => {
                                    const id = row.getAttribute('data-id');
                                    const subtotalElement = row.querySelector('.product-subtotal .amount');
                                    subtotalElement.textContent = data.cart[id].itemTotal + ' DT';
                                });

                                document.getElementById('cartSubtotal').textContent = data.cartSubtotal + ' DT';
                                document.getElementById('cartTotal').textContent = data.cartTotal + ' DT';
                            }
                        });
                    }
                });
            </script>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    // Gérer le clic sur le bouton "Nettoie panier"
                    document.getElementById('clearCart').addEventListener('click', function() {
                        fetch('{{ route("cart.clear") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                const tableBody = document.querySelector('.shop-table.cart-table tbody');
                                tableBody.innerHTML = '<tr><td colspan="6">Votre panier est vide.</td></tr>';
                                document.getElementById('cartSubtotal').textContent = '0 DT';
                                document.getElementById('cartTotal').textContent = '0 DT';
                                document.querySelector('.cart-action .btn-shopping').style.display = 'block';
                                document.querySelector('.cart-summary').style.display = 'none';
                            }
                        });
                    });
                });
            </script>
   <script>
    document.getElementById('proceed-to-checkout').addEventListener('click', function(event) {
        event.preventDefault();  // Empêche la redirection immédiate
        
        fetch('/api/check-auth')
            .then(response => response.json())
            .then(data => {
                if (data.isAuthenticated) {
                    // Redirection vers la page de vérification de la caisse
                    window.location.href = '{{ route("checkout") }}';
                } else {
                    // Affiche une alerte et redirige vers la page de connexion
                    alert('Vous devez être connecté pour passer à la caisse.');
                    window.location.href = '{{ route("login") }}';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Une erreur s\'est produite lors de la vérification de l\'authentification.');
            });
    });
</script>

            </body>


            <!-- Mirrored from portotheme.com/html/wolmart/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Mar 2024 11:41:21 GMT -->
            </html>