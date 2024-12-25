<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Electronic shop</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="{{ asset('admin/login/assets/css/styles.min.css') }}" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->has('email'))
            <div class="alert alert-danger">
                {{ $errors->first('email') }}
            </div>
        @endif
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="card mb-0">
                                <div class="card-body">
                                    <a href="#" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                        <img src="images/cropped-electro_shop.png" width="200" alt="">
                                    </a>
                                    <hr>
                                    <h4 class="text-center">Connexion</h4>
                                    <br>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Adresse email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="email">
                                    </div>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1"
                                            name="password">
                                    </div>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input primary" type="checkbox" value=""
                                                id="flexCheckChecked" checked>
                                            <label class="form-check-label text-dark" for="flexCheckChecked">
                                                Se souviens de moi
                                            </label>
                                        </div>
                                        <a class="text-primary fw-bold" href="{{ route('forgotPage') }}">Mot de passe oublié
                                            ?</a>
                                    </div>
                                    {{-- <a href="./index.html" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Se
                                        connecter
                                    </a> --}}
                                    <div class="form-footer">
                                        <input type="submit" name="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2 "value="Se connecter"/>
                                    </div>
                                    {{-- <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">Je n'ai pas encore de compte?</p>
                                        <a class="text-primary fw-bold ms-2" href="/register">S'inscrire</a>
                                    </div> --}}
                        </form>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script src="{{ asset('admin/login/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/login/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
