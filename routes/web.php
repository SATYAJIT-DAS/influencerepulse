<?php


// Introduction
// Route::get('/', function () { return view('intro.home'); });

Route::get('/sign-in', function () {
    return view('intro.auth.signin');
})->name('intro.signin');
// Route::get('/sign-in', function () { return view('auth.login'); })->name('intro.signin');
Route::get('/buyer-signup', function () {
    return view('intro.auth.buyerSingup');
})->name('intro.buyer-signup');
Route::get('/seller-signup', function () {
    return view('intro.auth.sellerSignup');
})->name('intro.seller-signup');

//test
Route::get('/test', 'HomeController@testt')->name('test');
// Route::post('dopayment', 'CamController@dopayment')->name('dopayment');


//end test

//social site
Route::get('/redirect/{service}', 'SocialAuthController@redirect')->name('redirect');
// Route::get ( '/callback/{service}', 'SocialAuthController@callbac0k' );
Route::get('/callback/{service}', 'SocialAuthController@callback')->name('callback');


Route::get('/', 'HomeController@index')->name('intro.home')->middleware('guest');


Route::get('/about-us', function () {
    return view('intro.about-us');
})->name('intro.aboutUs');
Route::get('/buyers-influencers', function () {
    return view('intro.buyers-influencers');
})->name('intro.buyers-influencers');
Route::get('/brands-sellers', function () {
    return view('intro.brands-sellers');
})->name('intro.brands-sellers');
Route::get('/chrome', function () {
    return view('intro.chrome');
})->name('intro.chrome');
Route::get('/help-buyer', function () {
    return view('intro.help.buyer');
})->name('intro.faq.buyer');
Route::get('/help-seller', function () {
    return view('intro.help.seller');
})->name('intro.faq.seller');
Route::get('/contact-us', function () {
    return view('intro.contact-us');
})->name('intro.faq.contact-us');
Route::get('/testimonials', function () {
    return view('intro.testimonials');
})->name('intro.testimonials');
Route::get('/buyer-pro', function () {
    return view('intro.buyer-pro');
})->name('intro.buyer-pro');
Route::get('/seller-pro', function () {
    return view('intro.seller-pro');
})->name('intro.seller-pro');
Route::get('/term', function () {
    return view('intro.term');
})->name('intro.term');
Route::get('/privacy', function () {
    return view('intro.privacy');
})->name('intro.privacy');
Route::get('/shipping-policy', function () {
    return view('intro.shipping-policy');
})->name('intro.shipping-policy');
Route::get('/refund-policy', function () {
    return view('intro.refund-policy');
})->name('intro.refund-policy');

Route::get('/gems', function () {
    return view('intro.gems');
})->name('intro.gems');
Route::get('/single-page/{state}/{id}', 'Intro\SingleController@show')->name('single-page');


Route::get('/forget-password', function () {
    return view('auth.passwords.email');
})->name('forget_pass');

Route::post('/verify-email-resend', function () {
    return view('auth.passwords.email');
})->name('resend_verify_email');

Route::post('pass_update', 'HomeController@passUpdate')->name('pass_update');
Route::post('register', 'RegisterController@create')->name('register');

// Auth::routes(['verify' => true]);
Auth::routes(['verify' => true]);

//Auth
Route::group(['middleware' => ['web', 'auth']], function () {


    Route::post('/home', 'HomeController@dashboard')->name('dashboard');

    Route::get('/home', 'HomeController@dashboard')->name('dashboard');

    Route::get('buyer', 'Buyer\HomeController@index')->name('buyer.index')->middleware('buyer');

    Route::get('seller', 'Seller\HomeController@index')->name('seller.index')->middleware('seller');

    Route::resource('admin', 'Admin\HomeController')->middleware('admin');


    Route::post('phone_code_send', 'HomeController@codeSend')->name('phone_code_send');

    Route::post('code-check', 'HomeController@codeCheck')->name('code-check');

    Route::get('againSend', 'HomeController@againSend')->name('againSend');

    Route::post('/token', 'TokenController@generate')->name('chat-token');
    // Route::post('/token',['uses' => 'TokenController@generate', 'as' => 'token-generate']);

    // Route::get('live-chat', function () { return view('backend.live-chat'); } )->name('live-chat');
    Route::get('live-chat', function () {
        return view('welcome');
    })->name('live-chat');

    Route::group(['middleware' => ['phone_verify']], function () {
        //seller


        Route::post('get-state', 'HomeController@getState')->name('get-state');

        Route::post('get-timezone', 'HomeController@getTimezone')->name('get-timezone');

        Route::post('avatar-upload', 'HomeController@avatarUpload')->name('avatar-upload');

        Route::get('remove-avatar/{user_id}', 'HomeController@removeAvatar')->name('remove-avatar');

        Route::get('seller/order_change/{order_id}/{state}', 'Seller\QueueController@orderChange')->name('order.change');

        Route::post('seller/dispute', 'Seller\QueueController@dispute')->name('seller.dispute');

        Route::get('dispute_resolve/{order_id}', 'Seller\QueueController@seller_resolve')->name('seller_resolve');


        Route::post('notificate-update', 'HomeController@notificateUpdate')->name('notificate-update');

        Route::post('buyer-notif', 'HomeController@buyerNotif')->name('buyer-notif');

        Route::post('email-change', 'HomeController@emailChange')->name('email-change');

        Route::post('pass-reset', 'HomeController@passReset')->name('pass-reset');


        Route::group(['middleware' => ['seller', 'mail_verify']], function () {
            //sidebar
            Route::get('/seller/campaigns', 'Seller\CampaignsController@index')->name('seller.campaigns');
            //create campaigns
            Route::get('/seller/campaigns/add', 'Seller\CampaignsController@add')->name('seller.add-campa');

            Route::post('/seller/campaigns/picture', 'Seller\CampaignsController@createCampaign')->name('seller.create-campaign');

            Route::get('/seller/campaign-pic', function () {
                return view('backend.seller.create-campa.campaign-pictures');
            })->name('seller.campaign-pic');

            Route::put('/seller/campaigns_imgstore/{camp_id}', 'Seller\CampaignsController@camPicStore')->name('campic_store');

            Route::post('/seller/campaigns_image_delete', 'Seller\CampaignsController@camPicDestroy')->name('campic_destroy');

            Route::post('/seller/camp_pic_delete', 'Seller\CampaignsController@camPicDelete')->name('camp_pic_delete');

            Route::get('/seller/camp_delete/{del_id}', 'Seller\CampaignsController@campDelete')->name('camp_delete');

            Route::get('/seller/camp_edit/{edit_id}', 'Seller\CampaignsController@campEdit')->name('camp_edit');

            Route::get('/seller/camp_clone/{clone_id}', 'Seller\CampaignsController@campClone')->name('camp_clone');

            Route::get('/seller/camp_complete/{com_id}', 'Seller\CampaignsController@campComplete')->name('camp_complete');

            Route::get('/seller/camp_cancel/{com_id}', 'Seller\CampaignsController@campCancel')->name('camp_cancel');

            Route::get('/seller/summary/{camp_id}', 'Seller\CampaignsController@summary')->name('seller.summary');

            Route::get('/seller/camp-landing/{camp_id}', 'Seller\CampaignsController@campLanding')->name('seller.camp-landing');

            Route::get('/seller/rebates/{state}/{camp_id}', 'Seller\CampaignsController@rebates')->name('seller.rebates');

            Route::get('/seller/camp-wallet/{camp_id}', 'Seller\CampaignsController@campWallet')->name('seller.camp-wallet');

            Route::post('/seller/campaigns/setting', 'Seller\CampaignsController@picSave')->name('campaign-pic-save');

            Route::post('/seller/campaigns/preview', 'Seller\CampaignsController@campaignSet')->name('campaign-set');

            Route::post('/seller/campaigns/payment', 'Seller\CampaignsController@preview')->name('campaign-preview');


            Route::post('/seller/camp-submit', 'Seller\CampaignsController@campSubmit')->name('seller.camp-submit');

            Route::post('/seller/stripe-payment', 'Seller\CampaignsController@stripePayment')->name('stripe.post');

            Route::post('razor-payment', 'Seller\CampaignsController@dopayment')->name('razor.post');


            Route::post('/seller/wallet-charge', 'Seller\CampaignsController@walletCharge')->name('wallet.charge');


            Route::get('/seller/camp-forms/{com_id}/{page}', 'Seller\CampaignsController@campForms')->name('camp-forms');


            //edit campaign   camp_image
            Route::post('/seller/update_campaign', 'Seller\CampaignsController@updateCampaign')->name('seller.update_campaign');

            Route::post('/seller/camp_image', 'Seller\CampaignsController@loadCamimage')->name('seller.load_camimage');

            Route::get('/seller/queue', 'Seller\QueueController@index')->name('seller.queue');


            Route::get('/seller/msg', 'Seller\MsgController@index')->name('seller.msg');

            Route::get('/seller/discussion/{order_id}', 'Seller\MsgController@discussion')->name('seller.discussion');

            Route::post('/seller/msgread', 'Seller\MsgController@msgRead')->name('seller-msgread');

            Route::post('/seller/msg_store', 'Seller\MsgController@store')->name('seller.msg_store');

            Route::post('/seller/msgread', 'Seller\MsgController@msgRead')->name('seller-msgread');

            Route::get('/seller/listings', 'Seller\ListingsController@index')->name('seller.listings');


            //create coupon
            Route::get('/seller/coupon/create', 'Seller\ListingsController@createCoupon')->name('seller.create-coupon');
            //delete coupon
            Route::get('/seller/coupon_delete/{del_id}', 'Seller\ListingsController@couponDelete')->name('coupon_delete');
            //update
            Route::get('/seller/coupon_edit/{edit_id}', 'Seller\ListingsController@couponEdit')->name('coupon_edit');

            Route::get('/seller/coupon_clone/{clone_id}', 'Seller\ListingsController@couponClone')->name('coupon_clone');

            Route::get('/seller/coupon_complete/{com_id}', 'Seller\ListingsController@couponComplete')->name('coupon_complete');

            Route::post('/seller/coupon-basic-update', 'Seller\ListingsController@updateCoupon')->name('seller.coupon-basic-update');

            Route::post('/seller/coupon_pic_delete', 'Seller\ListingsController@couponPicDelete')->name('coupon_pic_delete');


            Route::post('/seller/coupon/picture', 'Seller\ListingsController@basicCoupon')->name('seller.coupon-basic');

            Route::put('/seller/coupon/picture/{coupon_id}', 'Seller\ListingsController@picStore')->name('seller.coupon_pic_store');
            Route::post('/seller/coupon_pic_destroy', 'Seller\ListingsController@couponpicDestroy')->name('coupon_pic_destroy');


            Route::post('/seller/coupon/setting', 'Seller\ListingsController@picCoupon')->name('seller.coupon-pic-save');
            Route::post('/seller/coupon/preview', 'Seller\ListingsController@setCoupon')->name('seller.coupon-set');
            Route::post('/seller/coupon/submit', 'Seller\ListingsController@previewCoupon')->name('seller.coupon-preview');
            Route::post('/seller/listings/approval', 'Seller\ListingsController@submitCoupon')->name('seller.coupon-submit');

            Route::get('/seller/upload', 'Seller\UploadController@index')->name('seller.upload');
            //upload   seller.upload-submit
            Route::get('/seller/upload/start', 'Seller\UploadController@startUpload')->name('seller.upload-start');
            Route::post('/seller/upload/submit', 'Seller\UploadController@submitUpload')->name('seller.upload-submit');

            Route::get('/seller/wallet', 'Seller\WalletController@index')->name('seller.wallet');

            Route::post('/seller/camp-charge', 'Seller\WalletController@campCharge')->name('camp.chage');

            Route::post('/seller/general-chage', 'Seller\WalletController@generalCharge')->name('general.chage');

            //header
            Route::get('/seller/faq', 'Seller\FaqController@index')->name('seller.faq');
            // Route::get('/seller/notif', 'Seller\NotifController@index')->name('seller.notif');
            Route::get('/seller/contact-us', 'Seller\ContactController@index')->name('seller.contact');
            Route::get('/seller/aff', 'Seller\AffController@index')->name('seller.aff');

            //user profile
            Route::get('/seller/profile', 'Seller\ProfileController@index')->name('seller.profile');

            Route::post('/seller/profile-update', 'Seller\ProfileController@profileUpdate')->name('seller.profile-update');

            Route::post('/seller/invoice-input', 'Seller\ProfileController@invoiceInput')->name('seller.invoice-input');

            Route::post('/seller/submit_order', 'RazorpayController@submit_order')->name('submit_order');
            Route::post('/seller/razor-wallet', 'RazorpayController@razorWallet')->name('razor-wallet');


            Route::get('/seller/pass', 'Seller\PassController@index')->name('seller.pass');
            Route::get('/seller/mail', 'Seller\MailController@index')->name('seller.mail');
            Route::get('/seller/history', 'Seller\HistoryController@index')->name('seller.history');

            Route::get('/seller/campActivate/{camp_id}', 'Seller\WalletController@campActivate')->name('camp.activate');
        });

        //buyer
        Route::group(['middleware' => ['buyer', 'mail_verify']], function () {
            //index


            Route::get('/buyer/buy_confirm/{camp_id}', 'Buyer\HomeController@confirm')->name('buyer.buy_confirm');

            Route::get('/buyer/sort/{key}', 'Buyer\HomeController@buyerSort')->name('buyer.sort');


            Route::post('buyer/search_global/', 'Buyer\HomeController@searchGlobal')->name('buyer.search_global');

            Route::post('buyer/confirm_redirect', 'Buyer\HomeController@confirmRedirect')->name('buyer.confirm_redirect');


            Route::post('buyer/order_purchase', 'Buyer\HomeController@orderPurchase')->name('buyer.order_purchase');

            Route::post('buyer/order_cancel', 'Buyer\HomeController@orderCancel')->name('buyer.order_cancel');

            Route::get('buyer/again_confirm/{order_id}', 'Buyer\HomeController@againConfirm')->name('buyer.again_confirm');

            Route::post('/buyer/favo-set', 'Buyer\HomeController@favoSet')->name('favo-set');


            Route::post('/buyer/favo-get', 'Buyer\HomeController@favoGet')->name('favo-get');

            Route::post('/buyer/favo-set-coupon', 'Buyer\HomeController@favoSetCoupon')->name('favo-set-coupon');

            //header
            Route::get('/buyer/activity', 'Buyer\ActivityController@index')->name('buyer.activity');

            Route::get('/buyer/faq', 'Buyer\FaqController@index')->name('buyer.faq');

            Route::get('/buyer/contact-us', 'Buyer\ContactController@index')->name('buyer.contact-us');

            Route::get('/buyer/aff', 'Buyer\AffController@index')->name('buyer.aff');

            Route::get('/buyer/chrome', 'Buyer\ChromeController@index')->name('buyer.chrome');
            //sidebar
            Route::get('/buyer/purchases', 'Buyer\PurchasesController@index')->name('buyer.purchases');

            Route::get('/buyer/discussion/{order_id}', 'Buyer\PurchasesController@Discussion')->name('buyer.discussion');

            Route::post('/buyer/dispute', 'Buyer\PurchasesController@dispute')->name('buyer.dispute');


            Route::get('/buyer/msg', 'Buyer\MsgController@index')->name('buyer.msg');

            Route::post('/buyer/store', 'Buyer\MsgController@store')->name('buyer.msg_store');

            Route::post('/buyer/msgread', 'Buyer\MsgController@msgRead')->name('buyer-msgread');


            Route::get('/buyer/payouts', 'Buyer\PayoutsController@index')->name('buyer.payouts');

            Route::get('/buyer/notif', 'Buyer\NotifController@index')->name('buyer.notif');

            Route::get('/buyer/coupons', 'Buyer\CouponsController@index')->name('buyer.coupons');

            Route::get('/buyer/favorites', 'Buyer\FavoritesController@index')->name('buyer.favorites');

            Route::get('/buyer/wallet', 'Buyer\WalletController@index')->name('buyer.wallet');

            //user profile

            Route::get('/buyer/payout', 'Buyer\ProfileController@payout')->name('buyer.payout');

            Route::post('/buyer/charge', 'Buyer\ProfileController@charge')->name('buyer.charge');


            Route::get('/buyer/profile', 'Buyer\ProfileController@index')->name('buyer.profile');

            Route::post('/buyer/profile-store', 'Buyer\MailController@profileStore')->name('buyer-profile-store');

            Route::get('/buyer/mail', 'Buyer\MailController@index')->name('buyer.mail');

            Route::post('/buyer/mail-store', 'Buyer\MailController@mailStore')->name('buyer-mail-store');

            Route::get('/buyer/pass', 'Buyer\PassController@index')->name('buyer.pass');

            Route::get('/buyer/email', 'Buyer\EmailController@index')->name('buyer.email');


            // Route::get('/buyer/notif', 'Buyer\NotifController@index')->name('buyer.notif');


            //footer
            Route::get('/buyer/term', 'Buyer\TermController@index')->name('buyer.term');
            Route::get('/buyer/privacy', 'Buyer\PrivacyController@index')->name('buyer.privacy');

            //Route::get('seller/order_change/{order_id}/{state}', 'Seller\QueueController@orderChange')->name('order.change');
        });

        //admin
        Route::group(['middleware' => ['admin']], function () {

            Route::resource('users', 'Admin\UserController');

            Route::resource('category', 'Admin\CategoryController');
            Route::resource('market', 'Admin\MarketplaceController');
            Route::resource('msg_manage', 'Admin\MsgmanageController');

            Route::get('msg_manage/delete/{msg_id}', 'Admin\MsgmanageController@destroy')->name('msg_manage.delete');

            Route::resource('fee', 'Admin\FeeController');

            Route::get('order_manage', 'Admin\OrderController@index')->name('order_manage');

            Route::get('admin-wallet', 'Admin\WalletController@index')->name('admin.wallet');

            Route::get('order_info/{user_id}', 'Admin\OrderController@orderShow')->name('order.show');

            Route::post('order-search', 'Admin\OrderController@orderSearch')->name('order-search');

            Route::post('dispute_manage', 'Admin\OrderController@disputeManage')->name('admin.dispute');

            Route::get('dispute_resolve/{order_id}/{state}', 'Admin\OrderController@disputeResolve')->name('resolve');

            Route::post('left_time_delay', 'Admin\OrderController@timeDelay')->name('left_time_delay');

            Route::resource('camp_manage', 'Admin\CampmanageController');

            Route::get('/admin/orders/{state}/{camp_id}', 'Admin\CampmanageController@orders')->name('admin.rebates');

            Route::resource('coupon_manage', 'Admin\CouponmanageController');

            Route::resource('transaction', 'Admin\TransactionController');

            Route::post('msgread', 'Admin\ServiceController@msgRead')->name('admin-msgread');

            Route::get('camp_manage/change_state/{id}/{state}', 'Admin\CampmanageController@changeState')->name('camp.state_change');

            Route::get('coupon/state_change/{id}/{state}', 'Admin\CouponmanageController@changeState')->name('coupon.state_change');

            Route::get('admin-pass-change', 'Admin\ProfileController@change_pass')->name('admin.pass_change');

            Route::post('user-search/', 'Admin\UserController@userSearch')->name('user-search');

            Route::get('users/suspend/{user_id}', 'Admin\UserController@suspend')->name('suspend');
            Route::get('users/delete/{user_id}', 'Admin\UserController@destroy')->name('users.delete');

            Route::get('user/export', 'Admin\UserController@export')->name('users.export');

            Route::get('admin-pass-change', 'Admin\ProfileController@change_pass')->name('admin.pass_change');
            Route::post('admin-pass-reset', 'HomeController@passReset')->name('admin.pass-reset');


            Route::post('clear', 'Admin\HomeController@site_clear')->name('admin.clear');

            Route::get('clear', 'HomeController@clear');
        });
    });
});

Route::resource('service', 'Admin\ServiceController');



//admin

// Route::get('/faild',function(){
//     return 'faild';
// })->name('faild');

// Route::get('/test','HomeController@test')->name('test');


// Route::get('master', function () { return view('layouts.admin-lte2-master'); })->name('dashboard');
// Route::get('admin/login', function () { return view('layouts.admin-lte2.auth.login'); })->name('admin.login');


// Route::get('starter', function () { return view('starter'); })->name('starter');
// Route::get('/index', 'HomeController@test')->name('index');
// Route::get('index2', function () { return view('index2'); })->name('index2');

// Route::get('forms/general', function () { return view('pages/forms/general'); })->name('forms.general');
// Route::get('forms/advanced', function () { return view('pages/forms/advanced'); })->name('forms.advanced');
// Route::get('forms/editors', function () { return view('pages/forms/editors'); })->name('forms.editors');

// Route::get('tables/simple', function () { return view('pages/tables/simple'); })->name('tables.simple');
// Route::get('tables/data', function () { return view('pages/tables/data'); })->name('tables.data');
// Route::get('chart/simple', function () { return view('pages/charts/chartjs'); })->name('tables.chartjs');
// Route::get('chart/data', function () { return view('pages/charts/morris'); })->name('tables.morris');


// Route::get('/home1', 'HomeController@index')->name('home1');
