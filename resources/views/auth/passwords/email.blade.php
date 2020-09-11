@extends('intro.layouts.app')
@section('content')
<style>
.navbar-main-menu {
    display: none;
}

.nav-user {
    display: none;
}

footer {
    display: none;
}
</style>

<main class="main">
    <section class="position-relative">

        <div class="container mx-1 my-auto mx-sm-auto">

            <div class="col-xl-4 col-lg-8 col-md-10 px-0-5 mx-auto my-4">

                <h1 class="text-center mb-2-5">
                    Forgot password? </h1>

                <p class="text-center mb-6 text-grey">
                    Already have a influencerpulse account? <a href="{{route('intro.signin')}}" rel="nofollow">Sign in</a>
                </p>

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif


                <form id="lost-password-form" action="{{route('password.email')}}" method="post"
                    class="fv-plugins-bootstrap fv-plugins-framework">
                    @csrf
                    <div class="form-group fv-plugins-icon-container">
                        <label class="sr-only" for="email">Email address</label>
                        <div class="form-controls">
                            <div class="input-group input-group-shadow focused">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="sprite-icon-envelope"></i></span>
                                </div>
                                <input class="form-control" type="email" name="email" id="email"
                                    placeholder="Email address" autofocus="" value="">
                            </div><i data-field="email" class="fv-plugins-icon fal fa-asterisk"></i>

                        </div>
                        <div class="fv-plugins-message-container">
                            @error('email')
                            <span class="" role="alert" style="width: 100%;
                                        margin-top: 0.25rem;
                                        font-size: 80%;
                                        color: #f86c6b;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror</div>
                    </div>

                    <button class="btn btn-primary btn-lg btn-block" type="submit">
                        Reset password </button>


                    <div>
                    </div>
                    <button type="submit" style="display: none; height: 0px; width: 0px;">

                    </button>
                </form>

            </div>

        </div>

    </section>


</main>
@endsection