@extends('layouts.base')
@section('body')
    {{-- {{dd($myAlbums)}} --}}
    <div class="container">
        @include('layouts.flash-messages')
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Album id</th>
                    <th scope="col">Album title</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Date Released</th>
                    <th scope="col">artist name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <form action="{{ route('listeners.updateAlbums') }}" method="POST">
                    @method('PUT')
                    @csrf
                    @foreach ($albums as $album)
                        <tr>
                            <td>{{ $album->id }}</td>
                            <td>{{ $album->title }}</td>
                            <td>{{ $album->genre }}</td>
                            <td>{{ $album->date_released }}</td>
                            <td>{{ $album->name }}</td>
                            <td>
                                @if (in_array($album->id, $myAlbums))
                                    <input type="checkbox" id="album" name="album_id[]" value={{ $album->id }}
                                        checked />
                                @else
                                    <input type="checkbox" id="album" name="album_id[]" value={{ $album->id }} />
                                @endif

                            </td>
                        </tr>
                    @endforeach
                    <div><button type="submit" class="btn btn-primary">Submit</button></div>

                </form>
            </tbody>
        </table>
    </div>
@endsection
