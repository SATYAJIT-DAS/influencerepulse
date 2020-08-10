<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="csrf-token" content="{{ csrf_token() }}">

@hasSection ('title')
<title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
@else
<title>{{ config('app.name', 'Laravel') }}</title>
@endif

<link rel="stylesheet" href="{{ asset('admin-lte-2/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin-lte-2/bower_components/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin-lte-2/bower_components/Ionicons/css/ionicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin-lte-2/dist/css/AdminLTE.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin-lte-2/dist/css/skins/skin-blue.min.css') }}">

<!--  [if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif] -->

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
@yield('style')