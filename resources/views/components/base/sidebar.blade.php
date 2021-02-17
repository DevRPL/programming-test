<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
      <!-- begin:: Aside -->
      <button class="kt-aside-close " id="kt_aside_close_btn">
        <i class="la la-close">
        </i>
      </button>
      <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
        <!-- begin:: Aside -->
            @include('components.base.logo_nav')
        <!-- end:: Aside -->	
        <!-- begin:: Aside Menu -->
        <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
          <div id="kt_aside_menu" class="kt-aside-menu" data-ktmenu-vertical="1" data-ktmenu-scroll="1" 
          data-ktmenu-dropdown-timeout="500">		
            <ul class="kt-menu__nav ">
				<li class="kt-menu__item" aria-haspopup="true" >
				<a href="{{ route('master.dashboard.index') }}" class="kt-menu__link ">
					<i class="kt-menu__link-icon flaticon-dashboard">
					</i>
					<span class="kt-menu__link-text">Dashboard
					</span>
					</a>
				</li>
				<li class="kt-menu__section ">
					<h4 class="kt-menu__section-text">Employees</h4>
					<i class="kt-menu__section-icon flaticon-more-v2">
					</i>
				</li>
				<li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
					<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
					<i class="kt-menu__link-icon flaticon-users"></i>
					<span class="kt-menu__link-text">Master Employee</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
						<div class="kt-menu__submenu " kt-hidden-height="200" style="">
						<span class="kt-menu__arrow"></span>
						<ul class="kt-menu__subnav">
						<li class="kt-menu__item kt-menu__item--parent" aria-haspopup="true">
							<span class="kt-menu__link"><span class="kt-menu__link-text">General</span></span>
						</li>
						@can('employees-display')
						<li class="kt-menu__item " aria-haspopup="true">
							<a href="{{ route('master.employees.index') }}" class="kt-menu__link ">
							<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
							<span></span>
							</i>
							<span class="kt-menu__link-text">Employees</span></a>
						</li>
						@endcan
						@can('departements-display')
						<li class="kt-menu__item " aria-haspopup="true">
							<a href="{{ route('master.departements.index') }}" class="kt-menu__link ">
							<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
							<span></span>
							</i>
							<span class="kt-menu__link-text">Departements</span></a>
						</li>
						@endcan
						</ul>
					</div>
				</li>
				@can('users-display')
				<li class="kt-menu__section ">
					<h4 class="kt-menu__section-text">Settings</h4>
					<i class="kt-menu__section-icon flaticon-more-v2">
					</i>
				</li>
				@endcan
				@can('users-display')
				<li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
				<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
				<i class="kt-menu__link-icon flaticon-folder-1"></i>
				<span class="kt-menu__link-text">Management Users</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
					<div class="kt-menu__submenu " kt-hidden-height="200" style="">
					<span class="kt-menu__arrow"></span>
					<ul class="kt-menu__subnav">
					<li class="kt-menu__item kt-menu__item--parent" aria-haspopup="true">
						<span class="kt-menu__link"><span class="kt-menu__link-text">General</span></span>
					</li>
					@can('roles-display')
						<li class="kt-menu__item " aria-haspopup="true">
							<a href="{{ route('master.roles.index') }}" class="kt-menu__link ">
							<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
							<span></span>
							</i>
							<span class="kt-menu__link-text">Roles</span></a>
						</li>
					@endcan
					@can('permissions-display')
						<li class="kt-menu__item " aria-haspopup="true">
							<a href="{{ route('master.permissions.create') }}" class="kt-menu__link ">
							<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
							<span></span>
							</i>
							<span class="kt-menu__link-text">Permisssion</span></a>
						</li>
					@endcan
					@can('users-display')
						<li class="kt-menu__item " aria-haspopup="true">
							<a href="{{ route('master.users.index') }}" class="kt-menu__link ">
							<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
							<span></span>
							</i>
							<span class="kt-menu__link-text">Users</span></a>
						</li>
					@endcan
					</ul>
				</div>
			</li>
			@endcan
            </ul>
        </div>
    </div>
</div>