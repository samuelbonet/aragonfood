<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="img/png" href="img/pagina/index/logo.png">
  <title>@if(!is_null($title)) {{ $title }} | @endif{{ config('app.name') }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  @foreach ($css_files as $file)
        <link rel="stylesheet" href="{{$file}}">
    @endforeach
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  @include('plantillaDashboard.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('plantillaDashboard.sidebar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @if ($mostrar_cabecera)
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">{{ $title }}</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
    @endif

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @include($view)
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('plantillaDashboard.footer')

</div>
<!-- ./wrapper -->

@foreach ($js_files as $file)
    <script src="{{$file}}"></script>
@endforeach
</body>
</html>
