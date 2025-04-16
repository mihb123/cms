<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
            <ul class="kt-menu__nav ">
                @foreach ($menus as $route => $menu)
                    @can($menu['can'])
                        <li class="kt-menu__item @isset($menu['items']) kt-menu__item--submenu @else  @endif" aria-haspopup="true" @isset($menu['items']) data-ktmenu-submenu-toggle="hover" @else  @endif>
                            @if($menu['type'] == 'item')
                                <a href="{{ url(config('backend.route') . $route) }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-icon {{ $menu['icon'] }}"></i>
                                    <span class="kt-menu__link-text">{{ $menu['text'] }}</span>
                                </a>
                            @else
                                <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                                    <i class="kt-menu__link-icon {{ $menu['icon'] }}"></i>
                                    <span class="kt-menu__link-text">{{ $menu['text'] }}</span>
                                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                                </a>
                            @endif

                            @isset($menu['items'])
                                <div class="kt-menu__submenu">
                                    <span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">
                                        @foreach ($menu['items'] as $url => $item)
                                            @can($menu['can'])
                                                <li class="kt-menu__item" aria-haspopup="true" data-module="{{$url}}" data-url="{{ url(config('backend.route') . $url) }}">
                                                    <div  class="kt-menu__link">
                                                        <i class="kt-menu__link-bullet {{ $item['icon'] }}"><span></span></i>
                                                        <span class="kt-menu__link-text">{{ $item['text'] }}</span>
                                                    </div>
                                                </li>
                                            @end
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </li>
                    @end
                @endforeach
            </ul>
        </div>
    </div>
</div>


