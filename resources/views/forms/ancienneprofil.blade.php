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
    <link rel="stylesheet" href="{{ asset('admin/profil admin/assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/profil admin/assets/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/profil admin/assets/plugins/select2/css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/profil admin/assets/css/dataTables.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/profil admin/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/profil admin/assets/plugins/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/profil admin/assets/css/style.css') }}">
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
                            {{-- <div class="page-header">
                                <div class="page-title">
                                    <h4>Profile</h4>
                                    <h6>User Profile</h6>
                                </div>
                            </div> --}}

                            <div class="card">
                                <div class="card-body">
                                    <div class="profile-set">
                                        <div class="profile-head">
                                        </div>
                                        <div class="profile-top">
                                            <div class="profile-content">
                                                <div class="profile-contentimg">
                                                    <img src="assets/img/customer/customer5.jpg" alt="img"
                                                        id="blah">
                                                    <div class="profileupload">
                                                        <input type="file" id="imgInp">
                                                        <a href="javascript:void(0);"><img
                                                                src="assets/img/icons/edit-set.svg" alt="img"></a>
                                                    </div>
                                                </div>
                                                <div class="profile-contentname">
                                                    <h2>William Castillo</h2>
                                                    <h4>Updates Your Photo and Personal Details.</h4>
                                                </div>
                                            </div>
                                            <div class="ms-auto">
                                                <a href="javascript:void(0);" class="btn btn-submit me-2">Save</a>
                                                <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" placeholder="William">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" placeholder="Castilo">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" placeholder="william@example.com">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" placeholder="+1452 876 5432">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="form-group">
                                                <label>User Name</label>
                                                <input type="text" placeholder="+1452 876 5432">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <div class="pass-group">
                                                    <input type="password" class=" pass-input">
                                                    <span class="fas toggle-password fa-eye-slash"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <a href="javascript:void(0);" class="btn btn-submit me-2">Submit</a>
                                            <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
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
    <script src="{{ asset('admin/profil admin/assets/js/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ asset('admin/profil admin/assets/js/feather.min.js') }}"></script>

    <script src="{{ asset('admin/profil admin/assets/js/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ asset('admin/profil admin/assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/profil admin/assets/js/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('admin/profil admin/assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('admin/profil admin/assets/plugins/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('admin/profil admin/assets/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('admin/profil admin/assets/plugins/sweetalert/sweetalerts.min.js') }}"></script>

    <script src="{{ asset('admin/profil admin/assets/js/script.js') }}"></script>

</body>

</html>
