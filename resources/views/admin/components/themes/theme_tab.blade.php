
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    {!! $theme->theme !!}
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="{{ route('crud_route', ['controller'=> 'themes', 'action'=>'show', 'id' => $theme->theme_id]) }}">Edit</a></li>
                            <li><a href="{{ route('crud_route', ['controller'=> 'themes', 'action'=>'destroy', 'id' => $theme->theme_id]) }}">Delete</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                    <li role="presentation" class="active"><a href="#home{{ $theme->theme_id }}" data-toggle="tab">Content</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="home{{ $theme->theme_id }}">
                        <b>Content</b>
                        <p>
                            {!! $theme->description !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>