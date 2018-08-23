<?php

use Illuminate\Database\Seeder;

use App\Author;

class AuthorSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::create([
            'first_name'    => 'Theodore',
            'last_name'     => 'Dreiser'
        ]);

        Author::create([
            'first_name'    => 'Maxim',
            'last_name'     => 'Gorkii'
        ]);

        Author::create([
            'first_name'    => 'Michail',
            'last_name'     => 'Bulgakov'
        ]);

        Author::create([
            'first_name'    => 'Alexandr',
            'last_name'     => 'Pushkin'
        ]);

    }
}
