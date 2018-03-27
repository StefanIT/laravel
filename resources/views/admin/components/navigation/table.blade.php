<table id="mainTable" class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Route URL</th>
        <th>Description</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
        @foreach($navigations as $nav)
            <tr>
                <td>{{ $nav->menu }}</td>
                <td>{{ $nav->link }}</td>
                <td>{{ $nav->opis }}</td>
                <td><a href="{{ route('crud_route', ['controller'=> 'navigation', 'action'=>'show', 'id' => $nav->menu_id]) }}" class="btn btn-info waves-effect btn-xs"><i class="material-icons">edit</i></a></td>
                <td><a href="{{ route('crud_route', ['controller'=> 'navigation', 'action'=>'destroy', 'id' => $nav->menu_id]) }}" class="btn btn-danger waves-effect btn-xs"><i class="material-icons">delete</i></a></td>
            </tr>
        @endforeach
    </tbody>
</table>