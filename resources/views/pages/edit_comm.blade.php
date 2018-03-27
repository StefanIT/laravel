@extends('layouts.front')

@section('title')
    Edit Comment
@endsection

@section('appendCss')
    @parent

    <!-- Waves Effect Css -->
    <link href="{{ asset('admin/plugins/node-waves/waves.min.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('admin/plugins/animate-css/animate.min.css') }}" rel="stylesheet" />

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/toastr.css') }}">

@endsection

@section('content')
<div class="col-md-12">
    <div class="container">
<div class="row">

    <div class="col-md-4 col-md-offset-4">

        <p class="lead">Edit current comment</p>

        <form action="{{ route('commentEdit',array('id' => $comment->cm_id)) }}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="form-group">

                <div class="form-line">

                    <textarea class="form-control" name="description" id="content" placeholder="Blog Post Content"> {!! $comment->text !!}</textarea>

                </div>

            </div>

            <div class="form-group">
                <div class="form-line">
                    <input name="profilePicture" type="file" class="form-control" >
                </div>
            </div>

            <input type="hidden" name="skriveniPostId" value="{{ $comment->post_id }}">

            <div class="form-group">

                <input type="submit" class="btn btn-primary waves-amber" value="Edit">

                <a href="{{ route('home') }}" class="btn btn-warning waves-effect">Cancel</a>

            </div>

        </form>

    </div>

</div>
</div>
</div>
@endsection

@section('appendJavaScript')
    @parent
    <!-- Jquery Core Js -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap Core Js -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Select Plugin Js -->
<script src="{{ asset('admin/plugins/bootstrap-select/js/bootstrap-select.min.js') }}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{ asset('admin/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset('admin/plugins/node-waves/waves.min.js') }}"></script>

<!-- Custom Js -->
<script src="{{ asset('admin/js/admin.js') }}"></script>

<!-- Demo Js -->
<script src="{{ asset('admin/js/demo.js') }}"></script>

<script src="{{ asset('js/toastr.js') }}"></script>

@endsection