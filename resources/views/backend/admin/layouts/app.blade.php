<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Influencer Pulse</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />
    <link href="{{asset('backend/css/e5a339db27258413bd6f.css')}}" rel="stylesheet" />
    <script src="{{asset('backend/js/e5a339db27258413bd6f.js')}}"></script>
  
    <style>
    .modal-backdrop {
        z-index: 1010 !important;
    }
    </style>
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
</head>

<body class="app header-fixed sidebar-fixed sidebar-lg-show">
    @include('backend.admin.layouts.components.header')
    <div class="app-body">
        @include('backend.admin.layouts.components.sidebar')
        @yield('content')
    </div>
    @include('backend.admin.layouts.components.footer')
   
   
    <!-- DO NOT MODIFY -->
    <!-- End Facebook Pixel Code -->
  
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