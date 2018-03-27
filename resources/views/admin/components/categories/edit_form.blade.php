<div class="row">

    <div class="col-md-4 col-md-offset-4">

        <p class="lead">Edit current category </p>

        <form action="{{ route('crud_route', ['controller'=> 'categories', 'action'=>'update', 'id' => $category->category_id]) }}" method="post">

            {{ csrf_field() }}

            <div class="form-group">

                <div class="form-line">

                    <input name="name" type="text" value="{{ $category->category }}" class="form-control" placeholder="Link name">

                </div>

            </div>


            <div class="form-group">

                <input type="submit" class="btn btn-primary waves-amber" value="Edit">

                <a href="{{ route('crud_route', ['controller'=> 'categories', 'action'=>'index']) }}" class="btn btn-warning waves-effect">Cancel</a>

            </div>

        </form>

    </div>

</div>