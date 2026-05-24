<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);

        // Create some books
        \App\Models\Book::insert([
            ['title' => 'Laskar Pelangi', 'author' => 'Andrea Hirata', 'description' => 'A story about education in Belitong.', 'cover_image' => 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?auto=format&fit=crop&q=80&w=400', 'views' => 120, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Bumi Manusia', 'author' => 'Pramoedya Ananta Toer', 'description' => 'A historical novel about Indonesia.', 'cover_image' => 'https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&q=80&w=400', 'views' => 95, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Filosofi Teras', 'author' => 'Henry Manampiring', 'description' => 'Stoicism philosophy for modern life.', 'cover_image' => 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&fit=crop&q=80&w=400', 'views' => 200, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Laut Bercerita', 'author' => 'Leila S. Chudori', 'description' => 'A poignant tale of friendship and loss.', 'cover_image' => 'https://images.unsplash.com/photo-1495640388908-05fa85288e61?auto=format&fit=crop&q=80&w=400', 'views' => 150, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Create some articles
        \App\Models\Article::insert([
            ['title' => 'The Importance of Reading', 'content' => "Reading books is essential for personal growth and cognitive development.\n\nIn our modern fast-paced world, finding time to sit down with a good book can be challenging. However, the benefits of doing so are immense. Studies have shown that reading not only improves our vocabulary and comprehension skills but also reduces stress and enhances our empathy towards others.\n\nFurthermore, diving into different genres—from historical fiction to sci-fi—allows our minds to explore new worlds and perspectives. It stimulates the imagination and keeps the brain active, which is crucial for long-term cognitive health. Whether you prefer a physical book, an e-reader, or listening to an audiobook during your daily commute, making literature a regular part of your routine can transform your life in profound ways.\n\nSo, grab a book today, find a quiet corner, and let yourself get lost in a story.", 'image' => 'https://images.unsplash.com/photo-1481627834876-b7833e8f5570?auto=format&fit=crop&q=80&w=800', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Top 10 Books in 2026', 'content' => "Discover the best-selling books this year that everyone is talking about.\n\n2026 has been an incredible year for literature. We've seen debut authors taking the world by storm and established veterans delivering some of their best work yet. From gripping thrillers that keep you on the edge of your seat to heartwarming romances that restore your faith in love, the diversity of stories available is truly astounding.\n\nOne of the standout trends this year has been the resurgence of epic fantasy and thought-provoking dystopian novels. Readers are looking for escapism combined with profound commentary on our current societal issues. Non-fiction has also seen a boom, particularly memoirs and books focusing on mental health and personal well-being.\n\nIf you're looking to update your reading list, our top 10 picks will provide you with a fantastic starting point. Don't miss out on these literary gems!", 'image' => 'https://images.unsplash.com/photo-1476275466078-4007374efac4?auto=format&fit=crop&q=80&w=800', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
