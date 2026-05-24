@extends('layouts.app')

@section('title', 'Manage Books')

@section('content')
<div class="dashboard-layout">
    @include('admin.sidebar')
    
    <div class="main-content">
        <div class="flex justify-between items-center mb-4" style="display: flex; justify-content: space-between; align-items: center;">
            <h2>Manage Books</h2>
            <a href="/admin/books/create" class="btn btn-primary" style="border-radius: 8px;">Add New Book</a>
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
                        <th>Cover</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Views</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                    <tr>
                        <td>
                            <img src="{{ $book->cover_image }}" style="width: 60px; height: 80px; object-fit: cover; border-radius: 6px;">
                        </td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->views }}</td>
                        <td>
                            <a href="/admin/books/{{ $book->id }}/edit" class="btn btn-outline" style="padding: 0.25rem 0.75rem; font-size: 0.8rem; border-radius: 6px;">Edit</a>
                            <form action="/admin/books/{{ $book->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" style="padding: 0.25rem 0.75rem; font-size: 0.8rem; border-radius: 6px;">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @if($books->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center text-muted" style="padding: 2rem;">No books found in the inventory.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
