<div class="row">

    <div class="col-md-4 col-md-offset-4">

        <p class="lead">Add new navigation link</p>

        <form action="{{ route('crud_route', ['controller'=> 'navigation', 'action'=>'store']) }}" method="post">

            {{ csrf_field() }}

            <div class="form-group">

                <div class="form-line">

                    <input name="name" type="text" class="form-control" placeholder="Link name">

                </div>

            </div>

            <div class="form-group">

                <div class="form-line">

                    <input name="route" type="text" class="form-control" placeholder="Page URL">

                </div>

            </div>

            <div class="form-group">

                <div class="form-line">

                    <input name="position" type="text" class="form-control" placeholder="Description">

                </div>

            </div>

            <div class="form-group">

                <div class="form-line">
                        
                    <select name="parent">
                        @foreach($navigations as $nav)
                        <option value="{{ $nav->menu_id }}">
                            {{ $nav->link }}
                        </option>
                        @endforeach
                    </select>
                        
                </div>

            </div>


            <div class="form-group">

                <input type="submit" class="btn btn-primary waves-amber" value="Add">

                <a href="{{ route('crud_route', ['controller'=> 'navigation', 'action'=>'index']) }}" class="btn btn-warning waves-effect">Cancel</a>

            </div>

        </form>

    </div>

</div>