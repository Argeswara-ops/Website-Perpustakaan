@extends('layouts.app')

@section('title', 'Manage Articles')

@section('content')
<div class="dashboard-layout">
    @include('admin.sidebar')
    
    <div class="main-content">
        <div class="flex justify-between items-center mb-4" style="display: flex; justify-content: space-between; align-items: center;">
            <h2>Manage Articles</h2>
            <a href="/admin/articles/create" class="btn btn-primary" style="border-radius: 8px;">Add New Article</a>
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
                        <th>Title</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                    <tr>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->created_at->format('M d, Y') }}</td>
                        <td>
                            <a href="/articles/{{ $article->id }}" target="_blank" class="btn btn-outline" style="padding: 0.25rem 0.75rem; font-size: 0.8rem; border-radius: 6px;">View</a>
                            <a href="/admin/articles/{{ $article->id }}/edit" class="btn btn-outline" style="padding: 0.25rem 0.75rem; font-size: 0.8rem; border-radius: 6px;">Edit</a>
                            <form action="/admin/articles/{{ $article->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" style="padding: 0.25rem 0.75rem; font-size: 0.8rem; border-radius: 6px;">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @if($articles->isEmpty())
                    <tr>
                        <td colspan="3" class="text-center text-muted" style="padding: 2rem;">No articles found. Add one!</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
