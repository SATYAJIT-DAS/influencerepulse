
@extends('backend.buyer.layouts.app-intro')
@section('content')
<main class="main main-bg">
<section id="chrome-extension-hero">

<div class="container-flud">

    <div class="row align-items-center">

        <div class="d-none d-md-flex col-md-4 col-lg-4 col-uxxl-3 chrome-savings">

            <div class="py-3 py-lg-8 left-320">

                <img src="{{asset('intro/img/popup.png')}}" alt="Start with Chrome Extension">

            </div>

        </div>

        <div class="col-md-6 col-lg-6 col-xl-6 offset-md-1 py-6 px-5 px-lg-10 px-xl-15 py-xxl-20 chrome-start">

            <h1 class="mb-2-5 lato">
                Never Pay Full Price Again                    </h1>

            <p class="mb-3 mb-lg-7">
                influencerpulse Free Chrome Extension automatically applies rebates and adds coupons 
                    when you shop on Amazon.                    </p>

            <a href="https://chrome.google.com/webstore/detail/rebate-key-cashback-rebat/lpmjpncbeedkacnfmebfgejgpajajjif"
               class="btn btn-coupon">
                <b>Add to Chrome</b> It's free                        <i class="fas fa-caret-right d-inline-block ml-1"></i>
            </a>

        </div>

    </div>

</div>

</section>

<section>

<div class="container-fluid py-6">

    <h2 class="section-heading mb-xl-3-5 mb-2 text-center">
        How it Works            </h2>

    <div class="row text-center">

        <div class="col-md-4 mb-5 mb-md-0">

            <img src="{{asset('intro/img/step1.svg')}}" alt="Chrome extension - Step 1" class="img-fluid">

            <h5 class="my-3">One Click Install</h5>

            <a href="https://chrome.google.com/webstore/detail/rebate-key-cashback-rebat/lpmjpncbeedkacnfmebfgejgpajajjif"
               target="_blank">
                Go to Google Chrome's Web Store                    </a>

            <div class="text-muted">
                Click "Add to Chrome" then click "Add extension" to install.                    </div>

        </div>

        <div class="col-md-4 mb-5 mb-md-0">

            <img src="{{asset('intro/img/step2.svg')}}" alt="Chrome extension - Step 2" class="img-fluid">

            <h5 class="my-3">Shop on Amazon</h5>

            <div class="text-muted">
                We'll find, highlight and apply rebates and coupons automatically.                    </div>

        </div>

        <div class="col-md-4">

            <img src="{{asset('intro/img/step3.svg')}}" alt="Chrome extension - Step 3" class="img-fluid">

            <h5 class="my-3">Save Instantly</h5>

            <div class="text-muted">
                Rebate Key will automatically apply your coupon or rebate and save you money!                    </div>

        </div>

    </div>

</div>

</section>

<section id="chrome-video-explanations">

<div class="container-fluid py-6">

    <h2 class="section-heading mb-xl-3-5 mb-2 text-center">
        Step-by-Step Tutorial            </h2>

    <div class="row">

        <div class="col-md-8 mx-auto video">
            <img src="{{asset('intro/img/browser-bar.svg')}}" alt="Step-by-step tutorial" class="w-100">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe src="https://www.youtube.com/embed/vSkfPqm59t8"
                        frameborder="0" allowfullscreen
                        allow="accelerometer; encrypted-media; gyroscope; picture-in-picture"></iframe>
            </div>
        </div>

    </div>

</div>

</section>

<section id="buyers-testimonials">

<div class="bg-dark py-3">
    <h4 class="text-center text-white lato-lighter mb-0">
        See what our users are saying!            </h4>
</div>

<div class="container py-6">

    <div class="row testimonial-block testimonial-slider px-1 px-sm-0 mb-lg-3-5 mb-1">
                            <div class="col-lg col-12">
                <div class="card with-small-shadow py-2 px-3 mt-5 mb-1">
                    <div class="mb-3 d-flex align-items-end">
                        <div class="position-absolute">
                            <img src="/files/testimonials/w/h/l/n/a/whlna.jpg"
                                 data-src="/files/testimonials/w/h/l/n/a/whlna.jpg"
                                 alt="Amber" class="lozad">
                            <div class="testimonial-icon d-flex bg-info">
                                <i class="sprite-icon-quote-purple m-auto"></i>
                            </div>
                        </div>
                        <h4 class="text-dark mb-0 ml-12-5">Amber</h4>
                    </div>
                    <div class="expandable">

                        <div class="expandable-content expandable-content-sm">

                            <div class="expandable-content-inner">
                                influencerpulse is so easy to use! And who isn’t addicted to amazon?! Nothing better than getting a deal!!! Thank you influencerpulse!                                    </div>

                            <div class="expandable-indicator"></div>

                        </div>

                        <button class="btn btn-sm expandable-trigger-more" type="button">
                            <i class="fal fa-plus"></i>
                        </button>

                    </div>
                </div>
            </div>
                            <div class="col-lg col-12">
                <div class="card with-small-shadow py-2 px-3 mt-5 mb-1">
                    <div class="mb-3 d-flex align-items-end">
                        <div class="position-absolute">
                            <img src="/files/testimonials/1/g/e/p/j/1gepj.jpg"
                                 data-src="/files/testimonials/1/g/e/p/j/1gepj.jpg"
                                 alt="Taylor" class="lozad">
                            <div class="testimonial-icon d-flex bg-warning">
                                <i class="sprite-icon-quote-purple m-auto"></i>
                            </div>
                        </div>
                        <h4 class="text-dark mb-0 ml-12-5">Taylor</h4>
                    </div>
                    <div class="expandable">

                        <div class="expandable-content expandable-content-sm">

                            <div class="expandable-content-inner">
                                At first, I used rebate key as a seller. I have stayed a loyal member of rebate key ever since! I have gotten so many great deals on all sorts of products from Amazon. This is not a scam! Rebate Key is a win-win for everyone!                                    </div>

                            <div class="expandable-indicator"></div>

                        </div>

                        <button class="btn btn-sm expandable-trigger-more" type="button">
                            <i class="fal fa-plus"></i>
                        </button>

                    </div>
                </div>
            </div>
                            <div class="col-lg col-12">
                <div class="card with-small-shadow py-2 px-3 mt-5 mb-1">
                    <div class="mb-3 d-flex align-items-end">
                        <div class="position-absolute">
                            <img src="/files/testimonials/s/z/c/2/9/szc29.jpg"
                                 data-src="/files/testimonials/s/z/c/2/9/szc29.jpg"
                                 alt="Karen" class="lozad">
                            <div class="testimonial-icon d-flex bg-primary">
                                <i class="sprite-icon-quote-purple m-auto"></i>
                            </div>
                        </div>
                        <h4 class="text-dark mb-0 ml-12-5">Karen</h4>
                    </div>
                    <div class="expandable">

                        <div class="expandable-content expandable-content-sm">

                            <div class="expandable-content-inner">
                                I was hesitant to wait 35 days to get a check and wondered it this company was legit, but boy, are they ever!  I have gifts for birthdays, Christmas and grads. There are new items in my kitchen and throughout my home. The checks come right on time! This website haas been great for me!                                    </div>

                            <div class="expandable-indicator"></div>

                        </div>

                        <button class="btn btn-sm expandable-trigger-more" type="button">
                            <i class="fal fa-plus"></i>
                        </button>

                    </div>
                </div>
            </div>
                            <div class="col-lg col-12">
                <div class="card with-small-shadow py-2 px-3 mt-5 mb-1">
                    <div class="mb-3 d-flex align-items-end">
                        <div class="position-absolute">
                            <img src="/files/testimonials/t/h/r/k/2/thrk2.jpg"
                                 data-src="/files/testimonials/t/h/r/k/2/thrk2.jpg"
                                 alt="Chalida" class="lozad">
                            <div class="testimonial-icon d-flex bg-danger">
                                <i class="sprite-icon-quote-purple m-auto"></i>
                            </div>
                        </div>
                        <h4 class="text-dark mb-0 ml-12-5">Chalida</h4>
                    </div>
                    <div class="expandable">

                        <div class="expandable-content expandable-content-sm">

                            <div class="expandable-content-inner">
                                OMG!!! I can’t get enough!!! I really Love this website! I’ve been able to purchase so many great items!!! Thank you!                                    </div>

                            <div class="expandable-indicator"></div>

                        </div>

                        <button class="btn btn-sm expandable-trigger-more" type="button">
                            <i class="fal fa-plus"></i>
                        </button>

                    </div>
                </div>
            </div>
                            <div class="col-lg col-12">
                <div class="card with-small-shadow py-2 px-3 mt-5 mb-1">
                    <div class="mb-3 d-flex align-items-end">
                        <div class="position-absolute">
                            <img src="/files/testimonials/u/b/c/7/9/ubc79.jpg"
                                 data-src="/files/testimonials/u/b/c/7/9/ubc79.jpg"
                                 alt="Tanya" class="lozad">
                            <div class="testimonial-icon d-flex bg-success">
                                <i class="sprite-icon-quote-purple m-auto"></i>
                            </div>
                        </div>
                        <h4 class="text-dark mb-0 ml-12-5">Tanya</h4>
                    </div>
                    <div class="expandable">

                        <div class="expandable-content expandable-content-sm">

                            <div class="expandable-content-inner">
                                Thank you so much for this opportunity to get such a good deals or even free products, thank you for all you do I am a happy customer                                    </div>

                            <div class="expandable-indicator"></div>

                        </div>

                        <button class="btn btn-sm expandable-trigger-more" type="button">
                            <i class="fal fa-plus"></i>
                        </button>

                    </div>
                </div>
            </div>
                            <div class="col-lg col-12">
                <div class="card with-small-shadow py-2 px-3 mt-5 mb-1">
                    <div class="mb-3 d-flex align-items-end">
                        <div class="position-absolute">
                            <img src="/files/testimonials/x/6/j/a/m/x6jam.jpg"
                                 data-src="/files/testimonials/x/6/j/a/m/x6jam.jpg"
                                 alt="Raymond" class="lozad">
                            <div class="testimonial-icon d-flex bg-info">
                                <i class="sprite-icon-quote-purple m-auto"></i>
                            </div>
                        </div>
                        <h4 class="text-dark mb-0 ml-12-5">Raymond</h4>
                    </div>
                    <div class="expandable">

                        <div class="expandable-content expandable-content-sm">

                            <div class="expandable-content-inner">
                                Rebate Key is a definite game changer in our household. I've transformed from Scrooge McDuck to Jolly Saint Nick having found Rebate Key. Kudos, Rebate Key team. Keep up the great work!                                    </div>

                            <div class="expandable-indicator"></div>

                        </div>

                        <button class="btn btn-sm expandable-trigger-more" type="button">
                            <i class="fal fa-plus"></i>
                        </button>

                    </div>
                </div>
            </div>
                            <div class="col-lg col-12">
                <div class="card with-small-shadow py-2 px-3 mt-5 mb-1">
                    <div class="mb-3 d-flex align-items-end">
                        <div class="position-absolute">
                            <img src="/files/testimonials/m/h/k/z/c/mhkzc.jpg"
                                 data-src="/files/testimonials/m/h/k/z/c/mhkzc.jpg"
                                 alt="Daniella" class="lozad">
                            <div class="testimonial-icon d-flex bg-warning">
                                <i class="sprite-icon-quote-purple m-auto"></i>
                            </div>
                        </div>
                        <h4 class="text-dark mb-0 ml-12-5">Daniella</h4>
                    </div>
                    <div class="expandable">

                        <div class="expandable-content expandable-content-sm">

                            <div class="expandable-content-inner">
                                I was skeptical when I first heard of Rebate Key. And when I received my first check I was super excited that I finally found a site that actually works! And the items are amazing. I constantly recommend this website. Customer service for Rebate Key is great. I love Rebate Key!                                    </div>

                            <div class="expandable-indicator"></div>

                        </div>

                        <button class="btn btn-sm expandable-trigger-more" type="button">
                            <i class="fal fa-plus"></i>
                        </button>

                    </div>
                </div>
            </div>
                            <div class="col-lg col-12">
                <div class="card with-small-shadow py-2 px-3 mt-5 mb-1">
                    <div class="mb-3 d-flex align-items-end">
                        <div class="position-absolute">
                            <img src="/files/testimonials/l/r/1/8/1/lr181.jpg"
                                 data-src="/files/testimonials/l/r/1/8/1/lr181.jpg"
                                 alt="Maxenne" class="lozad">
                            <div class="testimonial-icon d-flex bg-primary">
                                <i class="sprite-icon-quote-purple m-auto"></i>
                            </div>
                        </div>
                        <h4 class="text-dark mb-0 ml-12-5">Maxenne</h4>
                    </div>
                    <div class="expandable">

                        <div class="expandable-content expandable-content-sm">

                            <div class="expandable-content-inner">
                                I feel so lucky to have found out about rebate key!!! They have so many items I was already looking for.                                    </div>

                            <div class="expandable-indicator"></div>

                        </div>

                        <button class="btn btn-sm expandable-trigger-more" type="button">
                            <i class="fal fa-plus"></i>
                        </button>

                    </div>
                </div>
            </div>
                            <div class="col-lg col-12">
                <div class="card with-small-shadow py-2 px-3 mt-5 mb-1">
                    <div class="mb-3 d-flex align-items-end">
                        <div class="position-absolute">
                            <img src="/files/testimonials/z/l/e/0/n/zle0n.jpg"
                                 data-src="/files/testimonials/z/l/e/0/n/zle0n.jpg"
                                 alt="Lena" class="lozad">
                            <div class="testimonial-icon d-flex bg-danger">
                                <i class="sprite-icon-quote-purple m-auto"></i>
                            </div>
                        </div>
                        <h4 class="text-dark mb-0 ml-12-5">Lena</h4>
                    </div>
                    <div class="expandable">

                        <div class="expandable-content expandable-content-sm">

                            <div class="expandable-content-inner">
                                influencerpulse has become my go to site that I check everyday because I get such great deals on the products I need and want. My check collection is growing everyday and I've been telling all my friends and family about it.                                    </div>

                            <div class="expandable-indicator"></div>

                        </div>

                        <button class="btn btn-sm expandable-trigger-more" type="button">
                            <i class="fal fa-plus"></i>
                        </button>

                    </div>
                </div>
            </div>
                    </div>

    <div class="arrows-block position-relative d-flex justify-content-center mt-lg-4 mt-2 px-1 px-sm-0"></div>

    <div class="d-flex justify-content-center align-items-center flex-column flex-sm-row mt-4">

        <a href="https://chrome.google.com/webstore/detail/rebate-key-cashback-rebat/lpmjpncbeedkacnfmebfgejgpajajjif"
           class="btn btn-primary">
            Activate Free Coupons & Cash Back                    <i class="fas fa-caret-right d-inline-block ml-1"></i>
        </a>

    </div>

</div>

</section>


</main>
@endsection