<li class="dropdown user user-menu">
    {{-- Menu Toggle Button --}}
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        {{-- The user image in the navbar --}}
        <img src="{{ asset('admin-lte-2/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
        {{-- hidden-xs hides the username on small devices so only the image appears --}}
        <span class="hidden-xs">{{ Auth::user()->name }}</span>
    </a>
    <ul class="dropdown-menu">
        {{-- The user image in the menu --}}
        <li class="user-header">
            <img src="{{ asset('admin-lte-2/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            <p>
                {{ Auth::user()->name }} - {{ Auth::user()->role ?? 'Special Person' }}
                <small>Member since {{ Auth::user()->created_at->diffForHumans() ?? 'Nov. 2012' }}</small>
            </p>
        </li>

        {{-- Menu Body --}}
        <li class="user-body">
            <div class="row">
                <div class="col-xs-4 text-center"><a href="#">Followers</a></div>
                <div class="col-xs-4 text-center"><a href="#">Sales</a></div>
                <div class="col-xs-4 text-center"><a href="#">Friends</a></div>
            </div>
        </li>

        {{-- Menu Footer --}}
        <li class="user-footer">
            <div class="pull-left"><a href="#" class="btn btn-default btn-flat">Profile</a></div>
            <div class="pull-right">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">
                    Sign out
                </a>
            </div>
            
        </li>
    </ul>
</li>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>