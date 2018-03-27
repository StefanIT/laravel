<table id="mainTable" class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Answer</th>
        <th>Question</th>
        <th>Number of Votes</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
        @foreach($answers as $answer)

            <tr>
                <td></td>
                <td>{{ $answer->answer }}</td>
                <td>{{ $answer->question }}</td>
                <td>{{ $answer->numberof }}</td>
                <td><a href="{{ route('crud_route', ['controller'=> 'answers', 'action'=>'show', 'id' => $answer->answer_id]) }}" class="btn btn-info waves-effect btn-xs"><i class="material-icons">edit</i></a></td>
                <td><a href="{{ route('crud_route', ['controller'=> 'answers', 'action'=>'destroy', 'id' => $answer->answer_id]) }}" class="btn btn-danger waves-effect btn-xs"><i class="material-icons">delete</i></a></td>
            </tr>
        @endforeach
    </tbody>
</table>