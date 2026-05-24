<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalBooks = Book::count();
        $totalUsers = User::count();
        $totalViews = Book::sum('views');
        
        $users = User::latest()->take(5)->get();
        
        $topBooks = Book::orderBy('views', 'desc')->take(5)->get();
        $chartData = [
            'labels' => $topBooks->pluck('title'),
            'data' => $topBooks->pluck('views')
        ];
        
        return view('admin.dashboard', compact('totalBooks', 'totalUsers', 'totalViews', 'users', 'chartData'));
    }
}
