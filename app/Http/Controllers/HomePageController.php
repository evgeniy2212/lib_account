<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $books = [];

        if ($request->has('find') && $request->get('find')) {

            if ($request->has('type')) {

                $param = $request->get('find');

                if ($request->get('type') === 'book') {

                    $books = Book::where('name', 'LIKE', "%{$param}%")
                                 ->where('is_available', true)
                                 ->get()
                                 ->load('authors');
                } elseif ($request->get('type') === 'author') {

                    $authors = Author::where('first_name', 'LIKE', "%{$param}%")->get();

                    foreach ($authors as $author) {

                        $authorBooks = $author->books()->where('is_available', true)->get()->load('authors')->toArray();

                        foreach ($authorBooks as $authorBook) {

                            if (!in_array($authorBook, $books)) {

                                $books[] = $authorBook;
                            }
                        }
                    }
                }
            } else {

                return view('home', ['books' => $books]);
            }
        } else {

            $books = Book::where('is_available', true)->get()->load('authors')->toArray();
        }

        return view('home', [
            'books' => $books,
        ]);
    }

}
