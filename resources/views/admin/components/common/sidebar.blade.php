<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
@include("admin.components.common.user_info")
<!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{{ route('home') }}">
                    <i class="material-icons">home</i>
                    <span>Back to website</span>
                </a>
            </li>
            <li class="active">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">person</i>
                    <span>Users</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route('crud_route', ['controller'=> 'users', 'action'=>'create']) }}">Add</a>
                    </li>
                    <li>
                        <a href="{{ route('crud_route', ['controller'=> 'users', 'action'=>'index']) }}">Show</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">menu</i>
                    <span>Navigation</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route('crud_route', ['controller'=> 'navigation', 'action'=>'create']) }}">Add</a>
                    </li>
                    <li>
                        <a href="{{ route('crud_route', ['controller'=> 'navigation', 'action'=>'index']) }}">Show</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">border_color</i>
                    <span>Posts</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route('crud_route', ['controller'=> 'post', 'action'=>'index']) }}">Show</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">border_color</i>
                    <span>Themes</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route('crud_route', ['controller'=> 'themes', 'action'=>'create']) }}">Add</a>
                    </li>
                    <li>
                        <a href="{{ route('crud_route', ['controller'=> 'themes', 'action'=>'index']) }}">Show</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">share</i>
                    <span>Categories</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route('crud_route', ['controller'=> 'categories', 'action'=>'create']) }}">Add</a>
                    </li>
                    <li>
                        <a href="{{ route('crud_route', ['controller'=> 'categories', 'action'=>'index']) }}">Show</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">photo_library</i>
                    <span>Gallery</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route('crud_route', ['controller'=> 'gallery', 'action'=>'index']) }}">Show</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">border_color</i>
                    <span>Questions</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route('crud_route', ['controller'=> 'questions', 'action'=>'create']) }}">Add</a>
                    </li>
                    <li>
                        <a href="{{ route('crud_route', ['controller'=> 'questions', 'action'=>'index']) }}">Show</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">border_color</i>
                    <span>Answers</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route('crud_route', ['controller'=> 'answers', 'action'=>'create']) }}">Add</a>
                    </li>
                    <li>
                        <a href="{{ route('crud_route', ['controller'=> 'answers', 'action'=>'index']) }}">Show</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">border_color</i>
                    <span>Dokumentacija</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route('crud_route', ['controller'=> 'answers', 'action'=>'index']) }}">Show</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2018 - 2019 <a href="javascript:void(0);">Admin - {{ session()->get('user')[0]->first_name." ".session()->get('user')[0]->last_name }}</a>.
        </div>
    </div>
    <!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->