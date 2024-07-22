<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css ') }}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css ') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css ') }}">
  @stack('before-style')
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  @stack('after-style')
  <title>@yield('title')</title>
</head>

<body>
    <x-sidebar/>
    <x-navbar/>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: calc(100vh - 100px);">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div><!-- /.container-fluid -->
        </div><!-- /.content -->
    </div><!-- /.content-wrapper -->
</div><!-- ./wrapper -->
    @stack('before-script')
    <script src="https://cdn.tailwindcss.com"></script>
    @stack('after-script')
</body>

</html>