<div class="header">
    <div class="container"> <a class="navbar-brand" href="{{route('home')}}"><i class="fa fa-paper-plane"></i> {{settings()->name}} </a>
        <div class="menu pull-left"> <a class="toggleMenu" href="#"><img src="{{asset('front/images/nav_icon.png')}}" alt="" /> </a>
            <ul class="nav" id="nav">
                <li class="current"><a href="{{route('home')}}">الرئيسية</a></li>
                <li><a href="{{route('buildings.all')}}">جميع العقارات</a></li>

                <li class="nav-item dropdown">

                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                       ايجار
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                       @foreach(types() as $type)
                           <a class="dropdown-item"  href="{{url('/search?rent=ايجار&type_id='.$type->id)}}">{{$type->name}}</a>
                        @endforeach
                    </div>

                </li>

                <li class="nav-item dropdown">

                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        تمليك
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @foreach(types() as $type)
                            <a class="dropdown-item"  href="{{url('/search?rent=تمليك&type_id='.$type->id)}}">{{$type->name}}</a>
                        @endforeach
                    </div>

                </li>

                <li><a href="{{route('contact')}}"> اتصل بنا</a></li>

                <li>

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">دخول</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">عضوية جديدة</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown" >




                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                           <i class="fa fa-user fa-lg"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{ route('user.buildings') }}">
                                عقاراتي
                            </a>

                            <a class="dropdown-item" href="{{ route('profile') }}">
                                الصفحة الشخصية
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                تسجيل الخروج
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>



                        </div>



                    </li>

                    @endguest

                </li>
            </ul>
        </div>
    </div>
</div>
