<header class="navbar navbar-expand-lg navbar-light app-header">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('intro.home')}}">
            <img src="{{asset('intro/img/influencers pulse logo.png')}}" alt="influencerpulse" class="img-fluid" style="width:12rem !important">
        </a>
        <ul class="nav navbar-nav navbar-main-menu text-center justify-content-center flex-grow-2">
            <li class="nav-item">
                <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button"
                    data-toggle="sidebar-show">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <li class="nav-item d-md-down-none">
                <a class="nav-link" href="{{route('intro.home')}}">
                    Home
                </a></li>
            <li class="nav-item d-md-down-none">
                <a class="nav-link" href="{{ route('intro.aboutUs') }}">
                    About Us
                </a>
            </li>
            <!-- <li class="nav-item d-md-down-none">
                <a class="nav-link" href="{{ route('intro.faq.buyer') }}">
                    FAQ
                </a>
            </li> -->
            <li class="nav-item d-md-down-none">
                <a class="nav-link" href="{{ route('intro.faq.contact-us') }}">
                    Contact Us
                </a>
            </li>
        </ul>
        <ul class="nav navbar-nav nav-user right-navbar text-center">
            <li class="nav-item">
                <a href="{{route('login')}}" rel="nofollow" title="Sign In" class="nav-link">
                    <span class="d-none d-sm-inline-block">Sign In</span>
                    <span class="d-inline-block d-sm-none pr-3 pr-sm-0"><i class="fal fa-sign-in"></i></span>
                </a>
            </li>
            <li class="nav-item pl-sm-3">
                <a href="{{route('intro.buyer-signup')}}" rel="nofollow" title="Sign In" class="btn btn-dark px-3-5 d-none d-sm-inline-block">
                    <span class="d-none d-sm-inline-block">Sign Up</span>
                    <span class="d-inline-block d-sm-none pr-3 pr-sm-0"><i class="fal fa-sign-in"></i></span>
                </a>
            </li>
            <!-- <li class="nav-item pl-sm-3">
                <a data-e2e="sign-up-btn"  title="Sign Up" rel="nofollow"
                    class="btn btn-primary-light px-3-5 d-none d-sm-inline-block" data-toggle="modal"
                    data-target="#generic-modal" data-modal-size="modal-lg">
                    <span class="d-none d-sm-inline-block">Sign Up</span>
                </a>

                <a  title="Sign Up" rel="nofollow" class="d-sm-none"
                    data-toggle="modal" data-target="#generic-modal" data-modal-size="modal-lg">
                    <i class="fal fa-user-plus"></i>
                </a>
            </li> -->
        </ul>
    </div>
</header>
