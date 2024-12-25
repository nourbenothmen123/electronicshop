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
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <form action="{{ route('forgot_password') }}" method="POST">
                            @csrf
                            <div class="card mb-0">
                                <div class="card-body">
                                    @if (session()->has('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if ($errors->has('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <a href="#" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                        <img src="images/cropped-electro_shop.png" width="200" alt="">
                                    </a>
                                    <hr>
                                    <h4 class="text-center">Mot de passe oublié</h4>
                                    <p class="text-center">pour récupérer votre compte veuillez entrer votre adresse
                                        e-mail</p>
                                    <br>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Adresse email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="email" required>
                                    </div>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror


                                    <div class="form-footer">
                                        <input type="submit" name="submit"
                                            class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2 "value="Envoyer" />
                                    </div>
                                    <a href="./index.html" class="text-center">Se
                                        connecter
                                    </a>
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
