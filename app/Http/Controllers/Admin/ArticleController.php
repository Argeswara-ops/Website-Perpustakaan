<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'image_url' => 'nullable|string'
        ]);

        $image = '';
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('articles', 'public');
            $image = '/storage/' . $path;
        } elseif ($request->filled('image_url')) {
            $image = $request->image_url;
        }

        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $image
        ]);
        return redirect('/admin/articles')->with('success', 'Article created successfully.');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'image_url' => 'nullable|string'
        ]);

        $image = $article->image;
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('articles', 'public');
            $image = '/storage/' . $path;
        } elseif ($request->filled('image_url')) {
            $image = $request->image_url;
        }

        $article->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $image
        ]);
        return redirect('/admin/articles')->with('success', 'Article updated successfully.');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect('/admin/articles')->with('success', 'Article deleted successfully.');
    }
}
