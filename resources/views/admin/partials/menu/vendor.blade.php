<li class="menu-item mb-2">
    <small class="menu-header menu-header-text menu-toggle cursor-pointer text-secondary">
        <i class="bi bi-buildings-fill"></i> QUẢN LÝ ĐẠI
        LÝ</small>
    <ul class="menu-sub">

        {{-- VENDOR MANAGEMENT --}}
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link ps-3 non-item">
                <i class="bi bi-pin-map me-2"></i>
                <div>Điểm bán</div>
            </a>
        </li>

        {{-- VENDOR STAFF --}}
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link ps-3 non-item">
                <i class="bi bi-person-lines-fill me-2"></i>
                <div>Nhân viên</div>
            </a>
        </li>

        {{-- ORDERS MENU --}}
        <li class="menu-item {{ Route::is('admin.orders*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="non-item ps-3 menu-link menu-toggle">
                <i class="bi bi-receipt me-2"></i>
                <div data-i18n="Dashboards">Đơn hàng</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item  {{ Route::is('admin.orders.list.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.orders.list.index') }}" class="menu-link">
                        <div>Danh sách</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>

</li>
