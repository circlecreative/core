    <!-- sidebar @s -->
    <div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
        <div class="nk-sidebar-element nk-sidebar-head">
            <div class="nk-sidebar-brand">
                <a href="{{ url('/') }}" class="logo-link nk-sidebar-logo">
                    <img class="logo-light logo-img" src="{{ config('global.logo_rectangle') }}"
                         srcset="{{ config('global.logo_rectangle') }} 2x" alt="logo">
                    <img class="logo-dark logo-img" src="{{ config('global.logo_rectangle_dark') }}"
                         srcset="{{ config('global.logo_rectangle_dark') }} 2x" alt="logo-dark">
                </a>
            </div>
            <div class="nk-menu-trigger mr-n2">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu">
                    <em class="icon ni ni-arrow-left"></em>
                </a>
            </div>
        </div><!-- .nk-sidebar-element -->
        <div class="nk-sidebar-element">
            <div class="nk-sidebar-content">
                <div class="nk-sidebar-menu" data-simplebar>
                    <ul class="nk-menu">
                        @foreach($navigations as $nav)
                            <li class="nk-menu-heading">
                                <h6 class="overline-title text-primary-alt">{{ $nav['name'] }}</h6>
                            </li><!-- .nk-menu-heading -->
                            @if($nav['items'])
                                @foreach($nav['items'] as $item)
                                    <li class="nk-menu-item {{ empty($item['child']) ? 'has-sub' : null }}">
                                        <a href="{{ \Illuminate\Support\Facades\Route::has($item['href']) ? route($item['href']) : '#' }}"
                                           class="nk-menu-link {{ isset($item['child']) ? 'nk-menu-toggle' : null }}">
                                            <span class="nk-menu-icon"><em class="{{ $item['icon'] }}"></em></span>
                                            <span class="nk-menu-text">{{ $item['name'] }}</span>
                                        </a>


                                        @if(isset($item['child']))

                                            <ul class="nk-menu-sub">
                                                @foreach($item['child'] as $menu)
                                                    <li class="nk-menu-item">
                                                        <a href="{{ \Illuminate\Support\Facades\Route::has($menu['href']) ? route($menu['href']) : '#' }}"
                                                           class="nk-menu-link">
                                                                <span class="nk-menu-icon">
                                                                    <em class="{{ $menu['icon'] }}"></em>
                                                                </span>
                                                            <span class="nk-menu-text">{{ $menu['name'] }}</span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul><!-- .nk-menu-sub -->
                                        @endif
                                    </li><!-- .nk-menu-item -->
                                @endforeach
                            @endif
                        @endforeach
                    </ul><!-- .nk-menu -->
                </div><!-- .nk-sidebar-menu -->
            </div><!-- .nk-sidebar-content -->
        </div><!-- .nk-sidebar-element -->
    </div>
    <!-- sidebar @e -->
