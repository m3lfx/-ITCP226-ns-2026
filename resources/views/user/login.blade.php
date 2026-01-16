@extends('layouts.base')
@section('body')
    <div class="container-lg">
        <div class="col-md-4 col-md-offset-4">
            <h1>Sign In</h1>

            @include('layouts.flash-messages')


            <form class="" action="{{route('user.signin')}}" method="POST">
                {{-- <form class="" action="#" method="post"> --}}
                @csrf
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="text" name="email" id="email" class="form-control">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password: </label>
                    <input type="password" name="password" id="password" class="form-control">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <input type="submit" value="Sign In" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection
