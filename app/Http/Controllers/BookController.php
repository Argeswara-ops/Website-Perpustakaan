<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::query();
        
        if ($request->has('q') && !empty($request->q)) {
            $search = $request->q;
            $query->where(function($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('author', 'LIKE', "%{$search}%");
            });
        }

        if ($request->has('category') && !empty($request->category)) {
            $query->where('category', $request->category);
        }

        $sort = $request->get('sort', 'latest');
        if ($sort === 'popular') {
            $query->orderBy('views', 'desc');
        } else {
            $query->latest();
        }
        
        $books = $query->paginate(12);
        
        // Get all unique categories for the filter dropdown
        $categories = Book::select('category')->distinct()->whereNotNull('category')->where('category', '!=', '')->pluck('category');
        
        return view('books.index', compact('books', 'categories'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        
        // Increment views
        $book->increment('views');
        
        return view('books.show', compact('book'));
    }
}
