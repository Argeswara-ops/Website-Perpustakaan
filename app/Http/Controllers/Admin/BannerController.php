<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'image_url' => 'nullable|string',
            'link' => 'nullable|string'
        ]);

        $image = '';
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('banners', 'public');
            $image = '/storage/' . $path;
        } elseif ($request->filled('image_url')) {
            $image = $request->image_url;
        } else {
            return back()->withErrors(['image_file' => 'Please provide either an image file or an image URL.']);
        }

        Banner::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image,
            'link' => $request->link
        ]);
        
        return redirect('/admin/banners')->with('success', 'Banner created successfully.');
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'image_url' => 'nullable|string',
            'link' => 'nullable|string'
        ]);

        $image = $banner->image;
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('banners', 'public');
            $image = '/storage/' . $path;
        } elseif ($request->filled('image_url')) {
            $image = $request->image_url;
        }

        $banner->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image,
            'link' => $request->link
        ]);
        
        return redirect('/admin/banners')->with('success', 'Banner updated successfully.');
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();
        return redirect('/admin/banners')->with('success', 'Banner deleted successfully.');
    }
}
