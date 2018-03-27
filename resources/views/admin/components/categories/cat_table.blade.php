<table id="mainTable" class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Category</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
        @foreach($categories as $cat)

            <tr>
                <td></td>
                <td>{{ $cat->category }}</td>
                <td><a href="{{ route('crud_route', ['controller'=> 'categories', 'action'=>'show', 'id' => $cat->category_id]) }}" class="btn btn-info waves-effect btn-xs"><i class="material-icons">edit</i></a></td>
                <td><a href="{{ route('crud_route', ['controller'=> 'categories', 'action'=>'destroy', 'id' => $cat->category_id]) }}" class="btn btn-danger waves-effect btn-xs"><i class="material-icons">delete</i></a></td>
            </tr>
        @endforeach
    </tbody>
</table>