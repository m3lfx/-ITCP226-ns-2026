@extends('layouts.base')

@section('body')
    <div class="container-lg">
        {{-- {{dd($listeners)}} --}}
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">fname</th>
                    <th scope="col">lname</th>
                    <th scope="col">address</th>
                    <th scope="col">image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listeners as $listener)
                    <tr>
                        <td>{{ $listener->id }}</td>
                        <td>{{ $listener->fname }}</td>
                        <td>{{ $listener->lname }}</td>
                        <td>{{ $listener->address }}</td>

                        <td> <img src="{{ Storage::url($listener->img_path) }}" alt="Avatar" class="img-fluid my-5"
                                style="width: 80px;" /></td>
                        </td>
                        @if ($listener->deleted_at === null)
                            <td><a href="{{ route('listeners.edit', $listener->id) }}"><i
                                        class="fa-regular fa-pen-to-square"></i></a>
                                <form action="{{ route('listeners.destroy', $listener->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn "><i class="fa-regular fa-trash-can"
                                            style="color:red"></i></button>

                                </form>
                                </i>

                                <i class="fa-solid fa-rotate-left" style="color:gray"></i>
                            </td>
                        @else
                            <td>
                                <i class="fa-regular fa-pen-to-square" style="color:gray"></i>
                                <i class="fa-regular fa-trash-can" style="color:gray"></i>
                                <a href="{{ route('listeners.restore', $listener->id) }}"><i class="fa-solid fa-rotate-left"
                                        style="color:green"></i></a>
                            </td>
                        @endif

                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
@endsection
