@extends('layouts.front')

@section('title')
    Thread 
@endsection

@section('appendCss')
    @parent
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.12/jquery.bxslider.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.12/jquery.bxslider.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.12/images/controls.png"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>   
    <script src="{{ asset('/') }}vendor/jquery/jquery.fitvids.js"></script>
    <script src="{{ asset('/') }}vendor/jquery/jquery.easing.1.3.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.12/jquery.bxslider.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.12/vendor/jquery.easing.1.3.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.12/vendor/jquery.fitvids.js" type="text/javascript"></script>

    
    <link href="{{ asset('/') }}css/jquery.bxslider.css" rel="stylesheet" />
    
@endsection

@section('content')
<div class="col-md-12 slajder">
	<ul class="slider">
	@foreach($pictures as $picture)
		<li><img src="{{ asset('/').$picture->path }}" id="sl" alt="{{ $picture->alt }}" class="img-responsive"></li>
	@endforeach
	</ul>
</div>
<div class="col-md-12 my-4">
    	<div class="row">
    		@foreach($pictures as $picture)
	    	<div class="card col-md-3">
	    		<div id="slika">
	    			<img src="{{ asset('/').$picture->path }}" id="sl" alt="{{ $picture->alt }}" class="img-responsive">
	    		</div>
	    		<div class="info">
	    			<h6 align="center">Out member:</h6>
	    			<dl class="dl-horizontal">
	    				<dt>Role: </dt>
	    				<dd>{{ $picture->role }}</dd>
	    				<dt>Email: </dt>
	    				<dd><a href="mailto:{{ $picture->email }}`">{{ $picture->email }}</a></dd>
	    			</dl>
	    		</div>
	    	</div>
	    	@endforeach
    	</div>
</div>
<script src="{{ asset('/') }}js/jquery.bxslider.js"></script>
	<script type="text/javascript" src="http://bxslider.com/lib/jquery.bxslider.js"></script>
	<script>
      $('.slider').bxSlider({
      	minSlides: 1,
	   	maxSlides: 4,
	   slideWidth: 170,
	   ticker: true,
	   speed: 10000
      });
  </script>
@endsection

@section('appendJavaScript')
	@parent
	
@endsection