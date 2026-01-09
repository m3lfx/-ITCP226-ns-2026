@extends('layouts.base')
@section('body')
    <div><a class="btn btn-primary " href="{{ url('/albums/create') }}" aria-disabled="true">create album</a></div>
    <table class="table table-striped table-hover">
        <thead>
            <th>id</th>
            <th>title</th>
            <th>artist name</th>
            <th>genre</th>
            <th>date released</th>
            <th>action</th>
        </thead>

        @foreach ($albums as $album)
            <tr>
                <td>{{ $album->id }}</td>
                <td>{{ $album->title }}</td>
                <td>{{ $album->name }}</td>
                <td>{{ $album->genre }}</td>
                <td>{{ $album->date_released }}</td>
                <td><a href="{{ route('albums.edit', ['album' => $album->id]) }}"><i class="fas fa-edit"></i></a>
                    <a href="{{ route('albums.destroy', ['album' => $album->id]) }}"><i class="fas fa-trash"
                            style="color:red"></i></a>
                </td>
            </tr>
        @endforeach

    </table>
@endsection
