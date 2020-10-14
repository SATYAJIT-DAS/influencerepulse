<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- <link rel="manifest" href="/manifest.json" crossorigin="use-credentials"> -->
    <title>Influencer Pulse</title>
    <link rel="shortcut icon" href="intro/img/favicon.ico" type="image/x-icon" />
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />
    <link href="{{asset('backend/css/e5a339db27258413bd6f.css')}}" rel="stylesheet" />
    <script src="{{asset('backend/js/e5a339db27258413bd6f.js')}}"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-112840276-1"></script>
    <link rel="stylesheet" href="{{asset('public/css/custom.css')}}">


    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5ec17d818ee2956d73a1facb/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '310283576972642');
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1"
src="https://www.facebook.com/tr?id=310283576972642&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
    <style>
        .modal-backdrop {
            z-index: 1010 !important;
        }
        </style>
    </head>

<body class="app header-fixed sidebar-fixed sidebar-lg-show">
    @include('backend.seller.layouts.components.header')
    <div class="app-body">

        @include('backend.seller.layouts.components.sidebar')
        @yield('content')
    </div>
    @include('backend.seller.layouts.components.footer')

    <noscript>
        <img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=1379051355490675&ev=PageView&noscript=1" />
    </noscript>
    <!-- DO NOT MODIFY -->
    <!-- End Facebook Pixel Code -->

    <script src="//widget.manychat.com/1930880297160721.js" async="async"></script><!-- Taboola Pixel Code -->

    <noscript>
        <img src='//trc.taboola.com/1174786/log/3/unip?en=page_view' width='0' height='0' style='display:none' />
    </noscript>
    <!-- End of Taboola Pixel Code -->
    <script type="application/javascript" async src="https://static.klaviyo.com/onsite/js/klaviyo.js?company_id=JuiPxp">
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
</body>

</html>
