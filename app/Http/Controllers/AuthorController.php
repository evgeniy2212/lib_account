<?php

namespace App\Http\Controllers;

use App\Author;
use App\Http\Requests\BaseAuthorRequest;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('author-list', [
            'authors' => Author::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BaseAuthorRequest $request)
    {
        $data = $request->validated();

        Author::create($data);

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('author-form', [ 'author' => $author ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BaseAuthorRequest $request, Author $author)
    {
        $data = $request->validated();

        $author->update($data);

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        if ($author->books()->count()) {

            $books = $author->books()->get();

            $names = '';

            foreach ($books as $book) {

                $names .= $book->name . '    ';
            }

            return $this->index()->with('message', 'This author is co-author for this books: ' . $names);
        } else {

            $author->delete();

            return $this->index();
        }
    }
}
