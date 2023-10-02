<!-- main-sidebar -->
		<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<aside class="app-sidebar sidebar-scroll">
			<div class="main-sidebar-header active">
                <a class="desktop-logo logo-light active" href="{{ route('dashboard') }}"><p class="main-logo"></p></a>
                <a class="desktop-logo logo-dark active" href="{{ route('dashboard') }}"></a>
                <a class="logo-icon mobile-logo icon-light active" href="{{ route('dashboard') }}"></a>
                <a class="logo-icon mobile-logo icon-dark active" href="{{ route('dashboard') }}"></a>
			</div>
			<div class="main-sidemenu">
				<div class="app-sidebar__user clearfix">
					<div class="dropdown user-pro-body">
						<div class="">
							<img alt="user-img" class="avatar avatar-xl brround" src="{{URL::asset('storage/img/' . \Illuminate\Support\Facades\Auth::user()->image)}}"><span class="avatar-status profile-status bg-green"></span>
						</div>
						<div class="user-info">
							<h4 class="font-weight-semibold mt-3 mb-0">{{Auth::user()->name}}</h4>
							<span class="mb-0 text-muted">{{Auth::user()->email}}</span>
						</div>
					</div>
				</div>
				<ul class="side-menu">
					<li class="side-item side-item-category">{{__('admin/layouts/sidebar.dashboard')}}</li>
					<li class="slide">
						<a class="side-menu__item {{request()->route()->named(['dashboard']) ? 'active' : ""}}" href="{{ route('dashboard') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/><path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/></svg><span class="side-menu__label">{{__('admin/layouts/sidebar.dashboard')}}</span></a>
					</li>
					<li class="side-item side-item-category">{{__('admin/layouts/sidebar.categories')}}</li>
					<li class="slide">
						<a class="side-menu__item {{request()->route()->named(['categories.index']) ? 'active' : ""}}" href="{{route('categories.index')}}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M5 5h15v3H5zm12 5h3v9h-3zm-7 0h5v9h-5zm-5 0h3v9H5z" opacity=".3"></path><path d="M20 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h15c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM8 19H5v-9h3v9zm7 0h-5v-9h5v9zm5 0h-3v-9h3v9zm0-11H5V5h15v3z"></path></svg><span class="side-menu__label">{{__('admin/layouts/sidebar.categories')}}</span></a>
					</li>
                    <li class="side-item side-item-category">{{__('admin/layouts/sidebar.location')}}</li>
                    <li class="slide">
                        <a class="side-menu__item {{request()->route()->named(['zones.index','cities.index']) ? 'active' : ""}}" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 4C9.24 4 7 6.24 7 9c0 2.85 2.92 7.21 5 9.88 2.11-2.69 5-7 5-9.88 0-2.76-2.24-5-5-5zm0 7.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" opacity=".3"/><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zM7 9c0-2.76 2.24-5 5-5s5 2.24 5 5c0 2.88-2.88 7.19-5 9.88C9.92 16.21 7 11.85 7 9z"/><circle cx="12" cy="9" r="2.5"/></svg><span class="side-menu__label">{{__('admin/layouts/sidebar.location')}}</span><i class="angle fe fe-chevron-down"></i></a>
                        <ul class="slide-menu">
                            <li><a class="slide-item" href="{{ route('zones.index') }}">{{__('admin/layouts/sidebar.zones')}}</a></li>
                            <li><a class="slide-item" href="{{ route('cities.index') }}">{{__('admin/layouts/sidebar.cities')}}</a></li>
                        </ul>
                    </li>
					<li class="side-item side-item-category">{{__('admin/layouts/sidebar.attributes')}}</li>
					<li class="slide">
						<a class="side-menu__item {{request()->route()->named(['attributes.index','attributes.show']) ? 'active' : ""}}" href="{{route('attributes.index')}}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M5 5h4v4H5zm10 10h4v4h-4zM5 15h4v4H5zM16.66 4.52l-2.83 2.82 2.83 2.83 2.83-2.83z" opacity=".3"></path><path d="M16.66 1.69L11 7.34 16.66 13l5.66-5.66-5.66-5.65zm-2.83 5.65l2.83-2.83 2.83 2.83-2.83 2.83-2.83-2.83zM3 3v8h8V3H3zm6 6H5V5h4v4zM3 21h8v-8H3v8zm2-6h4v4H5v-4zm8-2v8h8v-8h-8zm6 6h-4v-4h4v4z"></path></svg><span class="side-menu__label">{{__('admin/layouts/sidebar.attributes')}}</span></a>
					</li>
					<li class="side-item side-item-category">{{__('admin/layouts/sidebar.real_estate')}}</li>
					<li class="slide">
						<a class="side-menu__item {{request()->route()->named(['aqars.index','aqars.create','aqars.edit','aqars.show']) ? 'active' : ""}}" href="{{ route('aqars.index') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3"></path><path d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"></path></svg><span class="side-menu__label">{{__('admin/layouts/sidebar.real_estate')}}</span></a>
					</li>
				</ul>
			</div>
		</aside>
<!-- main-sidebar -->
