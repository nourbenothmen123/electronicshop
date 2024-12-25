<div class="tab-pane" id="account-details">
    <div class="icon-box icon-box-side icon-box-light">
        <span class="icon-box-icon icon-account mr-2">
            <i class="w-icon-user"></i>
        </span>
        <div class="icon-box-content">
            <h4 class="icon-box-title mb-0 ls-normal">Détails du compte</h4>
        </div>
    </div>
    <form class="form account-details-form" action="{{ route('modifier_info_client') }}" method="POST">
        @csrf
        <div class="row">
            <input type="text" id="firstname" name="id"
                value="{{ Auth::user()->id }}" style="display:none;">

            <div class="form-group mb-6">
                <label for="firstname">Nom d'utilisateur *</label>
                <input type="text" id="firstname" name="nom_utilisateur"
                    value="{{ Auth::user()->name }}"
                    class="form-control form-control-md">
            </div>
            <div class="form-group mb-6">
                <label for="email_1">Adresse e-mail *</label>
                <input type="email" id="email_1" name="adresse_email"
                    class="form-control form-control-md" value={{ Auth::user()->email }}>
            </div>

        </div>
        <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Sauvegarder
            les modifications</button>
    </form>
    <form class="form account-details-form" action="{{ route('changer_motDePasse_Client') }}" method="POST">
        
        @csrf
        <div class="icon-box icon-box-side icon-box-light">
            <span class="icon-box-icon icon-account mr-2">
                <i class="w-icon-tools"></i>
            </span>
            <div class="icon-box-content">
                <h4 class="icon-box-title mb-0 ls-normal">Changement du mot de passe</h4>
            </div>
        </div>
        @if (session()->has('success'))
        <div class="alert alert-icon alert-success alert-bg alert-inline ">
            <h4 class="alert-title">
                <i class="fas fa-check"></i></h4>{{ session('success') }}
        </div>
        @endif
        @if($errors->has('motdepasse_actuel'))
        <div class="alert alert-icon alert-error alert-bg alert-inline ">
            <h4 class="alert-title">
                <i class="w-icon-times-circle"></i></h4>{{ $errors->first('motdepasse_actuel') }}
        </div>
        @endif
        <div class="form-group mb-6">
            <label for="email_1">Mot de passe actuel *</label>
            <input type="password" class="form-control form-control-md" id="cur-password"
                name="motdepasse_actuel" placeholder="tapez votre mot de passe actuel">
        </div>
        <div class="form-group">
            <label class="text-dark" for="new-password">Nouveau mot de passe</label>
            <input type="password" class="form-control form-control-md" id="new-password"
                name="nouveau_motdepasse" placeholder="tapez un nouveau mot de passe">
        </div>
        <div class="form-group mb-10">
            <label class="text-dark" for="conf-password">Confirmer le mot de passe</label>
            <input type="password" class="form-control form-control-md"
                id="conf-password" name="nouveau_motdepasse_confirmation"
                placeholder="retapez le nouveau mot de passe">
        </div>
        <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Sauvegarder
            les modifications</button>
    </form>
</div>