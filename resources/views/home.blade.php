@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        {{ Form::open(array('route' => 'index', 'method' => 'GET')) }}

        {{ Form::label('find', 'Search') }}
        {{ Form::text('find') }}

        {{ Form::label('type', 'Type') }}
        <p>
            By author
            {{ Form::radio('type', 'author') }}
        </p>
        <p>
            By book name
            {{ Form::radio('type', 'book') }}
        </p>

        {{ Form::submit('Find') }}

        {{ Form::close() }}
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Available books</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <table class="table">
                            @if (!empty($books))
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Pages</th>
                                    <th>Authors</th>
                                </tr>
                            </thead>
                            <tbody>

                                    @foreach ($books as $book)
                                        <tr>
                                            <td>{{$book[ 'name' ]}}</td>
                                            <td>{{$book[ 'description' ]}}</td>
                                            <td>{{$book[ 'page_count' ]}}</td>
                                            <td>
                                                @foreach ($book[ 'authors' ] as $author)
                                                    {{$author[ 'first_name' ]}} {{$author[ 'last_name' ]}}
                                                    <br>
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach


                            </tbody>
                            @else
                                <h4>
                                    Our library is not contain this books
                                </h4>
                            @endif
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
