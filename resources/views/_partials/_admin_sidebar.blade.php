<ul class="nav flex-column border-right">
    <li class="nav-item py-1 border-bottom {{ Request::is('admin/options') ? 'bg-secondary' : '' }}">
        <a class="nav-link {{ Request::is('admin/options') ? 'text-light' : 'text-dark' }}" href="{{ route('options') }}">Настройки</a>
    </li>
    <li class="nav-item py-1 border-bottom {{ Request::is('admin/category') ? 'bg-secondary' : '' }}">
        <a class="nav-link {{ Request::is('admin/category') ? 'text-light' : 'text-dark' }}" href="{{ route('category.index') }}">Categories</a>
    </li>
    <li class="nav-item py-1 border-bottom {{ Request::is('admin/product') ? 'bg-secondary' : '' }}">
        <a class="nav-link {{ Request::is('admin/product') ? 'text-light' : 'text-dark' }}" href="{{ route('product.index') }}">Products</a>
    </li>
    <li class="nav-item py-1 border-bottom {{ Request::is('admin/user') ? 'bg-secondary' : '' }}">
        <a class="nav-link {{ Request::is('admin/user') ? 'text-light' : 'text-dark' }}" href="{{ route('user.index') }}">Users</a>
    </li>
</ul>