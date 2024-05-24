<li class="menu-item mb-2 {{ optional($admin)->role_id > 2 ? "d-none" : "" }}">
    <small
        class="menu-header menu-header-text menu-toggle cursor-pointer text-secondary"
    >
        <i class="bi bi-shield-lock-fill"></i>
        SYSTEM ADMIN
    </small>
    <ul class="menu-sub">
        {{-- NORMAL ITEM --}}
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link ps-3 non-item">
                <i class="bi bi-key me-2"></i>
                <div>Đặt lại mật khẩu</div>
            </a>
        </li>

        {{-- MENU TEMPLATE --}}
        {{--
            <li class="menu-item {{ Route::is('admin.orders*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="non-item ps-3 menu-link menu-toggle">
            <i class="bi bi-receipt me-2"></i>
            <div data-i18n="Dashboards">Đơn hàng</div>
            </a>
            <ul class="menu-sub">
            <li class="menu-item">
            <a href="{{ route('admin.orders.index') }}" class="menu-link">
            <div>Danh sách</div>
            </a>
            </li>
            <li class="menu-item">
            <a href="{{ route('admin.orderdetail.index') }}" class="menu-link">
            <div>Chi tiết</div>
            </a>
            </li>
            </ul>
            </li>
        --}}
    </ul>
</li>
