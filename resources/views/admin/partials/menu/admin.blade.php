<li class="menu-item open {{ optional($admin)->role_id > 2 ? "d-none" : "" }}">
    <small
        class="menu-header menu-header-text menu-toggle cursor-pointer text-secondary"
    >
        <i class="bi bi-person-fill-gear"></i>
        QUẢN TRỊ VIÊN
    </small>
    <ul class="menu-sub">
        {{-- USER --}}
        <li
            class="menu-item {{ Route::is("admin.user*") ? "active open" : "" }}"
        >
            <a
                href="javascript:void(0);"
                class="non-item ps-3 menu-toggle menu-link"
                style=""
            >
                <i class="bi bi-people me-2"></i>
                <div>Người dùng</div>
            </a>
            <ul class="menu-sub">
                {{-- User List --}}
                <x-layout.sub-menu-item
                    :routeUrl="route('admin.user.list.index')"
                >
                    Danh sách
                </x-layout.sub-menu-item>

                {{-- User Role --}}
                <x-layout.sub-menu-item
                    :routeUrl="route('admin.user.role.index')"
                >
                    Vai trò
                </x-layout.sub-menu-item>

                {{-- Role Permisson --}}
                <x-layout.sub-menu-item
                    :routeUrl="route('admin.user.rolePermission.index')"
                >
                    Quyền hạn vai trò
                </x-layout.sub-menu-item>

                {{-- User Reset Password --}}
                <x-layout.sub-menu-item
                    :routeUrl="route('admin.user.resetpassword')"
                >
                    Đặt lại mật khẩu
                </x-layout.sub-menu-item>

                {{-- User Device --}}
                <x-layout.sub-menu-item
                    :routeUrl="route('admin.user.device.index')"
                >
                    Thiết bị
                </x-layout.sub-menu-item>
            </ul>
        </li>

        {{-- VENDOR --}}
        <x-layout.item :routeUrl="route('admin.vendor.index')">
            <i class="bi bi-shop me-2"></i>
            <div>Đại lý</div>
        </x-layout.item>

        {{-- VENDOR SELLING SPOT --}}
        <x-layout.item routeUrl="javascript:void(0)">
            <i class="bi bi-pin-map me-2"></i>
            <div>Điểm bán</div>
        </x-layout.item>

        {{-- STAFF --}}
        <x-layout.item routeUrl="javascript:void(0)">
            <i class="bi bi-person-lines-fill me-2"></i>
            <div>Nhân viên</div>
        </x-layout.item>

        {{-- EQUIPMENT MENU --}}
        <li
            class="menu-item {{ Route::is("admin.equipment*") ? "active open" : "" }}"
        >
            <a
                href="javascript:void(0);"
                class="non-item ps-3 menu-link menu-toggle"
            >
                <i class="bi bi-gpu-card me-2"></i>
                <div>Trang thiết bị</div>
            </a>
            <ul class="menu-sub">
                {{-- EQUIPMENT LIST --}}
                <x-layout.sub-menu-item
                    :routeUrl="route('admin.equipment.index')"
                >
                    Danh sách
                </x-layout.sub-menu-item>

                {{-- EQUIPMENT BRANCH --}}
                <x-layout.sub-menu-item
                    :routeUrl="route('admin.equipment.branch.index')"
                >
                    Hãng thiết bị
                </x-layout.sub-menu-item>
            </ul>
        </li>

        {{-- CATEGORY LIST --}}
        <x-layout.item :routeUrl="route('admin.category.list.index')">
            <i class="bi bi-shop me-2"></i>
            <div>Danh mục</div>
        </x-layout.item>

        {{-- PRODUCT MENU --}}
        <li
            class="menu-item {{ Route::is("admin.products*") ? "active open" : "" }}"
        >
            <a
                href="javascript:void(0);"
                class="non-item ps-3 menu-link menu-toggle"
            >
                <i class="bi bi-cup-straw me-2"></i>
                <div>Sản phẩm</div>
            </a>
            <ul class="menu-sub">
                {{-- Product List --}}
                <x-layout.sub-menu-item
                    :routeUrl="route('admin.products.list.index')"
                >
                    Danh sách
                </x-layout.sub-menu-item>

                {{-- Size Type --}}
                <x-layout.sub-menu-item
                    :routeUrl="route('admin.products.sizetype.index')"
                >
                    Loại kích cỡ
                </x-layout.sub-menu-item>

                {{-- Weight Type --}}
                <x-layout.sub-menu-item
                    :routeUrl="route('admin.products.weightType.index')"
                >
                    Loại trọng lượng
                </x-layout.sub-menu-item>

                {{-- Product Image --}}
                <x-layout.sub-menu-item
                    :routeUrl="route('admin.products.image.index')"
                >
                    Ảnh
                </x-layout.sub-menu-item>

                {{-- Ingredient --}}
                <x-layout.sub-menu-item
                    :routeUrl="route('admin.products.ingredients.index')"
                >
                    Nguyên liệu
                </x-layout.sub-menu-item>

                {{-- Product related --}}
                <x-layout.sub-menu-item
                    :routeUrl="route('admin.products.related.index')"
                >
                    Liên quan
                </x-layout.sub-menu-item>
            </ul>
        </li>

        {{-- ORDERS MENU --}}
        <li
            class="menu-item {{ Route::is("admin.orders*") ? "active open" : "" }}"
        >
            <a
                href="javascript:void(0);"
                class="non-item ps-3 menu-link menu-toggle"
            >
                <i class="bi bi-receipt me-2"></i>
                <div>Đơn hàng</div>
            </a>
            <ul class="menu-sub">
                {{-- Order List --}}
                <x-layout.sub-menu-item
                    :routeUrl="route('admin.orders.list.index')"
                >
                    Danh sách
                </x-layout.sub-menu-item>

                {{-- Order List --}}
                <x-layout.sub-menu-item
                    :routeUrl="route('admin.orders.detail.index')"
                >
                    Chi tiết
                </x-layout.sub-menu-item>
            </ul>
        </li>

        {{-- Contact --}}
        <x-layout.item routeUrl="javascript:void(0)">
            <i class="bi bi-headset me-2"></i>
            <div>Liên hệ</div>
        </x-layout.item>

        {{-- SETTING MENU --}}
        <li
            class="menu-item {{ Route::is("admin.setting*") ? "active open" : "" }}"
        >
            <a
                href="javascript:void(0);"
                class="non-item ps-3 menu-link menu-toggle"
            >
                <i class="bi bi-gear me-2"></i>
                <div>Cài đặt</div>
            </a>
            <ul class="menu-sub">
                {{-- VENDOR TYPE --}}
                <x-layout.sub-menu-item
                    :routeUrl="route('admin.setting.vendortype.index')"
                >
                    Loại đại lý
                </x-layout.sub-menu-item>

                {{-- CONTROLLER ERROR CODE --}}
                <x-layout.sub-menu-item
                    :routeUrl="route('admin.setting.errorcode.index')"
                >
                    Mã lỗi
                </x-layout.sub-menu-item>

                {{-- CONTROLLER SEQUENCE --}}
                <x-layout.sub-menu-item
                    :routeUrl="route('admin.setting.sequence.index')"
                >
                    Trình tự
                </x-layout.sub-menu-item>

                {{-- STATUS --}}
                <x-layout.sub-menu-item
                    :routeUrl="route('admin.setting.status.index')"
                >
                    Trạng thái
                </x-layout.sub-menu-item>

                {{-- CURRENCY --}}
                <x-layout.sub-menu-item
                    :routeUrl="route('admin.setting.currency.index')"
                >
                    Tiền tệ
                </x-layout.sub-menu-item>

                {{-- PAYMENT METHOD --}}
                <x-layout.sub-menu-item
                    :routeUrl="route('admin.setting.paymentmethod.index')"
                >
                    Phương thức thanh toán
                </x-layout.sub-menu-item>

                {{-- Delivery Method --}}
                <x-layout.sub-menu-item
                    :routeUrl="route('admin.setting.deliverymethod.index')"
                >
                    Phương thức vận chuyển
                </x-layout.sub-menu-item>

                {{-- COUNTRY CODE --}}
                <x-layout.sub-menu-item
                    :routeUrl="route('admin.setting.countrycode.index')"
                >
                    Mã quốc gia
                </x-layout.sub-menu-item>

                {{-- STORE PARAMETER --}}
                <x-layout.sub-menu-item
                    :routeUrl="route('admin.setting.storeparameter.index')"
                >
                    Tham số cửa hàng
                </x-layout.sub-menu-item>

                {{-- STORE SETTING --}}
                <x-layout.sub-menu-item
                    :routeUrl="route('admin.setting.storesetting.index')"
                >
                    Cài đặt cửa hàng
                </x-layout.sub-menu-item>

                {{-- STATIC BLOCK --}}
                <x-layout.sub-menu-item
                    :routeUrl="route('admin.setting.staticblock.index')"
                >
                    Static Blocks
                </x-layout.sub-menu-item>
            </ul>
        </li>

        {{-- Slider --}}
        <x-layout.item :routeUrl="route('admin.promotion.index')">
            <i class="bi bi-shop me-2"></i>
            <div>Khuyến mãi</div>
        </x-layout.item>
        {{-- Slider --}}
        <x-layout.item :routeUrl="route('admin.sliders.index')">
            <i class="bi bi-shop me-2"></i>
            <div>Slider</div>
        </x-layout.item>
    </ul>
</li>
