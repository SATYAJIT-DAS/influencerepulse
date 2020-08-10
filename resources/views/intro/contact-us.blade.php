@extends('intro.layouts.app')
@section('content')

<main class="main">
    <section class="gradient-bg full-page">

        <div class="container m-auto message-bg">

            <div class="col-xl-4 col-lg-6 col-md-8 px-0-5 mx-auto my-4">

                <h1 class="mb-2-5 text-center">Get in Touch</h1>



                <p class="mb-6 text-dark text-center">You can contact us through the form below for any
                    problem/question.</p>

                @if (session('success'))
                <section class="section section-flash mb-2-5 aos-init aos-animate" data-aos="flip-up">
                    <div class="alert alert-success" role="alert">
                        <i class="fal fa-check"></i> Your message has been received, we will contact you shortly.
                    </div>
                </section>
                @endif


                <form method="post" id="contact-form" action="{{route('service.store')}}"  role="form">
                    @csrf

                    <div class="form-group">
                        <label for="name" class="sr-only">Full name</label>
                        <div class="form-controls">
                            <div class="input-group input-group-shadow">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="sprite-icon-user"></i></span>
                                </div>
                                <input class="form-control" type="text" name="user_name" id="name" placeholder="Full name"
                                    value="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="sr-only">Email address</label>
                        <div class="form-controls">
                            <div class="input-group input-group-shadow">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="sprite-icon-envelope"></i></span>
                                </div>
                                <input class="form-control" type="email" name="email" id="email"
                                    placeholder="Email address" value="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="sr-only">Message</label>
                        <div class="form-controls">
                            <div class="input-group input-group-textarea input-group-shadow">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="sprite-icon-message"></i></span>
                                </div>
                                <textarea name="message" id="message" class="form-control textarea-sm"
                                    placeholder="Message"></textarea>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary btn-block btn-lg mb-0" type="submit">
                        <i class="fal fa-send"></i> Send Message </button>

                    <p class="mt-4 text-center small-text mb-0 px-3">
                        This site is protected by reCAPTCHA and the Google <a href="https://policies.google.com/terms"
                            target="_blank">Terms of Service</a> and <a href="https://policies.google.com/privacy"
                            target="_blank">Privacy Policy</a> apply.
                    </p>

                </form>

            </div>

        </div>

    </section>


</main>

<script src="intro/js/e532150e6067777963aa.js"></script>

<script src="{{asset('intro/js/api62be.js?render=6LfevJ0UAAAAAK322CqRQn5khrtaWqUacoHhytbV')}}"></script>

@endsection