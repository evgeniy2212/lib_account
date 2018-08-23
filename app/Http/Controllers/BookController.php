<?php

namespace App\Http\Controllers;

use App\Http\Requests\BaseBookRequest;
use Illuminate\Http\Request;
use App\Book;
use App\Author;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $books = Book::orderBy('created_at', "DESC")->get();

        return view('book_list', [
            'books' => $books,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Author::all();

        $authors = $this->prepareAuthors($data);

        return view('book-form', [ 'authors' => $authors ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BaseBookRequest $request)
    {
        $data = $request->validated();

        $authors = $data[ 'assign' ];

        unset($data[ 'assign' ]);

        $book = Book::create($data);

        $book->authors()->attach($authors);

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {

//        return view('edit_book', [
//            'book' => $book,
//        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $book = $book->load('authors');

        $book[ 'assign' ] = $this->getId($book->authors()->get());

        $authors = $this->prepareAuthors(Author::all());

        return view('book-form', [
            'book'      => $book,
            'authors'   => $authors,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(BaseBookRequest $request, Book $book)
    {
        $data = $request->validated();

        $authors = $data[ 'assign' ];

        unset($data[ 'assign' ]);

        $book->update($data);

        $book->authors()->sync($authors);

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->authors()->detach();

        $book->delete();

        return $this->index();
    }


    public function prepareAuthors($data)
    {
        $authors = [];

        foreach ($data as $author)
        {
            $authors[ $author->id ] = $author->first_name . ' ' . $author->last_name;
        }

        return $authors;
    }

    public function getId($data)
    {
        $ids = [];

        foreach ($data as $element)
        {
            $ids[] = $element->id;
        }

        return $ids;
    }


}
