@extends('layouts.app')

@section('title', 'Add New Book')

@section('content')
<div class="dashboard-layout">
    @include('admin.sidebar')
    
    <div class="main-content">
        <div class="flex justify-between items-center mb-4" style="display: flex; justify-content: space-between; align-items: center;">
            <h2>Add New Book</h2>
            <a href="/admin/books" class="btn btn-outline" style="border-radius: 8px;">Back to Books</a>
        </div>
        
        <div class="glass glass-panel" style="max-width: 700px;">
            @if ($errors->any())
                <div style="background: rgba(225, 29, 72, 0.1); border-left: 4px solid #e11d48; padding: 1rem; margin-bottom: 1.5rem; border-radius: 0 8px 8px 0;">
                    <p style="color: #fb7185; font-size: 0.9rem; font-weight: 500; margin: 0;">{{ $errors->first() }}</p>
                </div>
            @endif

            <form action="/admin/books" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label class="form-label">Book Title</label>
                    <input type="text" name="title" required class="form-control" placeholder="e.g. The Great Gatsby">
                </div>

                <div class="form-group">
                    <label class="form-label">Author Name</label>
                    <input type="text" name="author" required class="form-control" placeholder="e.g. F. Scott Fitzgerald">
                </div>

                <div class="form-group">
                    <label class="form-label">Category / Genre</label>
                    <input type="text" name="category" class="form-control" placeholder="e.g. Fiction, Science, History">
                </div>

                <div class="form-group">
                    <label class="form-label">Description / Synopsis</label>
                    <textarea name="description" class="form-control" rows="5" required placeholder="Write the book synopsis here..."></textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Upload Book Cover Image</label>
                    <input type="file" name="cover_image_file" class="form-control" accept="image/*">
                </div>

                <div class="form-group">
                    <label class="form-label">OR Cover Image URL</label>
                    <input type="text" name="cover_image_url" class="form-control" placeholder="https://images.unsplash.com/...">
                    <small class="text-muted">Local file upload takes priority over URL.</small>
                </div>

                <div class="form-group">
                    <label class="form-label">Book File Path (Optional PDF/EPUB URL)</label>
                    <input type="text" name="file_path" class="form-control" placeholder="Optional external link or path to read the book">
                </div>

                <div style="margin-top: 2rem;">
                    <button type="submit" class="btn btn-primary" style="width: 100%; border-radius: 8px; padding: 1rem;">Save Book</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
