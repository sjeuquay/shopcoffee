
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="px-4">
        <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo w-100 z-10">
                <img class="img-fluid object-fit-contain" src="{{ asset('img/logo-mozanio.png') }}" alt="">
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>



    <ul class="menu-inner py-1 z-1">
        <li class="menu-item mt-4 mb-2 {{ Route::is('admin.dashboard') ? 'active' : '' }} ">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="bi bi-columns-gap me-2"></i>
                <div>Tổng quan</div>
            </a>
        </li>

        {{-- ADMIN MENU - START --}}
        @include('admin.partials.menu.admin')
        {{-- ADMIN MENU - END --}}

        {{-- VENDOR MENU - START --}}
        @include('admin.partials.menu.vendor')
        {{-- VENDOR MENU - END --}}

        {{-- SYSTEM ADMIN - START --}}
        @include('admin.partials.menu.system')
        {{-- SYSTEM ADMIN - END --}}


        {{-- list --}}
        {{-- <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboards">menu list</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="admin" target="_blank" class="menu-link">
                        <div data-i18n="CRM">item</div>
                    </a>
                </li>
                <li class="menu-item active">
                    <a href="admin" class="menu-link">
                        <div data-i18n="Analytics">item</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="admin" target="_blank" class="menu-link">
                        <div data-i18n="eCommerce">item</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="admin" target="_blank" class="menu-link">
                        <div data-i18n="Logistics">item</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="admin" target="_blank" class="menu-link">
                        <div data-i18n="Academy">item</div>
                    </a>
                </li>
            </ul>
        </li> --}}


        {{-- <li class="menu-item">
            <a href="admin" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Button</div>
            </a>
        </li> --}}


    </ul>
</aside>
