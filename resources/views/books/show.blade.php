@extends('layouts.app')

@section('title', $book->title . ' - LibroPia')

@section('content')
<div class="container" style="max-width: 1200px; margin: 0 auto; padding: 2rem;">
    <a href="/books" class="btn btn-outline" style="margin-bottom: 2rem; display: inline-block;">&larr; Back to Books</a>
    
    <div class="glass glass-panel" style="padding: 3rem; border-radius: 24px; display: flex; gap: 3rem; flex-wrap: wrap;">
        <div style="flex: 1; min-width: 300px;">
            <img src="{{ $book->cover_image }}" alt="{{ $book->title }}" style="width: 100%; border-radius: 16px; box-shadow: 0 20px 40px rgba(0,0,0,0.3);">
        </div>
        
        <div style="flex: 2; min-width: 300px; display: flex; flex-direction: column;">
            <h1 style="font-size: 3.5rem; margin-bottom: 0.5rem; color: var(--text-main); font-weight: 800; line-height: 1.1;">{{ $book->title }}</h1>
            <p style="font-size: 1.5rem; color: var(--primary); font-weight: 600; margin-bottom: 2rem;">By {{ $book->author }}</p>
            
            <div style="display: flex; gap: 1rem; margin-bottom: 2rem;">
                <span class="badge" style="background: rgba(16, 185, 129, 0.1); color: #10b981; padding: 0.5rem 1rem; border-radius: 999px; font-weight: bold;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline; margin-right:4px;"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                    {{ number_format($book->views) }} Views
                </span>
                
                @if($book->category)
                <span class="badge" style="background: rgba(99, 102, 241, 0.1); color: #6366f1; padding: 0.5rem 1rem; border-radius: 999px; font-weight: bold;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline; margin-right:4px;"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                    {{ $book->category }}
                </span>
                @endif
            </div>
            
            <div style="margin-bottom: 2rem;">
                <h3 style="margin-bottom: 1rem; color: var(--text-main);">Synopsis</h3>
                <p style="font-size: 1.1rem; line-height: 1.8; color: var(--text-muted); text-align: justify;">
                    {{ $book->description }}
                </p>
            </div>
            
            <div style="margin-top: auto; display: flex; gap: 1rem;">
                @if($book->file_path)
                    <a href="{{ $book->file_path }}" target="_blank" class="btn btn-primary" style="padding: 1rem 2rem; font-size: 1.1rem; border-radius: 12px; font-weight: bold;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline; margin-right:8px;"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
                        Read Book
                    </a>
                @endif
                
                @auth
                <form action="/user/favorite" method="POST" style="display: inline;">
                    @csrf
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <button type="submit" class="btn btn-outline" style="padding: 1rem 2rem; font-size: 1.1rem; border-radius: 12px; font-weight: bold; border-color: var(--secondary); color: var(--secondary);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline; margin-right:8px;"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>
                        Add to Favorites
                    </button>
                </form>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection
