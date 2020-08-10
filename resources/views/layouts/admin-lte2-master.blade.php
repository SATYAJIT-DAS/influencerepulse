<!DOCTYPE html>
<html>
<head>@include('layouts.admin-lte2.head')</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    
    @include('layouts.admin-lte2.topnav')
    @include('layouts.admin-lte2.sidenav')
    
    <div class="content-wrapper">

      <section class="content-header">
        <h1>Page Header <small>Optional description</small></h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
          <li class="active">Here</li>
        </ol>
      </section>

      <section class="content container-fluid">
        <!--------------------------
          | Your Page Content Here |
          -------------------------->
      </section>
    </div>
    @include('layouts.admin-lte2.footer')
    @include('layouts.admin-lte2.sidebar')
    <div class="control-sidebar-bg"></div>
  </div>
@include('layouts.admin-lte2.scripts')
</body>
</html>