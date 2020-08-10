<header class="main-header">
    
    <a href="{{ route('dashboard') }}" class="logo">
        <span class="logo-mini"><b>A</b>LT</span>
        <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    
    <nav class="navbar navbar-static-top" role="navigation">
        {{-- Sidebar toggle button --}}
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        
        {{-- Navbar Right Menu --}}
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                @auth
                    {{-- @include('layouts.admin-lte2.topnav-include.message') --}}
                    {{-- @include('layouts.admin-lte2.topnav-include.notification') --}}
                    {{-- @include('layouts.admin-lte2.topnav-include.task') --}}
                    @include('layouts.admin-lte2.topnav-include.user-account')
                @endauth

                {{-- Control Sidebar Toggle Button --}}
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>