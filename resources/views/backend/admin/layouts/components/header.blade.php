<header class="navbar navbar-light app-header">
    <a class="navbar-brand" href="{{route('dashboard')}}">
        <img src="{{asset('intro/img/logo.png')}}" alt="influencerpulse" class="img-fluid" style="width: 11rem !important">
    </a>
    <ul class="nav navbar-nav navbar-main-menu text-center justify-content-center flex-grow-2">
        <li class="nav-item">
            <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
                <span class="navbar-toggler-icon"></span>
            </button><button class="navbar-toggler sidebar-toggler d-md-down-none" type="button"
                data-toggle="sidebar-lg-show">
                <span class="navbar-toggler-icon"></span>
            </button>
        </li>
        <li class="nav-item d-md-down-none">
            <a class="nav-link" href="{{route('dashboard')}}">
                Dashboard
            </a></li>
        
    </ul>
    <ul class="nav navbar-nav nav-user right-navbar text-center">
        <li class="nav-item dropdown pr-0">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                data-e2e="user-dropdown">
                <i class="fal fa-user"></i>
                <span class="d-md-down-none">{{Auth()->user()->name}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">

                <div class="dropdown-header text-center">
                    <strong>Account</strong>
                </div>

                <a href="{{route('seller.profile')}}" title="Profile" class="dropdown-item">
                     <i class="fal fa-user"></i> Profile 
                </a>
                <a class="dropdown-item" href="{{route('seller.pass')}}" title="Password">
                    <i class="fal fa-lock"></i> Password
                </a>

                <a class="dropdown-item" href="{{route('seller.mail')}}" title="Email address">
                    <i class="fal fa-envelope"></i> Email address
                </a><a href="{{route('seller.history')}}" title="Billing History" class="dropdown-item">
                    <i class="fal fa-history"></i> Billing History
                </a>
                <div class="dropdown-header text-center">
                    <strong>Settings</strong>
                </div><a class="dropdown-item" href="" data-toggle="modal" data-target="#generic-modal">
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
    

    <div class="modal fade" id="generic-modal" tabindex="-1" role="dialog" aria-hidden="true">
        
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header align-items-center">

                    <h5 class="modal-title">Browser Notifications</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fal fa-times" aria-hidden="true"></i>
                    </button>

                </div>

                <div class="modal-body">

                    <p>
                        Receive live notifications into your browser even if you are not online on influencerpulse. </p>

                    <div class="alert alert-info">

                        <p>
                            <i class="fal fa-info-circle"></i>
                            We will notify you for any important event related to your influencerpulse account: </p>
                        <ul>
                            <li>
                                Rebate campaigns online/offline </li>
                            <li>
                                Rebate keys approval </li>
                            <li>
                                Wallet transactions </li>
                            <li>
                                And much more </li>
                        </ul>

                    </div>

                    <div class="d-flex justify-content-center flex-column align-items-center mt-3 text-center">

                        <p id="web-push-status">Web push notifications are not enabled yet.</p>

                        <button id="subscribe-button" type="button" class="btn btn-primary btn-lg none"
                            style="display: block;">
                            Enable Notifications </button>

                        <button id="unsubscribe-button" type="button" class="btn btn-danger btn-lg none"
                            style="display: none;">
                            Disable Notifications </button>

                    </div>

                    <script>
                    $(function() {

                        Project.WebPush.init();

                        $('#subscribe-button').on('click', function() {
                            Project.WebPush.enable();
                        });

                        $('#unsubscribe-button').on('click', function() {
                            Project.WebPush.unsubscribe();
                        });

                    });
                    </script>

                </div>
            </div>
        </div>
    </div>
</header>