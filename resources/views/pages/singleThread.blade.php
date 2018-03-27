@extends('layouts.front')

@section('title')
    Thread 
@endsection

@section('appendCss')
    @parent
    <!-- Custom styles for this template -->

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  	<script>
  		tinymce.init({ 
  			selector:'textarea', 
  			plugins: 'link image imagetools',
  			menu:{
  				view:{title:'Edit',items:'cut,copy,paste'}
  			},
  			file_browser_callback_types: 'file image media',
  			automatic_uploads: false,
  			file_picker_callback: function(cb, value, meta) {
	    	var input = document.createElement('input');
	    	input.setAttribute('type', 'file');
	    	input.setAttribute('accept', 'image/*');
	    
	    
	    	input.onchange = function() {
	        var file = this.files[0];
	      
	        var reader = new FileReader();
	        reader.onload = function () {
	        // Note: Now we need to register the blob in TinyMCEs image blob
	        // registry. In the next release this part hopefully won't be
	        // necessary, as we are looking to handle it internally.
	        var id = 'blobid' + (new Date()).getTime();
	        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
	        var base64 = reader.result.split(',')[1];
	        var blobInfo = blobCache.create(id, file, base64);
	        blobCache.add(blobInfo);



	        // call the callback and populate the Title field with the file name
	        cb(blobInfo.blobUri(), { title: file.name });
	        };
	    reader.readAsDataURL(file);
	    };
	    
	    input.click();
	},
	   file_browser_callback: function(field_name, url, type, win) {
    	win.document.getElementById(field_name).value = 'my browser value';
  		}
  		});
  	</script>

@endsection


@section('content')
<script type="text/javascript">
</script>
@if(session()->has('user')!= "")
@if(session()->get('user.0')->role == "Admin" || session()->get('user.0')->role == "Moderator")
<div class="col-md-12 my-1">
	<div id="close">
		<button class="btn" id="closeThread" name="closeThread"><span class="fa fa-lock"></span> Close Thread</button>
	</div>
</div>
@endif
@endif
@isset($posts)

<div class="col-md-12">

	<div class="card my-4">
		<div class="card-header">
			<div class="col-md-9">
		    	<p class="card-text" id="descr"> {{ Carbon\Carbon::parse($posts->created_at)->format("d/m/Y H:i") }}</p>
			</div>
			<div class="col-md-3">
			</div>
			<div class="clearfix"></div>
	    </div>

	    <div class="card-block">
	    	<div class="row">
		    	<div class="card col-md-3">
		    		<div id="slika">
		    			<img src="{{ asset('/').$posts->path}}" id="sl" class="img-responsive">
		    		</div>
		    		<div class="info">
		    			<h6 align="center">Created:</h6>
		    			<dl class="dl-horizontal">
		    				<dt>Role: </dt>
		    				<dd>{{ $posts->role }}</dd>
		    				<dt>Email: </dt>
		    				<dd><a href="mailto:{{ $posts->email }}">{{ $posts->email }}</a></dd>
		    			</dl>
		    		</div>
		    	</div>
		    	<div class="card col-md-9">
		    		<div id="post">
		    			<p align="center" id="namePost">{{ $posts->post }}</p><hr/>
		    		</div>
		    		<div id="postDescription">
		    			<p>{!! $posts->description !!}</p>
		    		</div>
		    	</div>
	    	</div>
	  	</div>
	</div>
</div>
<div class="col-md-12 comm">
	@foreach($comments as $comment)
	<div class="card my-1">
			<div class="card-header">
				<div class="col-md-9">
			    	<p class="card-text" id="descr"> {{ $comment->crt }}</p>
				</div>
				<div class="col-md-3">
				</div>
				<div class="clearfix"></div>
		    </div>

		    <div class="card-block">
		    	<div class="row">
			    	<div class="card col-md-3">
			    		<div id="slika">
			    			<img src="{{ asset('/').$comment->path }}" id="sl" class="img-responsive">
			    		</div>
			    		<div class="info">
			    			<h6 align="center">Created:</h6>
			    			<dl class="dl-horizontal">
			    				<dt>Role: </dt>
			    				<dd>{{ $comment->role }}</dd>
			    				<dt>Email: </dt>
			    				<dd><a href="mailto:{{ $comment->email }}`">{{ $comment->email }}</a></dd>
			    			</dl>
			    		</div>
			    	</div>
			    	<div class="card col-md-9">
			    		<div id="post">
			    			<p align="center">Re: {{ $posts->post }}</p><hr/>
			    		</div>
			    		<div id="postDescription">
			    			<p>{!! $comment->text !!}</p>
			    		</div>
			    	</div>
		    	</div>
		  	</div>
		  	<div class="col-md-3 my-4">
		  		<a href="{{ route('editComent',array('id' => $comment->cm_id)) }}" class="btn btn-xs btn-primary"><span class="fa fa-edit"></span></a>
		  		<button class="btn btn-xs btn-primary" id="odg" onclick="odgovoriNa({{ $comment->cm_id }})"><span class="fa fa-reply"></span>Replay with quote</button>
		  	</div>
	</div>
	@endforeach
</div>
<div class="col-md-9">
	{{ $comments->links() }}	
</div>
@if(session()->has('user') && $posts->closed == 0)
<div class="col-md-12" id="cr">
	<input type="hidden" id="hiddenCommentId" name="skriveno"/>
	<textarea name="editor" id="editor">
	</textarea>
	<div class="col-md-12 my-4">
		<div id="com">
			<button class="btn" onclick="crtComment()" id="createComment" name="createComment"><span class="fa fa-plus"></span> Add Comment</button>
		</div>
	</div>
</div>
@else
<p class="card-text">In order to comment, you must <a href="{{ route('login') }}">login</a> first.</p>

@endif
<input type="hidden" id="skriveniId" value="{{ $posts->post_id }}">
@endisset
@endsection

@section('appendJavascript')
	@parent
	
@endsection