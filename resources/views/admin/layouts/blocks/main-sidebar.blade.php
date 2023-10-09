<div class="main-sidebar flush-menu">
    <div class="main-menu">
        <ul class="sidebar-menu scrollable">
            <li class="sidebar-item">
                <ul class="sidebar-link-group">
                    <li class="sidebar-dropdown-item">
                        <a href="{{ route('admin.dashboard') }}" class="sidebar-link"><span class="nav-icon"><i
                                    class="fa-light fa-grid-2"></i></span> <span class="sidebar-txt">Dashboard</span></a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a role="button" class="sidebar-link-group-title has-sub">Manage Item</a>
                <ul class="sidebar-link-group">

                    <li class="sidebar-dropdown-item">
                        <a role="button" class="sidebar-link has-sub" data-dropdown="itemDropdown"><span
                                class="nav-icon"><i class="fa-light fa-boxes"></i></span> <span
                                class="sidebar-txt">Products</span></a>
                        <ul class="sidebar-dropdown-menu" id="itemDropdown">
                            <li class="sidebar-dropdown-item"><a href="{{ route('admin.products.index') }}"
                                    class="sidebar-link">View Products</a></li>
                            <li class="sidebar-dropdown-item"><a href="{{ route('admin.products.create') }}"
                                    class="sidebar-link">Create Product</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a href="{{ route('admin.categories.manage') }}" class="sidebar-link"><span class="nav-icon"><i
                                    class="fa-light fa-layer-group"></i></span> <span
                                class="sidebar-txt">Categories</span></a>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a href="{{ route('admin.subcategories.manage') }}" class="sidebar-link"><span class="nav-icon"><i
                                    class="fa-light fa-layer-group"></i></span> <span
                                class="sidebar-txt">SubCategories</span></a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a role="button" class="sidebar-link-group-title has-sub">Transactions</a>
                <ul class="sidebar-link-group">

                    <li class="sidebar-dropdown-item">
                        <a role="button" class="sidebar-link has-sub" data-dropdown="item1Dropdown"><span
                                class="nav-icon"><i class="fa-light fa-cart-shopping-fast"></i></span> <span
                                class="sidebar-txt">Orders</span></a>
                        <ul class="sidebar-dropdown-menu" id="item1Dropdown">
                            <li class="sidebar-dropdown-item"><a href="{{ route('admin.orders.index') }}"
                                    class="sidebar-link">View Orders</a></li>
                            <li class="sidebar-dropdown-item"><a href="{{ route('admin.orders.create') }}"
                                    class="sidebar-link">Create Orders</a></li>
                        </ul>
                    </li>

                </ul>
            </li>
            <li class="sidebar-item">
                <a role="button" class="sidebar-link-group-title has-sub">All User</a>
                <ul class="sidebar-link-group">
                    <li class="sidebar-dropdown-item">
                        <a role="button" class="sidebar-link has-sub" data-dropdown="item2Dropdown"><span
                                class="nav-icon"><i class="fa-light fa-user-group"></i></span> <span
                                class="sidebar-txt">Customers</span></a>
                        <ul class="sidebar-dropdown-menu" id="item2Dropdown">
                            <li class="sidebar-dropdown-item"><a href="{{ route('admin.customers.index') }}"
                                    class="sidebar-link">View Customers</a></li>
                            <li class="sidebar-dropdown-item"><a href="{{ route('admin.customers.create') }}"
                                    class="sidebar-link">Create Customer</a></li>
                        </ul>
                    </li>

                </ul>
            </li>
        </ul>
    </div>
</div>
