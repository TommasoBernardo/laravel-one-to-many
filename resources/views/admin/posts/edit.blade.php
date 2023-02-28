@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        @include('admin.partials.editCreate', ['method' => 'PUT', 'routeAddress' => 'admin.posts.update'])
    </div>
@endsection
