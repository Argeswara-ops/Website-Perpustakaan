<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Library App')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    @if(!request()->is('admin*') && !request()->is('user*'))
    <nav class="navbar glass">
        <div class="navbar-left">
            <a href="/" class="navbar-brand" style="display: flex; align-items: center; gap: 0.5rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="url(#logo-gradient)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <defs>
                        <linearGradient id="logo-gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="var(--primary)" />
                            <stop offset="100%" stop-color="var(--secondary)" />
                        </linearGradient>
                    </defs>
                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                </svg>
                <span>LibroPia</span>
            </a>
        </div>
        <div class="nav-links">
            <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a>
            <a href="/books" class="{{ request()->is('books*') ? 'active' : '' }}">Books</a>
            <a href="/articles" class="{{ request()->is('articles*') ? 'active' : '' }}">Articles</a>
            <a href="/about" class="{{ request()->is('about') ? 'active' : '' }}">Tentang</a>
            <a href="/authors" class="{{ request()->is('authors') ? 'active' : '' }}">Penulis</a>
        </div>
        <div class="nav-actions">
            <button id="theme-toggle" class="btn-icon" aria-label="Toggle Theme">
                <svg id="moon-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/></svg>
                <svg id="sun-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:none;"><circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="m4.93 4.93 1.41 1.41"/><path d="m17.66 17.66 1.41 1.41"/><path d="M2 12h2"/><path d="M20 12h2"/><path d="m6.34 17.66-1.41 1.41"/><path d="m19.07 4.93-1.41 1.41"/></svg>
            </button>
            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="/admin/dashboard" class="btn btn-outline">Admin Panel</a>
                @else
                    <a href="/user/dashboard" class="btn btn-outline">Dashboard</a>
                @endif
                <form action="/logout" method="POST" style="display:inline;">
                    @csrf
                    <button class="btn btn-danger">Logout</button>
                </form>
            @else
                <a href="/login" class="btn btn-outline">Login</a>
                <a href="/register" class="btn btn-primary">Register</a>
            @endauth
        </div>
    </nav>
    @endif

    <main>
        @yield('content')
    </main>

    @stack('scripts')
    <script>
        const themeToggle = document.getElementById('theme-toggle');
        const root = document.documentElement;
        const moonIcon = document.getElementById('moon-icon');
        const sunIcon = document.getElementById('sun-icon');
        
        // Check for saved theme
        const currentTheme = localStorage.getItem('theme') || 'dark';
        if (currentTheme === 'light') {
            root.setAttribute('data-theme', 'light');
            if(moonIcon) moonIcon.style.display = 'none';
            if(sunIcon) sunIcon.style.display = 'block';
        }
        
        if (themeToggle) {
            themeToggle.addEventListener('click', () => {
                let theme = root.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
                root.setAttribute('data-theme', theme);
                localStorage.setItem('theme', theme);
                
                if (theme === 'light') {
                    moonIcon.style.display = 'none';
                    sunIcon.style.display = 'block';
                } else {
                    moonIcon.style.display = 'block';
                    sunIcon.style.display = 'none';
                }
            });
        }
    </script>

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/6287851697466?text=Halo%20Admin,%20saya%20menemukan%20error%20pada%20website%20LibroPia." target="_blank" class="floating-wa" style="position: fixed; bottom: 30px; right: 30px; padding: 0.75rem 1.5rem; border-radius: 50px; display: flex; align-items: center; gap: 0.75rem; text-decoration: none; z-index: 1000; box-shadow: 0 8px 25px rgba(37, 211, 102, 0.4); background: #25D366; color: white; transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275); font-weight: 700;">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="currentColor" stroke="none">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
        <span style="font-size: 1rem;">Hubungi Admin</span>
    </a>

    <style>
        @keyframes pulse-wa {
            0% { transform: scale(1); box-shadow: 0 8px 25px rgba(37, 211, 102, 0.4); }
            50% { transform: scale(1.05); box-shadow: 0 8px 35px rgba(37, 211, 102, 0.6); }
            100% { transform: scale(1); box-shadow: 0 8px 25px rgba(37, 211, 102, 0.4); }
        }

        .floating-wa {
            animation: pulse-wa 2s infinite ease-in-out;
        }

        .floating-wa:hover {
            transform: scale(1.1) translateY(-5px) !important;
            animation: none;
            background: #20ba5a !important;
        }
    </style>
</body>
</html>
