@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-0">
                @foreach($authors as $author)
                <p>{{ $author->first_name }} {{ $author->last_name }}</p>

                {{ Form::model($author, array('route' => array('authors.update', $author->id), 'method' => 'PUT')) }}
                <div class="form-group">
                    <div class="col-xs-offset-1">
                        <strong>Name:</strong><br>{!! Form::text('name') !!}<br><br>
                    </div>
                    <div class="col-xs-3 col-xs-offset-1">
                        {!! Form::submit('Update Book', ['class' => ' btn btn-warning']) !!}
                        {{ Form::close() }}
                    </div>
                    <div class="col-xs-3 col-xs-offset-4">
                        {{ Form::open(['route' => ['authors.destroy', $author->id], 'method' => 'DELETE', 'class' => 'form-horizontal', 'before' => 'csrf']) }}
                        {{--<div class="col-xs-offset-1">--}}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    </div>
                    {{ Form::close() }}
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection