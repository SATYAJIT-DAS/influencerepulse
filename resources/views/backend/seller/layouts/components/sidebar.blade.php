<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fal fa-fw fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li class="nav-item nav-dropdown open">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="fal fa-fw fa-percent"></i> Deals
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('seller.campaigns')}}">
                            <i class="fal fa-fw fa-list"></i> Campaigns
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('seller.queue')}}">
                            <i class="fal fa-fw fa-list"></i>
                            Orders
                            <span class="badge badge-danger">{{$notif}}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('seller.msg')}}">
                            <i class="fal fa-fw fa-comments"></i> Messages</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown open">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="fal fa-fw fa-tag"></i> Coupons <span class="badge badge-danger">New</span>
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('seller.listings')}}">
                            <i class="fal fa-fw fa-list"></i> Listings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('seller.upload')}}">
                            <i class="fal fa-fw fa-upload"></i> Bulk Upload
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('seller.wallet')}}">
                    <i class="fal fa-fw fa-suitcase"></i> Wallet
                </a>
            </li>

<!--             <li class="nav-item">
                <a class="nav-link" href="{{route('live-chat')}}">
                    <i class="fal fa-fw fa-suitcase"></i> Live Chat
                </a>
            </li> -->


            <li class="d-lg-none">
                <hr>
            </li>
            <li class="nav-item d-lg-none">
                <a class="nav-link" href="{{route('seller.faq')}}">
                    <i class="fal fa-fw fa-question-circle"></i> FAQ
                </a>
            </li>
            <li class="nav-item d-lg-none">
                <a class="nav-link" href="{{route('seller.contact')}}">
                    <i class="fal fa-fw fa-life-ring"></i> Contact Us
                </a>
            </li>
           <!--  <li class="nav-item d-lg-none">
                <a class="nav-link" href="{{route('seller.aff')}}">
                    <i class="fal fa-fw fa-users"></i> Affiliate Program
                </a>
            </li>
            <li class="nav-item d-lg-none">
                <a class="nav-link" href="" data-toggle="modal"
                    data-target="#generic-modal">
                    <i class="fal fa-fw fa-bell"></i> Notifications
                </a>
            </li>
            <li class="nav-item d-lg-none">
                <a class="nav-link" target="_blank" href="">
                    <i class="fal fa-fw fa-blog"></i> Blog
                </a>
            </li> -->
        </ul>
    </nav>
</div>