<div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-dark">
	<div class="app-brand demo">
		<a href="{{ route('admin.home') }}" style="margin: auto;">
			<img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
		</a>
	</div>
	<ul class="sidenav-inner py-1">
		<li class="sidenav-item {{ request()->is('admin/users') ? 'active' : '' }}">
			<a href="{{ route('admin.users.index') }}" class="sidenav-link">
				<i class="sidenav-icon ion ion-md-people"></i>
				<div>{{ __('admin.users.title') }}</div>
			</a>
		</li>
	</ul>
</div>