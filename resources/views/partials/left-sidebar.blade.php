<!-- start Main menu -->
<div id="left-sidebar" class="sidebar">
    <div class="d-flex justify-content-between brand_name">
        <div>
            <img src="images/cropped-electro_shop.png"></img>
        </div>
    </div>
    <div class="text-center">
        <div class="theme_btn">
            <a class="theme1" data-toggle="tooltip" title="Theme Radical" href="#"
                onclick="setStyleSheet('../admin/css/theme1.css', 0);"></a>
            <a class="theme2" data-toggle="tooltip" title="Theme Turmeric" href="#"
                onclick="setStyleSheet('../admin/css/theme2.css', 0);"></a>
            <a class="theme3" data-toggle="tooltip" title="Theme Caribbean" href="#"
                onclick="setStyleSheet('../admin/css/theme3.css', 0);"></a>
            <a class="theme4" data-toggle="tooltip" title="Theme Cascade" href="#"
                onclick="setStyleSheet('../admin/css/theme4.css', 0);"></a>
        </div>
    </div>
    <br>
    <div>
        <hr>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active show" id="all-tab">
            <nav class="sidebar-nav">
                <ul class="metismenu">
                    {{-- <li class="active">
                            <a href="javascript:void(0)" class="has-arrow arrow-b"><i class="icon-home"></i><span data-hover="Dashboard">Dashboard</span></a>
                            <ul>
                                <li class="active"><a href="index.html"><span data-hover="Web Analytics">Web Analytics</span></a></li>
                                <li><a href="index2.html"><span data-hover="Cryptocurrency">Cryptocurrency</span></a></li>
                                <li><a href="index3.html"><span data-hover="Sales Monitoring">Sales Monitoring</span></a></li>
                                <li><a href="index4.html"><span data-hover="eCommerce Analytics">eCommerce Analytics</span></a></li>
                                <li><a href="app-social.html"><span data-hover="Campaigns">Campaigns</span></a></li>
                            </ul>
                        </li> --}}
                    <li><a href="{{ route('dashboardIndex') }}"><i class="fa fa-home"></i><span>Tableau de
                                board</span></a></li>

                    <li><a href="{{ route('index2') }}"><i class="fa fa-list-alt"></i><span>Catégories</span></a></li>

                    <li><a href="{{ route('marques') }}"><i class="fa fa-tag"></i><span>Marques</span></a></li>
                    <li><a href="{{ route('index') }}"><i class="fa fa-cubes"></i><span>Produits</span></a></li>
                    <li><a href="{{ route('index3') }}"><i class="fa fa-clipboard"></i><span>Attributs</span></a></li>
                    <li><a href="{{ route('index4') }}"><i class="fa fa-plus"></i><span>Variations</span></a></li>
                    <li><a href="{{ route('promotion') }}"><i class="fa fa-dollar"></i><span>Promotions</span></a></li>
                    <li><a href=""><i class="fa fa-dropbox"></i><span>Commandes</span></a>
                    </li>
                    <li><a href="{{ route('roles.index') }}"><i class="fa fa-cog"></i><span>Rôles</span></a></li>
                    <li><a href="{{ route('permissions.index') }}"><i
                                class="icon-directions"></i><span>Permissions</span></a></li>
                    <li><a href="{{ route('user') }}"><i class="fa fa-group"></i><span>Utilisateurs</span></a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
