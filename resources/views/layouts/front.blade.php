<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> SHIZZWOW | @yield('title') </title>

    @section('appendCss')
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/') }}css/bootstrap.css" type="text/css" rel="stylesheet">
    <link href="{{ asset('/') }}css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <link href="{{ asset('/') }}css/style.css" type="text/css" rel="stylesheet"/>

    <!-- Tinymce Editor -->
    
    @show
    

  </head>

  <body>
    <script type="text/javascript">
      var BASE_URL = "{{ route('home') }}";
      var TOKEN = "{{ csrf_token() }}";
    </script>
    @include('components.header')
	  
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          @empty(!session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
          @endempty

          @empty(!session('success'))
            <div class="alert alert-success">{{ session('success') }} </div>
          @endempty
        </div>

        @if ($errors->any())
          <div class="col-lg-12 alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
        <!-- MESTO ZA SADRZAJ KOJI SE MENJA U ZAVISNOSTI OD STRANICE-->
        @include('components.nav')
        @yield('content')

		
      </div>

    </div>
	
	  @include('components.currentusers')
    @include('components.footer')
	
	
    @section('appendJavascript')
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('/') }}vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('/') }}vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/') }}js/ajax.js"></script>
    @show
    
  </body>

</html>

