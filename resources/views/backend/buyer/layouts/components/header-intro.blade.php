<header class="navbar navbar-expand-lg navbar-light app-header">
    <div class="container-fluid"><a class="navbar-brand" href="{{route('dashboard')}}">
            <img src="{{asset('intro/img/logo.png')}}" alt="influencerpulse" class="img-fluid">
        </a>
        <ul class="nav navbar-nav navbar-main-menu text-center justify-content-center flex-grow-2 margin-auto">
            <li class="nav-item">
                <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button"
                    data-toggle="sidebar-show">
                    <span class="navbar-toggler-icon"></span>
                </button><button class="navbar-toggler sidebar-toggler d-md-down-none" type="button"
                    data-toggle="sidebar-lg-show">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </li>
            <li class="nav-item d-md-down-none">
                <a class="nav-link" href="{{route('buyer.activity')}}">
                    Activity
                </a></li>
            <li class="nav-item d-md-down-none">
                <a class="nav-link" href="{{route('buyer.faq')}}">
                    FAQ
                </a>
            </li>
            <li class="nav-item d-md-down-none">
                <a class="nav-link" href="{{route('buyer.contact-us')}}">
                    Contact Us
                </a>
            </li>
            <li class="nav-item d-md-down-none">
                <a class="nav-link" href="{{route('buyer.aff')}}">
                    Affiliate Program
                </a>
            </li>
            <li class="nav-item d-md-down-none">
                <a class="btn btn-sm btn-chrome px-1" href="{{route('buyer.chrome')}}">
                    <i class="fab fa-chrome"></i> Install Chrome Extension
                </a>
            </li>
        </ul>
        <ul class="nav navbar-nav nav-user right-navbar text-center">
            <li class="nav-item dropdown px-2">
                <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true">
                    <i class="fal fa-tags"></i>
                    <span class="badge badge-pill badge-success">50</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">

                    <div class="dropdown-header text-center">
                        <strong>Remaining rebates</strong>
                    </div>

                    <div class="dropdown-item d-flex align-items-center justify-content-between">
                        <span>For today</span>
                        <span class="text-muted"><span class="text-success">5</span> / 5</span>
                    </div>

                    <div class="dropdown-item d-flex align-items-center justify-content-between">
                        <span>For this month</span>
                        <span class="text-muted"><span class="text-success">50</span> / 50</span>
                    </div>

                    <div class="dropdown-item text-wrap text-muted">
                        <small>
                            <span class="fal fa-info-circle"></span> The maximum number of rebates in 1 day is 5,
                            with a total maximum of 50 in 1 month; however, both rebate maximums are reset each day
                            and each month.
                        </small>
                    </div>

                </div>

            </li>
            <li class="nav-item dropdown pr-0">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                    data-e2e="user-dropdown">
                    <i class="fal fa-user"></i>
                    <span class="d-md-down-none">buyer</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">

                    <div class="dropdown-header text-center">
                        <strong>Account</strong>
                    </div>
                    <a href="{{route('buyer.payout')}}" title="Profile" class="dropdown-item">
                        <i class="fal fa-fw fa-dollar-sign"></i> Pay Out</a>


                    <a href="{{route('buyer.profile')}}" title="Profile" class="dropdown-item">
                        <i class="fal fa-user-cog"></i> Profile
                    </a><a href="{{route('buyer.mail')}}" title="Mailing Address"
                        class="dropdown-item">
                        <i class="fal fa-address-card"></i> Mailing Address
                    </a><a class="dropdown-item" href="{{route('buyer.pass')}}" title="Password">
                        <i class="fal fa-lock"></i> Password
                    </a>

                    <a class="dropdown-item" href="{{route('buyer.email')}}"
                        title="Email address">
                        <i class="fal fa-envelope"></i> Email address
                    </a>
                    <div class="dropdown-header text-center">
                        <strong>Settings</strong>
                    </div><a class="dropdown-item" href="{{route('buyer.notif')}}">
                        <i class="fal fa-bell"></i> Notifications
                    </a>
                    <div class="divider"></div>

                    <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                    title="Sign out">
                    <i class="fal fa-sign-out"></i> Sign out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                </div>
            </li>
        </ul>
    </div>
</header>