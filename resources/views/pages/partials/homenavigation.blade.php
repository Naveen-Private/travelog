
<nav id="tl-menu" class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand logowidthHeight" href="{{ url('/') }}"><img class="imgresponsive" src="{!! asset('assets/frontend/css/Logo.png') !!}" /></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right navigaitonMenu">
                @if(!Auth::check())
                    <li class="mywishlistIcon"><a href="#" class="page-scroll"><i class="fa fa-heart-o"></i></a></li>
                    <li><a href="{{ url('/') }}" class="page-scroll colorWhite">My Wishlist</a></li>
                    <li class="myProfileIcon"><a href="#" class="page-scroll"><i class="fa fa-user"></i></i></a></li>
                    <li><a href="#" class="page-scroll colorWhite">My Profile</a></li>
                @endif
                @if(Auth::check())
                    <li class="mywishlistIcon"><a href="#" class="page-scroll"><i class="fa fa-heart-o"></i></a></li>
                    <li><a href="{{ url('/') }}" class="page-scroll colorWhite">My Wishlist</a></li>
                    <li class="myProfileIcon"><a href="#" class="page-scroll"><i class="fa fa-user"></i></i></a></li>
                    <li><a href="#" class="page-scroll colorWhite">My Profile</a></li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<!-- Home Page
    ==========================================-->
<!-- <div id="tf-home" class="text-center">
    <div class="overlay">
        <div class="content">
            <h1>Welcome to <strong><span class="color">Travelog Malaysia</span></strong></h1>
            <p class="lead"><strong>Share</strong> and <strong>explore</strong> travel destinations around the world with <strong>others</strong></p>
             @if(!Auth::check())
                <a href="#" class="massive ui inverted green button">Explore</a>
                <a href="#" class="massive ui inverted orange button">Create Travelog Account</a>
            @else
                <a href="#" class="massive ui inverted green button">Explore</a>
                <a href="#" class="massive ui inverted orange button">Create Travelog Account</a>
            @endif
        </div>
    </div>
</div> -->


