<table id="mainTable" class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Question</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
        @foreach($questions as $qt)

            <tr>
                <td></td>
                <td>{{ $qt->question }}</td>
                <td><a href="{{ route('crud_route', ['controller'=> 'questions', 'action'=>'show', 'id' => $qt->question_id]) }}" class="btn btn-info waves-effect btn-xs"><i class="material-icons">edit</i></a></td>
                <td><a href="{{ route('crud_route', ['controller'=> 'questions', 'action'=>'destroy', 'id' => $qt->question_id]) }}" class="btn btn-danger waves-effect btn-xs"><i class="material-icons">delete</i></a></td>
            </tr>
        @endforeach
    </tbody>
</table>