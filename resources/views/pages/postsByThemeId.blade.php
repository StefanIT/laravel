@extends('layouts.front')

@section('title')
    Threads
@endsection

@section('appendCss')
    @parent
    <!-- Custom styles for this template -->
@endsection


@section('content')
<div class="col-md-3">
		<a href="{{ route('showFormForCreatePost') }}" class="btn btn-default" name="create"><span class="fa fa-plus"></span> Create Post</a>
</div>
@isset($postByTheme)
	
<div class="col-md-12">
	<div class="card my-4">
		@foreach($postByTheme as $post)
		@if($loop->first)
		<div class="card-header">
			<div class="row">
				<div class="col-md-9">
			    	<h5><a href="{{ asset('/categories/themes/'.$post->theme_id) }}" > {{ $post->theme }}</a></h5>
				</div>
				<div class="col-md-3">
			    	<h6>Last Post</h6>
				</div>
			</div>
	    </div>
	    @endif
	    <div class="card-block">
		    <h6 class="card-title"><a href="{{ asset('/categories/themes/theme/'.$post->post_id) }}" title="{{ substr($post->desc,0,50).'...' }}">{{ $post->post }}</a></h6>
		    <p class="card-text" id="descr">Started by <cite title="Created">{{ $post->name }},</cite> {{ Carbon\Carbon::parse($post->created_at)->format("d/m/Y H:i") }}  </p>
	  	</div>
	  	@endforeach
	</div>
</div>
@endisset
@endsection