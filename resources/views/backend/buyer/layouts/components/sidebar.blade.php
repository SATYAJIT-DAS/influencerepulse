<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard')}}">
                <i class="fal fa-fw fa-search"></i>Deals Search
                </a>
            </li>
            <li class="nav-item nav-dropdown open">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="fal fa-fw fa-percent"></i> Deals
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('buyer.purchases')}}">
                            <i class="fal fa-fw fa-shopping-cart"></i> Purchases
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('buyer.msg')}}">
                            <i class="fal fa-fw fa-comments"></i> Messages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('buyer.payouts')}}">
                            <i class="fal fa-fw fa-dollar-sign"></i> Payouts
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('buyer.notif')}}">
                            <i class="fal fa-fw fa-bell"></i> Notifications
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('buyer.coupons')}}">
                    <i class="fal fa-fw fa-tag"></i> Coupons
                    <span class="badge badge-danger">New</span>
                </a>
            </li>
            <!--<li class="nav-item">-->
            <!--    <a class="nav-link" href="{{route('buyer.favorites')}}">-->
            <!--        <i class="fal fa-fw fa-heart"></i> Favorites-->
            <!--    </a>-->
            <!--</li>-->
            <li class="nav-item">
                <a class="nav-link" href="{{route('buyer.wallet')}}">
                    <i class="fal fa-fw fa-suitcase"></i> Wallet
                </a>
            </li>

            <li class="d-lg-none">
                <hr>
            </li>
            
            <li class="nav-item d-lg-none">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fal fa-fw fa-question-circle"></i> FAQ
                </a>
            </li>
            <li class="nav-item d-lg-none">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fal fa-fw fa-life-ring"></i> Contact Us
                </a>
            </li>
            <li class="nav-item d-lg-none">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fal fa-fw fa-users"></i> Affiliate Program
                </a>
            </li>
            <li class="nav-item d-lg-none">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fal fa-fw fa-comments"></i> Testimonials
                </a>
            </li>
            <li class="nav-item d-lg-none">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fab fa-fw fa-chrome"></i> Chrome Extension
                </a>
            </li>
            <li class="nav-item d-lg-none">
                <a class="nav-link" target="_blank" href="{{route('dashboard')}}">
                    <i class="fal fa-fw fa-blog"></i> Blog
                </a>
            </li>
        </ul>
    </nav>
</div>