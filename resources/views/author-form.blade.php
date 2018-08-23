@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-0">
                <p>{{ isset($author) ? $author->first_name . ' ' . $author->last_name : '' }}</p>
                @if (isset($author))
                {{ Form::model($author, array('route' => array('authors.update', $author->id), 'method' => 'PUT')) }}
                @else
                {{ Form::open(array('route' => 'authors.store')) }}
                @endif

                    {{ Form::label('first_name', 'First name') }}
                    {{ Form::text('first_name') }}
                    <br>

                    {{ Form::label('last_name', 'Last name') }}
                    {{ Form::text('last_name') }}
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
