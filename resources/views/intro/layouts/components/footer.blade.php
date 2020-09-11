<footer>

    <div class="container">

        <div class="row py-5 px-2 px-sm-0">

            <div class="col-md-4 col-lg text-center">

                <h5 class="mb-2 mb-lg-3-5">Follow us</h5>

                <ul class="list-unstyled list-group list-group-horizontal social-buttons mb-3 mb-lg-1-5">
                    <li class="list-inline-item mr-1 mr-lg-2">
                        <a target="_blank" href="https://www.facebook.com/influencerpulse" class="bg-primary-light text-white"
                            rel="nofollow">
                            <i class="fab fa-facebook-f fa-fw"></i>
                        </a>
                    </li>
                    <li class="list-inline-item mr-1 mr-lg-2">
                        <a target="_blank" href="https://twitter.com/influencerpulse" class="bg-primary-light text-white"
                            rel="nofollow">
                            <i class="fab fa-twitter fa-fw"></i>
                        </a>
                    </li>
                    <li class="list-inline-item mr-1 mr-lg-2">
                        <a target="_blank" href="https://www.pinterest.com/influencerpulse/"
                            class="bg-primary-light text-white" rel="nofollow">
                            <i class="fab fa-pinterest fa-fw"></i>
                        </a>
                    </li>
                    <li class="list-inline-item mr-1 mr-lg-2">
                        <a target="_blank" href="https://www.instagram.com/influencerpulse/"
                            class="bg-primary-light text-white" rel="nofollow">
                            <i class="fab fa-instagram fa-fw"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a target="_blank" href="http://youtube.com/c/influencerpulse" class="bg-primary-light text-white"
                            rel="nofollow">
                            <i class="fab fa-youtube fa-fw"></i>
                        </a>
                    </li>
                </ul>

            </div>

            <div class="col-md-4 col-lg text-center">

                <h5>Get started</h5>

                <ul class="list-unstyled">
                    <li class="py-0-5">
                        <a href="{{route('intro.buyer-signup')}}" title="Sign Up" rel="nofollow" data-toggle="modal"
                            data-target="#generic-modal" data-modal-size="modal-lg">
                            Sign up
                        </a>
                    </li>
                    <li class="py-0-5">
                        <a href="{{route('intro.signin')}}" title="Sign In" rel="nofollow">
                            Sign in
                        </a>
                    </li>
                </ul>

            </div>

            <div class="col-md-4 col-lg text-center">

                <h5>Company</h5>

                <ul class="list-unstyled">
                    <li class="py-0-5">
                        <a href="{{ route('intro.aboutUs') }}">
                            About us
                        </a>
                    </li>
                    <li class="py-0-5">
                        <a href="{{ route('intro.faq.contact-us') }}">
                            Contact us
                        </a>
                    </li>
                    <li class="py-0-5">
                        <a href="{{route('intro.home')}}">
                            Blog
                        </a>
                    </li>
                </ul>

            </div>

            <!-- <div class="col-md-4 offset-md-4 offset-lg-0 col-lg text-center">

                <h5>Help</h5>

                <ul class="list-unstyled">-->
                    <!-- <li class="py-0-5">
                        <a href="{{route('intro.testimonials')}}">
                            Testimonials
                        </a>
                    </li> -->
                    <!--   <li class="py-0-5">
                        <a href="{{ route('intro.faq.buyer') }}">
                            FAQ
                        </a>
                    </li>
                </ul>

            </div> -->

            <!-- <div class="col-md-4 col-lg text-center">

                <h5>Affiliate Program</h5>

                <ul class="list-unstyled">
                    <li class="py-0-5">
                        <a href="{{ route('intro.buyer-pro') }}">
                            Buyers program
                        </a>
                    </li>
                    <li class="py-0-5">
                        <a href="{{ route('intro.seller-pro') }}">
                            Sellers program
                        </a>
                    </li>
                </ul>

            </div> -->

        </div>

        <hr />

        <div class="py-lg-2-5 py-1-5 row align-items-center">
             <!-- <div class="col-6 text-center text-md-right d-flex flex-column d-md-block pr-8">
               <a href="{{ route('intro.home') }}" rel="nofollow">influencerpulse</a>
                <span>© 2020</span>
            </div>
            -->
            <div class="col-12  text-center text-md-left d-flex flex-column d-md-block">
                <a href="{{ route('intro.term') }}" rel="nofollow">Terms of service</a>
                <span class="d-none d-md-inline"> - </span>
                <a href="{{ route('intro.privacy') }}" rel="nofollow">Privacy Policy</a>
                <span class="d-none d-md-inline"> - </span>
                <a href="{{ route('intro.shipping-policy') }}" rel="nofollow">Shipping policy</a>
                <span class="d-none d-md-inline"> - </span>
                <a href="{{ route('intro.refund-policy') }}" rel="nofollow">Refund policy</a>
            </div>
        </div>

    </div>


</footer>
