<div class="row">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" id="menu-toggle" style="color:#fff;">Depty</a>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="mainNavBar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{route('login')}}" data-toggle="tooltip" title="Home"> HOME </a></li>
                    <li><a href="{{route('about')}}" data-toggle="tooltip" title="About"> ABOUT </a></li>
                    <li><a href="{{ route('login') }}" data-toggle="tooltip" title="LOGIN">LOGIN</a></li>
                    <li><a href="{{ route('register') }}">SIGN UP</a></li>
                    <!--<li><a href="#" data-toggle="tooltip" title="Help"><span class="glyphicon glyphicon-question-sign"></span></a></li>-->
                </ul>
            </div>
        </div>
    </nav>
</div>   
