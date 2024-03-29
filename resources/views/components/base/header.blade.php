<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed " >
    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
  </div>
    <div class="kt-header__topbar">
      <div class="kt-header__topbar-item kt-header__topbar-item--user">    
        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
          <div class="kt-header__topbar-user">
            <span class="kt-header__topbar-welcome kt-hidden-mobile">Hallo,
            </span>
            <span class="kt-header__topbar-username kt-hidden-mobile">{{ Auth::user()->name }}
            </span>
            <img class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success" alt="{{ Auth::user()->name }}" src="{{ Auth::user()->profile_photo_url }}" />
          </div>
        </div>
        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
          <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url({{ asset('master/default/assets/media/bg-1.jpg') }})">
            <div class="kt-user-card__avatar">
              <img class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success" alt="{{ Auth::user()->name }}" src="{{ Auth::user()->profile_photo_url }}" />
            </div>
            <div class="kt-user-card__name">
              {{ Auth::user()->name }}
            </div>
          </div>
          <div class="kt-notification">
            <a href="/user/profile" class="kt-notification__item">
              <div class="kt-notification__item-icon">
                <i class="flaticon2-calendar-3 kt-font-success">
                </i>
              </div>
              <div class="kt-notification__item-details">
					<div class="kt-notification__item-title kt-font-bold">
					My {{ __('Profile') }}
					</div>
					<div class="kt-notification__item-time">
					Edit Profile
					</div>
              </div>
			</a>
				<div class="kt-notification__custom">
					<form method="POST" action="{{ route('logout') }}">
						@csrf
						<div class="btn btn-label-brand btn-sm btn-bold">
							<a href="{{ route('logout') }}"
										onclick="event.preventDefault();
												this.closest('form').submit();">
									{{ __('Logout') }}
							</a>
						</div>
					</form>
				</div>
			</div> 
        </div>
      </div>
    </div>
  </div>