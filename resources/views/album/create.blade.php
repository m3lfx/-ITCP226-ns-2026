@extends('layouts.base')

@section('body')
    {{-- {{ dd($artists) }} --}}
    <div class="container">
        <form action="{{ route('albums.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="album_name" class="form-label">Album Name</label>
                <input type="text" class="form-control" id="album_name" placeholder="album title" name="title">
            </div>
            <div class="mb-3">
                <label for="genre" class="form-label">genre</label>
                <input type="text" class="form-control" id="genre" placeholder="kpop pop" name="genre">
            </div>
            <div class="mb-3">
                <label for="date_released" class="form-label">Date Released</label>
                <input type="date" class="form-control" id="date_released" name="date_released">
            </div>
            <div class="mb-3">
                <label for="artists" class="form-label">Pick An Artist</label>
                <select class="form-select" aria-label="Default select example" name="artist_id">
            </div>
            <option selected>Open this select menu</option>
            @foreach ($artists as $artist)
                <option value="{{ $artist->id }}">{{ $artist->name }}</option>
            @endforeach
            </select>
            <button class="btn btn-primary" type="submit">Add Album</button>
        </form>
    </div>
@endsection
