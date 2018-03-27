@extends("layouts.admin")
@section("styles")
    <link rel="stylesheet" href="{{ asset('summernote/summernote.css') }}">
@endsection
@section("content")
    @empty($form)
        @foreach($themes as $theme)
            @component("admin.components.themes.theme_tab",[
                'theme' => $theme
            ])@endcomponent
        @endforeach
    @endempty

    @isset($form)
        @switch($form)
            @case('edit')
                @include('admin.components.themes.edit_form')
            @break
            @case('insert')
                @include('admin.components.themes.insert_form')
            @break
        @endswitch
    @endisset
@endsection

@section('scripts')
    <script src="{{ asset('summernote/summernote.js') }}"></script>
    <script>
        $("#content").summernote();
    </script>
@endsection

