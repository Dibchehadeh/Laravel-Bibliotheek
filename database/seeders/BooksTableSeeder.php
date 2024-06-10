<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'title' => 'Sample Book 1',
            'author' => 'John Doe',
            'price' => 19.99,
            'stock' => 10
        ]);

        Book::create([
            'title' => 'Sample Book 2',
            'author' => 'Jane Doe',
            'price' => 24.99,
            'stock' => 15
        ]);

        Book::create([
            'title' => 'Sample Book 3',
            'author' => 'Mark Smith',
            'price' => 29.99,
            'stock' => 5
        ]);
    }
}
