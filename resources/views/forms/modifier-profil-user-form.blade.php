<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="Crush it Able The most popular Admin Dashboard template and ui kit">
    <meta name="author" content="PuffinTheme the theme designer">


    <title>Electronic shop</title>

    <!-- Bootstrap Core and vandor -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/plugins/dropify/css/dropify.min.css') }}">


    <!-- Core css -->
    <link rel="stylesheet" href="{{ asset('admin/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/theme4.css') }}" id="stylesheet" />
    <style>
        .custom-header {
            height: 180px;
            background-color: #9aa0ac;
            /* Remplacez par la couleur de votre choix */
            color: #fff;
            /* Couleur du texte, optionnel */
            padding: 15px;
            /* Ajustez le padding selon vos besoins */
            /* Ajoutez des coins arrondis si nécessaire */
            text-align: center;
            /* Centrez le texte ou le contenu, si nécessaire */
        }

        .file-input-group {
            margin-top: -120px;
            /* Adjust as needed to position the input file group above the custom header */
        }

        .card {
            padding-top: 25px;
            /* Make space for the overlapping input file group */
        }
    </style>
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
                                @if (session()->has('success-motdepasse'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success-motdepasse') }}
                                    </div>
                                @endif
                                <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                                    <ul class="nav nav-tabs text-uppercase justify-content-center" role="tablist">
                                        <li class="nav-item">
                                            <a href="#info-personnelle" class="nav-link active"
                                                data-toggle="tab">Informations personnelle</a>
                                        </li>
                                        <li class="d-flex text-center nav-item">
                                            <a href="#changer-motdepasse" class="nav-link" data-toggle="tab">Changer
                                                mot de passe</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">

                                        <div class="tab-pane active" id="info-personnelle">
                                            <form action="{{ route('modifier_profil_utilisateur_traitement') }}"
                                                method="post" enctype="multipart/form-data">
                                                @csrf
                                                <br>
                                                <div class="custom-header">
                                                </div>
                                                <div class="form-group file-input-group">
                                                    <input type="text" id="firstname" name="id"
                                                        value="{{$user->id }}" style="display:none;">

                                                    <div class="row clearfix row-deck justify-content-center">
                                                        <div class="avatar-card">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <input type="file" class="dropify-fr"
                                                                        name="image_utilisateur"
                                                                        data-default-file="{{ asset('images/' . $user->image_user) }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="text" name="id" style="display:none;"
                                                    value="{{ $user->id }}">
                                                <div class="d-flex justify-content-center">
                                                    <strong><label style="font-size:16px">Nom
                                                            d'utilisateur</label></strong>
                                                </div>
                                                <div class="form-group d-flex justify-content-center">
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control"
                                                            name="nom_utilisateur" value="{{ $user->name }}">
                                                    </div>
                                                </div>
                                                @error('nom_utilisateur')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="form-group d-flex justify-content-center">
                                                    <strong><label style="font-size:16px">Adresse
                                                            e-mail</label></strong>
                                                </div>
                                                <div class="form-group d-flex justify-content-center">
                                                    <div class="col-md-6">
                                                        <input type="email" class="form-control" name="adresse_email"
                                                            value="{{ $user->email }}">
                                                    </div>
                                                </div>
                                                @error('adresse_email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="d-flex justify-content-center" style="margin-bottom:20px;">
                                                    <button type="submit" class="btn text-white bg-green"><i
                                                            class="fe fe-check mr-2"></i>Sauvegarder les
                                                        modifications</button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="tab-pane" id="changer-motdepasse">
                                            <form action="{{ route('modifier_motdepasse_traitement') }}"
                                                method="post">
                                                @csrf
                                                {{-- <div class="form-group">
                                                    <label>Mot de passe actuelle *</label>
                                                    <input type="text" class="form-control" name="email_1"
                                                        id="email_1" required>
                                                </div>
                                                <div class="form-group mb-5">
                                                    <label>Nouveau mot de passe *</label>
                                                    <input type="text" class="form-control" name="password_1"
                                                        id="password_1" required>
                                                </div>
                                                <div class="checkbox-content login-vendor">
                                                    <div class="form-group mb-5">
                                                        <label>Confirmer le nouveau mot de passe*</label>
                                                        <input type="text" class="form-control" name="first-name"
                                                            id="first-name" required>
                                                    </div>
                                                </div> --}}
                                                {{-- <a href="#" class="btn btn-primary">Confirmer les
                                                    modification</a> --}}
                                                <br />
                                                <div class="d-flex justify-content-center">
                                                    <strong><label style="font-size:16px">Mot de passe actuel
                                                        </label></strong>
                                                </div>
                                                <div class="form-group d-flex justify-content-center">
                                                    <div class="col-md-6">
                                                        <input type="password" class="form-control"
                                                            name="motdepasse_actuel" value="">
                                                    </div>
                                                </div>
                                                @error('motdepasse_actuel')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="form-group d-flex justify-content-center">
                                                    <strong><label style="font-size:16px">Tapez un nouveau mot de passe
                                                        </label></strong>
                                                </div>
                                                <div class="form-group d-flex justify-content-center">
                                                    <div class="col-md-6">
                                                        <input type="password" class="form-control"
                                                            name="nouveau_motdepasse" value="">
                                                    </div>
                                                </div>
                                                @error('nouveau_motdepasse')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="form-group d-flex justify-content-center">
                                                    <strong><label style="font-size:16px">Confirmer le nouveau mot de
                                                            passe
                                                        </label></strong>
                                                </div>
                                                <div class="form-group d-flex justify-content-center">
                                                    <div class="col-md-6">
                                                        <input type="password" class="form-control"
                                                            name="nouveau_motdepasse_confirmation" value="">
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-center"
                                                    style="margin-bottom:20px;">
                                                    <button type="submit" class="btn text-white bg-green"><i
                                                            class="fe fe-check mr-2"></i>Sauvegarder les
                                                        modifications</button>
                                                </div>
                                            </form>

                                        </div>

                                    </div>
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
    <script src="{{ asset('admin/bundles/selectize.bundle.js') }}"></script>

    <!-- Start core js and page js -->
    <script src="{{ asset('admin/js/core.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/selectize.js') }}"></script>
    <script src="{{ asset('admin/plugins/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/js/form/form-advanced.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('a[data-toggle="tab"]').on('click', function(e) {
                e.preventDefault();
                $(this).tab('show');
            });
        });
    </script>
</body>

</html>
