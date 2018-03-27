<table id="mainTable" class="table table-striped">
    <thead>
    <tr>
        <th>Username</th>
        <th>Picture</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach($galleries as $g)
        <tr>
            <td>{{ $g->name }}</td>
            <td><img height="100" src="{{ asset($g->path) }}" alt="{{ asset($g->alt) }}"></td>
            <td><a href="{{ route('crud_route', ['controller'=> 'gallery', 'action'=>'show', 'id' => $g->pic_id]) }}" class="btn btn-info waves-effect btn-xs"><i class="material-icons">edit</i></a></td>
            <td><a href="{{ route('crud_route', ['controller'=> 'gallery', 'action'=>'destroy', 'id' => $g->pic_id]) }}" class="btn btn-danger waves-effect btn-xs"><i class="material-icons">delete</i></a></td>
        </tr>
    @endforeach
    </tbody>
</table>