<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- <link rel="manifest" href="/manifest.json" crossorigin="use-credentials"> -->
    <title>Terms - Influencer Pulse</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />
    <link href="{{ asset('backend/css/e5a339db27258413bd6f.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/css/buyer-main.css') }}" rel="stylesheet" />
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-112840276-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag("js", new Date());
    gtag("set", {
        "user_id": 332623
    });
    gtag("config", "UA-112840276-1");
    </script><!-- Facebook Pixel Code -->
    <script>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window,
        document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');
    // Insert your pixel ID here.
    fbq('init', '187314665191632', {
        em: 'ivancxt1995@gmail.com'
    });
    fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=187314665191632&ev=PageView&noscript=1" />
    </noscript>
    <!-- DO NOT MODIFY -->
    <!-- End Facebook Pixel Code -->
</head>

<body class="app header-fixed sidebar-fixed">
    @include('backend.buyer.layouts.components.header-intro')
    <div class="app-body">
        @include('backend.buyer.layouts.components.sidebar')

        @yield('content')
    </div>
    @include('backend.buyer.layouts.components.footer-intro')
    <script>
    fbq("trackCustom", "RK Buyer SignedIn", [])
    </script>
    <script src="//widget.manychat.com/1930880297160721.js" async="async"></script><!-- Taboola Pixel Code -->
    <script type='text/javascript'>
    window._tfa = window._tfa || [];
    window._tfa.push({
        notify: 'event',
        name: 'page_view',
        id: 1174786
    });
    ! function(t, f, a, x) {
        if (!document.getElementById(x)) {
            t.async = 1;
            t.src = a;
            t.id = x;
            f.parentNode.insertBefore(t, f);
        }
    }(document.createElement('script'),
        document.getElementsByTagName('script')[0],
        '//cdn.taboola.com/libtrc/unip/1174786/tfa.js',
        'tb_tfa_script');
    </script>
    <noscript>
        <img src='//trc.taboola.com/1174786/log/3/unip?en=page_view' width='0' height='0' style='display:none' />
    </noscript>
    <!-- End of Taboola Pixel Code -->
    <script type="application/javascript" async src="https://static.klaviyo.com/onsite/js/klaviyo.js?company_id=JuiPxp">
    </script>
    <script>
    var _learnq = _learnq || [];
    _learnq.push(["identify", {
        "$id": "332623",
        "$email": "ivancxt1995@gmail.com",
        "$phone_number": "6513761907",
        "type": "buyer",
        "name": "blue bamboo",
        "email_verified": 1,
        "newsletter": 1,
        "rebates": 0,
        "phone_verified": 1
    }]);
    </script><!-- Snap Pixel Code -->
    <script type='text/javascript'>
    (function(e, t, n) {
        if (e.snaptr) return;
        var a = e.snaptr = function() {
            a.handleRequest ? a.handleRequest.apply(a, arguments) : a.queue.push(arguments)
        };
        a.queue = [];
        var s = 'script';
        r = t.createElement(s);
        r.async = !0;
        r.src = n;
        var u = t.getElementsByTagName(s)[0];
        u.parentNode.insertBefore(r, u);
    })(window, document,
        'https://sc-static.net/scevent.min.js');

    snaptr('init', '439f9374-7e4f-48e0-910c-741b01e3066c', {
        user_email: 'ivancxt1995@gmail.com'
    });

    snaptr('track', 'PAGE_VIEW');
    </script>
    <!-- End Snap Pixel Code -->
    <div class="modal fade" id="generic-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="loading loading-generic text-center p-5">
                    <i class="fal fa-spinner fa-spin fa-5x"></i>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('backend/js/e5a339db27258413bd6f.js')}}"></script>

</body>

</html>
