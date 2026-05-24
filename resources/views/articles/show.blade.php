@extends('layouts.app')

@section('title', $article->title . ' - LibroPia')

@section('content')
<div class="glass article-container">
    <div class="article-header">
        <h1 class="article-title">{{ $article->title }}</h1>
        <div class="article-meta">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/><path d="M8 14h.01"/><path d="M12 14h.01"/><path d="M16 14h.01"/><path d="M8 18h.01"/><path d="M12 18h.01"/><path d="M16 18h.01"/></svg>
            <span>Published on {{ $article->created_at->format('d F Y') }}</span>
        </div>
    </div>
    
    <hr class="article-divider">

    <img src="{{ $article->image }}" alt="{{ $article->title }}" class="article-image">
    
    <div class="article-content">
        @foreach(explode("\n", $article->content) as $paragraph)
            @if(trim($paragraph))
                <p>{{ trim($paragraph) }}</p>
            @endif
        @endforeach
    </div>
    
    <hr class="article-divider">
    
    <div style="text-align: center;">
        <a href="/articles" class="btn btn-outline">← Back to Articles</a>
    </div>
</div>
@endsection
