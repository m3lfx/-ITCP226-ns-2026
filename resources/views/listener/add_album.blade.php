@extends('layouts.base')

@section('body')
    <div class="container-lg">
        {{-- {{dd($albums)}} --}}
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
                {{-- <form action="{{ route('listeners.addAlbumListener') }}" method="POST"> --}}
                <form action="" method="POST">
                    @csrf
                    @foreach ($albums as $album)
                        <tr>
                            <td>{{ $album->id }}</td>
                            <td>{{ $album->title }}</td>
                            <td>{{ $album->genre }}</td>
                            <td>{{ $album->date_released }}</td>
                            <td>{{ $album->name }}</td>
                            <td><input type="checkbox" id="album" name="album_id[]" value={{ $album->id }} />


                            </td>
                        </tr>
                    @endforeach
                    <div><button type="submit" class="btn btn-primary">Submit</button></div>

                </form>
            </tbody>
        </table>
        {{-- {{$albums->links()}} --}}
    </div>
@endsection
