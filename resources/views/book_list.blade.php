@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <h4>Books</h4>
                <button>
                    <a href="{{ route('books.create') }}" >
                        Add Book
                    </a>
                </button>

                <div class="table-responsive">

                    <table id="mytable" class="table table-bordred table-striped">

                        <thead>

                            <th>Book`s name</th>
                            <th>Description</th>
                            <th>Author</th>
                            <th>Is Available</th>
                            <th>Edit Book</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td>{{ $book->name }}</td>
                                    <td>
                                        {{ $book->description }}
                                    </td>
                                    <td>
                                        @foreach($book->authors as $author)
                                            {{ $author->first_name }} _ {{ $author->last_name }}<br>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if ($book->is_available)
                                            Available
                                        @else
                                            Unavailable
                                        @endif
                                    </td>
                                    <td>
                                        <p title="Edit">
                                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary btn-xs" data-title="Edit">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                                Edit
                                            </a>
                                        </p>
                                    </td>
                                    <td>
                                        <p title="Delete">
                                            {{ Form::open(['route' => ['books.destroy', $book->id], 'method' => 'delete']) }}
                                                {{ Form::submit('Delete') }}
                                            {{ Form::close() }}
                                        </p>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>
        </div>
    </div>
@endsection
