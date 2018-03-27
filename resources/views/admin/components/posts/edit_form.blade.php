<div class="row">
    <div class="col-md-8 col-md-offset-2">

        <p class="lead">Edit Blog Post</p>

        <form action="{{ route('crud_route', ['controller'=> 'post', 'action'=>'update', 'id' => $post->post_id]) }}" method="post">

            {{ csrf_field() }}

            <div class="form-group">

                <div class="form-line">

                    <input name="title" type="text" value="{{ $post->post }}" class="form-control" placeholder="Title">

                </div>

            </div>

            <div class="form-group">
                <div class="form-line">
                    <textarea class="form-control" name="description" id="content" placeholder="Blog Post Content"> {!! $post->description !!}</textarea>
                </div>
            </div>

            <div class="form-group">

                <div class="form-line">

                    <input name="closed" type="number" value="{{ $post->closed }}" class="form-control" placeholder="Closed">
                </div>

            </div>
            <div class="form-group">

                <div class="form-line">
                        
                    <select name="parent">
                        @foreach($themes as $theme)
                        <option value="{{ $theme->theme_id }}" {{ $post->theme_id == $theme->theme_id ? "selected" : "" }} >
                            {{ $theme->theme }}
                        </option>
                        @endforeach
                    </select>
                        
                </div>

            </div>



            <div class="form-group">

                <input type="submit" class="btn btn-primary waves-amber" value="Edit">

                <a href="{{ route('crud_route', ['controller'=> 'post', 'action'=>'index']) }}" class="btn btn-warning waves-effect">Cancel</a>

            </div>

        </form>

    </div>

</div>