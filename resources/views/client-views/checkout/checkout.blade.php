<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from portotheme.com/html/wolmart/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Mar 2024 11:41:21 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Electronic shop</title>

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
        <h1 class="d-none"></h1>
        <!-- Start of Header -->
        @include('client-views.partials.header')
        <!-- End of Header -->

        <!-- Start of Main -->
        <main class="main checkout">
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb shop-breadcrumb bb-no">
                        <li class="passed"><a href="{{ route('panier') }}">Panier</a></li>
                        <li class="active"><a href="{{ route('checkout') }}">Vérifier caisse</a></li>
                        <li><a href="{{ route('commande') }}">Commande terminée</a></li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->


            <!-- Start of PageContent -->
            <div class="page-content">
                <div class="container">
                    <div class="login-toggle">
                        Déjà client ? <a href="#"
                            class="show-login font-weight-bold text-uppercase text-dark">Connexion</a>
                    </div>
                    <form class="login-content">
                        <p>Si vous avez déjà acheté chez nous, veuillez saisir vos coordonnées ci-dessous.
                            Si vous êtes un nouveau client, veuillez passer à la section Facturation.</p>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Nom d'utilisateur ou E-mail *</label>
                                    <input type="text" class="form-control form-control-md" name="name"
                                        required>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Mot de passe *</label>
                                    <input type="text" class="form-control form-control-md" name="password"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group checkbox">
                            <input type="checkbox" class="custom-checkbox" id="remember" name="remember">
                            <label for="remember" class="mb-0 lh-2">souviens-toi de moi</label>
                            <a href="#" class="ml-3">Oublier mot de passe?</a>
                        </div>
                        <button class="btn btn-rounded btn-login">Connexion</button>
                    </form>
                    <div class="coupon-toggle">
                        Avez-vous un coupon? <a href="#"
                            class="show-coupon font-weight-bold text-uppercase text-dark">Enter votre code</a>
                    </div>
                    <div class="coupon-content mb-4">
                        <p>Si vous disposez d'un code promo, veuillez l'appliquer ci-dessous.</p>
                        <div class="input-wrapper-inline">
                            <input type="text" name="coupon_code" class="form-control form-control-md mr-1 mb-2" placeholder="Coupon code" id="coupon_code">
                            <button type="submit" class="btn button btn-rounded btn-coupon mb-2" name="apply_coupon" value="Apply coupon">Appliquer Coupon</button>
                        </div>
                    </div>
                          @php
                         $user = Auth::user();
                          @endphp
                    <form class="form checkout-form" action="#" method="post">
                        <div class="row mb-9">
                            <div class="col-lg-7 pr-lg-4 mb-4">
                                <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">
                                    Détails de facturation
                                </h3>
                                <div class="row gutter-sm">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>Prénom </label>
                                            <input type="text" class="form-control form-control-md" name="firstname" required>

                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>Nom </label>
                                            <input type="text" class="form-control form-control-md" name="lastname" required>

                                        </div>
                                    </div>
                                </div>
                        
                                <div class="form-group">
                                    <label>Numéro et nom de rue </label>
                                    <input type="text" placeholder="Numéro de voie et nom de la rue"
                                        class="form-control form-control-md mb-2" name="street-address-1" required>
                                   
                                </div>
                                <div class="row gutter-sm">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Ville </label>
                                            <input type="text" class="form-control form-control-md" name="town" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Code poste </label>
                                            <input type="text" class="form-control form-control-md" name="postcode" required>
                                        </div>
                                    </div>
                                  
                                </div>
                                <div class="form-group mb-7">
    <label>Adresse E-mail </label>
    <input type="email" class="form-control form-control-md" name="email" value="{{ $user ? $user->email : '' }}" required>
</div>

                                
                                

                                <div class="form-group mt-3">
                                    <label for="order-notes">Note d'ordre(facultatif)</label>
                                    <textarea class="form-control mb-0" id="order-notes" name="order-notes" cols="30"
                                        rows="4"
                                        placeholder="Notes concernant votre commande, par exemple des notes spéciales pour la livraison"></textarea>
                                </div>
                            </div>
                            <!-- checkout.blade.php -->
<!-- checkout.blade.php -->
<!-- checkout.blade.php -->
<div class="col-lg-5 mb-4 sticky-sidebar-wrapper">
    <div class="order-summary-wrapper sticky-sidebar">
        <h3 class="title text-uppercase ls-10">Votre commande </h3>
        <div class="order-summary">
            <table class="order-table">
                <thead>
                    <tr>
                        <th colspan="2"><b>Produit</b></th>
                    </tr>
                </thead>
                <tbody>
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            <tr class="bb-no">
                                <td class="product-name">
                                    
                                    <strong>{{ $details['name'] }} x <span class="product-quantity">{{ $details['quantity'] }}</span></strong>
                                    <br>
                                    
                                </td>
                                <td class="product-total">{{ $details['price'] * $details['quantity'] }} DT</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="2">Votre panier est vide.</td>
                        </tr>
                    @endif
                </tbody>
                <tfoot>
                    <tr class="order-total">
                        <th><b>Total</b></th>
                        <td><b>{{ session('cart') ? array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, session('cart'))) : 0 }} DT</b></td>
                    </tr>
                </tfoot>
            </table>
            <div class="payment-methods" id="payment_method">
                <h4 class="title font-weight-bold ls-25 pb-0 mb-1">Méthode de paiement</h4>
                <div class="accordion payment-accordion">
                    <div class="card">
                        <div class="card-header">
                            <a href="#delivery" class="expand">Espéce en livraison</a>
                        </div>
                        <p>Paiement en espèce le montant total de panier</p>
                        <div id="delivery" class="card-body collapsed">
                            <p class="mb-0">
                                Vos données personnelles seront utilisées pour le traitement de votre commande, vous accompagner au cours de votre visite du site web, et pour d’autres raisons décrites dans notre politique de confidentialité.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- resources/views/checkout.blade.php -->
            <form action="{{ route('commandes.store') }}" method="POST">
    @csrf
    <!-- Ajouter les champs cachés pour envoyer les détails de la commande -->
    <input type="hidden" name="total" value="{{ session('cart') ? array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, session('cart'))) : 0 }}">
    <!-- Ajoutez d'autres champs cachés pour envoyer les détails de chaque produit dans le panier -->
    @if(session('cart'))
        @foreach(session('cart') as $id => $details)
            <input type="hidden" name="products[{{ $id }}][name]" value="{{ $details['name'] }}">
            <input type="hidden" name="products[{{ $id }}][quantity]" value="{{ $details['quantity'] }}">
            <input type="hidden" name="products[{{ $id }}][price]" value="{{ $details['price'] }}">
        @endforeach
    @endif

    <!-- Bouton de soumission -->
    <div class="form-group place-order pt-6">
        <button href="{{route('commande')}}"type="submit" class="btn btn-dark btn-block btn-rounded">Passer commande</button>
    </div>
</form>


        </div>
    </div>
</div>



                        </div>
                    </form>
                </div>
            </div>
            <!-- End of PageContent -->
        </main>
        <!-- End of Main -->

        <!-- Start of Footer -->
        @include('client-views.partials.footer')
        <!-- End of Footer -->
    </div>

   
  
  

    <!-- Plugin JS File -->
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/sticky/sticky.js"></script>
    <script src="assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/main.min.js"></script>
</body>


<!-- Mirrored from portotheme.com/html/wolmart/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Mar 2024 11:41:24 GMT -->
</html>