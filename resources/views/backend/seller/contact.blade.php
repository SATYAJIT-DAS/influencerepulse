@extends('backend.seller.layouts.app')
@section('content')
<style>
.sidebar {
    margin-left: -200px !important;
}

main {
    margin-left: 0px !important;
}

header>.justify-content-center {
    margin: auto;
}

.message-bg {
    background: url(../intro/img/messages-bg.png) no-repeat bottom center;
    background-size: 100% auto;
}

.main-bg {
    background-color: white;
}

footer {
    margin-left: -200px;
}

.sidebar-toggler {
    display: none;
}
</style>
<main class="main main-bg">
    @if (session('success'))
    <section class="section section-flash aos-init aos-animate" data-aos="flip-up">
        <div class="container-fluid">
            <div class="alert alert-success" role="alert">
                <i class="fal fa-check"></i> {{ session('success') }}</div>
        </div>
    </section>
    @endisset


    <section class="gradient-bg full-page">

        <div class="container m-auto message-bg">

            <div class="col-xl-4 col-lg-6 col-md-8 px-0-5 mx-auto my-4">

                <h1 class="mb-2-5 text-center">Get in Touch</h1>

                <p class="mb-6 text-dark text-center">You can contact us through the form below for any
                    problem/question.</p>


                <form method="post" id="contact-form" action="{{route('service.store')}}"  role="form">
                    @csrf

                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    <input type="hidden" name="user_name" value="{{auth()->user()->name}}">
                    

                    <div class="form-group">
                        <label for="email" class="sr-only">Email address</label>
                        <div class="form-controls">
                            <div class="input-group input-group-shadow">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="sprite-icon-envelope"></i></span>
                                </div>
                                <input class="form-control" type="email" name="email" id="email"
                                    placeholder="Email address" value="{{auth()->user()->email}}" readonly>
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
                                <textarea name="opinion" id="message" class="form-control textarea-sm"
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
@endsection