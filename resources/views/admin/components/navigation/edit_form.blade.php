<div class="row">

    <div class="col-md-4 col-md-offset-4">

        <p class="lead">Edit current link</p>

        <form action="{{ route('crud_route', ['controller'=> 'navigation', 'action'=>'update', 'id' => $navigation->menu_id]) }}" method="post">

            {{ csrf_field() }}

            <div class="form-group">

                <div class="form-line">

                    <input name="name" type="text" value="{{ $navigation->menu }}" class="form-control" placeholder="Link name">

                </div>

            </div>

            <div class="form-group">

                <div class="form-line">

                    <input name="route" type="text" value="{{ $navigation->link }}" class="form-control" placeholder="Page URL">

                </div>

            </div>

            <div class="form-group">

                <div class="form-line">

                    <input name="opis" type="text" value="{{ $navigation->opis }}" class="form-control" placeholder="Navigtion position">

                </div>

            </div>
            <div class="form-group">

                <div class="form-line">
                        
                    <select name="parent">
                        @foreach($navigations as $nav)
                        <option value="{{ $nav->menu_id }}" {{ $navigation->menu_id == $nav->menu_id ? "selected" : "" }} >
                            {{ $nav->link }}
                        </option>
                        @endforeach
                    </select>
                        
                </div>

            </div>


            <div class="form-group">

                <input type="submit" class="btn btn-primary waves-amber" value="Edit">

                <a href="{{ route('crud_route', ['controller'=> 'navigation', 'action'=>'index']) }}" class="btn btn-warning waves-effect">Cancel</a>

            </div>

        </form>

    </div>

</div>