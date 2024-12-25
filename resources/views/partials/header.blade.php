<div id="header_top" class="header_top">
    @auth
        <div class="container">
            <div class="hleft">
                <div class="dropdown">
                    @if (Auth::user()->image_user != NULL)
                    <a href="javascript:void(0)" class="nav-link user_btn"><img class="avatar avatar-lg" src="images/{{Auth::user()->image_user}}" alt=""/></a>
                    @else
                    <a href="javascript:void(0)" class="nav-link user_btn"><img class="avatar" src="images/user.jpeg" alt=""/></a>
                    @endif
                    <a href="index.html" class="nav-link icon"><i class="fa fa-home"></i></a>
                </div>
            </div>
            <div class="hright">
                <div class="dropdown">
                    <a href="javascript:void(0)" class="nav-link icon menu_toggle"><i class="fa fa-navicon"></i></a>
                </div>            
            </div>
        </div>
        @endauth
    </div>