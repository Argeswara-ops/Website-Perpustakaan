@extends('layouts.app')

@section('title', 'Edit Banner')

@section('content')
<div class="dashboard-layout">
    @include('admin.sidebar')
    
    <div class="main-content">
        <div class="flex justify-between items-center mb-4" style="display: flex; justify-content: space-between; align-items: center;">
            <h2>Edit Banner</h2>
            <a href="/admin/banners" class="btn btn-outline" style="border-radius: 8px;">Back to Banners</a>
        </div>
        
        <div class="glass glass-panel" style="max-width: 600px;">
            @if ($errors->any())
                <div style="background: rgba(225, 29, 72, 0.1); border-left: 4px solid #e11d48; padding: 1rem; margin-bottom: 1.5rem; border-radius: 0 8px 8px 0;">
                    <p style="color: #fb7185; font-size: 0.9rem; font-weight: 500; margin: 0;">{{ $errors->first() }}</p>
                </div>
            @endif

            <form action="/admin/banners/{{ $banner->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label class="form-label">Banner Title</label>
                    <input type="text" name="title" value="{{ $banner->title }}" required class="form-control">
                </div>

                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ $banner->description }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Upload New Local Image</label>
                    <input type="file" name="image_file" class="form-control" accept="image/*">
                </div>

                <div class="form-group">
                    <label class="form-label">OR Image URL</label>
                    <input type="text" name="image_url" value="{{ str_starts_with($banner->image, '/storage') ? '' : $banner->image }}" class="form-control">
                    <div class="mt-2">
                        <small class="text-muted block mb-2">Current Image:</small>
                        <img src="{{ $banner->image }}" style="width: 100%; height: 150px; object-fit: cover; border-radius: 8px;">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Target Link</label>
                    <input type="text" name="link" value="{{ $banner->link }}" class="form-control">
                </div>

                <div style="margin-top: 2rem;">
                    <button type="submit" class="btn btn-primary" style="width: 100%; border-radius: 8px; padding: 1rem;">Update Banner</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
