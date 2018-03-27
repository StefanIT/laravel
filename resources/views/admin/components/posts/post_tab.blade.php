
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    {!! $post->post !!}
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="{{ route('crud_route', ['controller'=> 'post', 'action'=>'show', 'id' => $post->post_id]) }}">Edit</a></li>
                            <li><a href="{{ route('crud_route', ['controller'=> 'post', 'action'=>'destroy', 'id' => $post->post_id]) }}">Delete</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                    <li role="presentation" class="active"><a href="#home{{ $post->post_id }}" data-toggle="tab">Content</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="home{{ $post->post_id }}">
                        <b>Content</b>
                        <p>
                            {!! $post->description !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>