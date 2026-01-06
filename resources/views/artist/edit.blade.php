@extends('layouts.base')

@section('body')
    {{-- {{dd($artist)}} --}}
    <form action="{{ url('/artist/' . $artist->id . '/update') }}" method="POST">
        @csrf

        <input type="text" class="form-control" name="name" value="{{ $artist->name }}">
        <input type="text" class="form-control" name="country" value="{{ $artist->country }}">
        <input type="text" class="form-control" name="image" value="{{ $artist->img_path }}">
        <input type="submit" class="button">
    </form>
@endsection
