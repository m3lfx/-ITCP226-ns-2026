@extends('layouts.base')

@section('body')
    <div class="container-lg">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('user.register') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="fname" class="form-label">First Name</label>
                <input type="text" class="form-control" name="fname" id="fname" value="{{ old('fname') }}"
                    aria-describedby="name">
            </div>
            @error('fname')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="lname" class="form-label">last Name</label>
                <input type="text" class="form-control" name="lname" value="{{ old('lname') }}" id="lname"
                    aria-describedby="name">
            </div>
            @error('lname')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input type="text" class="form-control" name="email" value="{{ old('email') }}" id="email"
                    aria-describedby="name">
            </div>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="pass" class="form-label">password</label>
                <input type="password" class="form-control" name="password" id="pass" aria-describedby="name">
            </div>
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="address" class="form-label">address</label>
                <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}"
                    aria-describedby="country">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">user Image</label>
                <input type="file" class="form-control" name="img_path" id="image" aria-describedby="image">
            </div>
            @error('img_path')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="submit" class="btn btn-secondary">Cancel</button>
        </form>

    </div>
@endsection
