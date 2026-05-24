@extends('layouts.app')

@section('title', 'User Dashboard')

@section('content')
<div class="dashboard-layout">
    <div class="sidebar">
        <div class="navbar-brand mb-4" style="text-align: center;">LibroPia</div>
        <a href="/" class="btn-outline" style="text-align: center; margin-bottom: 2rem;">Back to Home</a>
        <a href="/user/dashboard" class="active">My Favorites</a>
        <a href="/user/profile">Profile Settings</a>
        <form action="/logout" method="POST" style="margin-top: auto; padding-top: 2rem;">
            @csrf
            <button class="btn btn-danger" style="width: 100%;">Logout</button>
        </form>
    </div>
    
    <div class="main-content">
        <h2>My Favorite Books</h2>
        <p class="text-muted mb-4">Books you have saved to read later.</p>
        
        <div class="grid grid-cols-3" style="padding: 0;">
            @forelse($favorites as $fav)
            <div class="card glass">
                <img src="{{ $fav->book->cover_image }}" alt="{{ $fav->book->title }}" class="card-img" style="height: 200px;">
                <div class="card-content">
                    <div class="card-title">{{ $fav->book->title }}</div>
                    <p class="card-desc">{{ Str::limit($fav->book->description, 60) }}</p>
                    <form action="/user/favorite/remove" method="POST">
                        @csrf
                        <input type="hidden" name="favorite_id" value="{{ $fav->id }}">
                        <button class="btn btn-outline" style="width: 100%; padding: 0.5rem; font-size: 0.8rem; color: #e11d48; border-color: #e11d48;">Remove</button>
                    </form>
                </div>
            </div>
            @empty
            <div class="glass glass-panel" style="grid-column: 1 / -1; text-align: center;">
                <p>You haven't added any books to your favorites yet.</p>
                <a href="/#books" class="btn btn-primary mt-4">Browse Books</a>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
