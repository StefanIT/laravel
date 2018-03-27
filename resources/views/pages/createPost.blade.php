@extends('layouts.front')

@section('title')
 Create Post
@endsection

@section('appendCss')
	@parent
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
<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Post</h1>
			<form action="{{ route('insertPost') }}" method="POST">
				{{ csrf_field() }}
				<table>
					<tr>
						<label class="text-info">Title:</label>
						<input type="text" class="form-control" name="title">
					</tr>
					<tr>
						<label class="text-info">Themes:</label>
						<select class="form-control" name="theme">
							@isset($themes)
								@foreach($themes as $theme)
									<option value="{{ $theme->theme_id }}">{{ $theme->theme }}</option>
								@endforeach
							@endisset
						</select>
					</tr>
					<tr>
						<label class="text-info">Post Body:</label>
						<textarea id="description" name="description"></textarea>
					</tr>
					<tr>
						<input type="submit" id="submitPost" value="Create Post" class="btn btn-success" name="createPost"/>
					</tr>
				</table>
			</form>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>
@endsection

@section('appendJavascript')
	@parent
@endsection