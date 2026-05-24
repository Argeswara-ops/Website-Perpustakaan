@extends('layouts.app')

@section('title', 'Manage Banners')

@section('content')
<div class="dashboard-layout">
    @include('admin.sidebar')
    
    <div class="main-content">
        <div class="flex justify-between items-center mb-4" style="display: flex; justify-content: space-between; align-items: center;">
            <h2>Manage Banners</h2>
            <a href="/admin/banners/create" class="btn btn-primary" style="border-radius: 8px;">Add New Banner</a>
        </div>
        
        @if(session('success'))
            <div style="background: rgba(16, 185, 129, 0.1); border-left: 4px solid #10b981; padding: 1rem; margin-bottom: 1.5rem; border-radius: 0 8px 8px 0; color: #10b981;">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="glass glass-panel table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Link</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($banners as $banner)
                    <tr>
                        <td>
                            <img src="{{ $banner->image }}" style="width: 120px; height: 60px; object-fit: cover; border-radius: 8px;">
                        </td>
                        <td>{{ $banner->title }}</td>
                        <td><a href="{{ $banner->link }}" target="_blank" style="color: var(--primary);">Link</a></td>
                        <td>
                            <a href="/admin/banners/{{ $banner->id }}/edit" class="btn btn-outline" style="padding: 0.25rem 0.75rem; font-size: 0.8rem; border-radius: 6px;">Edit</a>
                            <form action="/admin/banners/{{ $banner->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" style="padding: 0.25rem 0.75rem; font-size: 0.8rem; border-radius: 6px;">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @if($banners->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center text-muted" style="padding: 2rem;">No banners found. Add one!</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
