@extends('layouts.app')

@section('title', 'Articles - LibroPia')

@section('content')
<div class="hero" style="min-height: 30vh;">
    <h1>All Articles</h1>
    <p>Read the latest insights and stories from our community.</p>
</div>

<div class="grid grid-cols-3">
    @foreach($articles as $article)
    <div class="card glass">
        <img src="{{ $article->image }}" alt="{{ $article->title }}" class="card-img" style="height: 180px;">
        <div class="card-content">
            <div class="card-title">{{ $article->title }}</div>
            <p class="card-desc">{{ Str::limit($article->content, 100) }}</p>
            <a href="/articles/{{ $article->id }}" class="btn btn-outline" style="padding: 0.5rem 1rem; font-size: 0.8rem;">Read More</a>
        </div>
    </div>
    @endforeach
</div>
@endsection
