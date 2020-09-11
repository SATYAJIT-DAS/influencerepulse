<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fal fa-fw fa-tachometer-alt"></i> Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('camp_manage.index')}}">
                    <i class="fal fa-fw fa-list"></i> Campaigns Manage
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('coupon_manage.index')}}">
                    <i class="fal fa-fw fa-tag"></i> Coupons Manage
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('order_manage')}}">
                    <i class="fal fa-fw fa-tag"></i> Order Manage
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('transaction.index')}}">
                    <i class="fal fa-fw fa-tag"></i> Transaction History
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('users.index')}}">
                    <i class="fal fa-user"></i> User Manage
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('msg_manage.index')}}">
                    <i class="fal fa-fw fa-comments"></i> Message Manage
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="{{route('service.index')}}">
                    <i class="fal fa-fw fa-comments"></i> Service Manage
                </a>
            </li>



            <li class="nav-item">
                <a class="nav-link" href="{{route('category.index')}}">
                    <i class="fal fa-fw fa-suitcase"></i> Category Manage
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('market.index')}}">
                    <i class="fal fa-fw fa-suitcase"></i> Marketplace Manage
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.wallet')}}">
                    <i class="fal fa-suitcase"></i> Wallet
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="" data-toggle="modal" data-target="#reset-modal">
                    <i class="fal fa-history"></i> Site Reset
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.pass_change')}}">
                    <i class="fal fa-key"></i> Password Change
                </a>
            </li>

            <div class="modal fade" id="reset-modal" tabindex="-1" role="dialog"
                style="top:70px; padding-right: 17px; display: none;" aria-modal="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header align-items-center">

                            <h5 class="modal-title">Site Data Clear</h5>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i class="fal fa-times" aria-hidden="true"></i>
                            </button>

                        </div>

                        <div class="modal-body">

                            <form id="write-message-form" method="post" action="{{route('admin.clear')}}"
                                class="fv-form fv-form-bootstrap4">
                                @csrf
                                <button type="submit" class="fv-hidden-submit"
                                    style="display: none; width: 0px; height: 0px;"></button>

                                <input type="hidden" name="order_id" id="order_id" value="">
                                <input type="hidden" name="action" id="action" value="write">

                                <div class="form-group">
                                    <p class="text-danger">Are you sure? After this, you can not recover the base.</p>
                                    <label class="text-danger">Password</label>
                                    <div class="form-controls">
                                        <div class="input-group input-group-shadow">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="sprite-icon-pass"></i></span>
                                            </div>
                                            <input class="form-control" type="password" id="password" name="password"
                                                placeholder="Password">
                                        </div>
                                    </div>
                                </div>



                                <button data-e2e="send-message" class="btn btn-primary btn-block btn-lg" type="submit">
                                    OK, Reset </button>

                            </form>

                        </div>


                    </div>
                </div>
            </div>

            
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
            <li class="nav-item d-lg-none">
                <a class="nav-link" href="{{route('seller.aff')}}">
                    <i class="fal fa-fw fa-users"></i> Affiliate Program
                </a>
            </li>
            <li class="nav-item d-lg-none">
                <a class="nav-link" href="" data-toggle="modal" data-target="#generic-modal">
                    <i class="fal fa-fw fa-bell"></i> Notifications
                </a>
            </li>
            <li class="nav-item d-lg-none">
                <a class="nav-link" target="_blank" href="">
                    <i class="fal fa-fw fa-blog"></i> Blog
                </a>
            </li>
        </ul>
    </nav>
</div>