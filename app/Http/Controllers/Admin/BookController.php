<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->get();
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        return view('admin.books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'description' => 'required|string',
            'cover_image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'cover_image_url' => 'nullable|string',
            'file_path' => 'nullable|string'
        ]);

        $cover_image = '';
        if ($request->hasFile('cover_image_file')) {
            $path = $request->file('cover_image_file')->store('books/covers', 'public');
            $cover_image = '/storage/' . $path;
        } elseif ($request->filled('cover_image_url')) {
            $cover_image = $request->cover_image_url;
        }

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'category' => $request->category ?? 'Uncategorized',
            'description' => $request->description,
            'cover_image' => $cover_image,
            'file_path' => $request->file_path ?? '',
            'views' => 0
        ]);
        
        return redirect('/admin/books')->with('success', 'Book added successfully.');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('admin.books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'description' => 'required|string',
            'cover_image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'cover_image_url' => 'nullable|string',
            'file_path' => 'nullable|string'
        ]);

        $cover_image = $book->cover_image;
        if ($request->hasFile('cover_image_file')) {
            $path = $request->file('cover_image_file')->store('books/covers', 'public');
            $cover_image = '/storage/' . $path;
        } elseif ($request->filled('cover_image_url')) {
            $cover_image = $request->cover_image_url;
        }

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'category' => $request->category ?? 'Uncategorized',
            'description' => $request->description,
            'cover_image' => $cover_image,
            'file_path' => $request->file_path ?? $book->file_path
        ]);
        
        return redirect('/admin/books')->with('success', 'Book updated successfully.');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect('/admin/books')->with('success', 'Book deleted successfully.');
    }
}
