<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('blog.title') }} Admin</title>

  <link href="{{ asset('/assets/css/admin.css') }}" rel="stylesheet">

  @yield('styles')

  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"> \
  </script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"> \
  </script>
  <![endif]-->
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed"
              data-toggle="collapse"
              data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">{{ config('blog.title') }} Admin</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      @include('admin.partials.navbar')
    </div>
  </div>
</nav>

@yield('content')

<!-- Scripts -->
<script src="{{ asset('/assets/js/admin.js') }}"></script>

@yield('scripts')

</body>
</html>