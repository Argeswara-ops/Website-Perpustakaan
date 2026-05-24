<div class="sidebar">
    <div class="navbar-brand mb-4" style="text-align: center;">Admin Panel</div>
    <a href="/" class="btn-outline" style="text-align: center; margin-bottom: 2rem; border-radius: 8px;">Visit Site</a>
    <a href="/admin/dashboard" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">Overview & Charts</a>
    <a href="/admin/banners" class="{{ request()->is('admin/banners*') ? 'active' : '' }}">Manage Banners</a>
    <a href="/admin/articles" class="{{ request()->is('admin/articles*') ? 'active' : '' }}">Manage Articles</a>
    <a href="/admin/books" class="{{ request()->is('admin/books*') ? 'active' : '' }}">Manage Books</a>
    <form action="/logout" method="POST" style="margin-top: auto; padding-top: 2rem;">
        @csrf
        <button class="btn btn-danger" style="width: 100%; border-radius: 8px;">Logout</button>
    </form>
</div>
