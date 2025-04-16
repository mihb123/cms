<div id="kt_header" class="kt-header kt-grid kt-grid--ver  kt-header--fixed ">
	<div class="kt-header__brand kt-grid__item  " id="kt_header_brand" style="width:170px">
		<div class="kt-header__brand-logo">
			<a href="{{ url(config('backend.route')) }}">
				<img src="{{ asset('frontend/assets/images/logo.png') }}" alt="laravel" width="150px" class="logo">
			</a>
		</div>
	</div>
	<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
	<div class="kt-header__topbar">
		<div class="kt-header__topbar-item dropdown">
			<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
				<span class="kt-header__topbar-icon kt-header__topbar-icon--success"><i class="flaticon2-bell-alarm-symbol"></i></span>
				<span class="kt-hidden kt-badge kt-badge--danger"></span>
			</div>
			<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">

			</div>
		</div>

		<div class="kt-header__topbar-item kt-header__topbar-item--user">
			<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
				<span class="kt-hidden kt-header__topbar-welcome">Hi,</span>
				<span class="kt-hidden kt-header__topbar-username">{{ Auth::user()->name }}</span>
				<?php
				$userAvatar = '';
				?>
				<img src="{{ $userAvatar }}" class="kt-hidden" alt="User Image" />
				<span class="kt-header__topbar-icon kt-hidden-"><i class="flaticon2-user-outline-symbol"></i></span>
			</div>
			<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">

				<!--begin: Head -->
				<div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url({{ asset('cms/theme_metronic/media/misc/bg-1.jpg') }})">
					<div class="kt-user-card__avatar">
						<img class="kt-hidden" alt="Pic" src="{{ $userAvatar }}" />
						<span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">
							<img src="{{ $userAvatar }}" />
						</span>
					</div>
					<div class="kt-user-card__name">
						{{ Auth::user()->name }}
					</div>
				</div>

				<!--end: Head -->

				<!--begin: Navigation -->
				<div class="kt-notification">
					<a href="" class="kt-notification__item">
						<div class="kt-notification__item-icon">
							<i class="flaticon2-calendar-3 kt-font-success"></i>
						</div>
						<div class="kt-notification__item-details">
							<div class="kt-notification__item-title kt-font-bold">
								My Profile
							</div>
							<div class="kt-notification__item-time">
								Account settings and more
							</div>
						</div>
					</a>
					<div class="kt-notification__custom kt-space-between">
						<a href="{{ route(config('backend.route') . '.logout') }}" class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>
					</div>
				</div>

				<!--end: Navigation -->
			</div>
		</div>
	</div>
</div>