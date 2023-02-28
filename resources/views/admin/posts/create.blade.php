@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        @include('admin.partials.editCreate', ['method' => 'POST', 'routeAddress' => 'admin.posts.store'])
    </div>
@endsection
