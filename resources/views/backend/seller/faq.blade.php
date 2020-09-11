@extends('backend.seller.layouts.app')
@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item active">FAQ</li>
    </ol>
    <div class="container-fluid">

        <div class="card">

            <div class="card-header">
                <i class="fal fa-question"></i> FAQ </div>

            <div class="card-body">


                <div id="seller-accordion" class="nice-accordion faq-accordion" role="tablist">


                    <div class="card">
                        <div class="card-header" role="tab" id="seller-heading-1">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#seller-collapse-1" aria-expanded="true"
                                    aria-controls="seller-collapse-1"
                                    class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                    <span>Why do I need influencerpulse?</span>
                                    <span class="accordion-caret"></span>
                                </a>
                            </h5>
                        </div>

                        <div id="seller-collapse-1" class="collapse" role="tabpanel" aria-labelledby="seller-heading-1"
                            data-parent="#seller-accordion">
                            <div class="card-body">
                                Whether you are launching a new product or accelerating the sales for an old
                                one, you need the sales and
                                you need the buzz. influencerpulse gives you just that. Giving rebates is the best way
                                to get attention of the
                                new buyers and these buyers are more likely to spread the word about your
                                product.
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" role="tab" id="seller-heading-20">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#seller-collapse-20" aria-expanded="true"
                                    aria-controls="seller-collapse-20"
                                    class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                    <span>Where is the influencerpulse main office location? Is there a contact phone
                                        number?</span>
                                    <span class="accordion-caret"></span>
                                </a>
                            </h5>
                        </div>

                        <div id="seller-collapse-20" class="collapse" role="tabpanel"
                            aria-labelledby="seller-heading-20" data-parent="#seller-accordion">
                            <div class="card-body">
                                We are based in Sheridan, WY. However we do not have phone support. All the
                                rebate checks are sent out
                                via an automated check system.
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" role="tab" id="seller-heading-16">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#seller-collapse-16" aria-expanded="true"
                                    aria-controls="seller-collapse-16"
                                    class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                    <span>How does the site work, does it help with reviews?</span>
                                    <span class="accordion-caret"></span>
                                </a>
                            </h5>
                        </div>

                        <div id="seller-collapse-16" class="collapse" role="tabpanel"
                            aria-labelledby="seller-heading-16" data-parent="#seller-accordion">
                            <div class="card-body">
                                <p>Our site is built to help you get full priced sales using rebates instead of
                                    coupons. Full priced
                                    sales can help you rank faster than discounted sales. But please note that
                                    <b>we are not a review
                                        generating platform</b>.</p>

                                <p>With our platform, you can enter any URL you want to send the buyers to claim
                                    your rebate. The buyers
                                    will enter their order ID into our system to start the rebate process. You
                                    will also be able to
                                    communicate with buyers using our buyer/seller messaging to help them with
                                    the process or answer
                                    questions.</p>

                                <p>We also provide landing pages for you to drive your own traffic in order to
                                    get more claims per
                                    day.</p>

                                <p>The fee is $2.95 per buyer claim. You prepay the amount equal to your per day
                                    rebates. Each time a
                                    rebate is claimed we charge the card on file to replenish your funds.</p>

                                <p>After the buyer enters their order number and the money is held for 30 days
                                    after that you’ll have a
                                    5-day window to approve or decline the rebate, when that period ends a check
                                    will be sent to the
                                    buyer.</p>

                                <p class="mb-0">Let us know if you have further questions or clarifications.</p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" role="tab" id="seller-heading-27">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#seller-collapse-27" aria-expanded="true"
                                    aria-controls="seller-collapse-27"
                                    class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                    <span>Can I ask buyers to leave reviews?</span>
                                    <span class="accordion-caret"></span>
                                </a>
                            </h5>
                        </div>

                        <div id="seller-collapse-27" class="collapse" role="tabpanel"
                            aria-labelledby="seller-heading-27" data-parent="#seller-accordion">
                            <div class="card-body">
                                You are not allowed to ask buyers for reviews in the influencerpulse platform. </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" role="tab" id="seller-heading-2">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#seller-collapse-2" aria-expanded="false"
                                    aria-controls="seller-collapse-2"
                                    class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                    <span>What countries are supported?</span>
                                    <span class="accordion-caret"></span>
                                </a>
                            </h5>
                        </div>
                        <div id="seller-collapse-2" class="collapse" role="tabpanel" aria-labelledby="seller-heading-2"
                            data-parent="#seller-accordion">
                            <div class="card-body">
                                For now only US-based web stores.
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" role="tab" id="seller-heading-3">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#seller-collapse-3" aria-expanded="false"
                                    aria-controls="seller-collapse-3"
                                    class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                    <span>What is a Rebate Key?</span>
                                    <span class="accordion-caret"></span>
                                </a>
                            </h5>
                        </div>
                        <div id="seller-collapse-3" class="collapse" role="tabpanel" aria-labelledby="seller-heading-3"
                            data-parent="#seller-accordion">
                            <div class="card-body">
                                A Rebate Key is a unique number, e.g. Order ID that the buyer will provide to
                                you to unlock the rebate.
                                You can either approve it (if it matches with your sales data), or deny it (if
                                there is no such order).
                                We warn you from abuse (e.g. denying many rebates without checking). We will
                                flag such activity.
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" role="tab" id="seller-heading-4">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#seller-collapse-4" aria-expanded="false"
                                    aria-controls="seller-collapse-4"
                                    class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                    <span>What is the best rebate amount?</span>
                                    <span class="accordion-caret"></span>
                                </a>
                            </h5>
                        </div>
                        <div id="seller-collapse-4" class="collapse" role="tabpanel" aria-labelledby="seller-heading-4"
                            data-parent="#seller-accordion">
                            <div class="card-body">
                                You can give a rebate of as low as 10% and as high as 100%. Up to you. Obviously
                                the higher the rebate
                                the more likely the customers will claim it, and more likely to actively
                                participate in your viral
                                marketing campaign.
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" role="tab" id="seller-heading-5">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#seller-collapse-5" aria-expanded="false"
                                    aria-controls="seller-collapse-5"
                                    class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                    <span>How many rebates per day should I offer?</span>
                                    <span class="accordion-caret"></span>
                                </a>
                            </h5>
                        </div>
                        <div id="seller-collapse-5" class="collapse" role="tabpanel" aria-labelledby="seller-heading-5"
                            data-parent="#seller-accordion">
                            <div class="card-body">
                                It depends on your marketing goals. If you are giving a boost to your new
                                product, 10-20/day is a good
                                number. Run this campaign for 20 days and see the power of viral marketing.
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" role="tab" id="seller-heading-13">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#seller-collapse-13" aria-expanded="false"
                                    aria-controls="seller-collapse-13"
                                    class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                    <span>How the payment system works?</span>
                                    <span class="accordion-caret"></span>
                                </a>
                            </h5>
                        </div>
                        <div id="seller-collapse-13" class="collapse" role="tabpanel"
                            aria-labelledby="seller-heading-13" data-parent="#seller-accordion">
                            <div class="card-body">
                                <p>The payment system uses multiple wallets:</p>
                                <ul>
                                    <li><b>1 wallet</b> per rebate campaign.</li>
                                    <li>A <b>general wallet</b> (you can consult your general wallet here: <a
                                            href=""
                                            >https://influencerpulse.com/seller/wallet.html</a>).
                                    </li>
                                </ul>
                                <p>When you create/edit a rebate campaign, payments are <b>credited into the
                                        rebate campaign wallet</b>.
                                    To consult the wallet of each rebate, go to your list of rebate campaigns
                                    (<a href=""
                                       >https://influencerpulse.com/rebates.html</a>). On the right
                                    part of each rebate campaign, click on the dark "Details" button and click
                                    on "View wallet".</p>
                                <p>When your rebate campaign ends (or if you cancel it), the system
                                    automatically will first check how
                                    many claims you had for that rebate campaign. According to the number of
                                    claims you got, the system
                                    will block the corresponding amount of money in your <b>rebate wallet</b> to
                                    pay out buyers.</p>
                                <p>The <b>remaining money</b> for that rebate campaign is automatically
                                    <b>transferred to your general
                                        wallet</b>. For your new rebate campaigns, you will be able to pay with
                                    your general wallet.</p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" role="tab" id="seller-heading-6">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#seller-collapse-6" aria-expanded="false"
                                    aria-controls="seller-collapse-6"
                                    class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                    <span>Do I have to pre-pay the full campaign?</span>
                                    <span class="accordion-caret"></span>
                                </a>
                            </h5>
                        </div>
                        <div id="seller-collapse-6" class="collapse" role="tabpanel" aria-labelledby="seller-heading-6"
                            data-parent="#seller-accordion">
                            <div class="card-body">
                                No. You only pre-pay the first day of the rebate campaign and we will charge you
                                daily based on your
                                rebate campaign settings.
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" role="tab" id="seller-heading-22">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#seller-collapse-22" aria-expanded="false"
                                    aria-controls="seller-collapse-22"
                                    class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                    <span>Can I pay via PayPal?</span>
                                    <span class="accordion-caret"></span>
                                </a>
                            </h5>
                        </div>
                        <div id="seller-collapse-22" class="collapse" role="tabpanel"
                            aria-labelledby="seller-heading-22" data-parent="#seller-accordion">
                            <div class="card-body">
                                Sorry we only take credit card as payment currently.
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" role="tab" id="seller-heading-7">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#seller-collapse-7" aria-expanded="false"
                                    aria-controls="seller-collapse-7"
                                    class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                    <span>What is your commission?</span>
                                    <span class="accordion-caret"></span>
                                </a>
                            </h5>
                        </div>
                        <div id="seller-collapse-7" class="collapse" role="tabpanel" aria-labelledby="seller-heading-7"
                            data-parent="#seller-accordion">
                            <div class="card-body">
                                We charge sellers a $2.95 fee per sale. If you give out 10 rebates,
                                you will end up paying $29.5 dollars
                                in influencerpulse fees during the campaign.
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" role="tab" id="seller-heading-8">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#seller-collapse-8" aria-expanded="false"
                                    aria-controls="seller-collapse-8"
                                    class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                    <span>What marketplaces are supported?</span>
                                    <span class="accordion-caret"></span>
                                </a>
                            </h5>
                        </div>
                        <div id="seller-collapse-8" class="collapse" role="tabpanel" aria-labelledby="seller-heading-8"
                            data-parent="#seller-accordion">
                            <div class="card-body">
                                We support any e-commerce platform, e.g. shopify sites, Walmart, Amazon and
                                jet.com listings. We will
                                verify each link.
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" role="tab" id="seller-heading-25">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#seller-collapse-25" aria-expanded="false"
                                    aria-controls="seller-collapse-25"
                                    class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                    <span>I just finished setting up my campaign, but the credit card I am
                                        paying with was declined</span>
                                    <span class="accordion-caret"></span>
                                </a>
                            </h5>
                        </div>
                        <div id="seller-collapse-25" class="collapse" role="tabpanel"
                            aria-labelledby="seller-heading-25" data-parent="#seller-accordion">
                            <div class="card-body">
                                Please note that Stripe doesn't require personal information to proceed or not
                                to the payment. They use
                                their own security algorithm to validate credit/debit cards. Sometimes they can
                                mark multiple payment
                                attempts as “suspicious activity”, if you can’t pay please contact support.
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" role="tab" id="seller-heading-19">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#seller-collapse-19" aria-expanded="true"
                                    aria-controls="seller-collapse-19"
                                    class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                    <span>How to stop the campaign?</span>
                                    <span class="accordion-caret"></span>
                                </a>
                            </h5>
                        </div>

                        <div id="seller-collapse-19" class="collapse" role="tabpanel"
                            aria-labelledby="seller-heading-19" data-parent="#seller-accordion">
                            <div class="card-body">
                                To cancel your campaign, just click on "Campaigns" in your Profile. On the
                                “Actions” button next to the
                                campaign, choose the "End Campaign" option.
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" role="tab" id="seller-heading-28">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#seller-collapse-28" aria-expanded="true"
                                    aria-controls="seller-collapse-28"
                                    class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                    <span>How many campaigns can I launch?</span>
                                    <span class="accordion-caret"></span>
                                </a>
                            </h5>
                        </div>

                        <div id="seller-collapse-28" class="collapse" role="tabpanel"
                            aria-labelledby="seller-heading-28" data-parent="#seller-accordion">
                            <div class="card-body">
                                There's no limit of campaigns as long as there are from different products.
                                There can be only ONE
                                running campaign per unique product.
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" role="tab" id="seller-heading-29">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#seller-collapse-29" aria-expanded="true"
                                    aria-controls="seller-collapse-29"
                                    class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                    <span>Extra discount coupons</span>
                                    <span class="accordion-caret"></span>
                                </a>
                            </h5>
                        </div>

                        <div id="seller-collapse-29" class="collapse" role="tabpanel"
                            aria-labelledby="seller-heading-29" data-parent="#seller-accordion">
                            <div class="card-body">
                                We strongly recommend you not to activate any extra discount coupons during a
                                running campaign, this may
                                result in a discrepancy on the funds sent by check and the actual price users
                                paid. <b>Rebate check
                                    amounts cannot be adjusted.</b>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" role="tab" id="seller-heading-26">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#seller-collapse-26" aria-expanded="false"
                                    aria-controls="seller-collapse-26"
                                    class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                    <span>I'd like to change the card I have on file. Is there a way I could
                                        change this billing information?</span>
                                    <span class="accordion-caret"></span>
                                </a>
                            </h5>
                        </div>
                        <div id="seller-collapse-26" class="collapse" role="tabpanel"
                            aria-labelledby="seller-heading-26" data-parent="#seller-accordion">
                            <div class="card-body">
                                You should be able to enter a new card thanks to the blue button in your <a
                                    href="">wallet</a>.
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" role="tab" id="seller-heading-9">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#seller-collapse-9" aria-expanded="false"
                                    aria-controls="seller-collapse-9"
                                    class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                    <span>Can I get a refund?</span>
                                    <span class="accordion-caret"></span>
                                </a>
                            </h5>
                        </div>
                        <div id="seller-collapse-9" class="collapse" role="tabpanel" aria-labelledby="seller-heading-9"
                            data-parent="#seller-accordion">
                            <div class="card-body">
                                You can get a refund only at the end of the campaign for the unclaimed rebates.
                                Since buyers actually go
                                and buy your product, you can not get a refund for claimed and verified
                                purchases.
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" role="tab" id="seller-heading-17">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#seller-collapse-17" aria-expanded="true"
                                    aria-controls="seller-collapse-17"
                                    class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                    <span>I just got an email that my campaign ended. Do I expect the automatic
                                        refund of my unused funds?</span>
                                    <span class="accordion-caret"></span>
                                </a>
                            </h5>
                        </div>

                        <div id="seller-collapse-17" class="collapse" role="tabpanel"
                            aria-labelledby="seller-heading-17" data-parent="#seller-accordion">
                            <div class="card-body">
                                Yes. Every day at 01:00 am EST, we transfer money from canceled/completed
                                campaigns to the
                                general wallet. The amount of money transferred depends on rebates claimed.
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" role="tab" id="seller-heading-18">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#seller-collapse-18" aria-expanded="true"
                                    aria-controls="seller-collapse-18"
                                    class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                    <span>I'm not getting the sales I wanted</span>
                                    <span class="accordion-caret"></span>
                                </a>
                            </h5>
                        </div>

                        <div id="seller-collapse-18" class="collapse" role="tabpanel"
                            aria-labelledby="seller-heading-18" data-parent="#seller-accordion">
                            <div class="card-body">
                                <p>We’re very sorry to hear that. While our site is great for certain items,
                                    it's important to remember
                                    that customers have to pay the full price and wait for their rebate. What we
                                    suggest sellers to
                                    increase claims is to drive their own buyer traffic to their landing pages.
                                    This is a great way to
                                    do it, a different one would be offering a 100% rebate!</p>

                                <p class="mb-0">When your campaign is over, you can request the refund back to
                                    your card.</p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" role="tab" id="seller-heading-24">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#seller-collapse-24" aria-expanded="true"
                                    aria-controls="seller-collapse-24"
                                    class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                    <span>I have a remaining balance on my Wallet, what can I do with it?</span>
                                    <span class="accordion-caret"></span>
                                </a>
                            </h5>
                        </div>

                        <div id="seller-collapse-24" class="collapse" role="tabpanel"
                            aria-labelledby="seller-heading-18" data-parent="#seller-accordion">
                            <div class="card-body">
                                You can use the funds in another campaign or request a refund in the <a
                                    href="">general wallet</a>.
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" role="tab" id="seller-heading-10">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#seller-collapse-10" aria-expanded="false"
                                    aria-controls="seller-collapse-10"
                                    class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                    <span>Can I dispute a rebate?</span>
                                    <span class="accordion-caret"></span>
                                </a>
                            </h5>
                        </div>
                        <div id="seller-collapse-10" class="collapse" role="tabpanel"
                            aria-labelledby="seller-heading-10" data-parent="#seller-accordion">
                            <div class="card-body">
                                <p>Yes. Each time a buyer claims a rebate, you will be given his Order ID for
                                    you to approve or dispute.
                                    Please check carefully. Sellers who dispute too many rebates will be
                                    flagged.</p>

                                <p>The determination of a Rebate dispute should be based on the compliance of
                                    one or more of the
                                    following reasons:</p>

                                <ul>
                                    <li>The rebate key submitted was not legitimate.</li>
                                    <li>The order was cancelled or refunded.</li>
                                    <li>The product was returned.</li>
                                    <li>Extra discount coupons or codes were used along with the Rebate Key
                                        offer.</li>
                                    <li>The item bought was not the one advertised on the site.</li>
                                    <li>The item has been bought multiple times from a same account on the
                                        marketplace, in connection
                                        with the site (this depends on the seller policies).
                                    </li>
                                </ul>

                                Any other reasons may be added at the sole discretion of influencerpulse.
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" role="tab" id="seller-heading-12">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#seller-collapse-12" aria-expanded="false"
                                    aria-controls="seller-collapse-12"
                                    class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                    <span>How many days do I have to dispute the rebate?</span>
                                    <span class="accordion-caret"></span>
                                </a>
                            </h5>
                        </div>
                        <div id="seller-collapse-12" class="collapse" role="tabpanel"
                            aria-labelledby="seller-heading-12" data-parent="#seller-accordion">
                            <div class="card-body">
                                We give 5 days to sellers to be able to dispute the rebate.
                                First rebates are hold 30 days. So that the buyer does not buy a
                                product, claim the rebate and return the product with a refund.
                                It means in total a buyer should wait 35 days before receiving a
                                check for his purchase.
                                Buyers who abuse the system will be banned from our site.
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" role="tab" id="seller-heading-11">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#seller-collapse-11" aria-expanded="false"
                                    aria-controls="seller-collapse-11"
                                    class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                    <span>What if I don’t dispute/approve rebates?</span>
                                    <span class="accordion-caret"></span>
                                </a>
                            </h5>
                        </div>
                        <div id="seller-collapse-11" class="collapse" role="tabpanel"
                            aria-labelledby="seller-heading-11" data-parent="#seller-accordion">
                            <div class="card-body">
                                Rebates are hold initially 30 days.
                                You are given 5 days after that to dispute it or approve it.
                                <b>If you don’t do anything the rebate will be automatically approved.</b>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" role="tab" id="seller-heading-21">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#seller-collapse-21" aria-expanded="false"
                                    aria-controls="seller-collapse-21"
                                    class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                    <span>I want to dispute a rebate</span>
                                    <span class="accordion-caret"></span>
                                </a>
                            </h5>
                        </div>
                        <div id="seller-collapse-21" class="collapse" role="tabpanel"
                            aria-labelledby="seller-heading-21" data-parent="#seller-accordion">
                            <div class="card-body">
                                <p>What you need to do is:</p>
                                <ol class="mb-0">
                                    <li>Put that number/ buyer name somewhere you'll remember, like a note on
                                        your phone/computer/draft
                                        on your email.
                                    </li>
                                    <li>Let the buyer know (through our messaging system) that his/her rebate
                                        will be declined due to
                                        the cancellation/refund/not finding the order ID (sometimes, they have
                                        bought the product again
                                        or entered a wrong order ID).
                                    </li>
                                    <li>Wait until the 30-day waiting period ends.</li>
                                    <li>Decline that buyer's purchase on a 5-day window before the system
                                        approves them automatically.
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" role="tab" id="seller-heading-23">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#seller-collapse-23" aria-expanded="false"
                                    aria-controls="seller-collapse-23"
                                    class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                    <span>Do I get the buyer’s emails so that I can follow up for
                                        feedback?</span>
                                    <span class="accordion-caret"></span>
                                </a>
                            </h5>
                        </div>
                        <div id="seller-collapse-23" class="collapse" role="tabpanel"
                            aria-labelledby="seller-heading-23" data-parent="#seller-accordion">
                            <div class="card-body">
                                No, you don’t. However, you go to Rebate Queue > Recent Claims > Message Buyer
                                and follow up there.
                                Please keep in mind that you can only contact them for 60 days after the
                                purchase.
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" role="tab" id="seller-heading-14">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#seller-collapse-14" aria-expanded="false"
                                    aria-controls="seller-collapse-14"
                                    class="roboto-medium mb-0 d-flex justify-content-between align-items-center collapsed">
                                    <span>How do I cancel and delete my account?</span>
                                    <span class="accordion-caret"></span>
                                </a>
                            </h5>
                        </div>
                        <div id="seller-collapse-14" class="collapse" role="tabpanel"
                            aria-labelledby="seller-heading-14" data-parent="#seller-accordion">
                            <div class="card-body">
                                Contact our support to cancel/delete your account here:
                                <a href="">contact us</a>.<br />
                                If you have any live rebates, there have to be completed before you cancel or
                                delete your account.
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</main>
@endsection