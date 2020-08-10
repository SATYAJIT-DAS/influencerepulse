@extends('intro.help.help-common')
@section('help-content')
<style>
.faq-tabs .nav-link-seller {
    background: transparent;
    border: none;
    color: rgba(51, 62, 72, 0.5);
}

.faq-tabs .nav-link-buyer {
    background: #ffffff;
    border-top: 2px solid #20a8d8;
    box-shadow: 0px -3px 5px -1px rgba(0, 0, 0, 0.1);
    color: #333e48;
}
</style>
<main class="main">
    <section class="gradient-bg">

        <div class="container py-lg-10 py-5">

            <div class="col-lg-4 pb-lg-6 pb-3 px-0 mx-auto text-center">

                <h1 class="mb-2-5">FAQ</h1>

                <p class="mb-0 text-grey">
                    Find answers about frequently asked questions and discover how influencerpulse works </p>

            </div>

            <ul class="nav nav-tabs mx-1 mx-sm-0 faq-tabs nav-fill" id="faq-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link nav-link-buyer roboto-medium py-1 active" id="buyer-tab" href="{{route('intro.faq.buyer')}}"
                        role="tab" aria-controls="buyer" aria-selected="true">Buyer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-seller roboto-medium py-1" id="seller-tab" href="{{route('intro.faq.seller')}}"
                        role="tab" aria-controls="seller" aria-selected="false">Seller</a>
                </li>
            </ul>

            <div class="tab-content mx-1 mx-sm-0 p-2-5 faq-tab-content" id="faq-content">

                <div class="tab-pane fade show active p-0" id="buyer" role="tabpanel" aria-labelledby="buyer-tab">

                    <div id="buyer-accordion" class="nice-accordion faq-accordion" role="tablist">

                        <div class="card">
                            <div class="card-header" role="tab" id="buyer-heading-3">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#buyer-collapse-3" aria-expanded="true"
                                        aria-controls="buyer-collapse-3"
                                        class="roboto-medium mb-0 d-flex justify-content-between align-items-center">
                                        <span>How does this work?</span>
                                        <span class="accordion-caret"></span>
                                    </a>
                                </h5>
                            </div>

                            <div id="buyer-collapse-3" class="collapse show" role="tabpanel"
                                aria-labelledby="buyer-heading-3" data-parent="#buyer-accordion">
                                <div class="card-body">
                                    <p>influencerpulse gives you direct access to exclusive manufacturers’ rebates for
                                        top-selling brands and
                                        products. This means you purchase an item and after a 35-day wait, you get a
                                        check mailed to your
                                        house for whatever you paid for the item in the first place. After you’ve
                                        purchased the product you
                                        need to report back with your REBATE KEY, which is your order number. Once the
                                        seller verifies your
                                        order, they will approve the rebate and your rebate amount will be credited to
                                        your account (shows
                                        on Wallet). We hold the funds for 35 days to make sure there is no error or
                                        problem, and after that,
                                        we will send you a check.</p>

                                    <p class="mb-0">Basically, the only thing you have to do is find great offers, buy
                                        and report your
                                        purchase in less than an hour and you'll get your money back after 35-days.</p>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" role="tab" id="buyer-heading-4">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#buyer-collapse-4" aria-expanded="true"
                                        aria-controls="buyer-collapse-4"
                                        class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                        <span>How to sign up as a buyer?</span>
                                        <span class="accordion-caret"></span>
                                    </a>
                                </h5>
                            </div>

                            <div id="buyer-collapse-4" class="collapse" role="tabpanel"
                                aria-labelledby="buyer-heading-4" data-parent="#buyer-accordion">
                                <div class="card-body">
                                    <ol class="mb-0">
                                        <li>Make sure to enter your full name and mailing address correctly as this is
                                            where your rebate
                                            checks will be sent. We will also send you a text message code to verify
                                            that you are a US
                                            resident.
                                        </li>
                                        <li>Browse all the products currently available at 10% - 100% off. Select the
                                            one you want and
                                            just click buy!
                                        </li>
                                        <li>After you’ve purchased the product you need to report back with your REBATE
                                            KEY, which is
                                            often your order number. Once the seller verifies your order, they will
                                            approve it and your
                                            rebate amount will be credited to your account.
                                        </li>
                                        <li>We hold the funds for 35 days to make sure there is no error or problem, and
                                            after that we
                                            will send you a check.
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" role="tab" id="buyer-heading-5">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#buyer-collapse-5" aria-expanded="true"
                                        aria-controls="buyer-collapse-5"
                                        class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                        <span>I cannot get text messages, can you email me the verification
                                            instead?</span>
                                        <span class="accordion-caret"></span>
                                    </a>
                                </h5>
                            </div>

                            <div id="buyer-collapse-5" class="collapse" role="tabpanel"
                                aria-labelledby="buyer-heading-5" data-parent="#buyer-accordion">
                                <div class="card-body">
                                    Sorry, we only allow cell phones to verify accounts. It is a protective measure.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" role="tab" id="buyer-heading-14">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#buyer-collapse-14" aria-expanded="true"
                                        aria-controls="buyer-collapse-14"
                                        class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                        <span>How to claim a rebate?</span>
                                        <span class="accordion-caret"></span>
                                    </a>
                                </h5>
                            </div>

                            <div id="buyer-collapse-14" class="collapse" role="tabpanel"
                                aria-labelledby="buyer-heading-14" data-parent="#buyer-accordion">
                                <div class="card-body">
                                    <ol>
                                        <li>Create a influencerpulse account <a href="../../buyer/sign-up.html"
                                                target="_blank" title="Sign up as Buyer">here</a>.
                                        </li>
                                        <li>Find the item you want to purchase and click on it.</li>
                                        <li>Click on Buy Product, it will display the instructions, read them carefully.
                                        </li>
                                        <li>Check the box that assures you have read all instructions and accepted Terms
                                            and Conditions of
                                            the service.
                                        </li>
                                        <li>The use of any extra discount coupons is forbidden, this might end up in a
                                            declined rebate.</li>
                                        <li>Click on Buy Product again, it'll take you directly to the product.</li>
                                        <li>Purchase the product on the URL you've been taken to, usually Amazon.</li>
                                        <li>They will give you an order ID, copy it.</li>
                                        <li>Go back to the site and go to Purchases > Unclaimed.</li>
                                        <li>Click on Confirm Purchase and paste your Order ID and confirm it!</li>
                                        <li>Wait 35 days for the check to be sent to your house.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" role="tab" id="buyer-heading-6">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#buyer-collapse-6" aria-expanded="true"
                                        aria-controls="buyer-collapse-6"
                                        class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                        <span>How can I make sure that I will get paid after the 35 days?</span>
                                        <span class="accordion-caret"></span>
                                    </a>
                                </h5>
                            </div>

                            <div id="buyer-collapse-6" class="collapse" role="tabpanel"
                                aria-labelledby="buyer-heading-6" data-parent="#buyer-accordion">
                                <div class="card-body">
                                    Thanks for your question. You will certainly get your rebate check mailed to you.
                                    When you enter your
                                    order ID, the rebate money is transferred into your wallet (you can see it on your
                                    profile) then after
                                    35 days a check will be sent.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" role="tab" id="buyer-heading-7">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#buyer-collapse-7" aria-expanded="true"
                                        aria-controls="buyer-collapse-7"
                                        class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                        <span>Where is the influencerpulse main office location? Is there a contact phone
                                            number?</span>
                                        <span class="accordion-caret"></span>
                                    </a>
                                </h5>
                            </div>

                            <div id="buyer-collapse-7" class="collapse" role="tabpanel"
                                aria-labelledby="buyer-heading-7" data-parent="#buyer-accordion">
                                <div class="card-body">
                                    We are based in Sheridan, WY. However we do not have phone support. All the rebate
                                    checks are sent out
                                    via an automated check system.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" role="tab" id="buyer-heading-8">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#buyer-collapse-8" aria-expanded="true"
                                        aria-controls="buyer-collapse-8"
                                        class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                        <span>When will I get my rebates?</span>
                                        <span class="accordion-caret"></span>
                                    </a>
                                </h5>
                            </div>

                            <div id="buyer-collapse-8" class="collapse" role="tabpanel"
                                aria-labelledby="buyer-heading-8" data-parent="#buyer-accordion">
                                <div class="card-body">
                                    <p>Rebates are processed after 30 days of purchase. This is how we can offer such
                                        high discounts.
                                        Sellers have 5 days to approve or decline the rebate.</p>

                                    <p class="mb-0">Rebates are automatically approved after 5 days.</p>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" role="tab" id="buyer-heading-9">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#buyer-collapse-9" aria-expanded="true"
                                        aria-controls="buyer-collapse-9"
                                        class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                        <span>There is something wrong with the product (e.g. price discrepancy on
                                            Amazon and influencerpulse websites)</span>
                                        <span class="accordion-caret"></span>
                                    </a>
                                </h5>
                            </div>

                            <div id="buyer-collapse-9" class="collapse" role="tabpanel"
                                aria-labelledby="buyer-heading-9" data-parent="#buyer-accordion">
                                <div class="card-body">
                                    Don't buy the product and please message the seller and indicate that you'd like to
                                    buy his product but
                                    something is wrong.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" role="tab" id="buyer-heading-2">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#buyer-collapse-2" aria-expanded="false"
                                        aria-controls="buyer-collapse-2"
                                        class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                        <span>The product is unavailable</span>
                                        <span class="accordion-caret"></span>
                                    </a>
                                </h5>
                            </div>
                            <div id="buyer-collapse-2" class="collapse" role="tabpanel"
                                aria-labelledby="buyer-heading-2" data-parent="#buyer-accordion">
                                <div class="card-body">
                                    If you followed the link and the product is not available, click on the link <b>I
                                        didn't buy this
                                        product</b> and please let us know here: <a
                                        href="../../company/contact-us.html">contact us</a>.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" role="tab" id="buyer-heading-10">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#buyer-collapse-10" aria-expanded="true"
                                        aria-controls="buyer-collapse-10"
                                        class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                        <span>Why do I see in my wallet only “x” in the next check?</span>
                                        <span class="accordion-caret"></span>
                                    </a>
                                </h5>
                            </div>

                            <div id="buyer-collapse-10" class="collapse" role="tabpanel"
                                aria-labelledby="buyer-heading-10" data-parent="#buyer-accordion">
                                <div class="card-body">
                                    <p>On the buyer wallet page, you can easily see which rebates are going to be
                                        included in the next
                                        check. There is a table that says coming payouts below totals.</p>

                                    <p class="mb-0">We have implemented a change in our system where all of the rebates
                                        are pre-approved.
                                        The seller has until the 35th day to dispute the rebate if for some reason the
                                        buyer canceled or
                                        returned the item.</p>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" role="tab" id="buyer-heading-11">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#buyer-collapse-11" aria-expanded="true"
                                        aria-controls="buyer-collapse-11"
                                        class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                        <span>Am I required to leave reviews in order to get a rebate?</span>
                                        <span class="accordion-caret"></span>
                                    </a>
                                </h5>
                            </div>

                            <div id="buyer-collapse-11" class="collapse" role="tabpanel"
                                aria-labelledby="buyer-heading-11" data-parent="#buyer-accordion">
                                <div class="card-body">
                                    No. You don’t have to leave a review to get your rebate.
                                    <b>Sellers are not allowed to ask your for a rebate.</b> The only thing you have to
                                    do is purchase the
                                    product and follow the rules and instructions.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" role="tab" id="buyer-heading-12">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#buyer-collapse-12" aria-expanded="true"
                                        aria-controls="buyer-collapse-12"
                                        class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                        <span>Can I order the same rebate more than once?</span>
                                        <span class="accordion-caret"></span>
                                    </a>
                                </h5>
                            </div>

                            <div id="buyer-collapse-12" class="collapse" role="tabpanel"
                                aria-labelledby="buyer-heading-12" data-parent="#buyer-accordion">
                                <div class="card-body">
                                    Most products are protected against this, however, some aren't those products can be
                                    bought more than
                                    once but sometimes sellers will decline the rebates. It’s against the rules to
                                    purchase any item more
                                    than once.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" role="tab" id="buyer-heading-15">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#buyer-collapse-15" aria-expanded="true"
                                        aria-controls="buyer-collapse-15"
                                        class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                        <span>Is there a limit of rebates?</span>
                                        <span class="accordion-caret"></span>
                                    </a>
                                </h5>
                            </div>

                            <div id="buyer-collapse-15" class="collapse" role="tabpanel"
                                aria-labelledby="buyer-heading-15" data-parent="#buyer-accordion">
                                <div class="card-body">
                                    Yes, there is a daily and monthly limit to claim rebates, 5 items per day and 50
                                    items per month. Once
                                    the limit has been reached, it will be refreshed the 1st of the following month.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" role="tab" id="buyer-heading-13">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#buyer-collapse-13" aria-expanded="true"
                                        aria-controls="buyer-collapse-13"
                                        class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                        <span>I put the wrong order ID</span>
                                        <span class="accordion-caret"></span>
                                    </a>
                                </h5>
                            </div>

                            <div id="buyer-collapse-13" class="collapse" role="tabpanel"
                                aria-labelledby="buyer-heading-13" data-parent="#buyer-accordion">
                                <div class="card-body">
                                    To make sure that your rebate is honored please go to Purchases > Pre-approved >
                                    Message Seller and let
                                    the seller know about the mistake including your actual order ID so they can approve
                                    your rebate when
                                    the 30 days are up.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" role="tab" id="buyer-heading-1">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#buyer-collapse-1" aria-expanded="true"
                                        aria-controls="buyer-collapse-1"
                                        class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                        <span>How can I cancel my order/purchase/rebate?</span>
                                        <span class="accordion-caret"></span>
                                    </a>
                                </h5>
                            </div>

                            <div id="buyer-collapse-1" class="collapse" role="tabpanel"
                                aria-labelledby="buyer-heading-1" data-parent="#buyer-accordion">
                                <div class="card-body">
                                    You can always cancel your order wherever you bought your product, e.g. Amazon,
                                    Walmart, or any other
                                    platform. We do ask you to contact the seller and let them know you cancelled the
                                    order, so that they
                                    cancel the rebate. If you don’t do that, it may result in suspension of your
                                    account.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            @endsection