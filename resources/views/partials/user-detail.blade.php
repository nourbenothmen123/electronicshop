<div class="user_div">
    @auth
        <h5 class="brand-name mb-4">Mon Profile<a href="javascript:void(0)" class="user_btn"><i class="icon-close"></i></a></h5>
        <div class="card">
            <img class="card-img-top" src="images/{{ Auth::user()->image_user }}" width="80" height="160"
            alt="Card image cap">
        
            
            <div class="card-body">
            </div>
            <label style="color: red;">Nom</label>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">{{ Auth::user()->name }}</li>
            </ul>
            <label style="color: red;">Email</label>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">{{ Auth::user()->email }}</li>
            </ul>
        </div>
        <div class="form-group">
            <a class="btn btn-primary btn-block mt-3" href="/modifier-Profil-Utilisateur/{{ Auth::user()->id }}" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Modifier profile</a>
        </div>
    @endauth
</div>
