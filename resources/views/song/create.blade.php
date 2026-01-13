@extends('layouts.base')

@section('body')
    {{-- {{ dd($artists) }} --}}
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    <div class="container">
        <form action="{{ route('songs.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="song_name" class="form-label">song Name</label>
                <input type="text" class="form-control" id="song_name" placeholder="song title" name="title"
                    value="{{ old('title') }}">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <input type="text" class="form-control" id="description" placeholder="song description"
                    name="description" value="{{ old('description') }}">
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="albums" class="form-label">Pick An Album</label>
                <select class="form-select" aria-label="Default select example" name="album_id">
            </div>
            @error('album_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <option selected>Open this select menu</option>
            @foreach ($albums as $album)
                <option value="{{ $album->id }}">{{ $album->title }}</option>
            @endforeach
            </select>

            <button class="btn btn-primary" type="submit">Add song</button>
        </form>
    </div>
@endsection
