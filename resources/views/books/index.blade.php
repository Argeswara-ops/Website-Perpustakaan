@extends('layouts.app')

@section('title', 'Search Books - LibroPia')

@section('content')
<div class="container" style="max-width: 1200px; margin: 0 auto; padding: 2rem;">
    <div class="glass glass-panel mb-4" style="padding: 2rem 3rem; border-radius: 16px; display: flex; flex-direction: column; gap: 1rem; width: 100%; margin: 0 auto 2rem auto;">
        <form action="/books" method="GET" style="display: flex; gap: 1rem; flex-wrap: wrap; align-items: center; width: 100%;">
            <div style="position: relative; flex: 3; min-width: 250px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: var(--text-muted);"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                <input type="text" name="q" id="interactive-search" value="{{ request('q') }}" placeholder="Search title or author..." class="form-control" style="width: 100%; padding: 0.75rem 1rem 0.75rem 2.5rem; border-radius: 8px; border: 1px solid var(--glass-border); background: var(--input-bg); color: var(--text-main); height: 48px;">
            </div>
            
            <select name="category" class="form-control" style="flex: 1; min-width: 150px; padding: 0.75rem 1rem; border-radius: 8px; border: 1px solid var(--glass-border); background: var(--input-bg); color: var(--text-main); height: 48px;">
                <option value="">All Categories</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                @endforeach
            </select>

            <select name="sort" class="form-control" style="flex: 1; min-width: 150px; padding: 0.75rem 1rem; border-radius: 8px; border: 1px solid var(--glass-border); background: var(--input-bg); color: var(--text-main); height: 48px;">
                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Newest First</option>
                <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Most Popular</option>
            </select>

            <button type="submit" class="btn btn-primary" style="border-radius: 8px; padding: 0.75rem 2rem; font-weight: bold; height: 48px;">Filter</button>
        </form>
    </div>

    @if(request('q') || request('category'))
        <h3 class="mb-4 text-muted">Results for "{{ request('q') ?: 'All' }}" {{ request('category') ? 'in ' . request('category') : '' }}</h3>
    @endif

    <div class="grid grid-cols-3">
        @forelse($books as $book)
        <div class="card glass">
            <div style="position: relative;">
                <img src="{{ $book->cover_image }}" alt="{{ $book->title }}" style="width: 100%; height: 250px; object-fit: cover; border-radius: 12px 12px 0 0;">
                @if($book->category)
                    <span style="position: absolute; top: 10px; right: 10px; background: rgba(0,0,0,0.6); color: white; padding: 0.25rem 0.75rem; border-radius: 999px; font-size: 0.8rem; backdrop-filter: blur(4px);">{{ $book->category }}</span>
                @endif
            </div>
            <div class="card-body" style="padding: 1.5rem; display: flex; flex-direction: column; height: 100%;">
                <h3 style="font-size: 1.25rem; margin-bottom: 0.5rem; color: var(--text-main);">{{ $book->title }}</h3>
                <p style="color: var(--primary); font-weight: 500; margin-bottom: 1rem;">{{ $book->author }}</p>
                <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-top: auto;">
                    <span class="text-muted" style="font-size: 0.9rem; padding-bottom: 0.5rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline; margin-right:4px;"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                        {{ number_format($book->views) }} views
                    </span>
                    <a href="/books/{{ $book->id }}" class="btn btn-outline" style="padding: 0.5rem 1rem; border-radius: 8px;">Read More</a>
                </div>
            </div>
        </div>
        @empty
        <div style="grid-column: span 3; text-align: center; padding: 4rem;">
            <p class="text-muted" style="font-size: 1.2rem;">No books found matching your criteria.</p>
        </div>
        @endforelse
    </div>

    <div style="margin-top: 3rem; display: flex; justify-content: center;">
        {{ $books->links('vendor.pagination.glass') }}
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('interactive-search');
        if(searchInput && !searchInput.value) { // Only animate if empty
            const phrases = [
                "Search for 'Harry Potter'...",
                "Find 'Science Fiction'...",
                "Looking for 'Self Improvement'?",
                "Search by author name...",
                "Find your next adventure..."
            ];
            let phraseIndex = 0;
            let charIndex = 0;
            let isDeleting = false;
            let typingDelay = 100;
            
            function typeEffect() {
                if(searchInput.value) return; // Stop if user typed something
                
                const currentPhrase = phrases[phraseIndex];
                
                if (isDeleting) {
                    searchInput.setAttribute('placeholder', currentPhrase.substring(0, charIndex - 1));
                    charIndex--;
                    typingDelay = 50;
                } else {
                    searchInput.setAttribute('placeholder', currentPhrase.substring(0, charIndex + 1));
                    charIndex++;
                    typingDelay = 100;
                }
                
                if (!isDeleting && charIndex === currentPhrase.length) {
                    isDeleting = true;
                    typingDelay = 2000;
                } else if (isDeleting && charIndex === 0) {
                    isDeleting = false;
                    phraseIndex = (phraseIndex + 1) % phrases.length;
                    typingDelay = 500;
                }
                
                setTimeout(typeEffect, typingDelay);
            }
            
            setTimeout(typeEffect, 1000);
            
            // Stop animation on focus
            searchInput.addEventListener('focus', () => {
                searchInput.setAttribute('placeholder', 'Search...');
            });
        }
    });
</script>
@endpush
@endsection
