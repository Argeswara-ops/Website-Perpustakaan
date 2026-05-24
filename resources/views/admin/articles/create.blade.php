@extends('layouts.app')

@section('title', 'Add New Article')

@section('content')
<div class="dashboard-layout">
    @include('admin.sidebar')
    
    <div class="main-content">
        <div class="flex justify-between items-center mb-4" style="display: flex; justify-content: space-between; align-items: center;">
            <h2>Add New Article</h2>
            <a href="/admin/articles" class="btn btn-outline" style="border-radius: 8px;">Back to Articles</a>
        </div>
        
        <div class="glass glass-panel" style="max-width: 800px;">
            <form action="/admin/articles" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label class="form-label">Article Title</label>
                    <input type="text" name="title" required class="form-control" placeholder="e.g. 10 Best Books of the Year">
                </div>

                <div class="form-group">
                    <label class="form-label">Upload Article Image</label>
                    <input type="file" name="image_file" class="form-control" accept="image/*">
                    <small class="text-muted" style="display: block; margin-top: 0.5rem;">OR provide an image URL below:</small>
                </div>

                <div class="form-group">
                    <label class="form-label">Image URL (Optional)</label>
                    <input type="text" name="image_url" class="form-control" placeholder="https://images.unsplash.com/...">
                </div>

                <div class="form-group">
                    <label class="form-label">Content (Multiple Paragraphs allowed)</label>
                    <textarea name="content" class="form-control" rows="10" required placeholder="Write your article here..."></textarea>
                </div>

                <div style="margin-top: 2rem;">
                    <button type="submit" class="btn btn-primary" style="width: 100%; border-radius: 8px; padding: 1rem;">Save Article</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
