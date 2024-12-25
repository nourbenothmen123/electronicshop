  <!-- Start of Footer -->
  <footer class="footer appear-animate" data-animation-options="{
    'name': 'fadeIn'
}">
    <div class="footer-newsletter bg-primary">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-5 col-lg-6">
                    <div class="icon-box icon-box-side text-white">
                        <div class="icon-box-icon d-inline-flex">
                            <i class="w-icon-envelop3"></i>
                        </div>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title text-white text-uppercase font-weight-bold">S'abonner à
                                Notre Newsletter</h4>
                            <p class="text-white">Recevez des mises à jour par e-mail sur notre dernière boutique et offres spéciales.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6 col-md-9 mt-4 mt-lg-0 ">
                    <form action="#" method="get"
                        class="input-wrapper input-wrapper-inline input-wrapper-rounded">
                        <input type="email" class="form-control mr-2 bg-white" name="email" id="email"
                            placeholder="Votre adresse e-mail" />
                        <button class="btn btn-dark btn-rounded" type="submit">S'abonner<i
                                class="w-icon-long-arrow-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="footer-top">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="widget widget-about">
                        <a href="{{ route('AccueilPage') }}" class="logo-footer">
                            <img src="{{ asset('client/assets/images/logo_electro_shop.png') }}" alt="logo-footer" width="210"
                                height="100" />
                        </a>
                        <div class="widget-body">
                            <p class="widget-about-title">tu as des questions ? Appelez-nous 24h/24 et 7j/7</p>
                            <a href="tel:+21699850000" class="widget-about-call">+216-99-850-000</a>
                            {{-- <p class="widget-about-desc">Register now to get updates on pronot get up icons
                                & coupons ster now toon.
                            </p> --}}

                            <div class="social-icons social-icons-colored">
                                <a href="https://www.facebook.com/ElectronicShopSfax/" class="social-icon social-facebook w-icon-facebook"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h3 class="widget-title">Société</h3>
                        <ul class="widget-body">
                            <li><a href="about-us.html">A propos de nous</a></li>
                            <li><a href="contact-us.html">Contactez-nous</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">Mon compte</h4>
                        <ul class="widget-body">
                            <li><a href="#">Suivre mon commande</a></li>
                            <li><a href="cart.html">Afficher panier</a></li>
                            <li><a href="login.html">Connexion</a></li>
                            <li><a href="wishlist.html">Liste d'envies</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">Service client</h4>
                        <ul class="widget-body">
                            <li><a href="#">Méthode de paiement</a></li>
                            <li><a href="#">Centre de support</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="footer-middle">
            <div class="widget widget-category">
                <div class="category-box">
                    <h6 class="category-name">Consumer Electric:</h6>
                    <a href="#">TV Television</a>
                    <a href="#">Air Condition</a>
                    <a href="#">Refrigerator</a>
                    <a href="#">Washing Machine</a>
                    <a href="#">Audio Speaker</a>
                    <a href="#">Security Camera</a>
                    <a href="#">View All</a>
                </div>
                <div class="category-box">
                    <h6 class="category-name">Clothing & Apparel:</h6>
                    <a href="#">Men's T-shirt</a>
                    <a href="#">Dresses</a>
                    <a href="#">Men's Sneacker</a>
                    <a href="#">Leather Backpack</a>
                    <a href="#">Watches</a>
                    <a href="#">Jeans</a>
                    <a href="#">Sunglasses</a>
                    <a href="#">Boots</a>
                    <a href="#">Rayban</a>
                    <a href="#">Acccessories</a>
                </div>
                <div class="category-box">
                    <h6 class="category-name">Home, Garden & Kitchen:</h6>
                    <a href="#">Sofa</a>
                    <a href="#">Chair</a>
                    <a href="#">Bed Room</a>
                    <a href="#">Living Room</a>
                    <a href="#">Cookware</a>
                    <a href="#">Utensil</a>
                    <a href="#">Blender</a>
                    <a href="#">Garden Equipments</a>
                    <a href="#">Decor</a>
                    <a href="#">Library</a>
                </div>
                <div class="category-box">
                    <h6 class="category-name">Health & Beauty:</h6>
                    <a href="#">Skin Care</a>
                    <a href="#">Body Shower</a>
                    <a href="#">Makeup</a>
                    <a href="#">Hair Care</a>
                    <a href="#">Lipstick</a>
                    <a href="#">Perfume</a>
                    <a href="#">View all</a>
                </div>
                <div class="category-box">
                    <h6 class="category-name">Jewelry & Watches:</h6>
                    <a href="#">Necklace</a>
                    <a href="#">Pendant</a>
                    <a href="#">Diamond Ring</a>
                    <a href="#">Silver Earing</a>
                    <a href="#">Leather Watcher</a>
                    <a href="#">Rolex</a>
                    <a href="#">Gucci</a>
                    <a href="#">Australian Opal</a>
                    <a href="#">Ammolite</a>
                    <a href="#">Sun Pyrite</a>
                </div>
                <div class="category-box">
                    <h6 class="category-name">Computer & Technologies:</h6>
                    <a href="#">Laptop</a>
                    <a href="#">iMac</a>
                    <a href="#">Smartphone</a>
                    <a href="#">Tablet</a>
                    <a href="#">Apple</a>
                    <a href="#">Asus</a>
                    <a href="#">Drone</a>
                    <a href="#">Wireless Speaker</a>
                    <a href="#">Game Controller</a>
                    <a href="#">View all</a>
                </div>
            </div>
        </div> --}}
        <div class="footer-bottom">
            <div class="footer-left">
                <p class="copyright">Copyright © 2024 HYPER GROUP. All right reserved</p>
            </div>
            <div class="footer-right">
                <span class="payment-label mr-lg-8">Nous utilisons le paiement sécurisé pour</span>
                <figure class="payment">
                    <img src="{{ asset('client/assets/images/payment.png') }}" alt="payment" width="159" height="25" />
                </figure>
            </div>
        </div>
    </div>
</footer>
<!-- End of Footer -->