<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Add Books
        $books = [
            [
                'title' => 'The Midnight Library',
                'author' => 'Matt Haig',
                'category' => 'Fiction',
                'description' => 'Between life and death there is a library, and within that library, the shelves go on forever. Every book provides a chance to try another life you could have lived.',
                'cover_image' => 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?auto=format&fit=crop&q=80&w=800',
                'views' => rand(100, 5000),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Atomic Habits',
                'author' => 'James Clear',
                'category' => 'Self Improvement',
                'description' => 'No matter your goals, Atomic Habits offers a proven framework for improving--every day. James Clear reveals practical strategies that will teach you exactly how to form good habits.',
                'cover_image' => 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&fit=crop&q=80&w=800',
                'views' => rand(100, 5000),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Dune',
                'author' => 'Frank Herbert',
                'category' => 'Science Fiction',
                'description' => 'Set on the desert planet Arrakis, Dune is the story of the boy Paul Atreides, heir to a noble family tasked with ruling an inhospitable world where the only thing of value is the "spice" melange.',
                'cover_image' => 'https://images.unsplash.com/photo-1541963463532-d68292c34b19?auto=format&fit=crop&q=80&w=800',
                'views' => rand(100, 5000),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Sapiens: A Brief History of Humankind',
                'author' => 'Yuval Noah Harari',
                'category' => 'History',
                'description' => 'A hundred thousand years ago, at least six different species of humans inhabited Earth. Yet today there is only one—homo sapiens. What happened to the others? And what may happen to us?',
                'cover_image' => 'https://images.unsplash.com/photo-1495640388908-05fa85288e61?auto=format&fit=crop&q=80&w=800',
                'views' => rand(100, 5000),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Thinking, Fast and Slow',
                'author' => 'Daniel Kahneman',
                'category' => 'Psychology',
                'description' => 'The phenomenal New York Times Bestseller by Nobel Prize-winner Daniel Kahneman, Thinking, Fast and Slow offers a whole new look at the way our minds work.',
                'cover_image' => 'https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&q=80&w=800',
                'views' => rand(100, 5000),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Great Gatsby',
                'author' => 'F. Scott Fitzgerald',
                'category' => 'Classic Fiction',
                'description' => 'The Great Gatsby, F. Scott Fitzgerald\'s third book, stands as the supreme achievement of his career. This exemplary novel of the Jazz Age has been acclaimed by generations of readers.',
                'cover_image' => 'https://images.unsplash.com/photo-1526379879527-8559ecfcaec0?auto=format&fit=crop&q=80&w=800',
                'views' => rand(100, 5000),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Project Hail Mary',
                'author' => 'Andy Weir',
                'category' => 'Science Fiction',
                'description' => 'Ryland Grace is the sole survivor on a desperate, last-chance mission—and if he fails, humanity and the earth itself will perish.',
                'cover_image' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&q=80&w=800',
                'views' => rand(100, 5000),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Psychology of Money',
                'author' => 'Morgan Housel',
                'category' => 'Finance',
                'description' => 'Doing well with money isn’t necessarily about what you know. It’s about how you behave. And behavior is hard to teach, even to really smart people.',
                'cover_image' => 'https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?auto=format&fit=crop&q=80&w=800',
                'views' => rand(100, 5000),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => '1984',
                'author' => 'George Orwell',
                'category' => 'Classic Fiction',
                'description' => 'Among the seminal texts of the 20th century, Nineteen Eighty-Four is a rare work that grows more haunting as its futuristic purgatory becomes more real.',
                'cover_image' => 'https://images.unsplash.com/photo-1532012197267-da84d127e765?auto=format&fit=crop&q=80&w=800',
                'views' => rand(100, 5000),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Deep Work',
                'author' => 'Cal Newport',
                'category' => 'Self Improvement',
                'description' => 'Deep work is the ability to focus without distraction on a cognitively demanding task. It\'s a skill that allows you to quickly master complicated information.',
                'cover_image' => 'https://images.unsplash.com/photo-1499750310107-5fef28a66643?auto=format&fit=crop&q=80&w=800',
                'views' => rand(100, 5000),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        \App\Models\Book::insert($books);

        // Add Articles
        $articles = [
            [
                'title' => 'Why Reading Fiction Makes You More Empathetic',
                'content' => 'Studies have shown that reading literary fiction can actually improve our ability to understand the feelings and thoughts of others. The experience of immersing ourselves in a story forces our brain to adopt different perspectives, building a "muscle" for empathy in the real world. According to researchers at the New School for Social Research, this phenomenon is linked to the complex character development found in quality literature. When we navigate the intricate social landscapes of a novel, we are practicing social cognition. This translates to better social relationships and an increased capacity for compassion.',
                'image' => 'https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?auto=format&fit=crop&q=80&w=800',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Rise of Audiobooks: Is Listening the New Reading?',
                'content' => 'In recent years, the audiobook industry has seen exponential growth. But is listening to a book the same as reading it? Neuroscientists suggest that the brain processes audio and visual narrative input quite similarly. While some purists argue that the physical act of reading provides better retention, audiobooks allow for "reading" during otherwise unproductive times—like commuting or exercising. The convenience factor cannot be ignored. Furthermore, the performance element of narrators adds a dimension of entertainment that traditional reading lacks, drawing in audiences who might not normally pick up a book.',
                'image' => 'https://images.unsplash.com/photo-1589998059171-989d887dda1e?auto=format&fit=crop&q=80&w=800',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => '5 Science Fiction Novels That Predicted the Future',
                'content' => 'Science fiction has long been a sandbox for imagining future technologies. Interestingly, many classic novels accurately predicted the gadgets we use today. From Jules Verne predicting submarines and moon landings, to Arthur C. Clarke foreseeing communication satellites, the genre often acts as a blueprint for inventors. H.G. Wells wrote about automatic doors and a primitive form of the internet. More recently, William Gibson\'s "Neuromancer" coined the term "cyberspace" long before the World Wide Web became a household concept. These visionary authors didn\'t just write stories; they shaped the technological trajectory of humanity.',
                'image' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&q=80&w=800',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'How to Build a Habit of Reading Every Day',
                'content' => 'In a world dominated by screens and infinite scrolling, maintaining a daily reading habit can be challenging. The key is starting small. Commit to just ten pages a day. Link this new habit to an existing one, such as reading with your morning coffee or right before bed. Create an environment conducive to reading by leaving a book on your nightstand or carrying one in your bag. Most importantly, don\'t force yourself to finish books you aren\'t enjoying. Reading should be a pleasure, not a chore. If a book doesn\'t capture your interest within the first fifty pages, give yourself permission to move on.',
                'image' => 'https://images.unsplash.com/photo-1519682337058-a94d519337bc?auto=format&fit=crop&q=80&w=800',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Importance of Preserving Physical Libraries',
                'content' => 'As digital media becomes increasingly dominant, the role of the physical library is evolving. Libraries are no longer just repositories for books; they are vital community hubs. They provide free access to the internet, educational programs, and a safe, quiet space for everyone. In an era of rampant misinformation, librarians serve as crucial guides to reliable information. Moreover, the tactile experience of browsing physical shelves and discovering a serendipitous read cannot be replicated by an algorithm. Preserving our public libraries is about preserving democratic access to knowledge.',
                'image' => 'https://images.unsplash.com/photo-1507842217343-583bb7270b66?auto=format&fit=crop&q=80&w=800',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Understanding the Appeal of the Mystery Genre',
                'content' => 'Why are we so drawn to stories about crime and murder? The enduring popularity of the mystery genre lies in its inherent structure. It presents a puzzle that the reader is invited to solve alongside the protagonist. This interactive element keeps the brain engaged. Furthermore, mysteries offer a sense of order and justice; a crime disrupts society, but the detective restores balance by uncovering the truth. In a chaotic and unpredictable real world, this narrative arc provides psychological comfort. From Agatha Christie to modern thrillers, the fundamental appeal of the whodunit remains universally compelling.',
                'image' => 'https://images.unsplash.com/photo-1603732607997-c6ee0294fc99?auto=format&fit=crop&q=80&w=800',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        \App\Models\Article::insert($articles);
    }
}
