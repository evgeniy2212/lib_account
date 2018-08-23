@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            @if (isset($message))
                <div class="alert alert-danger">
                   {{$message}}
                </div>
            @endif
        </div>

        <div class="row">


            <div class="col-md-12">
                <h4>Authors</h4>
                <button>
                    <a href="{{ route('authors.create') }}" >
                        Add Author
                    </a>
                </button>

                <div class="table-responsive">

                    <table id="mytable" class="table table-bordred table-striped">

                        <thead>

                            <th>First name</th>
                            <th>Last name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @foreach($authors as $author)
                                <tr>
                                    <td>{{ $author->first_name }}</td>
                                    <td>
                                        {{ $author->last_name }}
                                    </td>
                                    <td>
                                        <p title="Edit">
                                            <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-primary btn-xs" data-title="Edit">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                                Edit
                                            </a>
                                        </p>
                                    </td>
                                    <td>
                                        <p title="Delete">
                                            {{ Form::open(['route' => ['authors.destroy', $author->id], 'method' => 'delete']) }}
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
