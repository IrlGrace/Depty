 <nav class="navbar navbar-expand-lg navbar-fixed-top" color-on-scroll="500">
                <div class="container-fluid">
                    <div class="row">
                     <div class="col-xs-6 searchh">
                        <ul class="nav navbar-nav mr-auto">
                           <li class="nav-item">
                               <div class="span12">
                                    <form>
                                        <input type="text" name="search" class="search" placeholder="Search.." >
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-6 pull-right">  
                        <button class="navbar-toggler navbar-toggler-right " type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-bar burger-lines"></span>
                            <span class="navbar-toggler-bar burger-lines"></span>
                            <span class="navbar-toggler-bar burger-lines"></span>
                        </button>
                     </div>
                     </div>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home')}}">
                                    <span class="no-icon"> Home</span>
                                </a>
                            </li>
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <span class="notification">5</span>
                                    <span class="no-icon">Notification</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Notification 1</a>
                                    <a class="dropdown-item" href="#">Notification 2</a>
                                    <a class="dropdown-item" href="#">Notification 3</a>
                                    <a class="dropdown-item" href="#">Notification 4</a>
                                    <a class="dropdown-item" href="#">Another notification</a>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('discussion') }}">
                                    <span class="no-icon"> Discussion</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="no-icon">Settings</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Help</a>                                    
                                    <a class="dropdown-item" href="{{( route('account.settings'))}}">Account Settings</a>
                                     <div class="divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >Log Out</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>