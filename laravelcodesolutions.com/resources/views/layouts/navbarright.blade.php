<div class="navbar-right">
    <ul class="navbar-nav">
{{--        <li><a href="#search" class="main_search" title="Search..."><i class="zmdi zmdi-search"></i></a></li>--}}

        <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" title="Notifications" data-toggle="dropdown" role="button"><i class="zmdi zmdi-notifications"></i>
                <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
            </a>
            <ul class="dropdown-menu slideUp2">
                <li class="header">Notifications</li>
                <li class="body">
                    <ul class="menu list-unstyled">
                        <li>
                            <a href="javascript:void(0);">
                                <div class="icon-circle bg-blue"><i class="zmdi zmdi-account"></i></div>
                                <div class="menu-info">
                                    <h4>8 New Members joined</h4>
                                    <p><i class="zmdi zmdi-time"></i> 14 mins ago </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="icon-circle bg-amber"><i class="zmdi zmdi-shopping-cart"></i></div>
                                <div class="menu-info">
                                    <h4>4 Sales made</h4>
                                    <p><i class="zmdi zmdi-time"></i> 22 mins ago </p>
                                </div>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="footer"> <a href="javascript:void(0);">View All Notifications</a> </li>
            </ul>
        </li>


        <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-face"></i>
            <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
            </a>

        </li>

        <li><a onclick="return confirm('sure to Logout ?')" href="{{route('logout')}}" class="mega-menu" title="Sign Out"><i class="zmdi zmdi-power"></i></a></li>
    </ul>
</div>
