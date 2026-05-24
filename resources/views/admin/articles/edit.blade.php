@extends('layouts.app')

@section('title', 'Edit Article')

@section('content')
<div class="dashboard-layout">
    @include('admin.sidebar')
    
    <div class="main-content">
        <div class="flex justify-between items-center mb-4" style="display: flex; justify-content: space-between; align-items: center;">
            <h2>Edit Article</h2>
            <a href="/admin/articles" class="btn btn-outline" style="border-radius: 8px;">Back to Articles</a>
        </div>
        
        <div class="glass glass-panel" style="max-width: 800px;">
            <form action="/admin/articles/{{ $article->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label class="form-label">Article Title</label>
                    <input type="text" name="title" value="{{ $article->title }}" required class="form-control">
                </div>

                <div class="form-group">
                    <label class="form-label">Upload New Image (Optional)</label>
                    <input type="file" name="image_file" class="form-control" accept="image/*">
                    <small class="text-muted" style="display: block; margin-top: 0.5rem;">OR provide an image URL below:</small>
                </div>

                <div class="form-group">
                    <label class="form-label">Image URL</label>
                    <input type="text" name="image_url" value="{{ str_starts_with($article->image, 'http') ? $article->image : '' }}" class="form-control">
                    @if(str_starts_with($article->image, '/storage/'))
                        <small class="text-muted" style="display: block; margin-top: 0.5rem;">Current image is an uploaded file.</small>
                    @endif
                    <div class="mt-2" style="margin-top: 1rem;">
                        <img src="{{ $article->image }}" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px;">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Content (Multiple Paragraphs allowed)</label>
                    <textarea name="content" class="form-control" rows="10" required>{{ $article->content }}</textarea>
                </div>

                <div style="margin-top: 2rem;">
                    <button type="submit" class="btn btn-primary" style="width: 100%; border-radius: 8px; padding: 1rem;">Update Article</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
