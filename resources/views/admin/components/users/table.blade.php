<table id="" class="table table-striped">
    <thead>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th>Picture</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->last_name }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated_at }}</td>
            <td><img height="100" src="{{ asset($user->path) }}" alt="{{ asset($user->alt) }}"></td>
            <td><a href="{{ route('crud_route', ['controller'=> 'users', 'action'=>'show', 'id' => $user->id]) }}" class="btn btn-info waves-effect btn-xs"><i class="material-icons">edit</i></a></td>
            <td><a href="{{ route('crud_route', ['controller'=> 'users', 'action'=>'destroy', 'id' => $user->id]) }}" class="btn btn-danger waves-effect btn-xs"><i class="material-icons">delete</i></a></td>
        </tr>
    @endforeach
    </tbody>
</table>