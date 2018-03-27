@extends("layouts.admin")
@section("content")
    @empty($form)
        @include("admin.components.questions.question_table")
    @endempty

    @isset($form)
        @switch($form)
            @case('edit')
                @include('admin.components.questions.edit_form')
            @break
            @case('insert')
                @include('admin.components.questions.insert_form')
            @break
        @endswitch
    @endisset
@endsection
