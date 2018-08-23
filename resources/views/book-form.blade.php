@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-0">
                <p>{{ isset($book) ? $book->name : '' }}</p>
                @if (isset($book))
                {{ Form::model($book, array('route' => array('books.update', $book->id), 'method' => 'PUT')) }}
                @else
                {{ Form::open(array('route' => 'books.store')) }}
                @endif

                    {{ Form::label('name', 'Book name') }}
                    {{ Form::text('name') }}
                    <br>

                    {{ Form::label('description', 'Description') }}
                    {{ Form::text('description') }}
                    <br>

                    {{ Form::label('page_count', 'Page Count') }}
                    {{ Form::number('page_count', null, ['min' => 1]) }}
                    <br>

                    {{ Form::label('is_available', 'Is available?') }}
                    {{ Form::select('is_available', array(true => 'Yes', false => 'No')) }}
                    <br>

                    {{ Form::label('assign[]', 'Authors') }}
                    {{ Form::select('assign[]', $authors, null, array('multiple' => true)) }}
                    <br>

                    {{ Form::submit('Save') }}

                {{ Form::close() }}
            </div>
        </div>

        <div class="row">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
@endsection
