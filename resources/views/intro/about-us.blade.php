@extends('intro.layouts.app')
@section('content')
<style>
.sprite-voucher {
  background-image: url(intro/img/spritesheet.png);
  background-position: -166px -182px;
  width: 76px;
  height: 60px;
}
.sprite-icon-handshake {
  background-image: url(intro/img/spritesheet.png);
  background-position: -282px -281px;
  width: 92px;
  height: 55px;
}
.sprite-icon-key {
  background-image: url(intro/img/spritesheet.png);
  background-position: -282px -220px;
  width: 87px;
  height: 61px;
}
.about-bg{
  background-size: cover!important;
}
</style>
<main class="main">
  <section class="about-us-bg about-bg">
    <!-- py-lg-13 py-5  style="padding-top: 0px !important"-->
    <div class="container  p-5" >

      <div class="col-lg-6 mx-auto text-center ">
        <h2 class="mb-3 text-white">Welcome to Influencer Pulse!</h2>
        <h3 class="section-subheading text-white">
          <b style="font-size: 1.3rem !important"> We believe every buyer can be a great influencer. </b>
        </h3>
        <p class="text-white">
          Influencer Pulse was created to help sellers promote their brands and create the buzz.
        </p>
        <h3 class="section-subheading text-white">
          <b style="font-size: 1.3rem !important">Influencer Pulse is a cashback machine for your purchases instantly!
          </b>
        </h3>
        <!-- <h3 class="section-subheading text-white">
        <b style="font-size: 1.3rem !important">Why does Influencer Pulse offer such high discounts or deals?</b>
      </h3>
      <p class="text-white">
      Our sellers want you to try their products because they understand that buyers are the essential part of their brand building and sales! By giving buyers a great deal, Influencer Pulse helps our sellers build buzz on social media and sales
    </p>

    <h3 class="section-subheading text-white">
    <b style="font-size: 1.3rem !important">Influencer Pulse manages the entire process of social media promotions.</b>
  </h3>
  <p class="text-white">
  You don’t have to worry about getting your cashback as we collect cash upfront from our sellers.
</p> -->


</div>

</div>

</section>

<section>

  <div class="container pb-xl-10 pt-xl-10 py-6">

    <div class="row align-items-start px-2 px-sm-0">

      <div class="card-group">

        <div class="col-lg col-12 card with-small-shadow pt-8 px-3 pb-5-5">

          <div class="mb-2-5">
            {{-- <div class="position-absolute about-us-icon d-flex">
              <i class="sprite-icon-key m-auto"></i>
            </div> --}}
            <h4 class="text-dark mb-0">influencerpulse works like those old mail-in influencerpulse, just faster!</h4>
          </div>

          <p class="mb-0">Instead of mailing in the barcode from a box, you simply enter your order ID (or
            KEY) on our site.</p>

          </div>

          <div class="col-lg col-12 card with-small-shadow pt-8 px-3 pb-5-5">

            <div class="mb-2-5">
              {{-- <div class="position-absolute about-us-icon d-flex">
                <i class="sprite-icon-handshake m-auto"></i>
              </div> --}}
              <h4 class="text-dark mb-0">Why does influencerpulse offer such high Offers</h4>
            </div>

            <p class="mb-0">Our sellers want you to try their products because they understand that word of
              mouth marketing is essential to building sales! By giving buyers a great deal, influencerpulse
              helps our sellers build their sales quickly.</p>

            </div>

            <div class="col-lg col-12 card with-small-shadow pt-8 px-3 pb-5-5">

              <div class="mb-2-5">
                {{-- <div class="position-absolute about-us-icon d-flex">
                  <i class="sprite-voucher m-auto"></i>
                </div> --}}
                <h4 class="text-dark mb-0">influencerpulse manages the entire Deals process</h4>
              </div>

              <p class="mb-0">You don’t have to worry about getting your Refund as we collect Deal funds
                upfront from our sellers.</p>

              </div>

            </div>

          </div>

        </div>

      </section>

      <hr>

<!-- <section id="buyers-testimonials">

        <div class="container py-xl-10 py-6">

          <h2 class="section-heading mb-xl-3-5 mb-2 text-center">
            See what all our buyers are saying! </h2>

            <h3 class="section-subheading mb-xl-5 mb-3 text-center px-2">
              1,000s of customers have already received their checks. </h3>

              <div class="row testimonial-block testimonial-slider px-1 px-sm-0 mb-lg-3-5 mb-1">
                <div class="col-lg col-12">
                  <div class="card with-small-shadow py-2 px-3 mt-5 mb-1">
                    <div class="mb-3 d-flex align-items-end">
                      <div class="position-absolute">
                        <img src="../files/testimonials/m/h/k/z/c/mhkzc.jpg" alt="Daniella">
                        <div class="testimonial-icon d-flex bg-info">
                          <i class="sprite-icon-quote-purple m-auto"></i>
                        </div>
                      </div>
                      <h4 class="text-dark mb-0 ml-12-5">Daniella</h4>
                    </div>
                    <div class="expandable">

                      <div class="expandable-content expandable-content-sm">

                        <p class="expandable-content-inner">
                          I was skeptical when I first heard of influencerpulse Key. And when I received my first check
                          I was super excited that I finally found a site that actually works! And the items
                          are amazing. I constantly recommend this website. Customer service for influencerpulse Key is
                          great. I love influencerpulse Key! </p>

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
                          <img src="../files/testimonials/x/6/j/a/m/x6jam.jpg" alt="Raymond">
                          <div class="testimonial-icon d-flex bg-warning">
                            <i class="sprite-icon-quote-purple m-auto"></i>
                          </div>
                        </div>
                        <h4 class="text-dark mb-0 ml-12-5">Raymond</h4>
                      </div>
                      <div class="expandable">

                        <div class="expandable-content expandable-content-sm">

                          <p class="expandable-content-inner">
                            influencerpulse Key is a definite game changer in our household. I've transformed from
                            Scrooge McDuck to Jolly Saint Nick having found influencerpulse Key. Kudos, influencerpulse Key team.
                            Keep up the great work! </p>

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
                            <img src="../files/testimonials/l/r/1/8/1/lr181.jpg" alt="Maxenne">
                            <div class="testimonial-icon d-flex bg-primary">
                              <i class="sprite-icon-quote-purple m-auto"></i>
                            </div>
                          </div>
                          <h4 class="text-dark mb-0 ml-12-5">Maxenne</h4>
                        </div>
                        <div class="expandable">

                          <div class="expandable-content expandable-content-sm">

                            <p class="expandable-content-inner">
                              I feel so lucky to have found out about influencerpulse key!!! They have so many items I was
                              already looking for. </p>

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
                              <img src="../files/testimonials/t/h/r/k/2/thrk2.jpg" alt="Chalida">
                              <div class="testimonial-icon d-flex bg-danger">
                                <i class="sprite-icon-quote-purple m-auto"></i>
                              </div>
                            </div>
                            <h4 class="text-dark mb-0 ml-12-5">Chalida</h4>
                          </div>
                          <div class="expandable">

                            <div class="expandable-content expandable-content-sm">

                              <p class="expandable-content-inner">
                                OMG!!! I can’t get enough!!! I really Love this website! I’ve been able to purchase
                                so many great items!!! Thank you! </p>

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
                                <img src="../files/testimonials/1/g/e/p/j/1gepj.jpg" alt="Taylor">
                                <div class="testimonial-icon d-flex bg-success">
                                  <i class="sprite-icon-quote-purple m-auto"></i>
                                </div>
                              </div>
                              <h4 class="text-dark mb-0 ml-12-5">Taylor</h4>
                            </div>
                            <div class="expandable">

                              <div class="expandable-content expandable-content-sm">

                                <p class="expandable-content-inner">
                                  At first, I used influencerpulse key as a seller. I have stayed a loyal member of influencerpulse key
                                  ever since! I have gotten so many great deals on all sorts of products from Amazon.
                                  This is not a scam! influencerpulse Key is a win-win for everyone! </p>

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
                                  <img src="../files/testimonials/w/h/l/n/a/whlna.jpg" alt="Amber">
                                  <div class="testimonial-icon d-flex bg-info">
                                    <i class="sprite-icon-quote-purple m-auto"></i>
                                  </div>
                                </div>
                                <h4 class="text-dark mb-0 ml-12-5">Amber</h4>
                              </div>
                              <div class="expandable">

                                <div class="expandable-content expandable-content-sm">

                                  <p class="expandable-content-inner">
                                    influencerpulse is so easy to use! And who isn’t addicted to amazon?! Nothing better than
                                    getting a deal!!! Thank you influencerpulse! </p>

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
                                    <img src="../files/testimonials/z/l/e/0/n/zle0n.jpg" alt="Lena">
                                    <div class="testimonial-icon d-flex bg-warning">
                                      <i class="sprite-icon-quote-purple m-auto"></i>
                                    </div>
                                  </div>
                                  <h4 class="text-dark mb-0 ml-12-5">Lena</h4>
                                </div>
                                <div class="expandable">

                                  <div class="expandable-content expandable-content-sm">

                                    <p class="expandable-content-inner">
                                      influencerpulse has become my go to site that I check everyday because I get such great
                                      deals on the products I need and want. My check collection is growing everyday and
                                      I've been telling all my friends and family about it. </p>

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
                                      <img src="../files/testimonials/s/z/c/2/9/szc29.jpg" alt="Karen">
                                      <div class="testimonial-icon d-flex bg-primary">
                                        <i class="sprite-icon-quote-purple m-auto"></i>
                                      </div>
                                    </div>
                                    <h4 class="text-dark mb-0 ml-12-5">Karen</h4>
                                  </div>
                                  <div class="expandable">

                                    <div class="expandable-content expandable-content-sm">

                                      <p class="expandable-content-inner">
                                        I was hesitant to wait 35 days to get a check and wondered it this company was
                                        legit, but boy, are they ever! I have gifts for birthdays, Christmas and grads.
                                        There are new items in my kitchen and throughout my home. The checks come right on
                                        time! This website haas been great for me! </p>

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
                                        <img src="../files/testimonials/u/b/c/7/9/ubc79.jpg" alt="Tanya">
                                        <div class="testimonial-icon d-flex bg-danger">
                                          <i class="sprite-icon-quote-purple m-auto"></i>
                                        </div>
                                      </div>
                                      <h4 class="text-dark mb-0 ml-12-5">Tanya</h4>
                                    </div>
                                    <div class="expandable">

                                      <div class="expandable-content expandable-content-sm">

                                        <p class="expandable-content-inner">
                                          Thank you so much for this opportunity to get such a good deals or even free
                                          products, thank you for all you do I am a happy customer </p>

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

                                <div class="text-center mt-4">

                                  <a href="../buyer/sign-up.html" class="btn btn-primary btn-lg d-block d-md-inline-block mb-3 mb-md-0">
                                    Start Now! </a>

                                    <a href="../help/testimonials.html" class="btn btn-link btn-lg d-block d-md-inline-block ml-md-3">
                                      View More Testimonials </a>

                                    </div>

                                  </div>

</section> -->

  <section class="bg-dark">

                                  <div class="container">

                                    <div class="col-xl-8 py-xl-10 py-6 map-bg text-center mx-auto">

                                      <h2 class="text-white mb-3">
                                        We'd love to hear from you! </h2>

                                        <h3 class="section-subheading mb-xl-6 mb-4 text-white">
                                          Our friendly help team can be reached Monday through Friday, from 9am to 7pm, Central Time.<br />
                                          Just click the button below to contact us. </h3>

                                          <a target="_blank" href="contact-us.html" class="btn btn-primary btn-lg px-5-5" rel="nofollow">
                                            Contact The Help Team </a>

                                          </div>

                                        </div>

                                      </section>


                                    </main>
                                  </div>


                                  <script src="intro/js/e532150e6067777963aa.js"></script>
                                  <script>
                                //  Project.testimonials();
                                </script>
                                @endsection
