<div class="row">

    <div class="col-md-4 col-md-offset-4">

        <p class="lead">Add new question </p>

        <form action="{{ route('crud_route', ['controller'=> 'questions', 'action'=>'store']) }}" method="post">

            {{ csrf_field() }}

            <div class="form-group">

                <div class="form-line">

                    <input name="name" type="text" class="form-control" placeholder="question text">

                </div>

            </div>

            <div class="form-group">

                <div class="form-line">

                    <input name="activate" type="number" class="form-control" placeholder="Activate">
                </div>

            </div>


            <div class="form-group">

                <input type="submit" class="btn btn-primary waves-amber" value="Add">

                <a href="{{ route('crud_route', ['controller'=> 'questions', 'action'=>'index']) }}" class="btn btn-warning waves-effect">Cancel</a>

            </div>

        </form>

    </div>

</div>