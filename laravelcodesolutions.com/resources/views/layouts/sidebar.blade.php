<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="{{route('home')}}"><img src="{{ asset('favicon.png') }}" width="25" alt="{{ Auth::user()->name }}"><span class="m-l-10">My Web Deal</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <div class="image"><a href="#"><img src="{{ asset('assets/images/profile_av.jpg') }}" alt="User"></a></div>
                    <div class="detail">
                        <h4>{{ Auth::user()->name }}</h4>
                        <small>  @if(Auth::User()->isAdmin()) Admin @endif</small>
                    </div>
                </div>
            </li>
            <li class="active open"><a href="{{route('home')}}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>

            <li class="">
                <a href="Javascript:void(0)" class="menu-toggle"><i class="zmdi zmdi-labels"></i> <span>Categories</span></a>
                <ul class="ml-menu">
                    <li class=""><a href="{{ route('categories.index') }}">List</a></li>
                    <li class=""><a href="{{ route('categories.create') }}">Add New</a></li>
                </ul>
            </li>

            <li class="{{ Request::segment(1) === 'post' ? 'active open' : null }}">
                <a href="#Blog" class="menu-toggle"><i class="zmdi zmdi-collection-text"></i> <span>Posts</span></a>
                <ul class="ml-menu">
                    <li class=""><a href="{{ route('post.index') }}">List</a></li>
                    <li class=""><a href="{{ route('post.create') }}">Add New</a></li>
                </ul>
            </li>

            <li class="{{ Request::segment(1) === 'slider' ? 'active open' : null }}">
                <a href="#Slider" class="menu-toggle"><i class="zmdi zmdi-collection-folder-image"></i> <span>Slider</span></a>
                <ul class="ml-menu">
                    <li class=""><a href="{{ route('slider.index') }}">List</a></li>
                    <li class=""><a href="{{ route('slider.create') }}">Add New</a></li>
                </ul>
            </li>


            <li class="open"><a href="{{route('site.index')}}"><i class="zmdi zmdi-file"></i><span>Legal Pages</span></a></li>


          <li class="open"><a target="_blank" href="{{route('index')}}"><i class="zmdi zmdi-forward"></i><span>Visit Website</span></a></li>


        </ul>
    </div>
</aside>
