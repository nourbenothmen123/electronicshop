<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="Crush it Able The most popular Admin Dashboard template and ui kit">
    <meta name="author" content="PuffinTheme the theme designer">

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />

    <title>Electronic shop</title>

    <!-- Bootstrap Core and vandor -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap/css/bootstrap.min.css') }}" />

    <!-- Core css -->
    <link rel="stylesheet" href="{{ asset('admin/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/theme4.css') }}" id="stylesheet" />

</head>

<body class="font-opensans">

    <div class="auth">
        <div class="card">
            <form action={{ route('register') }} method="POST">
                @csrf
            <div class="text-center mb-5">
                <a class="header-brand" href="index.html"><i class="fe fe-command brand-logo"></i></a>
            </div>
            <div class="card-body">
                <div class="card-title">Créer un nouveau compte</div>
                <div class="form-group style2">
                    <label class="form-label">Nom</label>
                    <input type="text" class="form-control" placeholder="Enter votre nom" name="name">
                </div>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-group style2">
                    <label class="form-label">Adresse email</label>
                    <input type="email" class="form-control" placeholder="Enter votre email" name="email">
                </div>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-group style2">
                    <label class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" placeholder="Enter votre mot de passe" name="password">
                </div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-group style2">
                    <label class="form-label">Confirmer mot de passe</label>
                    <input type="password" class="form-control" placeholder="Enter password" name="password_confirmation">
                </div>
                
                <div class="form-group style2">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" />
                        <span class="custom-control-label">Accepter<a href="#">conditions et politique</a></span>
                    </label>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary btn-block">Créer un nouveau compte</button>
                </div>
            </div>
            <div class="text-center text-muted">
                Vous avez déjà un compte? <a href="{{ route('login') }}">Se connecter</a>
            </div>
            <div class="card-footer text-center mt-3">
                <button type="button" class="btn btn-icon btn-facebook"><i class="fa fa-facebook"></i></button>
                <button type="button" class="btn btn-icon btn-twitter"><i class="fa fa-twitter"></i></button>
                <button type="button" class="btn btn-icon btn-google"><i class="fa fa-google"></i></button>
                <button type="button" class="btn btn-icon btn-youtube"><i class="fa fa-youtube"></i></button>
                <button type="button" class="btn btn-icon btn-vimeo"><i class="fa fa-vimeo"></i></button>
            </div>
        </form>
        </div>
    </div>

    <!-- jQuery and bootstrtap js -->
    <script src="{{ asset('admin/bundles/lib.vendor.bundle.js') }}"></script>

    <!-- start plugin js file  -->
    <!-- Start core js and page js -->
    <script src="{{ asset('admin/js/core.js') }}"></script>
</body>

</html>
