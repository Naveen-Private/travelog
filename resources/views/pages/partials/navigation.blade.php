<nav id="tf-menu" class="navbar navbar-default navbar-fixed-top">
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
                @if (!$signedIn)
                    <li class="mywishlistIcon"><a href="#" class="page-scroll"><i class="fa fa-heart-o"></i></a></li>
                    <li><a href="{{ url('/') }}" class="page-scroll colorWhite">My Wishlist</a></li>
                    <li class="myProfileIcon"><a href="#" class="page-scroll"><i class="fa fa-user-o"></i></i></a></li>
                    <li><a href="#" class="page-scroll colorWhite">My Profile</a></li>
                    <!-- <li><a href="{{ url('/login') }}" class="page-scroll"> <i class="inverted blue world icon big"></i></a></li>
                    <li><a href="#" class="page-scroll"><i class="fa fa-diamond"></i></a></li> -->
                   <!--  <li><a href="{{ url('/login') }}" class="page-scroll">Login</a></li>
                    <li><a href="{{ url('/register') }}" class="page-scroll">Register</a></li> -->
                @else
                    <li class="mywishlistIcon"><a href="#" class="page-scroll"><i class="fa fa-heart-o"></i></a></li>
                    <li><a href="{{ url('/') }}" class="page-scroll colorWhite">My Wishlist</a></li>
                    <li class="myProfileIcon"><a href="#" class="page-scroll"><i class="fa fa-user-o"></i></i></a></li>
                    <li><a href="#" class="page-scroll colorWhite">My Profile</a></li>
                    <!-- <li><a href="#" class="page-scroll"> <i class="inverted blue world icon big"></i></a></li> -->
                    <!-- <li><a href="#" class="page-scroll">{{ $user->username }}</a></li> -->
                    <!-- <li><a href="{{ route('leaderboards.index') }}" class="page-scroll"><i class="fa fa-diamond"></i> {{ $user->points->points }}</a></li> -->
                    <!-- <li><a href="{{ url('/logout') }}" class="page-scroll"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li> -->
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<br><br><br><br><br>
