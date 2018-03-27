<div class="row">

    <div class="col-md-4 col-md-offset-4">

        <p class="lead">Edit current answer </p>
        <form action="{{ route('crud_route', ['controller'=> 'answers', 'action'=>'update', 'id' => $answer->answer_id]) }}" method="post">

            {{ csrf_field() }}

            <div class="form-group">

                <div class="form-line">

                    <input name="name" type="text" value="{{ $answer->answer }}" class="form-control" placeholder="answer text">

                </div>

            </div>

            <div class="form-group">

                <div class="form-line">
                        
                    <select name="question">
                        @foreach($questions as $qt)
                        <option value="{{ $qt->question_id }}" {{ $answer->question_id == $qt->question_id ? "selected" : "" }}>
                            {{ $qt->question }}
                        </option>
                        @endforeach
                    </select>
                        
                </div>

            </div>


            <div class="form-group">

                <input type="submit" class="btn btn-primary waves-amber" value="Edit">

                <a href="{{ route('crud_route', ['controller'=> 'answers', 'action'=>'index']) }}" class="btn btn-warning waves-effect">Cancel</a>

            </div>

        </form>

    </div>

</div>