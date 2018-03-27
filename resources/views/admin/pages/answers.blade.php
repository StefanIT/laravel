@extends("layouts.admin")
@section("content")
    @empty($form)
        @include("admin.components.answers.answer_table")
    @endempty

    @isset($form)
        @switch($form)
            @case('edit')
                @include('admin.components.answers.edit_form')
            @break
            @case('insert')
                @include('admin.components.answers.insert_form')
            @break
        @endswitch
    @endisset
@endsection
