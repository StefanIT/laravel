@extends('layouts.front')

@section('title')
    Home page
@endsection

@section('appendCss')
    @parent
    <!-- Custom styles for this template -->
@endsection

@section('content')

@isset($categories)
	@foreach($categories as $category)
<div class="col-md-12">
	<div class="card my-4">
		<div class="card-header">
			<div class="row">
				<div class="col-md-9">
			    	<h5><a href="{{ asset('/singleCategory/'.$category->category_id) }}"> {{ $category->category }}</a></h5>
				</div>
				<div class="col-md-3">
			    	<h6>Last Post</h6>
				</div>
			</div>
	    </div>
	    @isset($themes)
			@foreach($themes as $theme)
			@if($theme->category_id == $category->category_id)
	    <div class="card-block">
	    	<div class="row">
		    	<div class="col-md-9">
				    <h6 class="card-title"><a href="{{ asset('/categories/themes/'.$theme->theme_id) }}">{{ $theme->theme }}</a></h6>
				    <p class="card-text" id="descr"><cite>{!! $theme->description !!}</cite></p>
				</div>
				<div class="col-md-3">
					<p class="card-text" id="descr"> {{  (isset($theme->last)) ? $theme->last->created_at : "" }} </p>
				</div>
			</div>

	  	</div>
	  		@endif
	  		@endforeach
	  	@endisset
	</div>
</div>
	@endforeach
@endisset
@endsection