<div class="row">

    <div class="col-md-4 col-md-offset-4">

        <p class="lead">Edit current user</p>

        <form action="{{ route('crud_route', ['controller'=> 'users', 'action'=>'update', 'id' => $user->id]) }}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="form-group">

                <div class="form-line">

                    <input name="first_name" type="text" value="{{ $user->first_name }}" class="form-control" placeholder="First Name">

                </div>

            </div>

            <div class="form-group">

                <div class="form-line">

                    <input name="last_name" type="text" value="{{ $user->last_name }}" class="form-control" placeholder="Last Name">

                </div>

            </div>

            <div class="form-group">

                <div class="form-line">

                    <input name="email" type="text" value="{{ $user->email }}" class="form-control" placeholder="Email">

                </div>

            </div>

            <div class="form-group">

                <div class="form-line">

                    <input name="username" type="text" value="{{ $user->name }}" class="form-control" placeholder="Username">

                </div>

            </div>

            <div class="form-group">

                <div class="form-line">

                    <input name="password" type="password" class="form-control" placeholder="Password">

                </div>

            </div>
            <div class="form-group">
                <div class="form-line">
                    <input name="profilePicture" type="file" class="form-control" >
                </div>
            </div>

            <div class="form-group">

                <p><i>Roles:</i></p>
                @foreach($roles as $role)
                    <input id="role{{$role->role_id}}" name="role_id" class="chk-col-deep-purple" value="{{ $role->role_id }}" {{ $role->role_id == $user->role_id ? "checked" : "" }} type="radio">
                    <label for="role{{$role->role_id}}"> {{ $role->role }} </label>
                @endforeach

            </div>

            <div class="form-group">

                <input type="submit" class="btn btn-primary waves-amber" value="Edit">

                <a href="{{ route('crud_route', ['controller'=> 'users', 'action'=>'index']) }}" class="btn btn-warning waves-effect">Cancel</a>

            </div>

        </form>

    </div>

</div>