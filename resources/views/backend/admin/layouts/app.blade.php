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