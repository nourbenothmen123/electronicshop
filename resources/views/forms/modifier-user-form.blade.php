<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="Crush it Able The most popular Admin Dashboard template and ui kit">
    <meta name="author" content="PuffinTheme the theme designer">

    <link rel="icon" href="favicon.ico" type="image/x-icon" />

    <title>Electronic shop</title>

    <!-- Bootstrap Core and vandor -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/plugins/multi-select/css/multi-select.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/dropify/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/jvectormap/jvectormap-2.0.3.css') }}" />


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
                            <h1 class="page-title">Modifier un utilisateur</h1>
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
                            <form action="{{ route('modifier_user_traitement') }}" method="post">
                                @csrf
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title"></h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="form-label">Nom</label>
                                            <input type="text" class="form-control" name="nomutulisateur"
                                                placeholder='entrer le nom' value="{{ $users->name }}">
                                        </div>
                                        @error('nomutulisateur')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="emailutulisateur"
                                                value="{{ $users->email }}">
                                        </div>
                                        @error('emailutulisateur')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        {{-- <div class="form-group">
                                            <label class="form-label">Mot de passe</label>
                                            <input type="password" class="form-control" name="mtputulisateur"
                                                value="{{ $users->password }}">
                                        </div>
                                        @error('mtputulisateur')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror --}}
                                        <label class="form-label">Roles</label>
                                        <div class="form-group multiselect_div">
                                            <select id="multiselect-size" name="roles[]"
                                                class="multiselect multiselect-custom" multiple="multiple">
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role }}"
                                                        {{ in_array($role, $usersRoles) ? 'selected' : '' }}>
                                                        {{ $role }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br>
                                        <span class="badge badge-info custom-badge"> Modifié le : {{ $users->updated_at }}</span>
                                        <br>
                                        <input type="hidden" name="id" value="{{ $users->id }}">

                                        <div class="d-flex justify-content-center" style="margin-bottom:20px;">
                                            <button type="submit" class="btn text-white bg-green"
                                                style="width:150px"><i
                                                    class="fe fe-check mr-2"></i><strong>Modifier</strong></button>
                                        </div>
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
    <script src="{{ asset('admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
    <script src="{{ asset('admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
    <script src="{{ asset('admin/plugins/multi-select/js/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script>
    <script src="{{ asset('admin/plugins/dropify/js/dropify.min.js') }}"></script>

    <!-- Start core js and page js -->
    <script src="{{ asset('admin/js/core.js') }}"></script>
    <script src="{{ asset('assets/js/form/form-advanced.js') }}"></script>
    <script>
        function setStyleSheet(url) {
            var stylesheet = document.getElementById("stylesheet");
            stylesheet.setAttribute('href', url);
        }
    </script>

</body>

</html>
