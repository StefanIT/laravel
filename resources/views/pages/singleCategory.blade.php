@extends('layouts.front')

@section('title')
    Category 
@endsection

@section('appendCss')
    @parent
    <!-- Custom styles for this template -->
@endsection


@section('content')
@isset($singleCategory)
	
<div class="col-md-12">
	<div class="card my-4">
		@foreach($singleCategory as $category)
		@if($loop->first)
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
	    @endif
	    @endforeach
	    @foreach($singleCategory as $category)
	    <div class="card-block">
		    <h6 class="card-title"><a href="{{ asset('categories/themes/'.$category->theme_id) }}">{{ $category->theme }}</a></h6>
		    <p class="card-text" id="descr"><cite>{{ $category->description }}</cite></p>
	  	</div>
	  	@endforeach
	</div>
</div>
@endisset
@endsection