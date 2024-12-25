<style>
    .cart-dropdown {
        position: relative;
    }
    .dropdown-box {
        display: none;
        position: absolute;
        right: 0;
        background-color: white;
        border: 1px solid #ccc;
        width: 300px;
        z-index: 1000;
    }
    .dropdown-box.show {
        display: block;
    }
    .cart-toggle {
        cursor: pointer;
    }
    .btn-close {
        cursor: pointer;
    }
</style><!-- Start of Header -->
<header class="header">
<div class="header-top">
    <div class="container">
        <div class="header-left">
            <p class="welcome-msg"></p>
        </div>
        <div class="header-right">
            <div class="dropdown">
                <a href="#currency">USD</a>
                <div class="dropdown-box">
                    <a href="#USD">USD</a>
                    <a href="#EUR">EUR</a>
                </div>
            </div>
            <!-- End of DropDown Menu -->

            <div class="dropdown">
                <a href="#language"><img src="assets/images/flags/eng.png" alt="ENG Flag" width="14"
                        height="8" class="dropdown-image" /> ENG</a>
                <div class="dropdown-box">
                    <a href="#ENG">
                        <img src="assets/images/flags/eng.png" alt="ENG Flag" width="14" height="8"
                            class="dropdown-image" />
                        ENG
                    </a>
                    <a href="#FRA">
                        <img src="assets/images/flags/fra.png" alt="FRA Flag" width="14" height="8"
                            class="dropdown-image" />
                        FRA
                    </a>
                </div>
            </div>
            <!-- End of Dropdown Menu -->
            <span class="divider d-lg-show"></span>
            <a href="{{ route('ContactUsPage') }}" class="d-lg-show">Contactez-nous</a>
            <span class="divider d-lg-show"></span>
            @if (Auth::check())
                <a href="{{ route('ProfilUser') }}" class="d-lg-show">Mon compte</a>
                <a><strong>{{ Auth::user()->name }}</strong></a>
                <img class="rounded-avatar" src="{{ asset('admin/images/xs/avatar4.jpg') }}"
                    style="width: 40px; height: 40px;" />
            @else
                <a href="{{ route('LoginPage') }}" class=""><i class="w-icon-account"></i>Connexion</a>
                <span class="delimiter d-lg-show">/</span>
                <a href="{{ route('RegisterPage') }}" class="">S'inscrire</a>
            @endif
        </div>
    </div>
</div>
<!-- End of Header Top -->

<div class="header-middle">
    <div class="container">
        <div class="header-left mr-md-4">
            <a href="#" class="mobile-menu-toggle  w-icon-hamburger" aria-label="menu-toggle">
            </a>
            <a href="{{ route('AccueilPage') }}" class="logo ml-lg-0">
                <img src="{{ asset('client/assets/images/logo_electro_shop.png') }}" alt="logo" width="250"
                    height="200" />
            </a>
            <form method="get" action="#"
                class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                <div class="select-box">
                    <select id="category" name="category">
                        <option value="">Toutes les catégories</option>
                        <option value="4">Fashion</option>
                        <option value="5">Furniture</option>
                        <option value="6">Shoes</option>
                        <option value="7">Sports</option>
                        <option value="8">Games</option>
                        <option value="9">Computers</option>
                        <option value="10">Electronics</option>
                        <option value="11">Kitchen</option>
                        <option value="12">Clothing</option>
                    </select>
                </div>
                <input type="text" class="form-control" name="search" id="search" placeholder="Chercher..."
                    required />
                <button class="btn btn-search" type="submit"><i class="w-icon-search"></i>
                </button>
            </form>
        </div>
        <div class="header-right ml-4">
            <div class="header-call d-xs-show d-lg-flex align-items-center">
                <a href="tel:#" class="w-icon-call"></a>
                <div class="call-info d-lg-show">
                    <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                        <a href="tel:#" class="phone-number font-weight-bolder ls-50">+216 99 850 000</a>
                </div>
            </div>
            <a class="wishlist label-down link d-xs-show" href="{{route('liste-envies') }}">
                <i class="w-icon-heart"></i>
                <span class="wishlist-label d-lg-show">Votre liste d'envies</span>
            </a>
  <!-- headr.blade.php -->
<!-- headr.blade.php -->
<div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
    <div class="cart-overlay"></div>
    <a href="#" class="cart-toggle label-down link">
        <i class="w-icon-cart">
            <span class="cart-count">{{ count(session('cart', [])) }}</span>
        </i>
        <span class="cart-label">Panier</span>
    </a>
    <div class="dropdown-box">
        <div class="cart-header">
            <span>Panier</span>
            <a href="#" class="btn-close">Fermer<i class="w-icon-long-arrow-right"></i></a>
        </div>
        <div class="products">
            @forelse(session('cart', []) as $id => $details)
                <div class="product product-cart">
                    <div class="product-detail">
                        <a href="#" class="product-name">{{ $details['name'] }}</a>
                        <div class="price-box">
                            <span class="product-quantity">{{ $details['quantity'] }}</span>
                            <span class="product-price">{{ $details['price'] }} DT</span>
                        </div>
                    </div>
                    <figure class="product-media">
                        <img src="{{ $details['image'] }}" alt="product" height="84" width="94" />
                    </figure>
                    <button class="btn btn-link btn-close" aria-label="button" data-id="{{ $id }}">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            @empty
                <p>Votre panier est vide.</p>
            @endforelse
        </div>
        <div class="cart-total">
            <label>Total:</label>
            <span >{{ session('cart') ? array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, session('cart'))) : 0 }} DT
</span>
        </div>
        <div class="cart-action">
            <a href="{{ route('panier') }}" class="btn btn-dark btn-outline btn-rounded">Afficher panier</a>
            <a href="{{ route('checkout') }}" class="btn btn-primary btn-rounded">Vérifier caisse</a>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const cartToggle = document.querySelector('.cart-toggle');
        const cartDropdown = document.querySelector('.cart-dropdown');
        const cartClose = document.querySelector('.cart-dropdown .btn-close');

        // Toggle cart dropdown
        cartToggle.addEventListener('click', function(event) {
            event.preventDefault();
            cartDropdown.querySelector('.dropdown-box').classList.toggle('show');
        });

        // Close cart dropdown
        cartClose.addEventListener('click', function(event) {
            event.preventDefault();
            cartDropdown.querySelector('.dropdown-box').classList.remove('show');
        });

        // Close cart dropdown when clicking outside
        document.addEventListener('click', function(event) {
            if (!cartDropdown.contains(event.target) && !cartToggle.contains(event.target)) {
                cartDropdown.querySelector('.dropdown-box').classList.remove('show');
            }
        });

        // Remove item from cart
        const cartItems = document.querySelectorAll('.cart-dropdown .product .btn-close');
        cartItems.forEach(function(item) {
            item.addEventListener('click', function(event) {
                event.preventDefault();
                const productId = item.getAttribute('data-id');
                removeCartItem(productId);
            });
        });

        function removeCartItem(productId) {
            fetch('{{ route("cart.remove") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    id: productId
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update cart count in header
                    const cartCountElement = document.querySelector('.cart-toggle .cart-count');
                    cartCountElement.textContent = data.cartCount;

                    // Remove the cart item from dropdown
                    const cartItem = document.querySelector('.cart-dropdown .product[data-id="' + productId + '"]');
                    if (cartItem) {
                        cartItem.remove();
                    }

                    // Update cart total
                    const cartTotalElement = document.querySelector('.cart-dropdown .cart-total .price');
                    cartTotalElement.textContent = data.cartTotal + ' DT';

                    // Show success message
                    Swal.fire({
                        title: 'Produit retiré du panier!',
                        text: 'Le produit a été retiré avec succès de votre panier.',
                        icon: 'success',
                        confirmButtonText: 'OK',
                        allowOutsideClick: false,
                        allowEscapeKey: false
                    });
                } else {
                    Swal.fire({
                        title: 'Erreur',
                        text: 'Une erreur s\'est produite lors de la suppression du produit du panier.',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        allowOutsideClick: false,
                        allowEscapeKey: false
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    title: 'Erreur',
                    text: 'Une erreur s\'est produite lors de la suppression du produit du panier.',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false,
                    allowEscapeKey: false
                });
            });
        }
    });
</script>



        </div>
    </div>
</div>
<!-- End of Header Middle -->

<div class="header-bottom sticky-content fix-top sticky-header has-dropdown">
    <div class="container">
        <div class="inner-wrap">
            <div class="header-left">
                <div class="dropdown category-dropdown has-border" data-visible="true">
                    <a href="#" class="category-toggle text-dark" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="true" data-display="static"
                        title="Browse Categories">
                        <i class="w-icon-category"></i>
                        <span>Magasiner par catégorie</span>
                    </a>
                    <div class="dropdown-box">
                        <ul class="menu vertical-menu category-menu">
                            @foreach ($categories as $categorie)
                                <li class="parent-category"
                                    data-submenu-id="{{ $categorie['categorieParente']->id }}">
                                    <a
                                        href="{{ route('afficher_Produits_Categorie', ['idCategorie' => $categorie['categorieParente']->id]) }}">{{ $categorie['categorieParente']->name }}
                                    </a>
                                    @if (!$categorie['sousCategories']->isEmpty())
                                        @include('client-views.partials.subcategory', [
                                            'sousCategories' => $categorie['sousCategories'],
                                        ])
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
                <nav class="main-nav">
                    <ul class="menu active-underline">
                        <li class="{{ Route::currentRouteName() == 'AccueilPage' ? 'active' : '' }}">
                            <a href="{{ route('AccueilPage') }}">Accueil</a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'filtrer-products' ? 'active' : '' }}">
                            <a href="{{ route('filtrer-products') }}">Produits</a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'panier' ? 'active' : '' }}">
                            <a href="{{ route('panier') }}">Panier</a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'checkout' ? 'active' : '' }}">
                            <a href="{{ route('checkout') }}">vérifier caisse</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="header-right">
                <a href="#" class="d-xl-show"><i class="w-icon-map-marker mr-1"></i>Suivi de commande</a>
                <a href="#"><i class="w-icon-sale"></i>offres quotidiennes</a>
            </div>
        </div>
    </div>
</div>
</header>
<!-- End of Header -->
