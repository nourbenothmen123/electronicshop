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
        @if ($errors->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <form action="{{ route('reset_traitement') }}" method="POST">
                            @csrf
                            <div class="card mb-0">
                                <div class="card-body">
                                    {{-- <a href="#" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                        <img src="images/cropped-electro_shop.png" width="200" alt="">
                                    </a> --}}
                                    <hr>
                                    <h4 class="text-center">Réinitialiser le mot de passe</h4>
                                    <br>
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1"
                                            name="password" required>
                                    </div>
                                   
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="mb-4">
                                        <label for="exampleInputPassword2" class="form-label">Confirmer mot de passe</label>
                                        <input type="password" class="form-control" id="exampleInputPassword2"
                                            name="password_confirmation" required>
                                    </div>
                                    
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                  
                                    
                                    <div class="form-footer">
                                        <input type="submit" name="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2 "value="Réinitialiser"/>
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
