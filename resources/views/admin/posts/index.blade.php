@extends('layouts.admin')
@section('head')
    @vite(['resources/js/delete.js'])
@endsection
@section('content')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-{{ session('message-class') }}">
                {{ session('message') }}
            </div>
        @endif
        <table class="table table-striped table-hover mt-5">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">date</th>
                    <th scope="col">
                        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">create a new project</a>
                    </th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->author }}</td>
                        <td>{{ $post->date }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.posts.show', $post->slug) }}">Show</a>

                            <a class="btn btn-success" href="{{ route('admin.posts.edit', $post->slug) }}">Edit</a>

                            <form action="{{ route('admin.posts.destroy', $post->slug) }}" method="POST"
                                class="d-inline-block form-deleter">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
    </div>
@endsection
