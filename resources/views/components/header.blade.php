<div class="header">
	<div class="logo">
		<a href="{{ route('home') }}"><img src="{{ asset('/') }}images/logo.png" alt=" " /></a>
	</div>
	<div class="logo-right">
		<span class="menu"><img src="{{ asset('/') }}images/menu.png" alt=" "/></span>
		<ul class="nav1">
			@isset($menus)
				@foreach($menus as $menu)
					<li class="{{ $menu->li_class }}"><a href="{{ asset('/'.$menu->link) }}" class="{{ $menu->a_class }}">{{ $menu->menu }}<span>{{ $menu->opis }}</span></a></li>
				@endforeach
			@endisset
		</ul>
	</div>
	<div class="clearfix"> </div>
</div>