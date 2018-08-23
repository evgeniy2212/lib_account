<?php

use Illuminate\Database\Seeder;

use App\Book;

class BookSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $book1 = Book::create([

            'name'          => 'Finansist',
            'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt',
            'page_count'    => 100,
        ]);

        $book1->authors()->attach([1, 2]);

        $book2 = Book::create([

            'name'          => 'Titan',
            'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt',
            'page_count'    => 100,
        ]);

        $book2->authors()->attach([2, 3]);

        $book3 = Book::create([

            'name'          => 'Stoik',
            'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt',
            'page_count'    => 100,
        ]);

        $book3->authors()->attach([3, 4]);

        $book4 = Book::create([

            'name'          => 'Master and Margarita',
            'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt',
            'page_count'    => 100,
        ]);

        $book4->authors()->attach([1, 4]);

        $book5 = Book::create([

            'name'          => 'War and peace',
            'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt',
            'page_count'    => 100,
        ]);

        $book5->authors()->attach([1, 2]);
    }
}
