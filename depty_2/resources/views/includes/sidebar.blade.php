<div class="sidebar">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="#" class="simple-text">Depty</a>
                </div>
                <div class="profile clearfix" >
                    <div class="profile_pic" align="center" >
                      
                            @if(Storage::disk('local')->has(Auth::user()->picture))
                                <img class="img-circle img-responsive"  style="width:100px; border-radius:50%" src="{{route('account.image',['filename'=>Auth::user()->picture])}}" alt="...">
                            @else
                                <img class="img-circle profile_img" src="{{asset('img/user.png')}}" alt="...">
                            @endif
                            
                        
                    
                    </div>
                    <div class="profile_info">
                        <a href="{{route('profile',['user_id' =>Auth::user()->id])}}"><h2> {{ Auth::user()->codename }} </h2></a>
                        <small>{{ Auth::user()->email }}</small>
                    </div>
                </div>
                <p style="margin-top: 10px; margin-left: 15px;">CATEGORIES</p>
                <ul class="nav">
                     @foreach($categories as $category)
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('category/'.$category->id) }}">
                                 <i class=""></i>
                                <p>{{$category->categoryname}}</p>
                            </a>
                        </li>
                                           
                     @endforeach
                   
                </ul>
            </div>
        </div>