@extends('layouts.app')

@section('title', 'Welcome to LibroPia')

@section('content')
<div class="banner-wrapper">
    <div class="slides-container" id="slides-container">
        @if(isset($banners) && $banners->count() > 0)
            @foreach($banners as $index => $banner)
                <a href="{{ $banner->link ?? '#' }}" class="slide {{ $index === 0 ? 'active' : '' }}" style="background-image: url('{{ $banner->image }}'); text-decoration: none;">
                    <div class="slide-content">
                        <h1>{{ $banner->title }}</h1>
                        @if($banner->description)
                            <p>{{ $banner->description }}</p>
                        @endif
                    </div>
                </a>
            @endforeach
        @else
            <a href="#books" class="slide active" style="background-image: url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?auto=format&fit=crop&q=80&w=1600'); text-decoration: none;">
                <div class="slide-content">
                    <h1>Discover Your Next Great Read</h1>
                    <p>Explore a vast collection of books, articles, and more. Join our community and keep track of your favorite reads.</p>
                </div>
            </a>
            <a href="/articles" class="slide" style="background-image: url('https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?auto=format&fit=crop&q=80&w=1600'); text-decoration: none;">
                <div class="slide-content">
                    <h1>Insightful Articles</h1>
                    <p>Read what the critics are saying about top literature and stay updated with reading trends.</p>
                </div>
            </a>
            <a href="/register" class="slide" style="background-image: url('https://images.unsplash.com/photo-1481627834876-b7833e8f5570?auto=format&fit=crop&q=80&w=1600'); text-decoration: none;">
                <div class="slide-content">
                    <h1>Join the Community</h1>
                    <p>Connect with other readers, share your thoughts, and keep track of your reading progress.</p>
                </div>
            </a>
        @endif
    </div>
    <div class="slider-nav">
        @if(isset($banners) && $banners->count() > 0)
            @foreach($banners as $index => $banner)
                <button class="slider-dot {{ $index === 0 ? 'active' : '' }}" data-index="{{ $index }}"></button>
            @endforeach
        @else
            <button class="slider-dot active" data-index="0"></button>
            <button class="slider-dot" data-index="1"></button>
            <button class="slider-dot" data-index="2"></button>
        @endif
    </div>
</div>

<div class="glass glass-panel" style="padding: 3rem 2rem; border-radius: 24px; text-align: center; margin: 3rem auto; max-width: 900px; background: linear-gradient(135deg, rgba(99, 102, 241, 0.1) 0%, rgba(6, 182, 212, 0.05) 100%); border: 1px solid rgba(255,255,255,0.05); position: relative; overflow: hidden;">
    <div style="position: absolute; top: -50px; left: -50px; width: 150px; height: 150px; background: var(--primary); filter: blur(100px); border-radius: 50%; opacity: 0.3;"></div>
    <div style="position: absolute; bottom: -50px; right: -50px; width: 150px; height: 150px; background: var(--secondary); filter: blur(100px); border-radius: 50%; opacity: 0.3;"></div>
    
    <h2 style="font-size: 2.5rem; margin-bottom: 0.5rem; color: var(--text-main); position: relative; z-index: 1;">What would you like to read today?</h2>
    <p style="color: var(--text-muted); margin-bottom: 2.5rem; font-size: 1.1rem; position: relative; z-index: 1;">Explore our vast collection of literature, science, and fiction.</p>
    
    <form action="/books" method="GET" style="display: flex; gap: 1rem; max-width: 700px; margin: 0 auto; position: relative; z-index: 1;">
        <div style="position: relative; flex: 1;">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="position: absolute; left: 1.25rem; top: 50%; transform: translateY(-50%); color: var(--text-muted);"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
            <input type="text" name="q" id="interactive-search" placeholder="Search for books..." class="form-control" style="width: 100%; height: 60px; padding: 0 1.5rem 0 3.5rem; border-radius: 999px; font-size: 1.1rem; border: 1px solid var(--glass-border); background: var(--input-bg); color: var(--text-main); box-shadow: inset 0 2px 4px rgba(0,0,0,0.1); transition: all 0.3s ease;">
        </div>
        <button type="submit" class="btn btn-primary" style="height: 60px; border-radius: 999px; padding: 0 2.5rem; font-size: 1.1rem; font-weight: bold; box-shadow: 0 10px 25px rgba(99, 102, 241, 0.3);">Search</button>
    </form>
</div>

<div class="section-title" id="books">Highlighted Books</div>
<div class="grid grid-cols-3">
    @foreach($books as $book)
    <div class="card glass">
        <img src="{{ $book->cover_image }}" alt="{{ $book->title }}" class="card-img">
        <div class="card-content">
            <div class="card-title">{{ $book->title }}</div>
            <div class="form-label">By {{ $book->author }}</div>
            <p class="card-desc">{{ Str::limit($book->description, 80) }}</p>
            <div style="margin-top: auto; display: flex; justify-content: space-between; align-items: center;">
                <span class="text-muted" style="font-size: 0.9rem;">{{ number_format($book->views) }} views</span>
                <div style="display: flex; gap: 0.5rem;">
                    @auth
                    <form action="/user/favorite" method="POST">
                        @csrf
                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                        <button class="btn btn-outline" style="padding: 0.5rem 0.75rem; border-radius: 8px; border-color: var(--secondary); color: var(--secondary);" title="Add to Favorites">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>
                        </button>
                    </form>
                    @endauth
                    <a href="/books/{{ $book->id }}" class="btn btn-outline" style="padding: 0.5rem 1rem; border-radius: 8px;">Read More</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="section-title">Latest Articles</div>
<div class="grid grid-cols-3">
    @foreach($articles as $article)
    <div class="card glass">
        <img src="{{ $article->image }}" alt="{{ $article->title }}" class="card-img" style="height: 180px;">
        <div class="card-content">
            <div class="card-title">{{ $article->title }}</div>
            <p class="card-desc">{{ Str::limit($article->content, 100) }}</p>
            <div style="margin-top: auto; display: flex; justify-content: flex-end;">
                <a href="/articles/{{ $article->id }}" class="btn btn-outline" style="padding: 0.5rem 1rem; font-size: 0.8rem;">Read More</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('slides-container');
        const dots = document.querySelectorAll('.slider-dot');
        let currentSlide = 0;
        const totalSlides = dots.length;
        let slideInterval;

        function goToSlide(index) {
            container.style.transform = `translateX(calc(-${index} * 82vw))`;
            dots.forEach(dot => dot.classList.remove('active'));
            dots[index].classList.add('active');
            
            const slides = document.querySelectorAll('.slide');
            slides.forEach(s => s.classList.remove('active'));
            slides[index].classList.add('active');
            
            currentSlide = index;
        }

        function nextSlide() {
            let next = (currentSlide + 1) % totalSlides;
            goToSlide(next);
        }

        function startSlider() {
            slideInterval = setInterval(nextSlide, 5000); // 5 seconds
        }

        function resetSlider() {
            clearInterval(slideInterval);
            startSlider();
        }

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                goToSlide(index);
                resetSlider();
            });
        });

        startSlider();
    });

    // Interactive Search Placeholder Typing Effect
    const searchInput = document.getElementById('interactive-search');
    if(searchInput) {
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
                typingDelay = 2000; // Pause at end
            } else if (isDeleting && charIndex === 0) {
                isDeleting = false;
                phraseIndex = (phraseIndex + 1) % phrases.length;
                typingDelay = 500; // Pause before new word
            }
            
            setTimeout(typeEffect, typingDelay);
        }
        
        setTimeout(typeEffect, 1000);
    }
</script>
@endpush
@endsection
