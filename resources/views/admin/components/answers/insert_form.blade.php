<div class="row">

    <div class="col-md-4 col-md-offset-4">

        <p class="lead">Add new answer </p>

        <form action="{{ route('crud_route', ['controller'=> 'answers', 'action'=>'store']) }}" method="post">

            {{ csrf_field() }}

            <div class="form-group">

                <div class="form-line">

                    <input name="name" type="text" class="form-control" placeholder="answer text">

                </div>

            </div>

            <div class="form-group">

                <div class="form-line">
                        
                    <select name="question">
                        @foreach($questions as $qt)
                        <option value="{{ $qt->question_id }}">
                            {{ $qt->question }}
                        </option>
                        @endforeach
                    </select>
                        
                </div>

            </div>


            <div class="form-group">

                <input type="submit" class="btn btn-primary waves-amber" value="Add">

                <a href="{{ route('crud_route', ['controller'=> 'answers', 'action'=>'index']) }}" class="btn btn-warning waves-effect">Cancel</a>

            </div>

        </form>

    </div>

</div>