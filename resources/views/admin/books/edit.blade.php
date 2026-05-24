@extends('layouts.app')

@section('title', 'Edit Book')

@section('content')
<div class="dashboard-layout">
    @include('admin.sidebar')
    
    <div class="main-content">
        <div class="flex justify-between items-center mb-4" style="display: flex; justify-content: space-between; align-items: center;">
            <h2>Edit Book</h2>
            <a href="/admin/books" class="btn btn-outline" style="border-radius: 8px;">Back to Books</a>
        </div>
        
        <div class="glass glass-panel" style="max-width: 700px;">
            @if ($errors->any())
                <div style="background: rgba(225, 29, 72, 0.1); border-left: 4px solid #e11d48; padding: 1rem; margin-bottom: 1.5rem; border-radius: 0 8px 8px 0;">
                    <p style="color: #fb7185; font-size: 0.9rem; font-weight: 500; margin: 0;">{{ $errors->first() }}</p>
                </div>
            @endif

            <form action="/admin/books/{{ $book->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label class="form-label">Book Title</label>
                    <input type="text" name="title" value="{{ $book->title }}" required class="form-control">
                </div>

                <div class="form-group">
                    <label class="form-label">Author Name</label>
                    <input type="text" name="author" value="{{ $book->author }}" required class="form-control">
                </div>

                <div class="form-group">
                    <label class="form-label">Category / Genre</label>
                    <input type="text" name="category" value="{{ $book->category }}" class="form-control">
                </div>

                <div class="form-group">
                    <label class="form-label">Description / Synopsis</label>
                    <textarea name="description" class="form-control" rows="5" required>{{ $book->description }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Upload New Cover Image</label>
                    <input type="file" name="cover_image_file" class="form-control" accept="image/*">
                </div>

                <div class="form-group">
                    <label class="form-label">OR Cover Image URL</label>
                    <input type="text" name="cover_image_url" value="{{ str_starts_with($book->cover_image, '/storage') ? '' : $book->cover_image }}" class="form-control">
                    <div class="mt-2">
                        <small class="text-muted block mb-2">Current Cover Image:</small>
                        <img src="{{ $book->cover_image }}" style="width: 120px; height: 160px; object-fit: cover; border-radius: 8px;">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Book File Path</label>
                    <input type="text" name="file_path" value="{{ $book->file_path }}" class="form-control">
                </div>

                <div style="margin-top: 2rem;">
                    <button type="submit" class="btn btn-primary" style="width: 100%; border-radius: 8px; padding: 1rem;">Update Book</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
