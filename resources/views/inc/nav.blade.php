<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" id = "navi">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/dashboard') }}">
            <h4>{{ config('Brand', 'NsP') }}</h4>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class = "nav-item"></li>
                    <a class="nav-link" href="{{ route('dashboard') }}">Home</a>
                </li>
           @if(auth()->user())
                <li class = "nav-item"></li>
                    <a class="nav-link" href="{{ route('posts.post') }}">Create Post</a>
                </li>
            @endif

            <li class = "nav-item"></li>
                    <a class="nav-link" href="{{ route('contact.create') }}">Contact Us</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">

             <form class="form-inline my-2 my-lg-0" method= "post" action = "{{route('posts.search')}}">
             @csrf
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name = "search">
                <button class="btn btn-outline-success my-2 mr-5 my-sm-0" type="submit">Search</button>
            </form>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>


                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            @if(auth()->user()->profile == null)

                                <a href="{{route('profiles.profile')}}" class="dropdown-item">Update Profile</a>


                            @endif


                            @if(auth()->user()->email == 'admin@gmail.com')

                                <a href="{{route('categories.category')}}" class="dropdown-item">Add New Category</a>

                                <a href="{{route('categories.allCat')}}" class="dropdown-item">View All Categories</a>
                                <a href="{{route('allUsers')}}" class="dropdown-item">View Users</a>

                            @endif

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}

                            </a>



                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>