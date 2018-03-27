<div class="row">
    <div class="col-md-8 col-md-offset-2">

        <p class="lead">Edit Blog Theme</p>

        <form action="{{ route('crud_route', ['controller'=> 'themes', 'action'=>'update', 'id' => $theme->theme_id]) }}" method="post">

            {{ csrf_field() }}

            <div class="form-group">

                <div class="form-line">

                    <input name="title" type="text" value="{{ $theme->theme }}" class="form-control" placeholder="Title">

                </div>

            </div>

            <div class="form-group">
                <div class="form-line">
                    <textarea class="form-control" name="description" id="content" placeholder="Blog Post Content"> {!! $theme->description !!}</textarea>
                </div>
            </div>

            <div class="form-group">

                <div class="form-line">
                        
                    <select name="parent">
                        @foreach($categories as $cat)
                        <option value="{{ $cat->category_id }}" {{ $cat->category_id == $theme->category_id ? "selected" : "" }} >
                            {{ $cat->category }}
                        </option>
                        @endforeach
                    </select>
                        
                </div>

            </div>



            <div class="form-group">

                <input type="submit" class="btn btn-primary waves-amber" value="Edit">

                <a href="{{ route('crud_route', ['controller'=> 'themes', 'action'=>'index']) }}" class="btn btn-warning waves-effect">Cancel</a>

            </div>

        </form>

    </div>

</div>