<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title>G-Scores</title>

  <meta name="description" content="G-Scores created by GoldenOwl">
  <meta name="author" content="GoldenOwl">
  <meta name="robots" content="index, follow">

  <!-- Open Graph Meta -->
  <meta property="og:title" content="G-Scores">
  <meta property="og:site_name" content="G-Scores">
  <meta property="og:description" content="G-Scores created by GoldenOwl">
  <meta property="og:type" content="website">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <!-- Icons -->
  <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
  <link rel="shortcut icon" href="{{ asset('assets/media/favicons/favicon.png') }}">
  <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/media/favicons/favicon-192x192.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/media/favicons/apple-touch-icon-180x180.png') }}">
  <!-- END Icons -->

  <!-- Stylesheets -->
  <!-- Dashmix framework -->
  <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/dashmix.min.css') }}">

  <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
  <!-- <link rel="stylesheet" id="css-theme" href="{{ asset('assets/css/themes/xwork.min.css') }}"> -->
  <!-- END Stylesheets -->
</head>

<body>
  <!-- Page Container -->
  <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">

    <!-- Sidebar -->
    @include('partials.sidebar')
    <!-- END Sidebar -->

    <!-- Header -->
    @include('partials.header')
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">
      @yield('content')
    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    @include('partials.footer')
    <!-- END Footer -->
  </div>
  <!-- END Page Container -->

  <!-- Dashmix JS -->
  <script src="{{ asset('assets/js/dashmix.app.min.js') }}"></script>

</body>

</html>