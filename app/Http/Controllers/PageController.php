<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function authors()
    {
        // Sample data for famous authors
        $authors = [
            [
                'name' => 'Pramoedya Ananta Toer',
                'description' => 'Penulis besar Indonesia yang terkenal dengan Tetralogi Buru. Karyanya telah diterjemahkan ke dalam puluhan bahasa asing.',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/cc/Pramoedya_Ananta_Toer_cropped.jpg/800px-Pramoedya_Ananta_Toer_cropped.jpg'
            ],
            [
                'name' => 'Tere Liye',
                'description' => 'Salah satu penulis paling produktif di Indonesia dengan berbagai genre, mulai dari fantasi hingga novel religius dan sosial.',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfI7y9-Wv9P9v4_8x2t-QyvI5q_z_Y_XqYVQ&s'
            ],
            [
                'name' => 'Andrea Hirata',
                'description' => 'Terkenal dengan novel Laskar Pelangi yang mengangkat tema pendidikan dan perjuangan hidup di Belitung.',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_S-Y_8-X-Z-K-Q-X-Z-K-Q-X-Z-K-Q-X-Z-K-Q&s'
            ],
            [
                'name' => 'J.K. Rowling',
                'description' => 'Penulis asal Inggris yang menciptakan fenomena dunia Harry Potter, salah satu seri buku terlaris sepanjang sejarah.',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT_S-Y_8-X-Z-K-Q-X-Z-K-Q-X-Z-K-Q-X-Z-K-Q&s'
            ]
        ];

        return view('pages.authors', compact('authors'));
    }
}
